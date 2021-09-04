function validateMe() {
    if ($('#username').val() == ''
        || $('#password').val() == ''
        || $('#repass').val() == '') {
        $('#alert-info').html('<div class="alert alert-danger" role="alert">Isi Semua Terlebih Dahulu</div>')
        return false;
    } else if ($('#password').val() !=
        $('#repass').val()) {
        $('#alert-info').html('<div class="alert alert-danger" role="alert">Password Tidak sama</div>')
        return false;
    }
}

$('#show-password').click(function () {
    if ($('#show-password').prop('checked')) {
        $('#password').attr('type', 'text');
        $('#repass').attr('type', 'text');
    } else {
        $('#password').attr('type', 'password');
        $('#repass').attr('type', 'password');
    }
})