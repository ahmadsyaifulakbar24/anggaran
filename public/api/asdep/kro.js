role == 'asdep' ? $('.create').show() : $('.option').remove()
$.ajax({
    url: `${root}/api/user_activity/fetch`,
    type: 'GET',
    data: {
    	user_activity_id
    },
    success: function(result) {
        // console.log(result.data)
        get_data()
        $.ajax({
            url: `${root}/api/work_plan/total_budged`,
            type: 'GET',
            data: {
                unit_id: unit,
                user_activity_id,
                get_by: 'kro'
            },
            success: function(result) {
                // console.log(result.data)
                $('#total_budged').html(rupiah(result.data.total_budged))
            },
            error: function(xhr) {
                let err = xhr.responseJSON.errors
                // console.log(err)
            }
        })
    },
    error: function(xhr) {
        // console.log(xhr)
        let err = xhr.responseJSON.errors
        if (err.user_activity_id) history.back()
    }
})

function get_data() {
    $('#table').empty()
    $.ajax({
        url: `${root}/api/user_kro/fetch`,
        type: 'GET',
        data: {
        	user_activity_id,
        	// unit_id: unit
        },
        success: function(result) {
            // console.log(result.data)
            if (result.data.length != 0) {
                $.each(result.data, function(index, value) {
                	if (value.type_kro == 'pn') {
                		type_kro = 'Prioritas Nasional'
                		code_kro = value.kro.code_kro_pn
                	} else {
                		type_kro = 'Non Prioritas Nasional'
                		code_kro = value.kro.code_kro_non_pn
                	}
            		kro = value.kro.kro
            		option = `<td>
						<div class="d-flex">
							<a href="${root}/asdep/kro/edit/${user_activity_id}/${value.id}" class="btn btn-sm btn-outline-primary mr-2">Ubah</a>
							<button class="btn btn-sm btn-outline-danger delete">Hapus</button>
						</div>
					</td>`
                    append = `<tr data-id="${value.id}" data-title="${kro}">
						<td class="text-center">${index + 1}.</td>
						<td class="text-truncate">${code_kro}</td>
						<td class="text-truncate"><a href="${root}/asdep/ro/${value.id}">${kro}</a></td>
						<td class="text-truncate">${type_kro}</td>
						<td class="text-truncate">${value.kro.unit}</td>
						${role == 'asdep' ? option : ''}
					</tr>`
                    $('#table').append(append)
                })
            } else {
                append = `<tr>
					<td colspan="10">Data tidak ditemukan.</td>
				</tr>`
                $('#table').append(append)
            }
        }
    })
}

$(document).on('click', '.delete', function() {
    let id = $(this).parents('tr').attr('data-id')
    let title = $(this).parents('tr').attr('data-title')
    $('#delete').attr('data-id', id)
    $('#title').html(title)
    $('#modal-delete').modal('show')
})

$(document).on('click', '#delete', function() {
    let id = $(this).attr('data-id')
    $('#delete').attr('disabled', true)
    $.ajax({
        url: `${root}/api/user_kro/delete/${id}`,
        type: 'DELETE',
        success: function(result) {
            // console.log(result.data)
            get_data()
            customAlert('success', 'KRO berhasil dihapus')
        },
        error: function(xhr) {
        	// console.log(xhr)
        	let err = xhr.responseJSON.errors
        	if (err.user_kro_id == "can't delete this kro because the data already exists") {
	            customAlert('danger', 'KRO gagal dihapus, telah terinput data')
        	}
        },
        complete: function() {
            $('#modal-delete').modal('hide')
            $('#delete').attr('disabled', false)
        }
    })
})
