document.addEventListener('DOMContentLoaded', () => {
    const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // ========== MODAL BELI ==========
    const modalBuy = document.getElementById('modal-buy');
    const contentBuy = document.getElementById('modal-content-buy');
    const modalTitle = document.getElementById('modal-buy-title');
    const modalMessage = document.getElementById('modal-buy-message');
    const modalActions = document.getElementById('modal-buy-actions');
    const modalResultActions = document.getElementById('modal-result-actions');

    function openBuyModal() {
        if (!modalBuy || !contentBuy) return;
        modalBuy.classList.remove('invisible', 'opacity-0');
        contentBuy.classList.remove('scale-95');
    }

    function closeBuyModal() {
        if (!modalBuy || !contentBuy) return;
        modalBuy.classList.add('opacity-0');
        contentBuy.classList.add('scale-95');
        setTimeout(() => modalBuy.classList.add('invisible'), 300);
    }

    // Mode konfirmasi (tombol Yakin/Batal) atau mode hasil (tombol Tutup)
    function showModal(title, message = '', confirm = false) {
        if (modalTitle) modalTitle.textContent = title;
        if (modalMessage) {
            modalMessage.textContent = message;
            modalMessage.classList.toggle('hidden', !message);
        }
        if (modalActions) modalActions.classList.toggle('hidden', !confirm);
        if (modalResultActions) modalResultActions.classList.toggle('hidden', confirm);
        openBuyModal();
    }

    ['close-buy', 'btn-cancel-buy', 'btn-close-result'].forEach(id => {
        document.getElementById(id)?.addEventListener('click', closeBuyModal);
    });
    window.addEventListener('click', (event) => {
        if (event.target === modalBuy) closeBuyModal();
    });

    function postJson(url, payload = {}) {
        return fetch(url, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': csrf },
            body: JSON.stringify(payload),
        }).then(res => res.json().then(body => ({ ok: res.ok, body })));
    }

    // ========== PILIH ITEM ==========
    const detailImageContainer = document.getElementById('item-detail-image');
    const detailName = document.getElementById('item-detail-name');
    const detailDesc = document.getElementById('item-detail-desc');
    const detailPrice = document.getElementById('item-detail-price');
    const goldAmount = document.getElementById('gold-amount');
    const itemCards = document.querySelectorAll('.item-card');
    let selected = null; // { data, card }

    itemCards.forEach(card => {
        card.addEventListener('click', () => {
            const data = JSON.parse(card.getAttribute('data-item'));
            selected = { data, card };

            if (detailName) detailName.textContent = data.name;
            if (detailDesc) detailDesc.textContent = data.desc || '-';
            if (detailPrice) {
                detailPrice.textContent = data.type === 'gold'
                    ? 'Rp. ' + new Intl.NumberFormat('id-ID').format(data.price)
                    : data.price + ' G';
            }

            if (detailImageContainer) {
                detailImageContainer.querySelectorAll('img,.text-placeholder').forEach(el => el.remove());
                const img = document.createElement('img');
                img.src = data.image;
                img.alt = data.name;
                img.className = 'w-full h-full object-cover rounded-2xl';
                detailImageContainer.appendChild(img);
            }

            itemCards.forEach(c => c.classList.remove('ring-4', 'ring-[#5E7153]'));
            card.classList.add('ring-4', 'ring-[#5E7153]');
        });
    });

    // ========== BELI ==========
    document.getElementById('btn-buy')?.addEventListener('click', () => {
        if (!selected) return showModal('Silakan pilih item terlebih dahulu!');
        showModal(selected.data.type === 'gold' ? 'Lanjut ke pembayaran?' : 'Yakin Mau Beli Item Ini?', '', true);
    });

    document.getElementById('btn-confirm-buy')?.addEventListener('click', () => {
        if (!selected) return;
        (selected.data.type === 'gold' ? buyGold : buyItem)(selected).catch(error => {
            console.error(error);
            showModal('Error', 'Terjadi kesalahan sistem.');
        });
    });

    function buyItem({ data, card }) {
        return postJson('/shop/buy', { item_id: data.id }).then(({ ok, body }) => {
            showModal(ok ? 'Berhasil!' : 'Gagal!', body.message);
            if (!ok) return;
            if (goldAmount) goldAmount.textContent = body.new_gold;
            card.remove(); // sudah dimiliki, tidak dijual lagi
            selected = null;
        });
    }

    // Top-up lewat popup Midtrans Snap; status akhir selalu dicek ulang ke server
    function buyGold({ data }) {
        return postJson('/shop/buy-gold', { package_id: data.id }).then(({ ok, body }) => {
            if (!ok) return showModal('Gagal!', body.message);
            if (!window.snap) return showModal('Gagal!', 'Halaman pembayaran gagal dimuat. Coba muat ulang.');

            closeBuyModal();
            const check = () => postJson(`/shop/buy-gold/${encodeURIComponent(body.order_id)}/check`)
                .then(({ body: res }) => {
                    const titles = { success: 'Berhasil!', pending: 'Menunggu pembayaran' };
                    showModal(titles[res.status] || 'Gagal!', res.message);
                    if (goldAmount && res.new_gold !== undefined) goldAmount.textContent = res.new_gold;
                });

            window.snap.pay(body.snap_token, { onSuccess: check, onPending: check, onError: check, onClose: check });
        });
    }
});
