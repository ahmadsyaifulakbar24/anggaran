$.ajax({
    url: `${root}/api/user_activity/fetch`,
    type: 'GET',
    data: {
    	user_activity_id
    },
    success: function(result) {
        // console.log(result.data)
        $.ajax({
		    url: `${root}/api/user_kro/fetch`,
		    type: 'GET',
		    data: {
		    	user_kro_id
		    },
		    success: function(result) {
		        // console.log(result.data)
		        value = result.data
		        $.ajax({
		            url: `${root}/api/kro`,
		            type: 'GET',
		            success: function(result) {
		                // console.log(result.data)
		                $kro = result.data
		                type_kro(value.type_kro, value.kro.id)
		            }
		        })
		    },
		    error: function(xhr) {
		        // console.log(xhr)
		        let err = xhr.responseJSON.errors
		        if (err.user_kro_id) history.back()
		    }
        })
    },
    error: function(xhr) {
        // console.log(xhr)
        let err = xhr.responseJSON.errors
        if (err.user_activity_id) history.back()
    }
})

function type_kro(value, kro_id) {
    if (value == 'pn') {
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
    setTimeout(function() {
        $('#type_kro').val(value)
        $('#kro_id').val(kro_id)
        $('#submit').attr('disabled', false)
    }, 1000)
}

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
    $.ajax({
        url: `${root}/api/user_kro/update/${user_kro_id}`,
        type: 'PUT',
        data: {
        	kro_id: $('#kro_id').val(),
        	type_kro: $('#type_kro').val()
        },
        success: function(result) {
            // console.log(result.data)
            customAlert('success', 'KRO berhasil diubah')
            setTimeout(function() {
                location.href = `${root}/asdep/kro/${user_activity_id}`
            }, 1000)
        },
        error: function(xhr) {
		    $('#submit').attr('disabled', false)
            // console.log(xhr)
            let err = xhr.responseJSON.errors
            if (err.kro_id) {
                if (err.kro_id == "The kro id field is required.") {
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
