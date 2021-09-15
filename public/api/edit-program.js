$.ajax({
    url: `${root}/api/program`,
    type: 'GET',
    data: { id },
    success: function(result) {
        // console.log(result.data)
        let value = result.data
        $('#code_program').val(value.code_program)
        $('#description').val(value.description)
    },
    error: function(xhr) {
        // console.log(xhr)
        let err = xhr.responseJSON.errors
        if (err.id) history.back()
    }
})

$('form').submit(function(e) {
    e.preventDefault()
    addLoading()
    $('.is-invalid').removeClass('is-invalid')

    let code_program = $('#code_program').val()
    let description = $('#description').val()

    $.ajax({
        url: `${root}/api/program/${id}`,
        type: 'PUT',
        data: { code_program, description },
        success: function(result) {
            // console.log(result.data)
            customAlert('success', 'Program berhasil diubah')
            setTimeout(function() {
                location.href = `${root}/program`
            }, 1000)
        },
        error: function(xhr) {
            // console.log(xhr)
            let err = xhr.responseJSON.errors
            if (err.code_program) {
                if (err.code_program == "The code program has already been taken.") {
                    $('#code_program').addClass('is-invalid')
                    $('#code_program').siblings('.invalid-feedback').html('Kode telah digunakan.')
                } else if (err.code_program == "The code program field is required.") {
                    $('#code_program').addClass('is-invalid')
                    $('#code_program').siblings('.invalid-feedback').html('Masukkan Kode.')
                }
            }
            if (err.description) {
                $('#description').addClass('is-invalid')
                $('#description').siblings('.invalid-feedback').html('Masukkan keterangan.')
            }
        }
    })
})
