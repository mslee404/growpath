document.addEventListener('DOMContentLoaded', () => {
    
    // ==========================================
    // 1. LOGIKA TAB NAVIGATION
    // ==========================================
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');

    // Class untuk State Active (Krem #FDFDD9, Teks Hijau, Z-Index tinggi, Margin minus)
    const activeClasses = ['tab-active', 'bg-[#FDFDD9]', 'text-[#5E7153]', 'z-20', '-mb-[2px]'];
    
    // Class untuk State Inactive (Hijau #5E7153, Teks Krem, Z-Index rendah)
    const inactiveClasses = ['bg-[#5E7153]', 'text-[#FDFDD9]', 'z-10'];

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const targetId = button.getAttribute('data-tab-target');
            const targetPanel = document.querySelector(targetId);
            
            // 1. Sembunyikan semua panel
            tabContents.forEach(panel => panel.classList.add('hidden'));
            
            // 2. Tampilkan panel target
            if (targetPanel) targetPanel.classList.remove('hidden');
            
            // 3. Reset semua tombol ke state inactive
            tabButtons.forEach(btn => {
                btn.classList.remove(...activeClasses);
                btn.classList.add(...inactiveClasses);
            });

            // 4. Set tombol yang diklik ke state active
            button.classList.remove(...inactiveClasses);
            button.classList.add(...activeClasses);
        });
    });

    // ==========================================
    // 2. LOGIKA KLIK ITEM CARD
    // ==========================================
    const itemCards = document.querySelectorAll('.item-card');
    const detailImg = document.getElementById('item-detail-image');
    const detailName = document.getElementById('item-detail-name');
    const detailDesc = document.getElementById('item-detail-desc');

    // Class Ring Aktif (Hijau) vs Inaktif (Transparan)
    const ringActive = 'ring-[#5E7153]';
    const ringInactive = 'ring-transparent';

    itemCards.forEach(card => {
        card.addEventListener('click', () => {
            // A. Ambil Data
            const data = JSON.parse(card.getAttribute('data-item'));

            // B. Update Detail
            if(detailName) detailName.textContent = data.name;
            if(detailDesc) detailDesc.textContent = data.desc || '-';
            
            if(detailImg) {
                detailImg.innerHTML = '';
                const img = document.createElement('img');
                // Menggunakan link langsung dari data (karena di komponen sudah di-asset())
                img.src = data.image; 
                img.className = 'w-full h-full object-cover';
                detailImg.appendChild(img);
            }

            // C. Visual Ring / Seleksi
            // Reset semua kartu lain
            itemCards.forEach(c => {
                c.classList.remove(ringActive);
                c.classList.add(ringInactive);
            });

            // Aktifkan kartu ini
            card.classList.remove(ringInactive);
            card.classList.add(ringActive);
        });
    });

});