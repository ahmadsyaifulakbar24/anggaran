$.ajax({
    url: `${root}/api/user_program/fetch`,
    type: 'GET',
    data: {
    	user_program_id,
    	user_id: user
    },
    success: function(result) {
        // console.log(result.data)
        let value = result.data
        $.ajax({
            url: `${root}/api/program/get_parent`,
            type: 'GET',
            success: function(result) {
                // console.log(result)
                $.each(result.data, function(index, value) {
                    append = `<option value="${value.id}">${value.code_program} - ${value.description}</option>`
                    $('#program_id').append(append)
                })
		        $('#program_id').val(value.program.id)
                $('#submit').attr('disabled', false)
            }
        })
    },
    error: function(xhr) {
        console.log(xhr)
        let err = xhr.responseJSON.errors
        if (err.user_program_id) history.back()
    }
})



$('form').submit(function(e) {
    e.preventDefault()
    $('#submit').attr('disabled', true)
    $('.is-invalid').removeClass('is-invalid')
    $.ajax({
        url: `${root}/api/user_program/update/${user_program_id}`,
        type: 'PUT',
        data: {
        	program_id: $('#program_id').val()
        },
        success: function(result) {
            // console.log(result.data)
            customAlert('success', 'Program berhasil diubah')
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
