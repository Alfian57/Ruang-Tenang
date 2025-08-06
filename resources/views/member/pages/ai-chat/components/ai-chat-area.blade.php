@push('scripts')
    <script src="{{ asset('assets/member-dashboard/js/ai-chat-area.js') }}"></script>
@endpush

<div class="flex-1 flex flex-col min-w-0 max-h-[86vh]">
    <div id="chat-messages" class="flex-1 p-2 md:p-4 overflow-y-auto scroll-hidden chat-scroll space-y-4"
        style="max-height: 85vh; scroll-behavior: smooth;">

        @if($messages != null)
            @foreach ($messages as $message)
                @if ($message->isAI())
                    @include('member.pages.ai-chat.components.ai-chat', [
                        'text' => $message->content,
                        'time' => $message->created_at->format('F j \a\t h:i A'),
                    ])
                @else
                    @include('member.pages.ai-chat.components.user-chat', [
                        'text' => $message->content,
                        'time' => $message->created_at->format('F j \a\t h:i A'),
                        'avatar' => Auth::user()->profile_picture ?? 'assets/member-dashboard/images/dummy-profile.png',
                    ])
                @endif
            @endforeach
        @else
            <div class="flex items-center justify-center h-full">
                <div class="px-8 py-10 text-center w-full max-w-lg mx-auto">
                    <p class="text-primary-500 text-lg md:text-xl font-semibold mb-2">
                        Hai, {{ Auth::user()->name ?? 'Teman' }}! 👋
                    </p>
                    <p class="text-gray-600 text-base md:text-lg mb-1">
                        Belum ada sesi chat yang aktif.
                    </p>
                    <p class="text-gray-400 text-sm">
                        Mulai percakapan baru untuk mendapatkan saran atau sekadar berbagi cerita dengan AI.
                    </p>
                </div>
            </div>
        @endif
    </div>

    <!-- Message Input -->
    <div class="p-2 md:p-4 border-t border-gray-200">
        <form class="flex items-center space-x-2" wire:submit.prevent="sendMessage">
            <div class="flex-1">
                <input type="text" wire:model="message" placeholder="Kirim Pesan ke AI Chat..."
                    class="w-full p-2 md:p-3 text-sm md:text-base border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-400 focus:border-transparent {{ $errors->has('message') ? 'border-red-500' : 'border-gray-300' }}"
                    id="message-input" 
                    wire:keydown.enter="sendMessage">
                @error('message')
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>
            <button id="send-button" type="submit"
                class="bg-primary-400 text-white p-2 md:p-3 rounded-lg hover:bg-primary-dark transition-colors">
                <img src="{{ asset('assets/member-dashboard/images/send.png') }}" alt="Kirim" class="w-4 h-4 md:w-5 md:h-5">
            </button>
        </form>
    </div>
</div>