let tabs = document.querySelectorAll(".shop-menu h3");
let tabContents = document.querySelectorAll(".shop-content div");
tabs.forEach((tab, index) => {
  tab.addEventListener("click", () => {
    tabContents.forEach((content) => {
      content.classList.remove("active");
    });

    // ========== LOGIKA UNTUK KLIK ITEM ==========

    // 1. Ambil elemen detail di kiri
    const detailImageContainer = document.getElementById('item-detail-image');
    const frameImageContainer = document.getElementById('item-frame');
    const detailName = document.getElementById('item-detail-name');
    const detailDesc = document.getElementById('item-detail-desc');
    const detailPrice = document.getElementById('item-detail-price');
    
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
            detailPrice.textContent = itemData.price;

            // Clear only frame’s image children, not the whole container
            frameImageContainer.querySelectorAll('img').forEach(img => img.remove());

            // Clear only avatar’s image children
            detailImageContainer.querySelectorAll('img').forEach(img => img.remove());

            
            if (itemData.type === "Frame") {
              const newImage = document.createElement('img');
              newImage.src = itemData.image;
              newImage.alt = itemData.name;
              newImage.className = 'absolute w-[100%] h-[100%] pointer-events-none'; // Atur agar pas
              frameImageContainer.appendChild(newImage);

            } else { 
              const newImage = document.createElement('img');
              newImage.src = itemData.image;
              newImage.alt = itemData.name;
              newImage.className = 'w-full h-full object-cover'; // Atur agar pas
              detailImageContainer.appendChild(newImage);
            }
            
            // (Opsional) Beri tanda visual item mana yang dipilih
            itemCards.forEach(c => c.classList.remove('border-green-800'));
            card.classList.add('border-green-800');
        });
    tabs.forEach((tab) => {
      tab.classList.remove("active");
    });
    tabContents[index].classList.add("active");
    tabs[index].classList.add("active");
  });
});