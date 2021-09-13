$.ajax({
    url: `${api_url}/notification`,
    type: 'GET',
    success: function(result) {
        // console.log(result.data)
        let latest = [],
            oldest = []
        if (result.data.length > 0) {
	        $.each(result.data, function(index, value) {
	            value.read == 0 ? latest.push(value) : oldest.push(value)
	            append = `<div class="d-flex text-dark p-2 notification ${value.read != 0 ? 'read' : ''}" data-id="${value.id}" role="button">
					<div class="mt-1">
						<img src="https://ui-avatars.com/api/?name=${value.created_by.name}}}" class="avatar rounded-circle" width="40">
					</div>
					<div class="ml-3">
						<div class="font-weight-bold">${value.created_by.name}</div>
						<div>${notification_status(value.history.status)} <i>${value.work_plan.title}.</i></div>
						<small class="text-secondary">${tanggal(value.created_at)}</small>
					</div>
				</div>`
	            value.read == 0 ? $('#latest').append(append) : $('#oldest').append(append)
	        })
	        if (latest.length > 0) {
	            $('#latest').show()
	            $('h6').show()
	        }
	        if (oldest.length == 0) {
	            $('#oldest h6').hide()
	        }
        } else {
        	append = `<div class="text-center" id="empty">
				<div class="d-flex flex-column justify-content-center align-items-center pt-5">
					<i class="mdi mdi-48px mdi-bell-outline pr-0"></i>
					<h6>Tidak ada notifikasi</h6>
				</div>
			</div>`
        	$('#oldest').html(append)
        }
    }
})

$(document).on('click', '.notification', function() {
    let id = $(this).attr('data-id')
    if (!$(this).hasClass('read')) {
	    $.ajax({
	        url: `${api_url}/notification/read/${id}`,
	        type: 'PATCH',
	        success: function(result) {
	            // console.log(result.data)
	            location.href = `${root}/rancangan-anggaran/${id}`
	        }
	    })
	} else {
		location.href = `${root}/rancangan-anggaran/${id}`
	}
})
