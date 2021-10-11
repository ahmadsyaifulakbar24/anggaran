$.ajax({
    url: `${root}/api/program`,
    type: 'GET',
    data: { id: parent_id },
    success: function(result) {
        // console.log(result.data)
        result.data.parent != null ? history.back() : ''
    },
    error: function(xhr) {
        // console.log(xhr)
        let err = xhr.responseJSON.errors
        if (err.id) history.back()
    }
})

$('form').submit(function(e) {
    e.preventDefault()
    $('#submit').attr('disabled', true)
    $('.is-invalid').removeClass('is-invalid')
    let formData = new FormData()
    formData.append('code_program', $('#code_program').val())
    formData.append('description', $('#description').val())
    formData.append('parent_id', parent_id)
    $.ajax({
        url: `${root}/api/program`,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(result) {
            // console.log(result.data)
            customAlert('success', 'Kegiatan berhasil dibuat')
            setTimeout(function() {
                location.href = `${root}/kegiatan/${parent_id}`
            }, 1000)
        },
        error: function(xhr) {
		    $('#submit').attr('disabled', false)
        	// console.log(xhr)
        	let err = xhr.responseJSON.errors
            if (err.code_program) {
	            if (err.code_program == "The code program has already been taken.") {
	                $('#code_program').addClass('is-invalid')
	                $('#code_program').siblings('.invalid-feedback').html('Kode telah digunakan.')
	            }
	            else if (err.code_program == "The code program field is required.") {
	                $('#code_program').addClass('is-invalid')
	                $('#code_program').siblings('.invalid-feedback').html('Masukkan kode.')
	            }
	        }
            if (err.description) {
                $('#description').addClass('is-invalid')
                $('#description').siblings('.invalid-feedback').html('Masukkan keterangan.')
            }
        }
    })
})
