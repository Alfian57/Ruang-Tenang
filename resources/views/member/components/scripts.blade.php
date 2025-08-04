<script>
    // Sidebar toggle functionality
    const sidebar = document.getElementById('sidebar');
    const toggleButton = document.getElementById('toggle-sidebar');
    const logoText = document.getElementById('logo-text');
    const logoImg = document.getElementById('logo-img');
    const navTexts = document.querySelectorAll('.nav-text');

    const toogleSidebar = () => {
        if (sidebar.classList.contains('sidebar-expanded')) {
            sidebar.classList.remove('sidebar-expanded');
            sidebar.classList.add('sidebar-collapsed');
            logoText.style.display = 'none';
            navTexts.forEach(text => text.style.display = 'none');
        } else {
            sidebar.classList.remove('sidebar-collapsed');
            sidebar.classList.add('sidebar-expanded');
            logoText.style.display = 'block';
            navTexts.forEach(text => text.style.display = 'block');
        }
    };

    toggleButton.addEventListener('click', toogleSidebar);
    logoImg.addEventListener('click', toogleSidebar);

    // Message sending functionality
    const messageInput = document.getElementById('message-input');
    const sendButton = document.getElementById('send-button');
    const chatMessages = document.getElementById('chat-messages');

    function sendMessage() {
        const message = messageInput.value.trim();
        if (message) {
            // Add user message
            const userMessageDiv = document.createElement('div');
            userMessageDiv.className = 'flex justify-end';
            userMessageDiv.innerHTML = `
                    <div class="message-bubble bg-primary-400 text-white rounded-lg p-3">
                        <p class="text-sm">${message}</p>
                        <div class="text-xs opacity-75 mt-2 text-right">${new Date().toLocaleString()}</div>
                    </div>
                `;
            chatMessages.appendChild(userMessageDiv);

            // Clear input
            messageInput.value = '';

            // Scroll to bottom
            chatMessages.scrollTop = chatMessages.scrollHeight;

            // Simulate AI response after a delay
            setTimeout(() => {
                const aiMessageDiv = document.createElement('div');
                aiMessageDiv.className = 'flex items-start space-x-3';
                aiMessageDiv.innerHTML = `
                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                        </div>
                        <div class="message-bubble bg-gray-100 rounded-lg p-3">
                            <p class="text-sm text-gray-800">Terima kasih atas pesan Anda. Saya di sini untuk membantu Anda dengan pertanyaan atau kekhawatiran apa pun yang mungkin Anda miliki.</p>
                            <div class="flex items-center justify-between mt-2 text-xs text-gray-500">
                                <span>${new Date().toLocaleString()}</span>
                                <div class="flex space-x-2">
                                    <button class="hover:text-gray-700">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                        </svg>
                                    </button>
                                    <button class="hover:text-gray-700">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;
                chatMessages.appendChild(aiMessageDiv);
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }, 1000);
        }
    }

    sendButton.addEventListener('click', sendMessage);
    messageInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            sendMessage();
        }
    });

    // Auto-scroll to bottom on page load
    chatMessages.scrollTop = chatMessages.scrollHeight;
</script>

@stack('scripts')