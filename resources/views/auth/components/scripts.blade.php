<script>
    // Toggle password visibility
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordInput = document.getElementById('password');
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
    });

    // Handle form submission
    document.getElementById('loginForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        // Simple validation
        if (email && password) {
            alert('Login berhasil!');
        } else {
            alert('Mohon lengkapi semua field!');
        }
    });

    // Clear placeholder password on focus
    document.getElementById('password').addEventListener('focus', function () {
        if (this.value === '••••••••••••') {
            this.value = '';
        }
    });
</script>

@stack('scripts')