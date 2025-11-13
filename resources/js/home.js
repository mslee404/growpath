// Tunggu sampai semua HTML dimuat
document.addEventListener('DOMContentLoaded', () => {

    /**
     * Fungsi untuk setup sistem tab "Pill"
     * @param {string} groupName - Nama grup (misal: 'habit', 'tugas')
     * @param {object} theme - Object berisi class 'active' dan 'inactive'
     */
    function setupTabSystem(groupName, theme) {
        const group = document.querySelector(`[data-tab-group="${groupName}"]`);
        if (!group) return;

        const tabContainer = group.querySelector('[data-tab-container]');
        const panelContainer = group.querySelector('[data-panel-container]');
        
        if (!tabContainer || !panelContainer) return;

        const tabButtons = tabContainer.querySelectorAll('.tab-button');
        const tabPanels = panelContainer.querySelectorAll('.tab-panel');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const targetId = button.dataset.tabButton;
                
                // 1. Sembunyikan semua panel di grup ini
                tabPanels.forEach(panel => {
                    panel.classList.add('hidden');
                });

                // 2. Tampilkan panel yang dituju
                const targetPanel = panelContainer.querySelector(`#${targetId}`);
                if (targetPanel) {
                    targetPanel.classList.remove('hidden');
                }

                // 3. Reset semua tombol di container ini ke 'inactive'
                tabButtons.forEach(btn => {
                    // Hapus kelas 'active' dan tambahkan 'inactive'
                    btn.classList.remove(...theme.active.split(' '));
                    btn.classList.add(...theme.inactive.split(' '));
                });
                
                // 4. Set tombol yang diklik ke 'active'
                button.classList.remove(...theme.inactive.split(' '));
                button.classList.add(...theme.active.split(' '));
            });
        });
    }

    /**
     * Fungsi untuk setup scroller kategori dengan tombol panah
     */
    function setupScrollers(scrollerId) {
        const scroller = document.getElementById(scrollerId);
        if (!scroller) return;

        const scrollContainer = scroller.parentElement;
        const scrollLeftBtn = scrollContainer.querySelector('.scroll-btn-left');
        const scrollRightBtn = scrollContainer.querySelector('.scroll-btn-right');

        function updateButtonVisibility() {
            if (!scrollLeftBtn || !scrollRightBtn) return;
            
            // +1 / -1 untuk toleransi browser
            const maxScrollLeft = scroller.scrollWidth - scroller.clientWidth;
            
            // Cek kiri
            if (scroller.scrollLeft <= 1) {
                scrollLeftBtn.classList.add('invisible');
            } else {
                scrollLeftBtn.classList.remove('invisible');
            }

            // Cek kanan
            if (scroller.scrollLeft >= maxScrollLeft - 1) {
                scrollRightBtn.classList.add('invisible');
            } else {
                scrollRightBtn.classList.remove('invisible');
            }
        }

        // Event listener untuk tombol panah
        [scrollLeftBtn, scrollRightBtn].forEach(button => {
            if (button) {
                button.addEventListener('click', () => {
                    const direction = parseInt(button.dataset.direction, 10);
                    // Scroll 1/3 dari lebar container
                    const scrollAmount = (scroller.clientWidth / 3) * direction; 
                    scroller.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                });
            }
        });

        // Update visibilitas tombol saat di-scroll
        scroller.addEventListener('scroll', updateButtonVisibility);
        
        // Panggil sekali saat load untuk set kondisi awal
        // Butuh delay kecil agar kalkulasi scrollWidth akurat
        setTimeout(updateButtonVisibility, 100); 
    }

    /**
     * (BARU) Fungsi untuk setup semua logika modal/pop-up
     */
    function setupModals() {
        
        // --- MODAL HABIT ---
        const modalHabit = document.getElementById('modal-habit');
        const contentHabit = document.getElementById('modal-content-habit'); // <-- Ambil konten
        const btnTambahHabit = document.getElementById('btn-tambah-habit');
        const btnCloseHabit = document.getElementById('close-habit');

        // Fungsi untuk MEMBUKA modal habit
        function openModalHabit() {
            if (!modalHabit || !contentHabit) return;
            // 1. Tampilkan overlay
            modalHabit.classList.remove('invisible', 'opacity-0');
            // 2. Tampilkan konten (animasi scale)
            contentHabit.classList.remove('scale-95');
        }

        // Fungsi untuk MENUTUP modal habit
        function closeModalHabit() {
            if (!modalHabit || !contentHabit) return;
            // 1. Mulai animasi tutup (fade out dan scale down)
            modalHabit.classList.add('opacity-0');
            contentHabit.classList.add('scale-95');
            
            // 2. Tunggu animasi selesai (300ms) baru sembunyikan
            setTimeout(() => {
                modalHabit.classList.add('invisible');
            }, 300); // Durasi harus sama dengan 'duration-300'
        }

        if (btnTambahHabit) btnTambahHabit.addEventListener('click', openModalHabit);
        if (btnCloseHabit) btnCloseHabit.addEventListener('click', closeModalHabit);


        // --- MODAL TUGAS ---
        const modalTugas = document.getElementById('modal-tugas');
        const contentTugas = document.getElementById('modal-content-tugas'); // <-- Ambil konten
        const btnTambahTugas = document.getElementById('btn-tambah-tugas');
        const btnCloseTugas = document.getElementById('close-tugas');

        // Fungsi untuk MEMBUKA modal tugas
        function openModalTugas() {
            if (!modalTugas || !contentTugas) return;
            modalTugas.classList.remove('invisible', 'opacity-0');
            contentTugas.classList.remove('scale-95');
        }

        // Fungsi untuk MENUTUP modal tugas
        function closeModalTugas() {
            if (!modalTugas || !contentTugas) return;
            modalTugas.classList.add('opacity-0');
            contentTugas.classList.add('scale-95');
            
            setTimeout(() => {
                modalTugas.classList.add('invisible');
            }, 300);
        }

        if (btnTambahTugas) btnTambahTugas.addEventListener('click', openModalTugas);
        if (btnCloseTugas) btnCloseTugas.addEventListener('click', closeModalTugas);


        // --- TUTUP SAAT KLIK DI LUAR KONTEN ---
        // (Logika ini juga diupdate untuk memanggil fungsi penutup)
        window.addEventListener('click', (event) => {
            if (event.target == modalHabit) {
                closeModalHabit();
            }
            if (event.target == modalTugas) {
                closeModalTugas();
            }
        });
    }


    // --- INISIALISASI ---

    // Definisikan tema
    const habitTheme = {
        active: 'bg-[#8EB548] text-[#783D19] shadow-md',
        inactive: 'bg-[#FDFDD9] text-[#783D19] shadow-sm hover:bg-white'
    };

    const tugasTheme = {
        active: 'bg-[#C4661F] text-[#FDFDD9] shadow-md',
        inactive: 'bg-[#FDFDD9] text-[#783D19] shadow-sm hover:bg-white'
    };

    // Setup sistem tab
    setupTabSystem('habit', habitTheme);
    setupTabSystem('tugas', tugasTheme);

    // Setup scroller
    setupScrollers('habit-scroller');
    setupScrollers('tugas-scroller');

    // (BARU) Setup modal
    setupModals();

    // Set watering can (Contoh: 25%)
    const waterLevel = document.querySelector('.watering-can-water');
    if (waterLevel) {
        // Set sedikit delay agar animasi terlihat saat load
        setTimeout(() => {
            waterLevel.style.height = '25%';
        }, 100);
    }
});