document.addEventListener('DOMContentLoaded', function() {
    var form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;

        if (validateLogin(email, password)) {
            swal("Success" , "Login Berhasil" , "success");
        } else {
            swal("Error" , "Login Gagal, Email atau Password Salah" , "error");
        }
    });
});

function validateLogin(email, password) {
    return (email === 'sabil@gmail.com' && password === '1234');
}
