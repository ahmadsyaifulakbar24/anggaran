if (role == 'admin') {
    $('.create').remove()
    $('.edit').remove()
    $('.delete').remove()
    $('.request').remove()
    $('.upload').remove()
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
}

$.ajax({
    url: `${root}/api/work_plan/get_file`,
    type: 'GET',
    data: {
    	category: 'user_ro',
    	user_ro_id
    },
    success: function(result) {
        // console.log(result.data)
        $.each(result.data, function(index, value) {
            add_file(value.id, value.file, value.type.id)
            check_max(value.type.id)
        })
        role == 'admin' ? $('.delete-file').remove() : ''
    },
    error: function(xhr) {
        // console.log(xhr)
    }
})

$.ajax({
    url: `${root}/api/work_plan/breadcrumb`,
    type: 'GET',
    data: {
        breadcrumb_type: 'work_plan',
        user_ro_id
    },
    success: function(result) {
        // console.log(result.data)
        let value = result.data
    	$('#user_program').html(`${value.user_program.code_program} - ${value.user_program.description}`)
    	$('#user_activity').html(`${value.user_activity.code_activity} - ${value.user_activity.description}`)
    	if (value.user_kro.type_kro == 'pn') {
	    	$('#user_kro').html(`${value.user_kro.code_kro_pn} - ${value.user_kro.kro}`)
    	} else {
	    	$('#user_kro').html(`${value.user_kro.code_kro_non_pn} - ${value.user_kro.kro}`)
    	}
    	$('#user_ro').html(`${value.user_ro.code_ro} - ${value.user_ro.ro}`)
    },
    error: function(xhr) {
        // console.log(xhr)
    }
})

$.ajax({
    url: `${root}/api/user_ro/fetch`,
    type: 'GET',
    data: {
        user_ro_id
    },
    success: function(result) {
        // console.log(result.data)
        if (role == 'asdep') {
            get_data(unit, user)
        } else {
            get_data(localStorage.getItem('unit_id'))
        }
    },
    error: function(xhr) {
        // console.log(xhr)
        let err = xhr.responseJSON.errors
        if (err.user_ro_id) history.back()
    }
})

function get_data(unit_id = '', user_id = '', search = '') {
    $('#table').empty()
    $('#table-loading').hide()
    let data = null
    if (role == 'admin') {
        if (unit_id == '') {
            data = {
                search,
                user_ro_id
            }
        } else {
            data = {
                search,
                user_ro_id,
                unit_id
            }
        }
    }
    if (role == 'deputi') {
        if (user_id == '') {
            data = {
                search,
                user_ro_id,
                unit_id
            }
        } else {
            data = {
                search,
                user_ro_id,
                unit_id,
                // user_id
            }
        }
    }
    if (role == 'asdep') {
        data = {
            search,
            user_ro_id,
            unit_id,
            // user_id
        }
    }
    // console.clear()
    // console.log(data)
    $.ajax({
        url: `${root}/api/work_plan`,
        type: 'GET',
        data: data,
        success: function(result) {
            console.log(result.data)
            if (result.data.length > 0) {
                $.each(result.data, function(index, value) {
                    deputi_status = ''
                    admin_status = ''
                    if (value.deputi_status != 'accept') {
	                	if (user == value.user.id) {
	                        deputi_status = `
	                        <a href="${root}/rancangan-anggaran/edit/${value.id}" class="btn btn-sm btn-outline-primary edit mr-2">Ubah</a>
							<button class="btn btn-sm btn-outline-danger delete">Hapus</button>`
						} else {
							deputi_status = '<td></td>'
						}
                    }
                    let rm = 0, blu = 0
                    $.each(value.source_funding, function(index, value) {
                        if (value.param_id == 8) {
                            rm = value.nominal
                        } else if (value.param_id == 9) {
                            blu = value.nominal
                        }
                    })
                    append = `<tr data-id="${value.id}" data-title="${value.component_name}">
						<td class="text-center">${index + 1}.</td>
						<td class="text-truncate">${value.component_code}</td>
						<td class="text-truncate"><a href="${root}/asdep/komponen/detail/${value.id}">${value.component_name}</a></td>
						<td class="text-truncate">${value.total_target} ${value.unit_target.name}</td>
	            		<td class="text-right">${rm != 0 ? rupiah(rm) : 'Rp0'}</td>
	            		<td class="text-right">${blu != 0 ? rupiah(blu) : 'Rp0'}</td>
						<td class="text-truncate">${rupiah(value.budged)}</td>
						<td class="text-truncate unit">${value.unit.name}</td>
						<td class="text-truncate pengguna">${value.user.name}</td>
						<td>
							<div class="d-flex">
								${deputi_status}
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
            }
        },
        error: function(xhr) {
            // console.log(xhr)
            let err = xhr.responseJSON.errors
        }
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
    let viewas = $('#view-as').val()
    if ((e.which >= 65 && e.which == 32 && e.which == 8) || e.which <= 90) {
        if (role == 'admin') {
            if (viewas == '') {
                get_data('', '', value)
            } else {
                get_data(viewas, '', value)
            }
        } else if (role == 'deputi') {
            if (viewas == '') {
                get_data(unit, '', value)
            } else {
                get_data(unit, viewas, value)
            }
        } else if (role == 'asdep') {
            get_data(unit, viewas, value)
        }
    }
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
            customAlert('trash', 'Komponen berhasil dihapus.')
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
