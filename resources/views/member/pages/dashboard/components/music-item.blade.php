<div class="song-item">
    <div
        class="flex items-center p-3 md:p-4 hover:bg-gray-400 rounded-lg hover:bg-opacity-30 transition-all duration-200 last:border-b-0 group">
        {{-- Thumbnail --}}
        <div class="w-12 h-12 md:w-14 md:h-14 bg-blue-300 bg-opacity-20 rounded-lg overflow-hidden mr-3">
            <img src="{{ asset('storage/' . $song->thumbnail) }}" alt="{{ $song->title }}"
                class="w-full h-full object-cover">
        </div>

        {{-- Song Info and Controls Container --}}
        <div class="flex-1 flex flex-col items-start justify-between">
            <div class="flex items-center justify-between w-full">
                {{-- Song Info --}}
                <div class="flex-1 min-w-0 mr-4">
                    <p class="font-medium text-sm md:text-base truncate text-blue-dark group-hover:text-white">
                        {{ $song->title }}
                    </p>
                </div>

                {{-- Time Display --}}
                <div class="text-xs text-blue-dark opacity-75 song-time min-w-fit group-hover:text-white">
                    <span class="current-time">0:00</span> - <span class="total-time">0:00</span>
                </div>
            </div>

            {{-- Audio Controls --}}
            <div class="flex w-full items-center space-x-2 audio-controls">
                <div class="shrink-0 flex items-center space-x-2">
                    {{-- Play/Pause Button --}}
                    <button
                        class="song-play-btn play-pause-btn p-2 flex justify-center items-center rounded-full aspect-square hover:bg-white hover:bg-opacity-50 transition-all duration-200"
                        onclick="handlePlayPauseClick('{{ $song->file_path }}', '{{ $song->title }}', '{{ $category->name }}', this.closest('.song-item'))"
                        data-song-path="{{ $song->file_path }}" title="Play/Pause">
                        <img src="{{ asset('assets/member-dashboard/images/play.png') }}" alt="play"
                            class="play-icon w-4 h-4 cursor-pointer">
                        <img src="{{ asset('assets/member-dashboard/images/pause.png') }}" alt="pause"
                            class="pause-icon w-4 h-4 hidden cursor-pointer">
                    </button>

                    {{-- Repeat Button --}}
                    <button
                        class="repeat-btn p-2 rounded-full hover:bg-white hover:bg-opacity-50 transition-all duration-200"
                        onclick="toggleRepeat(this)" title="Repeat">
                        <img src="{{ asset('assets/member-dashboard/images/repeat.png') }}" alt="repeat"
                            class="repeat-icon w-4 h-4 cursor-pointer">
                    </button>
                </div>

                {{-- Progress Bar Container - Inline --}}
                <div class="song-audio-player flex-1 ml-4">
                    <div class="progress-bar w-full">
                        <div class="progress-fill" style="width: 100%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>