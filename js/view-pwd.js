document.querySelectorAll('#togglePassword').forEach(button => {
    button.addEventListener('click', function (e) {
        const passwordField = this.previousElementSibling;
        const icon = this.querySelector('i');

        // Cambia il tipo di input da password a testo e viceversa
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        } else {
            passwordField.type = 'password';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        }
    });
});
