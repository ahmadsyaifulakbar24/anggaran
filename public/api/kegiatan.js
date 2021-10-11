$.ajax({
    url: `${root}/api/program`,
    type: 'GET',
    data: { id: parent_id },
    success: function(result) {
        // console.log(result.data)
        result.data.parent != null ? history.back() : get_data()
    },
    error: function(xhr) {
        // console.log(xhr)
        let err = xhr.responseJSON.errors
        if (err.id) history.back()
    }
})

function get_data() {
    $('#table').empty()
    $.ajax({
        url: `${root}/api/program`,
        type: 'GET',
        data: { parent_id },
        success: function(result) {
            // console.log(result.data)
            if (result.data.length != 0) {
                $.each(result.data, function(index, value) {
                    append = `<tr data-id="${value.id}" data-title="${value.description}">
						<td class="text-center">${index + 1}.</td>
						<td class="text-truncate">${value.parent.code_program}/${value.code_program}</td>
						<td class="text-truncate">${value.description}</td><td>
							<div class="d-flex">
								<a href="${root}/kegiatan/edit/${value.id}" class="btn btn-sm btn-outline-primary mr-2">Ubah</a>
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
        url: `${root}/api/program/${id}`,
        type: 'DELETE',
        success: function(result) {
            // console.log(result.data)
            get_data()
            customAlert('success', 'Kegiatan berhasil dihapus')
            $('#modal-delete').modal('hide')
            $('#delete').attr('disabled', false)
        }
    })
})
