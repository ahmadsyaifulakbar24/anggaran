$('form').submit(function(e) {
    e.preventDefault()
    $('.is-invalid').removeClass('is-invalid')
    let formData = new FormData()
    formData.append('name', $('#name').val())
    formData.append('username', $('#username').val())
    formData.append('password', $('#password').val())
    formData.append('password_confirmation', $('#cpassword').val())
    $.ajax({
        url: `${root}/api/user/add_asdep`,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(result) {
            // console.log(result.data)
            customAlert('success', 'Akun berhasil dibuat')
            setTimeout(function() {
                location.href = `${root}/akun-asdep`
            }, 1000)
        },
        error: function(xhr) {
        	// console.log(xhr)
        	let err = xhr.responseJSON.errors
            if (err.name) {
                $('#name').addClass('is-invalid')
                $('#name').siblings('.invalid-feedback').html('Masukkan nama.')
            }
            if (err.username) {
                if (err.username == "The username has already been taken.") {
	                $('#username').addClass('is-invalid')
	                $('#username').siblings('.invalid-feedback').html('Username telah digunakan.')
	            } else {
	                $('#username').addClass('is-invalid')
	                $('#username').siblings('.invalid-feedback').html('Masukkan username.')
	            }
            }
            if (err.password) {
                if (err.password == "The password confirmation does not match.") {
                    $('#cpassword').addClass('is-invalid')
                    $('#cpassword').siblings('.invalid-feedback').html('Password tidak sama.')
                } else {
                    $('#password').addClass('is-invalid')
                    $('#password').siblings('.invalid-feedback').html('Masukkan password.')
                }
            }
            if (err.password_confirmation) {
                $('#cpassword').addClass('is-invalid')
                $('#cpassword').siblings('.invalid-feedback').html('Masukkan konfirmasi password.')
            }
        }
    })
})
