@push('scripts')
    <script>
        function toggleMoodCheckOptions() {
            const moodCheckOptions = document.getElementById('mood-check-options');

            if (moodCheckOptions.style.display === 'none' || moodCheckOptions.style.display === '') {
                // Show the options
                moodCheckOptions.style.display = 'flex';
            } else {
                // Hide the options
                moodCheckOptions.style.display = 'none';
            }
        }

        function closeMoodCheckOptions() {
            const moodCheckOptions = document.getElementById('mood-check-options');
            moodCheckOptions.style.display = 'none';
        }

        // Listen for the closeMoodOptions event from Livewire
        document.addEventListener('livewire:init', () => {
            Livewire.on('closeMoodOptions', () => {
                closeMoodCheckOptions();
            });
        });
    </script>
@endpush

<div
    class="bg-linear-to-b from-blue-400 to-blue-500 text-white flex justify-center items-center relative p-10 rounded-3xl">
    <h3 class="text-3xl text-center font-semibold mb-3">Gimana Kondisimu Hari ini?</h3>
    {{-- trigger --}}
    <div class="absolute bottom-3 right-3 cursor-pointer transition duration-200 transform hover:scale-110"
        onclick="toggleMoodCheckOptions()">
        <img src="{{ asset('assets/member-dashboard/images/smile-plus.png') }}" alt="Smile Icon"
            class="w-14 h-14 bg-linear-to-b from-blue-400 to-blue-600 rounded-xl p-2.5">
    </div>

    {{-- option --}}
    <div id="mood-check-options" style="display: none;"
        class="bg-linear-to-r from-blue-400 to-blue-500 text-white flex justify-center items-center space-x-3 p-3 rounded-2xl absolute -bottom-12 -right-92 opacity-80">

        @php
            $moodCheckOptions = [
                ['img' => '1-smile.png', 'value' => App\Enums\UserMoodEnum::HAPPY->value, 'alt' => 'Bahagia', 'label' => 'Bahagia'],
                ['img' => '2-netral.png', 'value' => App\Enums\UserMoodEnum::NEUTRAL->value, 'alt' => 'Netral', 'label' => 'Netral'],
                ['img' => '3-angry.png', 'value' => App\Enums\UserMoodEnum::ANGRY->value, 'alt' => 'Marah', 'label' => 'Marah'],
                ['img' => '4-disappointed.png', 'value' => App\Enums\UserMoodEnum::DISAPPOINTED->value, 'alt' => 'Kecewa', 'label' => 'Kecewa'],
                ['img' => '5-sad.png', 'value' => App\Enums\UserMoodEnum::SAD->value, 'alt' => 'Sedih', 'label' => 'Sedih'],
                ['img' => '6-cry.png', 'value' => App\Enums\UserMoodEnum::CRYING->value, 'alt' => 'Menangis', 'label' => 'Menangis'],
            ];
        @endphp

        @foreach ($moodCheckOptions as $moodOption)
            <div class="flex flex-col items-center space-y-2 transition duration-200 transform hover:scale-110 rounded-xl p-2 cursor-pointer"
                wire:click="createMood('{{ $moodOption['value'] }}')">
                <img src="{{ asset('assets/member-dashboard/images/' . $moodOption['img']) }}"
                    alt="{{ $moodOption['alt'] }}" class="w-6 h-6 transition duration-200 group-hover:scale-125">
                <span class="text-[10px]">{{ $moodOption['label'] }}</span>
            </div>
        @endforeach

    </div>
</div>