$.ajax({
    url: `${root}/api/user_program/fetch`,
    type: 'GET',
    data: {
        user_program_id
    },
    success: function(result) {
        // console.log(result.data)
        let value = result.data
        $.ajax({
            url: `${root}/api/program`,
            type: 'GET',
            data: {
                parent_id: value.program.id
            },
            success: function(result) {
                // console.log(result.data)
                $.each(result.data, function(index, value) {
                    append = `<option value="${value.id}">${value.code_program} - ${value.description}</option>`
                    $('#activity_id').append(append)
                })
                $('#submit').attr('disabled', false)
            },
		    error: function(xhr) {
		        // console.log(xhr)
		    }
        })
    },
    error: function(xhr) {
        // console.log(xhr)
        let err = xhr.responseJSON.errors
        if (err.user_program_id) history.back()
    }
})

$('form').submit(function(e) {
    e.preventDefault()
    $('#submit').attr('disabled', true)
    $('.is-invalid').removeClass('is-invalid')
    let formData = new FormData()
    formData.append('user_program_id', user_program_id)
    formData.append('activity_id', $('#activity_id').val())
    $.ajax({
        url: `${root}/api/user_activity/create`,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(result) {
            // console.log(result.data)
            customAlert('success', 'Kegiatan berhasil dibuat')
            setTimeout(function() {
                location.href = `${root}/asdep/kegiatan/${user_program_id}`
            }, 1000)
        },
        error: function(xhr) {
            $('#submit').attr('disabled', false)
            // console.log(xhr)
            let err = xhr.responseJSON.errors
            if (err.activity_id) {
                if (err.activity_id == "The selected activity id is invalid.") {
                    $('#activity_id').addClass('is-invalid')
                    $('#activity_id').siblings('.invalid-feedback').html('Pilih Kegiatan.')
                }
                else if (err.activity_id == "The activity id has already been taken.") {
                    $('#activity_id').addClass('is-invalid')
                    $('#activity_id').siblings('.invalid-feedback').html('Kegiatan telah dibuat.')
                }
            }
        }
    })
})
