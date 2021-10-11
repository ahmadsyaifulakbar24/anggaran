$.ajax({
    url: `${root}/api/program/get_parent`,
    type: 'GET',
    success: function(result) {
    	// console.log(result)
        $.each(result.data, function(index, value) {
            append = `<option value="${value.id}">${value.code_program} - ${value.description}</option>`
            $('#program_id').append(append)
        })
        $('#submit').attr('disabled', false)
    }
})

$('form').submit(function(e) {
    e.preventDefault()
    $('#submit').attr('disabled', true)
    $('.is-invalid').removeClass('is-invalid')
    let formData = new FormData()
    formData.append('program_id', $('#program_id').val())
    $.ajax({
        url: `${root}/api/user_program/create`,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(result) {
            // console.log(result.data)
            customAlert('success', 'Program berhasil dibuat')
            setTimeout(function() {
                location.href = `${root}/asdep/program`
            }, 1000)
        },
        error: function(xhr) {
		    $('#submit').attr('disabled', false)
        	// console.log(xhr)
        	let err = xhr.responseJSON.errors
            if (err.program_id) {
            	if (err.program_id == "The selected program id is invalid.") {
	                $('#program_id').addClass('is-invalid')
	                $('#program_id').siblings('.invalid-feedback').html('Pilih program.')
	            }
	            if (err.program_id == "The program id has already been taken.") {
	                $('#program_id').addClass('is-invalid')
	                $('#program_id').siblings('.invalid-feedback').html('Program telah dibuat.')
	            }
            }
        }
    })
})
