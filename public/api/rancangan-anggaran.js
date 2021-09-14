get_data('')

function get_data(search) {
    $('#table').empty()
    $('#table-loading').hide()
    $.ajax({
        url: `${root}/api/work_plan`,
        type: 'GET',
        data: {
            user_id: user,
            search,
        },
        success: function(result) {
            // console.log(result.data)
            if (result.data.length > 0) {
                $.each(result.data, function(index, value) {
                    // title = `${value.program.parent.code_program}/`
                    // title += `${value.program.code_program}/`
                    title = `${value.type_kro == 'pn' ? value.kro.code_kro_pn : value.kro.code_kro_non_pn}/`
                    title += `${value.ro.code_ro}/`
                    title += `${value.component_code}`
                    append = `<tr class="deputi1 asdep1" data-id="${value.id}" data-title="${value.component_name}">
					<td class="text-center">${index + 1}.</td>
					<td class="text-truncate">${title}</td>
					<td class="text-truncatee"><a href="${root}/rancangan-anggaran/${value.id}">${value.component_name}</a></td>
					<td class="text-truncate">${value.total_target} ${value.unit_target}</td>
					<td class="text-truncate">${convert(value.budged)}</td>
					<td class="text-truncate unit">Deputi Perkoperasian</td>
					<td class="text-truncate pengguna">Asdep Perkoperasian Syariah</td>
					<td class="text-danger status">${status(value.deputi_status)}</td>
					<td class="text-danger admin_status">${status(value.admin_status != null ? value.admin_status : '')}</td>
					<td>
						<div class="d-flex">
							<button class="btn btn-sm btn-primary accept mr-2">Setujui</button>
							<button class="btn btn-sm btn-danger decline mr-2">Tolak</button>
							<button class="btn btn-sm btn-warning request mr-2">Ajukan</button>
							<a href="${root}/rancangan-anggaran/edit/${value.id}" class="btn btn-sm btn-outline-primary edit mr-2">Ubah</a>
							<button class="btn btn-sm btn-outline-danger delete">Hapus</button>
						</div>
					</td>
				</tr>`
                    $('#table').append(append)
                })
            } else {
                append = `<tr>
					<td colspan="20">${search != '' ? `Pencarian <b>"${search}"</b>` : 'Data'} tidak ditemukan.</td>
				</tr>`
                $('#table').append(append)
            }
        },
        complete: function() {
            if (role == 'admin') {
                $('.create').remove()
                $('.status').remove()
                $('.edit').remove()
                $('.delete').remove()
                $('.request').remove()
            } else if (role == 'deputi') {
                $('.create').remove()
                $('.unit').remove()
                $('.pending').remove()
                $('.edit').remove()
                $('.delete').remove()
            } else if (role == 'asdep') {
                $('.view').remove()
                $('.unit').remove()
                $('.pengguna').remove()
                $('.accept').remove()
                $('.decline').remove()
                $('.request').remove()
                $('.admin_status').remove()
            }
        }
    })
}

$(document).on('keyup', '#search', function(e) {
    $('#table').empty()
    $('#table-loading').show()
})

$(document).on('keyup', '#search', delay(function(e) {
	let value = $(this).val()
	get_data(value)
}, 500))

$(document).on('click', '.delete', function(e) {
    let id = $(this).parents('tr').attr('data-id')
    let title = $(this).parents('tr').attr('data-title')
    $('#title').html(title)
    $('#delete').attr('data-id', id)
    $('#modal-delete').modal('show')
})

$(document).on('click', '#delete', function(e) {
    let id = $(this).attr('data-id')
    $(this).attr('disabled', true)
    $.ajax({
        url: `${root}/api/work_plan/${id}`,
        type: 'DELETE',
        success: function(result) {
            // console.log(result.data)
            get_data()
            $('#modal-delete').modal('hide')
            customAlert('trash', 'Kegiatan berhasil dihapus.')
        },
        complete: function() {
            $('#delete').attr('disabled', false)
        },
        error: function(xhr) {
            console.log(xhr)
            let err = xhr.responseJSON.errors
        }
    })
})
