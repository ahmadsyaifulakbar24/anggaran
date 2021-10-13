$.ajax({
    url: `${root}/api/work_plan/total_budged`,
    type: 'GET',
    data: {
    	unit_id: unit,
    	get_by: 'program',
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

get_data()

function get_data() {
	$('#table').empty()
	$.ajax({
	    url: `${root}/api/user_program/fetch`,
	    type: 'GET',
	    data: {
	    	user_id: user
	    },
	    success: function(result) {
	        // console.log(result.data)
	        if (result.data.length != 0) {
		        $.each(result.data, function(index, value) {
		            append = `<tr data-id="${value.id}" data-title="${value.program.description}">
						<td class="text-center">${index + 1}.</td>
						<td class="text-truncate">${value.program.code_program}</td>
						<td class="text-truncate">
							<a href="${root}/asdep/kegiatan/${value.id}">${value.program.description}</a></td>
						<td>
							<div class="d-flex">
								<a href="${root}/asdep/program/edit/${value.id}" class="btn btn-sm btn-outline-primary mr-2">Ubah</a>
								<button class="btn btn-sm btn-outline-danger delete">Hapus</button>
							</div>
						</td>
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
        url: `${root}/api/user_program/delete/${id}`,
        type: 'DELETE',
        success: function(result) {
            // console.log(result.data)
            get_data()
            customAlert('success', 'Program berhasil dihapus')
        },
        error: function(xhr) {
        	// console.log(xhr)
        	let err = xhr.responseJSON.errors
        	if (err.user_program_id == "can't delete this program because the data already exists") {
	            customAlert('danger', 'Program telah terinput data')
        	}
        },
        complete: function() {
            $('#modal-delete').modal('hide')
            $('#delete').attr('disabled', false)
        }
	})
})