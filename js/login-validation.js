document.getElementById('submit').addEventListener('click', function() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var alertInfo = document.getElementById('alert-info');

    if(username == '' || password == '') {
        alertInfo.innerHTML = '<div class="alert alert-danger" role="alert">Username dan Password Harus Diisi</div>';
    }
});