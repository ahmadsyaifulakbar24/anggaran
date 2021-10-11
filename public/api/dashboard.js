$.ajax({
    url: `${root}/api/province`,
    type: 'GET',
    success: function(result) {
        // console.log(result.data)
        $.each(result.data, function(index, value) {
            append = `<option value="${value.id}">${value.province}</option>`
            $('#province_id').append(append)
        })
    }
})

$('#get_by_province').submit(function(e) {
	e.preventDefault()
    let value = $('#province_id').val()
    $('#province-table').show()
    get_by_province(value)
})

function get_by_province(province_id) {
    $('#province').empty()
    $.ajax({
        url: `${api_url}/work_plan/total_budged_by_province`,
        type: 'GET',
        data: {
            province_id,
            // user_id: user
        },
        success: function(result) {
        	console.log(result.data)
        	let value = result.data
        	$('#total-province').html(`Total Komponen: ${convert(value.total_work_plan)}`)
        	$('#total-province-budged').html(`Total Anggaran: ${rupiah(value.total_budged)}`)
        }
    })
    $.ajax({
        url: `${api_url}/work_plan/get_by_province`,
        type: 'GET',
        data: {
            province_id,
            // user_id: user
        },
        success: function(result) {
            // console.log(result.data)
            if (result.data != 0) {
                $.each(result.data, function(index, value) {
                    sub_work_plan = ''
                    $.each(value.work_plan.sub_work_plan, function(index, value) {
                        sub_work_plan += `<div>- ${value.province.province}, ${value.city.city}<div>`
                    })
                    append = `<tr>
	            		<td class="text-center">${index + 1}.</td>
	            		<td>${value.work_plan.component_code}</td>
	            		<td>${value.work_plan.component_name}</td>
	            		<td>${convert(value.work_plan.budged)}</td>
	            		<td>${convert(value.work_plan.total_target)}</td>
	            		<td>${value.work_plan.unit_target.name}</td>
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

$.ajax({
    url: `${root}/api/param/indicator`,
    type: 'GET',
    success: function(result) {
        // console.log(result.data)
        $.each(result.data, function(index, value) {
            append = `<option value="${value.id}">${value.param}</option>`
            $('#indicator_id').append(append)
        })
    }
})

$('#get_by_indicator').submit(function(e) {
	e.preventDefault()
    let value = $('#indicator_id').val()
    $('#indicator-table').show()
    get_by_indicator(value)
})

function get_by_indicator(indicator_id) {
    $('#indicator').empty()
    $.ajax({
        url: `${api_url}/work_plan/total_budged_by_indicator_target`,
        type: 'GET',
        data: {
            target_id: 4,
            indicator_id
        },
        success: function(result) {
        	// console.log(result.data)
        	let value = result.data
        	$('#total-indicator').html(`Total Komponen: ${convert(value.total_work_plan)}`)
        	$('#total-indicator-budged').html(`Total Anggaran: ${rupiah(value.total_budged)}`)
        }
    })
    $.ajax({
        url: `${api_url}/work_plan/get_by_indicator_target`,
        type: 'GET',
        data: {
            target_id: 4,
            indicator_id
        },
        success: function(result) {
            // console.log(result.data)
            if (result.data != 0) {
                $.each(result.data, function(index, value) {
                    sub_work_plan = ''
                    $.each(value.sub_work_plan, function(index, value) {
                        sub_work_plan += `<div>- ${value.province.province}, ${value.city.city}<div>`
                    })
                    append = `<tr>
	            		<td class="text-center">${index + 1}.</td>
	            		<td>${value.component_code}</td>
	            		<td>${value.component_name}</td>
	            		<td>${convert(value.budged)}</td>
	            		<td>${convert(value.total_target)}</td>
	            		<td>${value.unit_target.name}</td>
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
	        		<td>${value.name}</td>
	        		<td>${rupiah(value.budged_acc)}</td>
	        		<td>${rupiah(value.budged_pending)}</td>
	        	</tr>`
            })
            $('#statistic').append(append)
        })
    }
})

// $.ajax({
//     url: `${api_url}/dashboard/budget_statistics`,
//     type: 'GET',
//     success: function(result) {
        // console.log(result.data)
//         let length = result.data.length
//         if (role != 'asdep') {
//             $.each(result.data, function(index, value) {
//                 asdep = ''
//                 $.each(value.budged_asdep, function(indexs, values) {
//                     asdep += `<div class="col-md-6 col-xl-4 mb-3">
// 						<div class="card card-custom">
// 							<div class="card-header">
// 								<h6 class="mb-0">${values.name}</h6>
// 							</div>
// 							<div class="table-responsive py-3">
// 								<table class="w-100">
// 									<tr>
// 										<td class="text-truncate">Anggaran ACC</td>
// 										<td class="px-2">:</td>
// 										<td class="text-right">${rupiah(values.budged_acc)}</td>
// 									</tr>
// 									<tr>
// 										<td class="text-truncate">Anggaran Pengajuan</td>
// 										<td class="px-2">:</td>
// 										<td class="text-right">${rupiah(values.budged_pending)}</td>
// 									</tr>
// 								</table>
// 							</div>
// 						</div>
// 					</div>`
//                 })
//                 append = `<section class="${(index + 1) < length ? 'border-bottom' : ''} pb-4 mb-4" id="deputi${value.id}">
// 					<h5>${value.name}</h5>
// 					<table class="w-25">
// 						<tr>
// 							<td class="text-truncate">- Total Anggaran ACC</td>
// 							<td class="px-2">:</td>
// 							<td class="text-right">${rupiah(value.budged_acc)}</td>
// 						</tr>
// 						<tr>
// 							<td class="text-truncate">- Total Anggaran Pengajuan</td>
// 							<td class="px-2">:</td>
// 							<td class="text-right">${rupiah(value.budged_pending)}</td>
// 						</tr>
// 					</table>
// 					<div class="row mt-3">
// 						${asdep}
// 					</div>
// 				</section>`
//                 $('#data').append(append)
//             })
//         } else {
//             $.each(result.data, function(index, value) {
//                 append = `<div class="col-md-6 col-xl-4 mb-3">
// 					<div class="card card-custom">
// 						<div class="card-header">
// 							<h6 class="mb-0">${value.name}</h6>
// 						</div>
// 						<div class="table-responsive py-3">
// 							<table class="w-100">
// 								<tr>
// 									<td class="text-truncate">Anggaran ACC</td>
// 									<td class="px-2">:</td>
// 									<td class="text-right">${rupiah(value.budged_acc)}</td>
// 								</tr>
// 								<tr>
// 									<td class="text-truncate">Anggaran Pengajuan</td>
// 									<td class="px-2">:</td>
// 									<td class="text-right">${rupiah(value.budged_pending)}</td>
// 								</tr>
// 							</table>
// 						</div>
// 					</div>
// 				</div>`
//                 $('#data').append(append)
//             })
//         }
//     }
// })
