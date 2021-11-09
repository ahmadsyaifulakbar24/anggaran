$.ajax({
    url: `${root}/api/province`,
    type: 'GET',
    success: function(result) {
        // console.log(result.data)
        $.each(result.data, function(index, value) {
            append = `<option value="${value.id}">${value.province}</option>`
            $('#province_id').append(append)
        })
    },
    error: function(xhr) {
        console.log(xhr)
    }
})

$.ajax({
    url: `${root}/api/param/indicator`,
    type: 'GET',
    success: function(result) {
        // console.log(result.data)
        $.each(result.data, function(index, value) {
            append = `<option value="${value.id}">${value.param}</option>`
            $('#indicator_id').append(append)
        })
    },
    error: function(xhr) {
        console.log(xhr)
    }
})

$.ajax({
    url: `${root}/api/param/pph7`,
    type: 'GET',
    success: function(result) {
        // console.log(result.data)
        $.each(result.data, function(index, value) {
            append = `<option value="${value.id}">${value.param}</option>`
            $('#pp7_id').append(append)
        })
    },
    error: function(xhr) {
        console.log(xhr)
    }
})

$.ajax({
    url: `${root}/api/param/assignment`,
    type: 'GET',
    success: function(result) {
        // console.log(result.data)
        $.each(result.data, function(index, value) {
            append = `<option value="${value.id}">${value.param}</option>`
            $('#assignment_id').append(append)
        })
    },
    error: function(xhr) {
        console.log(xhr)
    }
})

$('#get_by_province').submit(function(e) {
    e.preventDefault()
    let value = $('#province_id').val()
    $('#province-table').show()
    get_by_province(value)
})

$('#get_by_indicator').submit(function(e) {
    e.preventDefault()
    let value = $('#indicator_id').val()
    $('#indicator-table').show()
    get_by_indicator(value)
})

$('#get_by_pp7').submit(function(e) {
    e.preventDefault()
    let value = $('#pp7_id').val()
    $('#pp7-table').show()
    get_by_pp7(value)
})

$('#get_by_assignment').submit(function(e) {
    e.preventDefault()
    let value = $('#assignment_id').val()
    $('#assignment-table').show()
    get_by_assignment(value)
})

function get_by_province(province_id) {
    $('#province').empty()
    $.ajax({
        url: `${api_url}/work_plan/total_budged_by_province`,
        type: 'GET',
        data: {
            province_id,
            // unit_id: unit,
            // user_id: user
        },
        success: function(result) {
            // console.log(result.data)
            let value = result.data
            $('#total-province').html(`Total Komponen: ${convert(value.total_work_plan)}`)
            $('#total-province-budged').html(`Total Anggaran ACC: ${rupiah(value.total_budged)}`)
        }
    })
    $.ajax({
        url: `${api_url}/work_plan/get_by_province`,
        type: 'GET',
        data: {
            province_id,
            // unit_id: unit,
            // user_id: user,
            // limit
        },
        success: function(result) {
            // console.log(result.data)
            if (result.data != 0) {
                $.each(result.data, function(index, value) {
                    first = null
                    sub_work_plan = ''
                    $.each(value.work_plan.sub_work_plan, function(index, value) {
                        if (first != value.province.id) {
                            first = value.province.id
                            sub_work_plan += `<div>${value.province.province}</div>`
                            sub_work_plan += `<div>- ${value.city.city}</div>`
                        } else {
                            sub_work_plan += `<div>- ${value.city.city}</div>`
                        }
                    })
                    append = `<tr>
	            		<td class="text-center">${index + 1}.</td>
	            		<td>${value.work_plan.all_kode}</td>
	            		<td>${value.work_plan.component_name}</td>
	            		<td>${rupiah(value.work_plan.budged)}</td>
	            		<td class="text-truncate">${convert(value.work_plan.total_target)} ${value.work_plan.unit_target.name}</td>
	            		<td class="text-truncate">${sub_work_plan}</td>
	            	</tr>`
                    $('#province').append(append)
                })
            } else {
                append = `<tr>
	        		<td colspan="10" class="text-center py-5">Data tidak ditemukan.</td>
        		</tr>`
                $('#province').append(append)
            }
        },
        error: function(xhr) {
            // console.log(xhr)
        }
    })
}

function get_by_indicator(indicator_id) {
    $('#indicator').empty()
    $.ajax({
        url: `${api_url}/work_plan/total_budged_by_indicator_target`,
        type: 'GET',
        data: {
            target_id: 4,
            indicator_id,
            // unit_id: unit,
            // user_id: user
        },
        success: function(result) {
            // console.log(result.data)
            let value = result.data
            $('#total-indicator').html(`Total Komponen: ${convert(value.total_work_plan)}`)
            $('#total-indicator-budged').html(`Total Anggaran ACC: ${rupiah(value.total_budged)}`)
        }
    })
    $.ajax({
        url: `${api_url}/work_plan/get_by_indicator_target`,
        type: 'GET',
        data: {
            target_id: 4,
            indicator_id,
            // unit_id: unit,
            // user_id: user,
            // limit
        },
        success: function(result) {
            // console.log(result.data)
            if (result.data != 0) {
                $.each(result.data, function(index, value) {
                    first = null
                    sub_work_plan = ''
                    $.each(value.sub_work_plan, function(index, value) {
                        if (first != value.province.id) {
                            first = value.province.id
                            sub_work_plan += `<div>${value.province.province}</div>`
                            sub_work_plan += `<div>- ${value.city.city}</div>`
                        } else {
                            sub_work_plan += `<div>- ${value.city.city}</div>`
                        }
                    })
                    append = `<tr>
	            		<td class="text-center">${index + 1}.</td>
	            		<td>${value.all_kode}</td>
	            		<td>${value.component_name}</td>
	            		<td>${rupiah(value.budged)}</td>
	            		<td class="text-truncate">${convert(value.total_target)} ${value.unit_target.name}</td>
	            		<td class="text-truncate">${sub_work_plan}</td>
	            	</tr>`
                    $('#indicator').append(append)
                })
            } else {
                append = `<tr>
	        		<td colspan="10" class="text-center py-5">Data tidak ditemukan.</td>
        		</tr>`
                $('#indicator').append(append)
            }
        },
        error: function(xhr) {
            // console.log(xhr)
        }
    })
}

function get_by_pp7(pph7_id) {
    $('#pp7').empty()
    $.ajax({
        url: `${api_url}/work_plan/total_budged_by_pph7`,
        type: 'GET',
        data: {
            pph7_id,
            // unit_id: unit,
            // user_id: user
        },
        success: function(result) {
            // console.log(result.data)
            let value = result.data
            $('#total-pp7').html(`Total Komponen: ${convert(value.total_work_plan)}`)
            $('#total-pp7-budged').html(`Total Anggaran ACC: ${rupiah(value.total_budged)}`)
        }
    })
    $.ajax({
        url: `${api_url}/work_plan/get_by_pph7`,
        type: 'GET',
        data: {
            pph7_id,
            // unit_id: unit,
            // user_id: user,
            // limit
        },
        success: function(result) {
            // console.log(result.data)
            if (result.data != 0) {
                $.each(result.data, function(index, value) {
                    first = null
                    sub_work_plan = ''
                    $.each(value.sub_work_plan, function(index, value) {
                        if (first != value.province.id) {
                            first = value.province.id
                            sub_work_plan += `<div>${value.province.province}</div>`
                            sub_work_plan += `<div>- ${value.city.city}</div>`
                        } else {
                            sub_work_plan += `<div>- ${value.city.city}</div>`
                        }
                    })
                    append = `<tr>
	            		<td class="text-center">${index + 1}.</td>
	            		<td>${value.all_kode}</td>
	            		<td>${value.component_name}</td>
	            		<td>${rupiah(value.budged)}</td>
	            		<td class="text-truncate">${convert(value.total_target)} ${value.unit_target.name}</td>
	            		<td class="text-truncate">${sub_work_plan}</td>
	            	</tr>`
                    $('#pp7').append(append)
                })
            } else {
                append = `<tr>
	        		<td colspan="10" class="text-center py-5">Data tidak ditemukan.</td>
        		</tr>`
                $('#pp7').append(append)
            }
        },
        error: function(xhr) {
            // console.log(xhr)
        }
    })
}

function get_by_assignment(assignment_id) {
    $('#assignment').empty()
    $.ajax({
        url: `${api_url}/work_plan/total_budged_by_assignment`,
        type: 'GET',
        data: {
            assignment_id
            // unit_id: unit,
            // user_id: user
        },
        success: function(result) {
            // console.log(result.data)
            let value = result.data
            $('#total-assignment').html(`Total Komponen: ${convert(value.total_work_plan)}`)
            $('#total-assignment-budged').html(`Total Anggaran ACC: ${rupiah(value.total_budged)}`)
        }
    })
    $.ajax({
        url: `${api_url}/work_plan/get_by_assignment`,
        type: 'GET',
        data: {
            assignment_id,
            // unit_id: unit,
            // user_id: user,
            // limit
        },
        success: function(result) {
            // console.log(result.data)
            if (result.data != 0) {
                $.each(result.data, function(index, value) {
                    first = null
                    sub_work_plan = ''
                    $.each(value.work_plan.sub_work_plan, function(index, value) {
                        if (first != value.province.id) {
                            first = value.province.id
                            sub_work_plan += `<div>${value.province.province}</div>`
                            sub_work_plan += `<div>- ${value.city.city}</div>`
                        } else {
                            sub_work_plan += `<div>- ${value.city.city}</div>`
                        }
                    })
                    append = `<tr>
	            		<td class="text-center">${index + 1}.</td>
	            		<td>${value.work_plan.all_kode}</td>
	            		<td>${value.work_plan.component_name}</td>
	            		<td>${rupiah(value.work_plan.budged)}</td>
	            		<td class="text-truncate">${convert(value.work_plan.total_target)} ${value.work_plan.unit_target.name}</td>
	            		<td class="text-truncate">${sub_work_plan}</td>
	            	</tr>`
                    $('#assignment').append(append)
                })
            } else {
                append = `<tr>
	        		<td colspan="10" class="text-center py-5">Data tidak ditemukan.</td>
        		</tr>`
                $('#assignment').append(append)
            }
        },
        error: function(xhr) {
            // console.log(xhr)
        }
    })
}

$.ajax({
    url: `${api_url}/dashboard/budget_statistics`,
    type: 'GET',
    success: function(result) {
        // console.log(result.data)
        $.each(result.data, function(index, value) {
            append = `<tr>
        		<td class="text-center">${index + 1}.</td>
        		<td>${value.name}</td>
        		<td>${rupiah(value.budged_acc)}</td>
        		<td>${rupiah(value.budged_pending)}</td>
        	</tr>`
            $.each(value.budged_asdep, function(index, value) {
                append += `<tr>
	        		<td class="text-center"></td>
	        		<td>- ${value.name}</td>
	        		<td>${rupiah(value.budged_acc)}</td>
	        		<td>${rupiah(value.budged_pending)}</td>
	        	</tr>`
            })
            $('#statistic').append(append)
        })
    }
})

$('#lock').click(function() {
	$(this).attr('disabled', true)
	let formData = new FormData
	formData.append('type', 'lock_all')
    $.ajax({
        url: `${root}/api/work_plan/lock`,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(result) {
            // console.log(result.data)
            customAlert('success', 'Lock komponen berhasil')
            $('#lock').attr('disabled', false)
            $('#modal-lock').modal('hide')
        }
    })
})

$('#unlock').click(function() {
	$(this).attr('disabled', true)
	let formData = new FormData
	formData.append('type', 'unlock_all')
    $.ajax({
        url: `${root}/api/work_plan/unlock`,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(result) {
            // console.log(result.data)
            customAlert('success', 'Unlock komponen berhasil')
            $('#unlock').attr('disabled', false)
            $('#modal-unlock').modal('hide')
        }
    })
})

