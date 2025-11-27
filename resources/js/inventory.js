document.addEventListener('DOMContentLoaded', () => {
    // ========== LOGIKA UNTUK TABS ==========
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');

    // Class untuk state Aktif vs Tidak Aktif
    const activeClasses = ['bg-[#F5F5DC]', 'text-[#5E7153]', 'z-20', '-mb-[2px]'];
    const inactiveClasses = ['bg-[#5E7153]', 'text-[#F5F5DC]', 'z-10'];

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const targetId = button.getAttribute('data-tab-target');
            const targetPanel = document.querySelector(targetId);
            
            // Sembunyikan semua panel
            tabContents.forEach(panel => panel.classList.add('hidden'));
            
            // Tampilkan panel target
            if (targetPanel) targetPanel.classList.remove('hidden');
            
            // Reset semua tombol ke state inactive
            tabButtons.forEach(btn => {
                btn.classList.remove(...activeClasses);
                btn.classList.add(...inactiveClasses);
            });

            // Set tombol yang diklik ke state active
            button.classList.remove(...inactiveClasses);
            button.classList.add(...activeClasses);
        });
    });

    // ========== LOGIKA UNTUK KLIK ITEM ==========
    const detailImageContainer = document.getElementById('item-detail-image');
    const detailName = document.getElementById('item-detail-name');
    const detailDesc = document.getElementById('item-detail-desc');
    const itemCards = document.querySelectorAll('.item-card');
    
    itemCards.forEach(card => {
        card.addEventListener('click', () => {
            const itemData = JSON.parse(card.getAttribute('data-item'));
            
            detailName.textContent = itemData.name;
            detailDesc.textContent = itemData.desc;
            
            detailImageContainer.innerHTML = ''; 
            const newImage = document.createElement('img');
            newImage.src = itemData.image;
            newImage.alt = itemData.name;
            newImage.className = 'w-full h-full object-cover'; 
            detailImageContainer.appendChild(newImage);
            
            // Reset border active
            itemCards.forEach(c => c.classList.remove('ring-4', 'ring-[#5E7153]'));
            // Add active border visual (Tailwind ring)
            card.classList.add('ring-4', 'ring-[#5E7153]');
        });
    });

// --- SETUP MODAL USE ITEM ---    
    // YANG BENAR:
    const modalUse = document.getElementById('modal-use'); // <--- Ganti nama variabel ini
    const contentUse = document.getElementById('modal-content-use');
    const btnUse = document.getElementById('btn-use');
    const btnCloseUse = document.getElementById('close-use');

    // Fungsi BUKA Modal
    function openUseModal() {
        // Sekarang variabel modalUse sudah dikenali
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
        btnUse.addEventListener('click', openUseModal);
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