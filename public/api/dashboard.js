$.ajax({
    url: `${api_url}/dashboard/budget_statistics`,
    type: 'GET',
    success: function(result) {
    	// console.log(result.data)
        let length = result.data.length
        if (role != 'asdep') {
	        $.each(result.data, function(index, value) {
	            asdep = ''
                $.each(value.budged_asdep, function(indexs, values) {
                    asdep += `<div class="col-md-6 col-xl-4 mb-3">
						<div class="card card-custom">
							<div class="card-header">
								<h6 class="mb-0">${values.name}</h6>
							</div>
							<div class="table-responsive py-3">
								<table class="w-100">
									<tr>
										<td class="text-truncate">Anggaran ACC</td>
										<td class="px-2">:</td>
										<td class="text-right">${rupiah(values.budged_acc)}</td>
									</tr>
									<tr>
										<td class="text-truncate">Anggaran Pengajuan</td>
										<td class="px-2">:</td>
										<td class="text-right">${rupiah(values.budged_pending)}</td>
									</tr>
								</table>
							</div>
						</div>
					</div>`
                })
                append = `<section class="${(index + 1) < length ? 'border-bottom' : ''} pb-4 mb-4" id="deputi${value.id}">
					<h5>${value.name}</h5>
					<table class="w-25">
						<tr>
							<td class="text-truncate">- Total Anggaran ACC</td>
							<td class="px-2">:</td>
							<td class="text-right">${rupiah(value.budged_acc)}</td>
						</tr>
						<tr>
							<td class="text-truncate">- Total Anggaran Pengajuan</td>
							<td class="px-2">:</td>
							<td class="text-right">${rupiah(value.budged_pending)}</td>
						</tr>
					</table>
					<div class="row mt-3">
						${asdep}
					</div>
				</section>`
	            $('#data').append(append)
	        })
        } else {
            $.each(result.data, function(index, value) {
                append = `<div class="col-md-6 col-xl-4 mb-3">
					<div class="card card-custom">
						<div class="card-header">
							<h6 class="mb-0">${value.name}</h6>
						</div>
						<div class="table-responsive py-3">
							<table class="w-100">
								<tr>
									<td class="text-truncate">Anggaran ACC</td>
									<td class="px-2">:</td>
									<td class="text-right">${rupiah(value.budged_acc)}</td>
								</tr>
								<tr>
									<td class="text-truncate">Anggaran Pengajuan</td>
									<td class="px-2">:</td>
									<td class="text-right">${rupiah(value.budged_pending)}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>`
	            $('#data').append(append)
            })
        }
    }
})
