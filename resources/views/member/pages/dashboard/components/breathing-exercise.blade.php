@push('scripts')
    <script src="{{ asset('assets/member-dashboard/js/breathing-exercise.js') }}"></script>
@endpush

<div class="bg-white p-4 rounded-3xl shadow-sm overflow-hidden relative">

    <img src="{{ asset('assets/member-dashboard/images/breathing-vector.png') }}" alt="vector"
        class="absolute top-0 left-0 w-34 h-34">

    <div class="flex justify-between items-center mb-3">
        <h1 class="text-lg md:text-xl font-bold text-gray-800 leading-tight">
            Atur Napasmu, Atur Tenangmu
        </h1>

        <div class="flex items-center justify-between bg-white/50 rounded-xl px-4 py-2">
            <img src="{{ asset('assets/member-dashboard/images/timer.png') }}" alt="timer" class="w-4 h-4 mr-1">
            <select id="timer" class="text-gray-600 font-medium focus:outline-none bg-transparent">
                <option value="1">1 Detik</option>
                <option value="3">3 Detik</option>
                <option value="5" selected>5 Detik</option>
                <option value="10">10 Detik</option>
            </select>
        </div>

    </div>

    <!-- Progress Bars -->
    <div class="space-y-4 mb-6">

        <!-- Tarik Nafas (Inhale) -->
        <div class="space-y-1">
            <label class="text-gray-700 font-medium text-xs">Tarik Nafas</label>

            <div class="relative breathing-progress-container">
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="progress-bar breathing-progress-bar bg-[#C4E3FC] h-2 rounded-full" style="width: 0%" id="inhale-progress">
                    </div>
                </div>
            </div>
        </div>

        <!-- Tahan Nafas (Hold Breath) -->
        <div class="space-y-1">
            <label class="text-gray-700 font-medium text-xs">Tahan Nafas</label>

            <div class="relative breathing-progress-container">
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="progress-bar breathing-progress-bar bg-[#0088FF] h-2 rounded-full" style="width: 0%" id="hold-progress"></div>
                </div>
            </div>
        </div>

        <!-- Buang Nafas (Exhale) -->
        <div class="space-y-1">
            <label class="text-gray-700 font-medium text-xs">Buang Nafas</label>

            <div class="relative breathing-progress-container">
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="progress-bar breathing-progress-bar bg-[#1C4567] h-2 rounded-full" style="width: 0%" id="exhale-progress"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Control Buttons -->
    <div class="flex justify-center space-x-2">
        <button id="start-btn" class="flex items-center space-x-1 bg-gray-100 px-4 py-2 rounded-md hover:bg-gray-200 text-xs transition-all duration-200">
            <img src="{{ asset('assets/member-dashboard/images/play.png') }}" alt="play" class="w-4 h-4">
            <span class="text-blue-dark font-medium">Mulai</span>
        </button>

        <button id="pause-btn" class="flex items-center space-x-1 bg-gray-100 px-4 py-2 rounded-md hover:bg-gray-200 text-xs transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed">
            <img src="{{ asset('assets/member-dashboard/images/pause.png') }}" alt="pause" class="w-4 h-4">
            <span class="text-blue-dark font-medium">Jeda</span>
        </button>

        <button id="repeat-btn" class="flex items-center space-x-1 bg-gray-100 px-4 py-2 rounded-md hover:bg-gray-200 text-xs transition-all duration-200">
            <img src="{{ asset('assets/member-dashboard/images/repeat.png') }}" alt="repeat" class="w-4 h-4">
            <span class="text-blue-dark font-medium">Ulangi</span>
        </button>
    </div>
</div>