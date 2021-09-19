$('form').submit(function(e) {
    e.preventDefault()
    $('.is-invalid').removeClass('is-invalid')
    $('#submit').attr('disabled', true)
    let formData = new FormData()
    formData.append('name', $('#name').val())
    formData.append('old_password', $('#password').val())
    formData.append('password', $('#npassword').val())
    formData.append('password_confirmation', $('#cpassword').val())
    $.ajax({
        url: `${root}/api/user/reset_password`,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(result) {
            // console.log(result.data)
            customAlert('success', 'Password berhasil diubah')
            $('input').val('')
        },
        error: function(xhr) {
            // console.log(xhr)
            let err = xhr.responseJSON.errors
            if (err.old_password) {
                if (err.old_password == "wrong old password") {
	                $('#password').addClass('is-invalid')
	                $('#password').siblings('.invalid-feedback').html('Password lama salah.')
	            } else {
                    $('#password').addClass('is-invalid')
                    $('#password').siblings('.invalid-feedback').html('Masukkan password lama.')
                }
            }
            if (err.password) {
                if (err.password == "The password confirmation does not match.") {
                    $('#cpassword').addClass('is-invalid')
                    $('#cpassword').siblings('.invalid-feedback').html('Password tidak sama.')
                } else {
                    $('#npassword').addClass('is-invalid')
                    $('#npassword').siblings('.invalid-feedback').html('Masukkan password baru.')
                }
            }
            if (err.password_confirmation) {
                $('#cpassword').addClass('is-invalid')
                $('#cpassword').siblings('.invalid-feedback').html('Masukkan konfirmasi password.')
            }
        },
        complete: function() {
        	$('#submit').attr('disabled', false)
        }
    })
})
