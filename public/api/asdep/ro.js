role == 'asdep' ? $('.create').show() : $('.option').remove()
$.ajax({
    url: `${root}/api/user_kro/fetch`,
    type: 'GET',
    data: {
    	user_kro_id
    },
    success: function(result) {
        // console.log(result.data)
        get_data()
        $.ajax({
            url: `${root}/api/work_plan/total_budged`,
            type: 'GET',
            data: {
                unit_id: unit,
                user_kro_id,
                get_by: 'ro'
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
        if (err.user_kro_id) history.back()
    }
})

function get_data() {
    $('#table').empty()
    $.ajax({
        url: `${root}/api/user_ro/fetch`,
        type: 'GET',
        data: {
        	user_kro_id
        },
        success: function(result) {
            // console.log(result.data)
            if (result.data.length != 0) {
                $.each(result.data, function(index, value) {
                	option = `<td>
						<div class="d-flex">
							<a href="${root}/asdep/ro/edit/${user_kro_id}/${value.id}" class="btn btn-sm btn-outline-primary mr-2">Ubah</a>
							<button class="btn btn-sm btn-outline-danger delete">Hapus</button>
						</div>
					</td>`
                    append = `<tr data-id="${value.id}" data-title="${value.ro}">
						<td class="text-center">${index + 1}.</td>
						<td class="text-truncate">${value.code_ro}</td>
						<td class="text-truncate"><a href="${root}/asdep/komponen/${value.id}">${value.ro}</a></td>
						<td class="text-truncate">${value.unit_target.name}</td>
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
        url: `${root}/api/user_ro/delete/${id}`,
        type: 'DELETE',
        success: function(result) {
            // console.log(result.data)
            get_data()
            customAlert('success', 'RO berhasil dihapus')
        },
        error: function(xhr) {
        	// console.log(xhr)
        	let err = xhr.responseJSON.errors
        	if (err.user_ro_id == "can't delete this ro because the data already exists") {
	            customAlert('danger', 'RO gagal dihapus, telah terinput data')
        	}
        },
        complete: function() {
            $('#modal-delete').modal('hide')
            $('#delete').attr('disabled', false)
        }
    })
})
