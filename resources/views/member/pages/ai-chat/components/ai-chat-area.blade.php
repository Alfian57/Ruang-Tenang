@push('scripts')
    <script src="{{ asset('assets/member-dashboard/js/ai-chat-area.js') }}"></script>
@endpush

@push('styles')
<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .animate-fade-in {
        animation: fadeIn 0.3s ease-out;
    }
    
    .loading-dots {
        display: flex;
        align-items: center;
        gap: 4px;
    }
    
    .loading-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        animation: bounce 1.4s infinite ease-in-out both;
    }
    
    .loading-dot:nth-child(1) { animation-delay: -0.32s; }
    .loading-dot:nth-child(2) { animation-delay: -0.16s; }
    
    @keyframes bounce {
        0%, 80%, 100% {
            transform: scale(0);
        }
        40% {
            transform: scale(1);
        }
    }
</style>
@endpush

<div class="flex-1 flex flex-col min-w-0 max-h-[86vh]">
    <div id="chat-messages" class="flex-1 p-2 md:p-4 overflow-y-auto scroll-hidden chat-scroll space-y-4"
        style="max-height: 85vh; scroll-behavior: smooth;">

        @if($messages != null)
            @foreach ($messages as $message)
                @if ($message->isAI())
                    @include('member.pages.ai-chat.components.ai-chat', [
                        'messageId' => $message->id,
                        'text' => $message->content,
                        'time' => $message->created_at->format('F j \a\t h:i A'),
                        'isLiked' => $message->is_liked,
                        'isDisliked' => $message->is_disliked,
                    ])
                @else
                    @include('member.pages.ai-chat.components.user-chat', [
                        'text' => $message->content,
                        'time' => $message->created_at->format('F j \a\t h:i A'),
                        'avatar' => Auth::user()->profile_picture ?? 'assets/member-dashboard/images/dummy-profile.png',
                    ])
                @endif
            @endforeach
        @endif

        <!-- Loading Animation -->
        @if($isLoading)
            <div class="flex items-start space-x-3 animate-fade-in">
                <div class="w-8 h-8 md:w-10 md:h-10 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 md:w-5 md:h-5 text-primary-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="flex-1 bg-gray-50 rounded-lg p-3 md:p-4 max-w-3xl">
                    <div class="flex items-center space-x-3">
                        <div class="loading-dots">
                            <div class="loading-dot bg-primary-400"></div>
                            <div class="loading-dot bg-primary-400"></div>
                            <div class="loading-dot bg-primary-400"></div>
                        </div>
                        <span class="text-gray-500 text-sm">AI sedang mengetik...</span>
                    </div>
                </div>
            </div>
        @endif

        <!-- Empty State -->
        @if($messages == null && !$isLoading)
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
                    class="w-full p-2 md:p-3 text-sm md:text-base border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-400 focus:border-transparent {{ $errors->has('message') ? 'border-red-500' : 'border-gray-300' }} {{ $isLoading ? 'opacity-50 cursor-not-allowed' : '' }}"
                    id="message-input" 
                    wire:keydown.enter="sendMessage"
                    {{ $isLoading ? 'disabled' : '' }}>
                @error('message')
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>
            <button id="send-button" type="submit" {{ $isLoading ? 'disabled' : '' }}
                class="bg-primary-400 text-white p-2 md:p-3 rounded-lg hover:bg-primary-dark transition-colors {{ $isLoading ? 'opacity-50 cursor-not-allowed' : '' }}">
                @if($isLoading)
                    <svg class="w-4 h-4 md:w-5 md:h-5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                @else
                    <img src="{{ asset('assets/member-dashboard/images/send.png') }}" alt="Kirim" class="w-4 h-4 md:w-5 md:h-5">
                @endif
            </button>
        </form>
    </div>
</div>