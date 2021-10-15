$.ajax({
    url: `${root}/api/user_kro/fetch`,
    type: 'GET',
    data: {
    	user_kro_id
    },
    success: function(result) {
        // console.log(result.data)
        $.ajax({
		    url: `${root}/api/user_ro/fetch`,
		    type: 'GET',
		    data: {
		    	user_ro_id
		    },
		    success: function(result) {
		        // console.log(result.data)
		        let value = result.data
		        $.ajax({
		            url: `${root}/api/unit_target`,
		            type: 'GET',
		            success: function(result) {
		                // console.log(result.data)
		                $.each(result.data, function(index, value) {
				            append = `<option value="${value.id}">${value.name}</option>`
				            $('#unit_target').append(append)
				        })
				        $('#code_ro').val(value.code_ro)
				        $('#ro').val(value.ro)
				        $('#unit_target').val(value.unit_target.id)
		                $('#submit').attr('disabled', false)
		            }
		        })
		    },
		    error: function(xhr) {
		        // console.log(xhr)
		        let err = xhr.responseJSON.errors
		        if (err.user_ro_id) history.back()
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
    $.ajax({
        url: `${root}/api/user_ro/update/${user_ro_id}`,
        type: 'PUT',
        data: {
        	code_ro: $('#code_ro').val(),
        	ro: $('#ro').val(),
        	unit_target: $('#unit_target').val()
        },
        success: function(result) {
            // console.log(result.data)
            customAlert('success', 'RO berhasil diubah')
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
