if (role == 'admin' || role == 'deputi') {
    $.ajax({
        url: `${root}/api/user`,
        type: 'GET',
        data: {
            id: user
        },
        success: function(result) {
            // console.log(result.data)
            let value = result.data
            $unit_id = value.unit_id
            if (value.role == 'admin') {
                get_unit('deputi')
            } else if (value.role == 'deputi') {
                get_unit('asdep')
            }
        }
    })
} else {
    get_data()
    $('#card').show()
}

function get_unit(role) {
    $.ajax({
        url: `${root}/api/user`,
        type: 'GET',
        data: { role },
        success: function(result) {
            // console.log(result.data)
            $.each(result.data, function(index, value) {
                append = `<option value="${value.unit_id}">${value.name}</option>`
                $('#view-as').append(append)
            })
        }
    })
}

function get_data(unit_id = null, search = null) {
    $('#table').empty()
    $('#table-loading').hide()
    let data = null
    if (unit_id != null) {
        data = {
            unit_id,
            search
        }
    } else {
        data = {
            user_id: user,
            search
        }
    }
    $.ajax({
        url: `${root}/api/work_plan`,
        type: 'GET',
        data: data,
        success: function(result) {
            // console.log(result.data)
            if (result.data.length > 0) {
                $.each(result.data, function(index, value) {
                    deputi_status = ''
                    admin_status = ''
                    if (value.deputi_status != 'accept') {
                        deputi_status = `
                        <a href="${root}/rancangan-anggaran/edit/${value.id}" class="btn btn-sm btn-outline-primary edit mr-2">Ubah</a>
						<button class="btn btn-sm btn-outline-danger delete">Hapus</button>`
                    }
                    if (value.deputi_status == 'pending') {
                        if (value.user.id != user) {
                            deputi_status += `
	                        <button class="btn btn-sm btn-primary status mr-2" data-status="accept">Setujui</button>
							<button class="btn btn-sm btn-danger status mr-2" data-status="decline">Tolak</button>`
                        }
                    }
                    if (value.admin_status == 'pending') {
                        if ($unit_id == null) {
                            admin_status = `
							<button class="btn btn-sm btn-primary status mr-2" data-status="accept">Setujui</button>
							<button class="btn btn-sm btn-danger status mr-2" data-status="decline">Tolak</button>`
                        }
                    }
                    title = `${value.program.parent.code_program}/`
                    title += `${value.program.code_program}/`
                    title += `${value.type_kro == 'pn' ? value.kro.code_kro_pn : value.kro.code_kro_non_pn}/`
                    title += `${value.ro.code_ro}/`
                    title += `${value.component_code}`
                    append = `<tr data-id="${value.id}" data-title="${value.component_name}">
						<td class="text-center">${index + 1}.</td>
						<td class="text-truncate">${title}</td>
						<td class="text-truncatee"><a href="${root}/rancangan-anggaran/${value.id}">${value.component_name}</a></td>
						<td class="text-truncate">${value.total_target} ${value.unit_target}</td>
						<td class="text-truncate">${convert(value.budged)}</td>
						<td class="text-truncate unit">${value.unit.name}</td>
						<td class="text-truncate pengguna">${value.user.name}</td>
						<td class="text-danger deputi_status">${status(value.deputi_status)}</td>
						<td class="text-danger admin_status">${status(value.admin_status != null ? value.admin_status : '')}</td>
						<td>
							<div class="d-flex">
								${deputi_status}
								${admin_status}
							</div>
						</td>
					</tr>`
                    $('#table').append(append)
                })
            } else {
                append = `<tr>
					<td colspan="20">${search != undefined && search != '' ? `Pencarian <b>"${search}"</b>` : 'Data'} tidak ditemukan.</td>
				</tr>`
                $('#table').append(append)
            }
        },
        complete: function() {
            if (role == 'admin') {
                $('.create').remove()
                $('.deputi_status').remove()
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
        },
        error: function(xhr) {
            // console.log(xhr)
            let err = xhr.responseJSON.errors
        }
    })
}

if (role != 'asdep') {
    $('#modal-view').modal('show')
    if (role == 'admin') {
        $('.option-asdep').remove()
    } else if (role == 'deputi') {
        $('.option-deputi').remove()
    }
    $('form').submit(function(e) {
        e.preventDefault()
        $('#card').show()
        $('#search').val('')
        $('#modal-view').modal('hide')
        $('#view').html($('#view-as option:selected').text())
        get_data($('#view-as').val())
    })
}

$(document).on('keyup', '#search', function(e) {
    if ((e.which >= 65 && e.which == 32 && e.which == 8) || e.which <= 90) {
        $('#table').empty()
        $('#table-loading').show()
    }
})

$(document).on('keyup', '#search', delay(function(e) {
    let value = $(this).val()
    if ((e.which >= 65 && e.which == 32 && e.which == 8) || e.which <= 90) {
        role == 'asdep' ? get_data(null, value) : get_data($('#view-as').val(), value)
    }
}, 500))

$(document).on('click', '.status', function(e) {
    let id = $(this).parents('tr').attr('data-id')
    let status = $(this).attr('data-status')
    let formData = new FormData()
    formData.append('status', status)
    formData.append('comment', 'ACC')
    $.ajax({
        url: `${root}/api/work_plan/status/${id}`,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(result) {
            // console.log(result.data)
            $('#search').val() != '' ? get_data($('#view-as').val(), $('#search').val()) : get_data($('#view-as').val())
            if (status == 'accept') {
                customAlert('success', 'Kegiatan disetujui.')
            } else {
                customAlert('danger', 'Kegiatan ditolak.')
            }
        },
        error: function(xhr) {
            console.log(xhr)
            let err = xhr.responseJSON.errors
        }
    })
})

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
            // console.log(xhr)
            let err = xhr.responseJSON.errors
        }
    })
})
