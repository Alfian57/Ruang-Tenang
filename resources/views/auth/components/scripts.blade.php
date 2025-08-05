<script>
    // Toggle password visibility
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordInput = document.getElementById('password');
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
    });

    // Clear placeholder password on focus
    document.getElementById('password').addEventListener('focus', function () {
        if (this.value === '••••••••••••') {
            this.value = '';
        }
    });
</script>

@stack('scripts')