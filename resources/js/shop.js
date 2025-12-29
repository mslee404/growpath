// Tunggu sampai semua konten HTML selesai dimuat
document.addEventListener('DOMContentLoaded', () => {
    // --- SETUP MODAL BUY ITEM ---

    const modalBuy = document.getElementById('modal-buy');
    const contentBuy = document.getElementById('modal-content-buy');
    const btnBuy = document.getElementById('btn-buy');
    const btnCloseBuy = document.getElementById('close-buy');
    const btnCancelBuy = document.getElementById('btn-cancel-buy');

    // Fungsi BUKA Modal
    function openBuyModal() {
        if (!modalBuy || !contentBuy) return;
        modalBuy.classList.remove('invisible', 'opacity-0');
        contentBuy.classList.remove('scale-95');
    }

    // Fungsi TUTUP Modal
    function closeBuyModal() {
        if (!modalBuy || !contentBuy) return;
        modalBuy.classList.add('opacity-0');
        contentBuy.classList.add('scale-95');

        setTimeout(() => {
            modalBuy.classList.add('invisible');
        }, 300);
    }

    // Pasang Event Listener
    if (btnBuy) { // Note: btnBuy now opens logic controlled below, but keeping this for safety or if logic is separate
        // Initially it was btnBuy opens openBuyModal directly. 
        // But our new logic attaches a specific listener to btnBuy below.
        // We should remove this generic one if it conflicts. 
        // Actually, the new logic below ADDS another listener. 
        // To be clean, I should NOT duplicate listeners. 
        // The code below handles btnBuy. So I will remove lines 30-32 logic or keep it but ensure it doesn't conflict.
        // Actually, lines 30-32 in original were: btnBuy.addEventListener('click', openBuyModal);
        // My new logic also does btnBuy.addEventListener...
        // This causes DOUBLE open or logic execution. 
        // I will REMOVE the generic listener for btnBuy here and let the specific logic handle it.
    }

    if (btnCloseBuy) {
        btnCloseBuy.addEventListener('click', closeBuyModal);
    }

    if (btnCancelBuy) {
        btnCancelBuy.addEventListener('click', closeBuyModal);
    }

    // Tutup kalau klik di luar kotak
    window.addEventListener('click', (event) => {
        if (event.target == modalBuy) {
            closeBuyModal();
        }
    });



    // // ========== LOGIKA UNTUK TABS ========== (Commented out in original)
    // ... (Keeping commented out code related to tabs if user wants it, or just omitting for cleanliness. User didn't ask to delete it, but cleaner is better. I'll leave it out to save space if it was already commented out).


    // ========== LOGIKA UNTUK KLIK ITEM ==========

    // 1. Ambil elemen detail di kiri
    const detailImageContainer = document.getElementById('item-detail-image');
    const detailName = document.getElementById('item-detail-name');
    const detailDesc = document.getElementById('item-detail-desc');
    const detailPrice = document.getElementById('item-detail-price');
    const goldAmount = document.getElementById('gold-amount');

    // 2. Ambil semua kartu item
    const itemCards = document.querySelectorAll('.item-card');
    let selectedItemId = null;
    let selectedItemPrice = 0;
    let selectedItemType = null; // Track item type for gold vs regular

    // 3. Tambahkan event click ke setiap kartu item
    itemCards.forEach(card => {
        card.addEventListener('click', () => {
            // Ambil data JSON dari atribut data-item
            const itemData = JSON.parse(card.getAttribute('data-item'));

            selectedItemId = itemData.id;
            selectedItemPrice = parseInt(itemData.price);
            selectedItemType = itemData.type || null; // Store type

            // Update panel detail di kiri
            if (detailName) detailName.textContent = itemData.name;
            if (detailDesc) detailDesc.textContent = itemData.desc || '-';
            if (detailPrice) detailPrice.textContent = itemData.price + ' G';

            // Clear only avatar's image children
            if (detailImageContainer) {
                detailImageContainer.querySelectorAll('img,.text-placeholder').forEach(el => el.remove());
                const newImage = document.createElement('img');
                // Handle different image path sources
                newImage.src = itemData.image;
                newImage.alt = itemData.name;
                newImage.className = 'w-full h-full object-cover rounded-2xl';
                detailImageContainer.appendChild(newImage);
            }

            // Reset border active
            itemCards.forEach(c => c.classList.remove('ring-4', 'ring-[#5E7153]'));
            // Add active border visual (Tailwind ring)
            card.classList.add('ring-4', 'ring-[#5E7153]');
        });
    });

    // ========== LOGIKA TOMBOL BELI (AUTO OPEN CONFIRMATION) ==========

    // Elemen2 di dalam modal
    const modalTitle = document.getElementById('modal-buy-title');
    const modalMessage = document.getElementById('modal-buy-message');
    const modalActions = document.getElementById('modal-buy-actions');
    const modalResultActions = document.getElementById('modal-result-actions');
    const btnConfirmBuy = document.getElementById('btn-confirm-buy');
    const btnCloseResult = document.getElementById('btn-close-result');

    // 1. Klik Beli -> Buka Modal Konfirmasi
    if (btnBuy) {
        btnBuy.addEventListener('click', () => {
            if (!selectedItemId) {
                // Tampilkan pesan di modal jika belum pilih item
                if (modalTitle) modalTitle.textContent = "Silakan pilih item terlebih dahulu!";
                if (modalMessage) {
                    modalMessage.textContent = "";
                    modalMessage.classList.add('hidden');
                }
                // Hide 'Yakin' buttons, show 'Tutup' button
                if (modalActions) modalActions.classList.add('hidden');
                if (modalResultActions) modalResultActions.classList.remove('hidden');

                openBuyModal();
                return;
            }

            // RESET STATE MODAL KE "KONFIRMASI"
            if (modalTitle) modalTitle.textContent = "Yakin Mau Beli Item Ini?";
            if (modalMessage) {
                modalMessage.textContent = "";
                modalMessage.classList.add('hidden');
            }
            if (modalActions) modalActions.classList.remove('hidden');
            if (modalResultActions) modalResultActions.classList.add('hidden');

            openBuyModal();
        });
    }

    // 2. Klik "Yakin!" -> Proses Beli
    if (btnConfirmBuy) {
        btnConfirmBuy.addEventListener('click', () => {
            // Determine endpoint and payload based on item type
            let endpoint = '/shop/buy';
            let payload = { item_id: selectedItemId };

            if (selectedItemType === 'gold') {
                endpoint = '/shop/buy-gold';
                payload = { package_id: selectedItemId };
            }

            fetch(endpoint, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(payload)
            })
                .then(response => response.json().then(data => ({ status: response.status, body: data })))
                .then(res => {
                    // UBAH STATE MODAL KE "HASIL"
                    if (modalActions) modalActions.classList.add('hidden');
                    if (modalResultActions) modalResultActions.classList.remove('hidden');
                    if (modalMessage) modalMessage.classList.remove('hidden');

                    if (res.status === 200) {
                        // Sukses
                        if (modalTitle) modalTitle.textContent = "Berhasil!";
                        if (modalMessage) modalMessage.textContent = res.body.message;

                        // Update Gold UI
                        if (goldAmount) goldAmount.textContent = res.body.new_gold;
                    } else {
                        // Gagal
                        if (modalTitle) modalTitle.textContent = "Gagal!";
                        if (modalMessage) modalMessage.textContent = res.body.message;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);

                    // Fallback Error UI
                    if (modalActions) modalActions.classList.add('hidden');
                    if (modalResultActions) modalResultActions.classList.remove('hidden');
                    if (modalTitle) modalTitle.textContent = "Error";
                    if (modalMessage) {
                        modalMessage.classList.remove('hidden');
                        modalMessage.textContent = "Terjadi kesalahan sistem.";
                    }
                });
        });
    }

    // 3. Klik Tutup (Result)
    if (btnCloseResult) {
        btnCloseResult.addEventListener('click', closeBuyModal);
    }

});