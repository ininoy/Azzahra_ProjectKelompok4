<script>
    document.querySelectorAll('.toggle-password').forEach(function(icon) {
        icon.addEventListener('click', function() {
            let targetInput = document.querySelector(this.getAttribute('data-target'));

            if (targetInput.type === 'password') {
                targetInput.type = 'text';
                // Karena 'this' sekarang adalah ikon itu sendiri, kita langsung ubah class-nya
                this.classList.remove('bi-eye');
                this.classList.add('bi-eye-slash');
            } else {
                targetInput.type = 'password';
                this.classList.remove('bi-eye-slash');
                this.classList.add('bi-eye');
            }
        });
    });
</script>
