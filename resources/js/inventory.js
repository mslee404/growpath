// Tunggu sampai semua konten HTML selesai dimuat
document.addEventListener('DOMContentLoaded', () => {

    // ========== LOGIKA UNTUK TABS ==========
    
    // 1. Ambil semua tombol tab
    const tabButtons = document.querySelectorAll('.tab-button');
    
    // 2. Ambil semua panel konten tab
    const tabContents = document.querySelectorAll('.tab-content');

    // 3. Tambahkan event click ke setiap tombol tab
    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Dapatkan target panel dari data-tab-target
            const targetId = button.getAttribute('data-tab-target');
            const targetPanel = document.querySelector(targetId);
            
            // Sembunyikan semua panel konten
            tabContents.forEach(panel => {
                panel.classList.add('hidden');
            });
            
            // Tampilkan panel yang ditarget
            if (targetPanel) {
                targetPanel.classList.remove('hidden');
            }
            
            // Atur style tombol (aktif/inaktif)
            tabButtons.forEach(btn => {
                // HAPUS kelas aktif (bg-cream, text-green)
                btn.classList.remove('tab-active', 'bg-[#F5F5DC]', 'text-[#5E7153]', 'z-[2]', '-mb-px'); 
                // TAMBAH kelas tidak aktif (bg-green, text-cream)
                btn.classList.add('bg-[#5E7153]', 'text-[#F5F5DC]', 'z-[1]'); 
            });

            // PADA TOMBOL YANG DIKLIK:
            // TAMBAH kelas aktif (bg-cream, text-green)
            button.classList.add('tab-active', 'bg-[#F5F5DC]', 'text-[#5E7153]', 'z-[2]', '-mb-px');
            // HAPUS kelas tidak aktif (bg-green, text-cream)
            button.classList.remove('bg-[#5E7153]', 'text-[#F5F5DC]', 'z-[1]');
        });
    });

    // ========== LOGIKA UNTUK KLIK ITEM ==========

    // 1. Ambil elemen detail di kiri
    const detailImageContainer = document.getElementById('item-detail-image');
    const detailName = document.getElementById('item-detail-name');
    const detailDesc = document.getElementById('item-detail-desc');
    
    // 2. Ambil semua kartu item
    const itemCards = document.querySelectorAll('.item-card');
    
    // 3. Tambahkan event click ke setiap kartu item
    itemCards.forEach(card => {
        card.addEventListener('click', () => {
            // Ambil data JSON dari atribut data-item
            const itemData = JSON.parse(card.getAttribute('data-item'));
            
            // Update panel detail di kiri
            detailName.textContent = itemData.name;
            detailDesc.textContent = itemData.desc;
            
            // Update gambar (buat elemen img baru)
            detailImageContainer.innerHTML = ''; // Kosongkan dulu
            const newImage = document.createElement('img');
            newImage.src = itemData.image;
            newImage.alt = itemData.name;
            newImage.className = 'w-full h-full object-cover'; // Atur agar pas
            detailImageContainer.appendChild(newImage);
            
            // (Opsional) Beri tanda visual item mana yang dipilih
            itemCards.forEach(c => c.classList.remove('border-green-800'));
            card.classList.add('border-green-800');
        });
    });
    
});