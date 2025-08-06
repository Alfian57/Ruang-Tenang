// Function untuk scroll ke bawah
function scrollToBottom() {
    const chatMessages = document.getElementById('chat-messages');
    if (chatMessages) {
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
}

// Listen untuk event Livewire
document.addEventListener('livewire:init', () => {
    Livewire.on('scrollToBottom', () => {
        // Delay sedikit untuk memastikan DOM sudah ter-update
        setTimeout(() => {
            scrollToBottom();
        }, 100);
    });
});

// Auto scroll ketika halaman pertama kali dimuat (jika ada pesan)
document.addEventListener('DOMContentLoaded', function() {
    scrollToBottom();
});

// Auto scroll setelah Livewire update
document.addEventListener('livewire:updated', function() {
    scrollToBottom();
});

// Debug: Log pesan yang dikirim
document.addEventListener('livewire:init', () => {
    const messageInput = document.getElementById('message-input');
    if (messageInput) {
        messageInput.addEventListener('input', function() {
            console.log('Current message value:', this.value);
        });
    }
});