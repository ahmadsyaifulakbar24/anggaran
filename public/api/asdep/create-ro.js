$.ajax({
    url: `${root}/api/user_kro/fetch`,
    type: 'GET',
    data: {
        user_kro_id
    },
    success: function(result) {
        // console.log(result.data)
        $.ajax({
            url: `${root}/api/unit_target`,
            type: 'GET',
            success: function(result) {
                // console.log(result.data)
                $.each(result.data, function(index, value) {
		            append = `<option value="${value.id}">${value.name}</option>`
		            $('#unit_target').append(append)
		        })
                $('#submit').attr('disabled', false)
            }
        })
    },
    error: function(xhr) {
        // console.log(xhr)
        let err = xhr.responseJSON.errors
        if (err.user_kro_id) history.back()
    }
})

$('form').submit(function(e) {
    e.preventDefault()
    $('#submit').attr('disabled', true)
    $('.is-invalid').removeClass('is-invalid')
    let formData = new FormData()
    formData.append('user_kro_id', user_kro_id)
    formData.append('code_ro', $('#code_ro').val())
    formData.append('ro', $('#ro').val())
    formData.append('unit_target', $('#unit_target').val())
    $.ajax({
        url: `${root}/api/user_ro/create`,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(result) {
            // console.log(result.data)
            customAlert('success', 'RO berhasil dibuat')
            setTimeout(function() {
                location.href = `${root}/asdep/ro/${user_kro_id}`
            }, 1000)
        },
        error: function(xhr) {
            $('#submit').attr('disabled', false)
            let err = xhr.responseJSON.errors
            // console.log(err)
            if (err.code_ro) {
                if (err.code_ro == "The code ro field is required.") {
                    $('#code_ro').addClass('is-invalid')
                    $('#code_ro').siblings('.invalid-feedback').html('Masukkan kode RO.')
                }
                else if (err.code_ro == "The code ro has already been taken.") {
                    $('#code_ro').addClass('is-invalid')
                    $('#code_ro').siblings('.invalid-feedback').html('Kode RO telah digunakan.')
                }
            }
            if (err.ro == "The ro field is required.") {
                $('#ro').addClass('is-invalid')
                $('#ro').siblings('.invalid-feedback').html('Masukkan nama RO.')
            }
            if (err.unit_target == "The selected unit target is invalid.") {
                $('#unit_target').addClass('is-invalid')
                $('#unit_target').siblings('.invalid-feedback').html('Pilih satuan RO.')
            }
        }
    })
})
