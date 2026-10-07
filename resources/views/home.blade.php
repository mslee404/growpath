

<x-layout>
    <x-slot:title>Home</x-slot:title>
    
    <x-slot:assets>
        @vite(['resources/css/app.css', 'resources/css/home-style.css', 'resources/js/app.js', 'resources/js/home.js']) 
    </x-slot:assets>

    <x-navbar activePage="home" />
        
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 p-4 md:p-8 max-w-7xl mx-auto">

        <!-- Profil (bagian kiri) -->
        <div class="lg:col-span-1 grid grid-cols-2 gap-4 lg:flex lg:flex-col lg:gap-6">
            
            <!-- Card Profile -->
            <div class="bg-[#FDFDD9] rounded-2xl shadow-lg p-4 items-center">
                <h2 class="font-bold text-2xl text-[#783D19] leading-tight mb-3">
                    Halo, {{ $user->name }}!
                </h2>
                
                <div class="flex items-center space-x-3 mb-4 relative">
                    <div class="relative w-16 h-16">
                        <!-- Avatar -->
                        <img src="{{ $user->avatar_url }}" alt="Avatar {{ $user->name }}" class="w-full h-full rounded-md object-cover border-2 border-gray-300">
                        
                        <!-- Frame -->
                        @if($user->frame_url)
                            <img src="{{ $user->frame_url }}" alt="Frame" class="absolute -top-1 -left-1 w-[4.5rem] h-[4.5rem] pointer-events-none z-10" style="max-width: none;">
                        @endif
                    </div>

                    <div>
                        <p class="text-lg font-medium text-[#783D19] text-left">Level {{ $user->level }}</p>
                        <p class="text-xs font-bold text-[#5E7153] text-left uppercase tracking-wider">{{ $user->xp_display }}</p>
                    </div>
                </div>

                <!-- XP bar -->
                <div class="watering-can">
                    <div id="xp-bar" class="watering-can-water" style="height: 0%;" data-xp="{{ $user->xp_percentage }}"></div>
                </div>
            </div>

            <!-- Motivation text -->
            <div class="bg-[#C4661F] rounded-2xl shadow-lg p-4 flex h-full items-center justify-center">
                <p id="motivation-text" class="text-lg font-bold text-[#FDFDD9] leading-snug text-center transition-opacity duration-500">
                    Jangan lupa sirami aku dengan menyelesaikan kebiasaanmu ya~
                </p>
            </div>

        </div>

        <!-- Pertumbuhan tanaman -->
        <div class="lg:col-span-2 flex items-center justify-center min-h-[500px] relative">
            <div class="w-full h-full bg-[#FDFDD9]/80 rounded-2xl border-8 border-[#A85319] shadow-inner flex flex-col justify-end items-center overflow-hidden relative p-4"
                 style="{{ $user->background_url ? 'background-image: url('.$user->background_url.'); background-size: cover; background-position: center;' : '' }}">

                @php $plantLevel = $user->equippedOf('tanaman')?->level ?? 0; @endphp

                {{-- data-siram (dari flash session) memicu animasi siram di home.js --}}
                <div id="plant-stage" class="flex-1 w-full flex items-center justify-center relative"
                     data-gembor="{{ asset('images/gembor.svg') }}"
                     @if (session('siram')) data-siram="{{ json_encode(session('siram')) }}" @endif>

                    @if($user->plant_url)
                        <img id="plant-image" src="{{ $user->plant_url }}" alt="Tanaman stage {{ $plantLevel }}"
                             class="w-full h-full object-cover drop-shadow-lg rounded-b-2xl">
                    @else
                        <img id="plant-image" src="https://placehold.co/117x115/C4661F/A85319?text=Biji" alt="Tanaman"
                             class="w-24 h-24 rounded-2xl">
                    @endif

                    @if($plantLevel >= 10)
                        <button id="btn-harvest" class="absolute bottom-4 left-1/2 transform -translate-x-1/2 bg-[#FFD700] hover:bg-[#FFC107] text-[#783D19] font-bold py-3 px-8 rounded-full shadow-lg border-2 border-[#783D19] transition hover:scale-105 animate-bounce z-20 cursor-pointer">
                            🌾 Panen (500 G)
                        </button>
                    @endif
                </div>
            </div>
        </div>

        <!-- List Habit dan Tugas -->
        <div class="lg:col-span-2 space-y-8">
            @foreach ([
                ['habit', 'Habit', $habitPanels, 'bg-[#78A44C]', 'text-[#783D19]'],
                ['tugas', 'Tugas', $taskPanels, 'bg-[#C4661F]', 'text-[#FDFDD9]'],
            ] as [$type, $boxTitle, $panels, $activeBg, $textColor])
                <x-data-box
                    :title="$boxTitle"
                    :tabGroup="$type"
                    :scrollerId="$type . '-scroller'"
                    :addButtonId="'btn-tambah-' . $type"
                    :type="$type"
                >
                    <x-slot:tabs>
                        @foreach ($panels as $panelId => [$label])
                            <button data-tab-button="{{ $panelId }}" class="tab-button snap-start flex-shrink-0 {{ $loop->first ? $activeBg . ' text-[#FDFDD9] shadow-md' : 'bg-[#FDFDD9] text-[#783D19] shadow-sm hover:bg-white' }} py-1 px-4 rounded-t-lg text-base font-semibold whitespace-nowrap">
                                {{ $label }}
                            </button>
                        @endforeach
                    </x-slot:tabs>

                    @foreach ($panels as $panelId => [$label, $items, $emptyMessage])
                        <div id="{{ $panelId }}" class="tab-panel {{ $loop->first ? '' : 'hidden' }}">
                            @if ($items->isNotEmpty())
                                <div class="space-y-2 h-[200px] overflow-y-auto vertical-scroller">
                                    @foreach ($items as $item)
                                        <x-data-list
                                            :type="$type"
                                            :title="$item['title']"
                                            :xp="$item['xp']"
                                            :category="$item['category'] ?? null"
                                            :date="$item['date'] ?? null"
                                            :time="$item['time'] ?? null"
                                            :id="$item['id']"
                                            :raw_detail="$item['raw_detail']"
                                            :sub_type="$item['habit_type'] ?? null"
                                        />
                                    @endforeach
                                </div>
                                <p class="text-center text-base {{ $textColor }} font-semibold mt-3">
                                    {{ $items->count() }} belum diselesaikan
                                </p>
                            @else
                                <p class="text-center {{ $textColor }} py-8 text-lg">{{ $emptyMessage }}</p>
                            @endif
                        </div>
                    @endforeach
                </x-data-box>
            @endforeach
        </div>

    </div>

    <x-slot:popups>
        @include('popup.home-tambah-habit')
        @include('popup.home-tambah-tugas')
        @include('popup.home-edit-habit')
        @include('popup.home-edit-tugas')
        @include('popup.home-delete-habit')
        @include('popup.home-delete-tugas')
        @include('popup.home-harvest')
    </x-slot:popups>



{{-- SCRIPT --}}
<script>
// Variables to store current IDs for deletion
let currentHabitId = null;
let currentTaskId = null;

/**
 * FUNGSI BARU: Mengatur atribut 'required' secara dinamis
 * agar tidak terjadi error validasi pada input yang tersembunyi.
 */
function updateEditRequiredFields(activeType) {
    const sections = {
        daily: document.getElementById("edit-footer-daily"),
        weekly: document.getElementById("edit-footer-weekly"),
        monthly: document.getElementById("edit-footer-monthly"),
        custom: document.getElementById("edit-footer-custom"),
    };

    // 1. Loop semua section footer
    Object.keys(sections).forEach(key => {
        if (sections[key]) {
            const inputs = sections[key].querySelectorAll('input, select');
            inputs.forEach(input => {
                // Aktifkan required HANYA jika section tersebut sedang aktif/tampak
                input.required = (key === activeType);
            });
        }
    });

    // 2. Logika khusus untuk sub-mode Monthly (Tanggal vs Minggu Ke-)
    if (activeType === 'monthly') {
        const modeRadio = document.querySelector("#form-edit-habit input[name='monthly_mode']:checked");
        const isTanggal = modeRadio ? modeRadio.value === 'tanggal' : true;
        
        document.querySelectorAll('#edit-monthly-tanggal input').forEach(i => i.required = isTanggal);
        document.querySelectorAll('#edit-monthly-minggu input, #edit-monthly-minggu select').forEach(i => i.required = !isTanggal);
    }
}

function openEditHabit(btn) {
    const id = btn.getAttribute('data-id');
    const type = btn.getAttribute('data-type'); // daily, weekly, etc
    const detail = JSON.parse(btn.getAttribute('data-detail'));
    
    currentHabitId = id;

    // Populate Form Basic
    document.getElementById('edit_nama_habit').value = detail.habit_name || detail.title; // 
    document.getElementById('edit_nama_habit').required = true;
    document.getElementById('edit_detail_habit').value = detail.habit_description || '';
    
    // Set Action
    document.getElementById('form-edit-habit').action = `/habit/${id}`;

    // Select Radio Frequency
    const radios = document.querySelectorAll('input[name="edit_frekuensi"]');
    radios.forEach(r => r.disabled = true); // Disable all

    const radio = document.querySelector(`input[name="edit_frekuensi"][value="${type}"]`);
    if(radio) {
        radio.checked = true;
    }
    
    // Manually show the correct footer
    const sections = {
        daily: document.getElementById("edit-footer-daily"),
        weekly: document.getElementById("edit-footer-weekly"),
        monthly: document.getElementById("edit-footer-monthly"),
        custom: document.getElementById("edit-footer-custom"),
    };
    Object.values(sections).forEach(s => s.classList.add("hidden"));
    if(sections[type]) sections[type].classList.remove("hidden");

    updateEditRequiredFields(type);

    // Populate Specific Fields
    // Note: Field names in DB (raw_detail) might match inputs
    if(type === 'daily') {
        if(detail.hour) document.getElementById('edit_jam_daily').value = detail.hour.substring(0, 5);
    }
    if(type === 'weekly') {
        if(detail.hour) document.getElementById('edit_jam_weekly').value = detail.hour.substring(0, 5);
        if(detail.day) document.getElementById('edit_hari_weekly').value = capitalizeFirstLetter(detail.day);
    }
    if(type === 'monthly') {
        const mode = detail.schedule_type === 'week' ? 'minggu' : 'tanggal';
        const radioMode = document.querySelector(`#form-edit-habit input[name="monthly_mode"][value="${mode}"]`);
        if(radioMode) {
            radioMode.checked = true;
            radioMode.dispatchEvent(new Event('change'));
        }

        if(mode === 'tanggal') {
            document.getElementById('edit_tanggal_monthly').value = detail.date;
            document.getElementById('edit_jam_monthly_tanggal').value = detail.hour.substring(0, 5);
        } else {
            document.getElementById('edit_hari_monthly').value = capitalizeFirstLetter(detail.day);
            document.getElementById('edit_minggu_ke').value = detail.week;
            document.getElementById('edit_jam_monthly_minggu').value = detail.hour.substring(0, 5);
        }
    }
    if(type === 'custom') {
        document.getElementById('edit_interval_custom').value = detail.day_count;
        document.getElementById('edit_jam_custom').value = detail.hour.substring(0, 5);
    }

    // Open Modal
    const modal = document.getElementById("modal-edit-habit");
    const content = document.getElementById("modal-content-edit-habit");
    modal.classList.remove("opacity-0", "invisible");
    content.classList.remove("scale-95");
    modal.classList.add("opacity-100");
    content.classList.add("scale-100");
}

function openEditTugas(btn) {
    const id = btn.getAttribute('data-id');
    const detail = JSON.parse(btn.getAttribute('data-detail'));
    currentTaskId = id;

    // Populate
    document.getElementById('edit_nama_tugas').value = detail.task_name;
    document.getElementById('edit_detail_tugas').value = detail.task_description || '';

    // Date/Time
    // detail.due_date might be object or string depending on cast. 
    // Usually standard JSON from model is "YYYY-MM-DD..."
    // Let's assume standard ISO or similar. If cast 'date' in model, it's string "YYYY-MM-DD"
    if(detail.due_date) {
        document.getElementById('edit_tanggal_tugas').value = detail.due_date.substring(0, 10);
    }
    if(detail.due_time) {
        // "HH:MM:SS" -> "HH:MM"
        document.getElementById('edit_jam_tugas').value = detail.due_time.substring(0, 5);
    }

    // Set Action
    document.getElementById('form-edit-tugas').action = `/task/${id}`;

    // Open Modal
    const modal = document.getElementById("modal-edit-tugas");
    const content = document.getElementById("modal-content-edit-tugas");
    modal.classList.remove("opacity-0", "invisible");
    content.classList.remove("scale-95");
    modal.classList.add("opacity-100");
    content.classList.add("scale-100");
}

function openDeleteHabit() {
    // Set Action
    document.getElementById('form-delete-habit').action = `/habit/${currentHabitId}`;
    
    // Open Modal
    const modal = document.getElementById("modal-delete-habit");
    const content = document.getElementById("modal-content-delete-habit");
    modal.classList.remove("opacity-0", "invisible");
    content.classList.remove("scale-95");
    modal.classList.add("opacity-100");
    content.classList.add("scale-100");
}

function openDeleteTugasConfirm() { // Renamed to match onclick in edit-tugas popup
     // Set Action
    document.getElementById('form-delete-tugas').action = `/task/${currentTaskId}`;

    const modal = document.getElementById("modal-delete-tugas");
    const content = document.getElementById("modal-content-delete-tugas");
    modal.classList.remove("opacity-0", "invisible");
    content.classList.remove("scale-95");
    modal.classList.add("opacity-100");
    content.classList.add("scale-100");
}

function closeDeleteHabit() {
    const modal = document.getElementById("modal-delete-habit");
    const content = document.getElementById("modal-content-delete-habit");
    modal.classList.add("opacity-0", "invisible");
    content.classList.add("scale-95");
}

function closeDeleteTugas() {
    const modal = document.getElementById("modal-delete-tugas");
    const content = document.getElementById("modal-content-delete-tugas");
    modal.classList.add("opacity-0", "invisible");
    content.classList.add("scale-95");
}


function closeEditHabit() {
    const modal = document.getElementById("modal-edit-habit");
    const content = document.getElementById("modal-content-edit-habit");
    modal.classList.add("opacity-0", "invisible");
    content.classList.add("scale-95");
}

function closeEditTugas() {
    const modal = document.getElementById("modal-edit-tugas");
    const content = document.getElementById("modal-content-edit-tugas");
    modal.classList.add("opacity-0", "invisible");
    content.classList.add("scale-95");
}

function capitalizeFirstLetter(string) {
    if(!string) return '';
    return string.charAt(0).toUpperCase() + string.slice(1);
}

document.addEventListener('DOMContentLoaded', function () {

    // CLOSE BUTTON EDIT HABIT
    document.getElementById("close-edit-habit")
        .addEventListener("click", closeEditHabit);

    // CLOSE BUTTON EDIT TUGAS
    const closeEditTugasBtn = document.querySelector("#modal-edit-tugas button[onclick='closeEditTugas()']"); // Or select by class/position since ID wasn't unique in snippet
    // Actually, in snippet it was button with onclick, let's just make sure we define the function globally or add listener
    // Better to define the function since the HTML uses onclick="closeEditTugas()"
    
    // CLOSE BUTTON DELETE HABIT
    const closeDeleteBtn = document.getElementById("close-delete-habit");
    if(closeDeleteBtn) closeDeleteBtn.addEventListener("click", closeDeleteHabit);
    
    const cancelDeleteBtn = document.getElementById("cancel-delete");
    if(cancelDeleteBtn) cancelDeleteBtn.addEventListener("click", closeDeleteHabit);



    // SWITCH FOOTER EDIT HABIT
    document.querySelectorAll("input[name='edit_frekuensi']").forEach(radio => {
        radio.addEventListener("change", e => {
            const val = e.target.value;
            const sections = {
                daily: document.getElementById("edit-footer-daily"),
                weekly: document.getElementById("edit-footer-weekly"),
                monthly: document.getElementById("edit-footer-monthly"),
                custom: document.getElementById("edit-footer-custom"),
            };
            Object.values(sections).forEach(s => s.classList.add("hidden"));
            if(sections[val]) sections[val].classList.remove("hidden");
            
            // Update required setiap kali frekuensi berubah
            updateEditRequiredFields(val);
        });
    });

    // Monthly switch
    document.querySelectorAll("#form-edit-habit input[name='monthly_mode']").forEach(radio => {
        radio.addEventListener("change", e => {
            const monthlyTanggal = document.getElementById("edit-monthly-tanggal");
            const monthlyMinggu = document.getElementById("edit-monthly-minggu");

            if (e.target.value === "tanggal") {
                monthlyTanggal.classList.remove("hidden");
                monthlyMinggu.classList.add("hidden");
            } else {
                monthlyTanggal.classList.add("hidden");
                monthlyMinggu.classList.remove("hidden");
            }
            // Update required setiap kali sub-mode bulanan berubah
            updateEditRequiredFields('monthly');
        });
    });

});
</script>

</x-layout>