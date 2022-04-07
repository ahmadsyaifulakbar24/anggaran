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
    get_data(unit, user)
    $('#card').show()
}

function get_unit(role) {
    $.ajax({
        url: `${root}/api/user`,
        type: 'GET',
        data: {
	    	parent_id: user
	    },
        success: function(result) {
            // console.log(result.data)
            $.each(result.data, function(index, value) {
                if (role == 'deputi') {
                    append = `<option value="${value.unit_id}">${value.name}</option>`
                } else {
                    append = `<option value="${value.id}">${value.name}</option>`
                }
                $('#view-as').append(append)
            })
        }
    })
}

function get_data(unit_id = '', user_id = '', search = '') {
    $('#table').empty()
    $('#table-loading').hide()
    let data = null
    if (role == 'admin') {
        if (unit_id == '') {
            data = {
                search,
                status: 'accept'
            }
        } else {
            data = {
                search,
                unit_id,
                status: 'accept'
            }
        }
    }
    if (role == 'deputi') {
        if (user_id == '') {
            data = {
                search,
                unit_id
            }
        } else {
            data = {
                search,
                unit_id,
                user_id
            }
        }
    }
    if (role == 'asdep') {
        data = {
            search,
            unit_id,
            user_id
        }
    }
    // console.clear()
    // console.log(data)
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
                    permission = ''
                    if (value.deputi_status != 'accept') {
                        if (value.permission != 'lock') {
                            deputi_status = `
	                        <a href="${root}/asdep/komponen/edit/${value.user_ro.id}/${value.id}" class="btn btn-sm btn-outline-primary edit mr-2">Ubah</a>
							<button class="btn btn-sm btn-outline-danger delete">Hapus</button>`
                        } else {
                            deputi_status = ''
                        }
                    }
                    if (value.deputi_status == 'pending') {
                        if (value.user.id != user) {
                            deputi_status += `
	                        <button class="btn btn-sm btn-primary mr-2 approve">Setujui</button>
							<button class="btn btn-sm btn-danger decline">Tolak</button>`
                        }
                    }
                    if (value.admin_status == 'pending') {
                        if (role != 'asdep') {
                            if ($unit_id == null) {
                                admin_status = `
								<button class="btn btn-sm btn-primary mr-2 approve">Setujui</button>
								<button class="btn btn-sm btn-danger decline">Tolak</button>`
                            }
                        }
                    }
                    if (role == 'admin') {
                        if (value.permission == 'lock') {
                            permission = '<button class="btn btn-sm btn-outline-primary ml-2 unlock">Unlock</button>'
                        } else {
                            permission = '<button class="btn btn-sm btn-primary ml-2 lock">Lock</button>'
                        }
                    }
                    let rm = 0,
                        blu = 0
                    $.each(value.source_funding, function(index, value) {
                        if (value.param_id == 8) {
                            rm = value.nominal
                        } else if (value.param_id == 9) {
                            blu = value.nominal
                        }
                    })
                    append = `<tr data-id="${value.id}" data-title="${value.component_name}">
						<td class="text-center">${index + 1}.</td>
						<td class="text-truncate">${value.all_kode}</td>
						<td class="text-truncate"><a href="${root}/asdep/komponen/detail/${value.id}">${value.component_name}</a></td>
						<td class="text-truncate">${value.total_target} ${value.unit_target.name}</td>
	            		<td class="text-right">${rm != 0 ? rupiah(rm) : 'Rp0'}</td>
	            		<td class="text-right">${blu != 0 ? rupiah(blu) : 'Rp0'}</td>
						<td class="text-right">${rupiah(value.budged)}</td>
						<td class="text-truncate unit">${value.unit.name}</td>
						<td class="text-truncate pengguna">${value.user.name}</td>
						<td class="text-truncate status text-capitalize">${value.permission}</td>
						<td class="text-danger deputi_status">${status(value.deputi_status)}</td>
						<td class="text-danger admin_status">${status(value.admin_status)}</td>
						<td>
							<div class="d-flex">
								${deputi_status}
								${admin_status}
								${permission}
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
        if (role == 'admin') {
            get_data($('#view-as').val())
        } else if (role == 'deputi') {
            get_data(unit, $('#view-as').val())
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

$(document).on('click', '.approve', function(e) {
    let id = $(this).parents('tr').attr('data-id')
    let title = $(this).parents('tr').attr('data-title')
    $('#approve').attr('data-id', id)
    $('#modal-approve b').html(title)
    $('#modal-approve').modal('show')
})
$(document).on('click', '#approve', function(e) {
    let id = $(this).attr('data-id')
    $(this).attr('disabled', true)
    approval(id, 'accept')
})

$(document).on('click', '.decline', function(e) {
    let id = $(this).parents('tr').attr('data-id')
    let title = $(this).parents('tr').attr('data-title')
    $('#decline').attr('data-id', id)
    $('#modal-decline b').html(title)
    $('#modal-decline').modal('show')
})
$(document).on('click', '#decline', function(e) {
    let id = $(this).attr('data-id')
    $(this).attr('disabled', true)
    approval(id, 'decline')
})

function approval(id, status) {
    let search = $('#search').val()
    let viewas = $('#view-as').val()
    let comment = status == 'accept' ? 'Disetujui' : 'Ditolak'
    let formData = new FormData()
    formData.append('status', status)
    formData.append('comment', comment)
    $.ajax({
        url: `${root}/api/work_plan/status/${id}`,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(result) {
            // console.log(result.data)
            if (role == 'admin') {
                if (viewas == '') {
                    search != '' ? get_data('', '', value) : get_data('', '', '')
                } else {
                    search != '' ? get_data(viewas, '', value) : get_data(viewas, '', '')
                }
            } else if (role == 'deputi') {
                if (viewas == '') {
                    search != '' ? get_data(unit, '', value) : get_data(unit, '', '')
                } else {
                    search != '' ? get_data(unit, viewas, value) : get_data(unit, viewas, '')
                }
            }
            // $('#search').val() != '' ? get_data($('#view-as').val(), $('#search').val()) : get_data($('#view-as').val())
            if (status == 'accept') {
                $('#modal-approve').modal('hide')
			    $('#accept').attr('disabled', false)
                customAlert('success', 'Kegiatan disetujui')
            } else {
                $('#modal-decline').modal('hide')
			    $('#decline').attr('disabled', false)
                customAlert('danger', 'Kegiatan ditolak')
            }
        },
        error: function(xhr) {
            // console.log(xhr)
            let err = xhr.responseJSON.errors
        }
    })
}

$(document).on('click', '.delete', function(e) {
    let id = $(this).parents('tr').attr('data-id')
    let title = $(this).parents('tr').attr('data-title')
    $('#modal-delete b').html(title)
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
            customAlert('trash', 'Komponen berhasil dihapus')
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

$(document).on('click', '.lock', function(e) {
    let id = $(this).parents('tr').attr('data-id')
    let title = $(this).parents('tr').attr('data-title')
    $('#lock').attr('data-id', id)
    $('#modal-lock b').html(title)
    $('#modal-lock').modal('show')
})
$(document).on('click', '#lock', function(e) {
    let search = $('#search').val()
    let viewas = $('#view-as').val()
    let id = $(this).attr('data-id')
    $(this).attr('disabled', true)
    let formData = new FormData
    formData.append('type', 'lock_by_id')
    formData.append('work_plan_id', id)
    $.ajax({
        url: `${root}/api/work_plan/lock`,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(result) {
            // console.log(result.data)
            if (viewas == '') {
                search != '' ? get_data('', '', value) : get_data('', '', '')
            } else {
                search != '' ? get_data(viewas, '', value) : get_data(viewas, '', '')
            }
            customAlert('success', 'Lock komponen berhasil')
            $('#lock').attr('disabled', false)
            $('#modal-lock').modal('hide')
        }
    })
})

$(document).on('click', '.unlock', function(e) {
    let id = $(this).parents('tr').attr('data-id')
    let title = $(this).parents('tr').attr('data-title')
    $('#unlock').attr('data-id', id)
    $('#modal-unlock b').html(title)
    $('#modal-unlock').modal('show')
})
$(document).on('click', '#unlock', function(e) {
    let search = $('#search').val()
    let viewas = $('#view-as').val()
    let id = $(this).attr('data-id')
    $(this).attr('disabled', true)
    let formData = new FormData
    formData.append('type', 'unlock_by_id')
    formData.append('work_plan_id', id)
    $.ajax({
        url: `${root}/api/work_plan/unlock`,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(result) {
            // console.log(result.data)
            if (viewas == '') {
                search != '' ? get_data('', '', value) : get_data('', '', '')
            } else {
                search != '' ? get_data(viewas, '', value) : get_data(viewas, '', '')
            }
            customAlert('success', 'Unlock komponen berhasil')
            $('#unlock').attr('disabled', false)
            $('#modal-unlock').modal('hide')
        }
    })
})

function view_excel(status = null) {
    let data = null
    let viewas = $('#view-as').val()
    if (role != 'admin') {
        data = {
            unit_id: unit
        }
        get_excel(data, status)
    } else {
        if (viewas != '') {
            data = {
                unit_id: viewas
            }
            get_excel(data, status)
        } else {
            customAlert('danger', 'Pilih deputi terlebih dahulu')
        }
    }
}

function get_excel(data, status) {
    $.ajax({
        url: `${root}/api/work_plan/excel_data`,
        type: 'GET',
        data: data,
        success: function(result) {
            // console.log(result.data)
            if (result.data.user_program != '') {
                $('#table-excel').empty()
                status == null ? $('#modal-excel').modal('show') : ''
                $.each(result.data.user_program, function(index, value) {
                    rm_program = 0
                    blu_program = 0
                    total_program = 0
                    program = `<tr>
	            		<td class="text-center"><b>${value.program.code_program}</b></td>
	            		<td class="text-truncate" colspan="4"><b>${value.program.description}</b></td>
	            		<td></td>
	            		<td></td>
	            		<td class="text-right" id="rm_program_${value.id}">${rm_program}</td>
	            		<td class="text-right" id="blu_program_${value.id}">${blu_program}</td>
	            		<td class="text-right" id="total_program_${value.id}">${total_program}</td>
	            		<!--<td class="text-right">${rupiah(value.total_budged_user_activity)}</td>-->
	            		<td></td>
	            		<td></td>
	            		<td></td>
	            		<td></td>
	            		<td></td>
	            	</tr>`
                    $('#table-excel').append(program)

                    $.each(value.user_activity, function(index, value) {
                        rm_activity = 0
                        blu_activity = 0
                        total_activity = 0
                        kegiatan = `<tr>
		            		<td class="text-center">${value.activity.code_program}</td>
		            		<td class="text-truncate" colspan="4">${value.activity.description}</td>
		            		<td></td>
		            		<td></td>
		            		<td class="text-right" id="rm_activity_${value.id}"></td>
		            		<td class="text-right" id="blu_activity_${value.id}"></td>
		            		<td class="text-right" id="total_activity_${value.id}"></td>
		            		<!--<td class="text-right">${rupiah(value.total_budged_user_kro)}</td>-->
		            		<td></td>
		            		<td></td>
		            		<td></td>
		            		<td></td>
		            		<td></td>
		            	</tr>`
                        $('#table-excel').append(kegiatan)

                        $.each(value.user_kro, function(index, value) {
                            rm_kro = 0
                            blu_kro = 0
                            total_kro = 0
                            code = value.type_kro == 'pn' ? value.kro.code_kro_pn : value.kro.code_kro_non_pn
                            kro = `<tr>
			            		<td></td>
			            		<td class="text-center">${code}</td>
			            		<td class="text-truncate" colspan="3">${value.kro.kro}</td>
			            		<td class="text-right" id="total_kro_${code}"></td>
			            		<td id="unit_kro_${code}"></td>
			            		<td class="text-right" id="rm_kro_${value.id}"></td>
			            		<td class="text-right" id="blu_kro_${value.id}"></td>
			            		<td class="text-right" id="total_kro_${value.id}"></td>
			            		<!--<td class="text-right">${rupiah(value.total_budged_user_ro)}</td>-->
			            		<td></td>
			            		<td></td>
			            		<td></td>
			            		<td></td>
			            		<td></td>
			            	</tr>`
                            $('#table-excel').append(kro)

                            $.each(value.user_ro, function(index, value) {
                                rm_ro = 0
                                blu_ro = 0
                                total_ro = 0
                                ro = `<tr>
				            		<td></td>
				            		<td></td>
				            		<td class="text-center">${value.code_ro}</td>
				            		<td class="text-truncate" colspan="2">${value.ro}</td>
				            		<td></td>
				            		<td></td>
				            		<td class="text-right" id="rm_ro_${value.id}"></td>
				            		<td class="text-right" id="blu_ro_${value.id}"></td>
				            		<td class="text-right" id="total_ro_${value.id}"></td>
				            		<td></td>
				            		<td></td>
				            		<td></td>
				            		<td></td>
				            		<td></td>
				            	</tr>`
                                $('#table-excel').append(ro)

                                $.each(value.work_plan, function(index, value) {
                                    rm = 0
                                    blu = 0
                                    $.each(value.source_funding, function(index, value) {
                                        value.param_id == 8 ? rm = value.nominal : blu = value.nominal
                                    })
                                    rm_ro += rm
                                    blu_ro += blu
                                    total_ro += rm + blu

                                    first = null
                                    sub_work_plan = ''
                                    $.each(value.sub_work_plan, function(index, value) {
                                        if (first != value.province.id) {
                                            first = value.province.id
                                            sub_work_plan += `<div class="text-truncate">${value.province.province}</div>`
                                            sub_work_plan += `<div class="text-truncate">- ${value.city.city}</div>`
                                        } else {
                                            sub_work_plan += `<div class="text-truncate">- ${value.city.city}</div>`
                                        }
                                    })

                                    pph7 = ''
                                    if(value.pph7_status == 1) {
                                    	pph7 = value.pph7.param
                                    } else {
                                    	pph7 = '<i>Tidak mendukung PP 7 Tahun 2021</i>'
                                    }
                                    
                                    assignment = ''
                                    if(value.assignment_status == 1) {
	                                    $.each(value.assignment, function(index, value) {
	                                    	assignment += `<div class="text-truncate">- ${value.assignment.assignment}</div>`
	                                    })
	                                } else {
	                                	assignment = '<i>Tidak mendukung penugasan</i>'
	                                }
                                    component = `<tr>
					            		<td></td>
					            		<td></td>
					            		<td></td>
					            		<td class="text-center">${value.component_code}</td>
					            		<td class="text-truncate">${value.component_name}</td>
					            		<td class="text-right">${convert(value.total_target)}</td>
					            		<td>${value.unit_target.name}</td>
					            		<td class="text-right">${rm != 0 ? convert(rm) : '0'}</td>
					            		<td class="text-right">${blu != 0 ? convert(blu) : '0'}</td>
					            		<td class="text-right">${convert(value.budged)}</td>
					            		<td class="text-truncate">${sub_work_plan}</td>
					            		<td>${pph7}</td>
					            		<td>${assignment}</td>
					            		<td><pre>${value.description}</pre></td>
					            		<td>${value.user.name}</td>
					            	</tr>`
                                    $('#table-excel').append(component)
                                })
                                $(`#rm_ro_${value.id}`).html(convert(rm_ro))
                                $(`#blu_ro_${value.id}`).html(convert(blu_ro))
                                $(`#total_ro_${value.id}`).html(convert(total_ro))
                                rm_kro += rm_ro
                                blu_kro += blu_ro
                                total_kro += total_ro
                            })
                            $(`#rm_kro_${value.id}`).html(convert(rm_kro))
                            $(`#blu_kro_${value.id}`).html(convert(blu_kro))
                            $(`#total_kro_${value.id}`).html(convert(total_kro))
                            rm_activity += rm_kro
                            blu_activity += blu_kro
                            total_activity += total_kro
                        })
                        $(`#rm_activity_${value.id}`).html(convert(rm_activity))
                        $(`#blu_activity_${value.id}`).html(convert(blu_activity))
                        $(`#total_activity_${value.id}`).html(convert(total_activity))
                        rm_program += rm_activity
                        blu_program += blu_activity
                        total_program += total_activity
                    })
                    $(`#rm_program_${value.id}`).html(convert(rm_program))
                    $(`#blu_program_${value.id}`).html(convert(blu_program))
                    $(`#total_program_${value.id}`).html(convert(total_program))
                })
                status != null ? exportTableToExcel('excel', 'Status & Rekap Anggaran') : ''
            } else {
                customAlert('danger', 'Data tidak ditemukan')
            }
        },
        error: function(xhr) {
            console.log(xhr)
        }
    })
}
