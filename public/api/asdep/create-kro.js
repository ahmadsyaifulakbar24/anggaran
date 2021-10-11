$.ajax({
    url: `${root}/api/user_activity/fetch`,
    type: 'GET',
    data: {
        user_activity_id
    },
    success: function(result) {
        // console.log(result.data)
        $.ajax({
            url: `${root}/api/kro`,
            type: 'GET',
            success: function(result) {
                // console.log(result.data)
                $kro = result.data
                $('#submit').attr('disabled', false)
            }
        })
    },
    error: function(xhr) {
        // console.log(xhr)
        let err = xhr.responseJSON.errors
        if (err.user_activity_id) history.back()
    }
})

$('#type_kro').change(function() {
    $('#kro_id').html('<option value="" disabled selected>Pilih</option')
    $('#kro_id').attr('disabled', false)
    if ($(this).val() == 'pn') {
        $.each($kro, function(index, value) {
            append = `<option value="${value.id}">${value.code_kro_pn} - ${value.kro}</option>`
            $('#kro_id').append(append)
        })
    } else {
        $.each($kro, function(index, value) {
            append = `<option value="${value.id}">${value.code_kro_non_pn} - ${value.kro}</option>`
            $('#kro_id').append(append)
        })
    }
})

$('form').submit(function(e) {
    e.preventDefault()
    $('#submit').attr('disabled', true)
    $('.is-invalid').removeClass('is-invalid')
    let formData = new FormData()
    formData.append('user_activity_id', user_activity_id)
    formData.append('type_kro', $('#type_kro').val())
    formData.append('kro_id', $('#kro_id').val())
    $.ajax({
        url: `${root}/api/user_kro/create`,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(result) {
            // console.log(result.data)
            customAlert('success', 'KRO berhasil dibuat')
            setTimeout(function() {
                location.href = `${root}/asdep/kro/${user_activity_id}`
            }, 1000)
        },
        error: function(xhr) {
            $('#submit').attr('disabled', false)
            // console.log(xhr)
            let err = xhr.responseJSON.errors
            if (err.kro_id) {
                if (err.kro_id == "The selected kro id is invalid.") {
                    $('#kro_id').addClass('is-invalid')
                    $('#kro_id').siblings('.invalid-feedback').html('Pilih KRO.')
                }
                else if (err.kro_id == "The kro id has already been taken.") {
                    $('#kro_id').addClass('is-invalid')
                    $('#kro_id').siblings('.invalid-feedback').html('KRO telah dibuat.')
                }
            }
            if (err.type_kro == "The selected type kro is invalid.") {
                $('#type_kro').addClass('is-invalid')
                $('#type_kro').siblings('.invalid-feedback').html('Pilih tipe KRO.')
            }
        }
    })
})
