// Function untuk scroll ke bawah
function scrollToBottom() {
    const chatMessages = document.getElementById('chat-messages');
    if (chatMessages) {
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
}

// Variable untuk mencegah multiple calls
let isAiResponseTriggered = false;

// Listen untuk event Livewire
document.addEventListener('livewire:init', () => {
    Livewire.on('scrollToBottom', () => {
        // Delay sedikit untuk memastikan DOM sudah ter-update
        setTimeout(() => {
            scrollToBottom();
        }, 100);
    });

    // Handle trigger AI response event
    Livewire.on('trigger-ai-response', () => {
        if (isAiResponseTriggered) {
            return; // Prevent multiple calls
        }
        
        isAiResponseTriggered = true;
        
        setTimeout(() => {
            // Find the component and call generateAiResponse
            const element = document.querySelector('[wire\\:id]');
            if (element) {
                const wireId = element.getAttribute('wire:id');
                const component = Livewire.find(wireId);
                
                if (component) {
                    component.call('generateAiResponse').then(() => {
                        isAiResponseTriggered = false; // Reset flag after completion
                    }).catch(() => {
                        isAiResponseTriggered = false; // Reset flag on error
                    });
                }
            }
        }, 1000); // 1 second delay to show loading
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

// Reset flag when page unloads
window.addEventListener('beforeunload', function() {
    isAiResponseTriggered = false;
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