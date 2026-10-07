document.addEventListener('DOMContentLoaded', () => {
    // --- SETUP MODAL USE ITEM ---
    const modalUse = document.getElementById('modal-use');
    const contentUse = document.getElementById('modal-content-use');
    const btnUse = document.getElementById('btn-use');
    const btnCloseUse = document.getElementById('close-use');

    // Fungsi BUKA Modal
    function openUseModal() {
        if (!modalUse || !contentUse) return;
        modalUse.classList.remove('invisible', 'opacity-0');
        contentUse.classList.remove('scale-95');
    }

    // Fungsi TUTUP Modal
    function closeUseModal() {
        if (!modalUse || !contentUse) return;
        modalUse.classList.add('opacity-0');
        contentUse.classList.add('scale-95');

        setTimeout(() => {
            modalUse.classList.add('invisible');
        }, 300);
    }

    // Pasang Event Listener
    if (btnUse) {
        btnUse.addEventListener('click', () => {
            const itemId = btnUse.getAttribute('data-selected-id');
            if (!itemId) {
                alert("Silakan pilih item terlebih dahulu!");
                return;
            }

            // AJAX Request
            fetch('/inventory/equip', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ item_id: itemId })
            })
                .then(response => response.json().then(data => ({ ok: response.ok, data })))
                .then(({ ok, data }) => {
                    if (!ok) {
                        alert(data.message || 'Gagal memasang item.');
                        return;
                    }
                    // Perbarui status "terpasang" di data kartu bertipe sama, tanpa reload
                    document.querySelectorAll('.item-card').forEach(card => {
                        const item = JSON.parse(card.dataset.item);
                        if (item.type !== data.type) return;
                        item.is_equipped = String(item.id) === String(itemId);
                        card.dataset.item = JSON.stringify(item);
                    });
                    btnUse.textContent = 'Terpasang';
                    btnUse.disabled = true;
                    btnUse.classList.add('opacity-50', 'cursor-not-allowed');
                    openUseModal();
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert("Terjadi kesalahan saat memasang item.");
                });
        });
    }

    if (btnCloseUse) {
        btnCloseUse.addEventListener('click', closeUseModal);
    }

    // Tutup kalau klik di luar kotak
    window.addEventListener('click', (event) => {
        if (event.target == modalUse) {
            closeUseModal();
        }
    });

});