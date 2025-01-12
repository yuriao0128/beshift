document.getElementById('registerButton').addEventListener('click', function() {
    window.location.href = '{{ route("user.register") }}';
});

document.getElementById('loginButton').addEventListener('click', function() {
    window.location.href = '{{ route("users.login") }}';
});
