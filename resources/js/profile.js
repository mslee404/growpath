// resources/js/profile.js

document.addEventListener('DOMContentLoaded', () => {

    // --- SETUP MODAL LOGOUT ---
    const modalLogout = document.getElementById('modal-logout');
    const contentLogout = document.getElementById('modal-content-logout');
    const btnLogout = document.getElementById('btn-logout');
    const btnCloseLogout = document.getElementById('close-logout');
    const btnBatalLogout = document.getElementById('btn-batal-logout');

    // Fungsi BUKA Modal
    function openLogoutModal() {
        if (!modalLogout || !contentLogout) return;
        modalLogout.classList.remove('invisible', 'opacity-0');
        contentLogout.classList.remove('scale-95');
    }

    // Fungsi TUTUP Modal
    function closeLogoutModal() {
        if (!modalLogout || !contentLogout) return;
        modalLogout.classList.add('opacity-0');
        contentLogout.classList.add('scale-95');
        
        setTimeout(() => {
            modalLogout.classList.add('invisible');
        }, 300);
    }

    // Pasang Event Listener
    if (btnLogout) {
        btnLogout.addEventListener('click', openLogoutModal);
    }

    if (btnCloseLogout) {
        btnCloseLogout.addEventListener('click', closeLogoutModal);
    }
    
    if (btnBatalLogout) {
        btnBatalLogout.addEventListener('click', closeLogoutModal);
    }

    // Tutup kalau klik di luar kotak
    window.addEventListener('click', (event) => {
        if (event.target == modalLogout) {
            closeLogoutModal();
        }
    });
    

    // --- SETUP MODAL EDIT USERNAME (BARU) ---
    const modalEdit = document.getElementById('modal-edit-username');
    const contentEdit = document.getElementById('modal-content-edit-username');
    const btnEdit = document.getElementById('btn-edit-username'); // Tombol Pena
    const btnCloseEdit = document.getElementById('close-edit-username'); // Tombol X
    const btnBatalEdit = document.getElementById('btn-batal-edit-username'); // Tombol Ga jadi deh

    function openEditModal() {
        if (!modalEdit || !contentEdit) return;
        modalEdit.classList.remove('invisible', 'opacity-0');
        contentEdit.classList.remove('scale-95');
    }

    function closeEditModal() {
        if (!modalEdit || !contentEdit) return;
        modalEdit.classList.add('opacity-0');
        contentEdit.classList.add('scale-95');
        setTimeout(() => {
            modalEdit.classList.add('invisible');
        }, 300);
    }

    // Event Listeners
    if (btnEdit) btnEdit.addEventListener('click', openEditModal);
    if (btnCloseEdit) btnCloseEdit.addEventListener('click', closeEditModal);
    if (btnBatalEdit) btnBatalEdit.addEventListener('click', closeEditModal);

    // Tutup kalau klik di luar
    window.addEventListener('click', (event) => {
        // Cek apakah yang diklik adalah overlay modal edit
        if (event.target == modalEdit) {
            closeEditModal();
        }
    });

});