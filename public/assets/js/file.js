$(document).on('click', '.upload', function(e) {
    $('#file').attr('data-type', $(this).attr('data-type'))
    $('#file').attr('data-category',  $(this).attr('data-category'))
    $('#file').val('')
    $('#file').click()
})

$(document).on('change', 'input[type=file]', function(e) {
    let file = $(this).get(0).files[0]
    let type_id = $(this).attr('data-type')
    let category = $(this).attr('data-category')
    if (file.type == "application/msword" || // .doc
        file.type == "application/vnd.ms-excel" || // .xls
        file.type == "application/vnd.ms-powerpoint" || // .ppt
        file.type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" || // .docx
        file.type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || // .xlsx
        file.type == "application/vnd.openxmlformats-officedocument.presentationml.presentation" || // .pptx
        file.type == "application/pdf") { // .pdf
    	if (type_id == 1 || type_id == 2) { // TOR & RAB
	        if (file.size <= 50000000) { // 50 MB
	        	if (category == 'work_plan') {
	        		upload_file(file, type_id, id, category)
	        	} else {
	        		upload_file(file, type_id, user_ro_id, category)
	        	}
	        } else {
	            customAlert('danger', 'Ukuran file maksimal 50 MB')
	        }
	    } else { // Lainnya / RO
    		upload_file(file, type_id, id, category)
	    }
    } else {
        customAlert('danger', 'Format file Word/Excel/PowerPoint/PDF')
    }
})

function upload_file(file, type_id, id, category) {
    let formData = new FormData()
    category == 'work_plan' ? formData.append('work_plan_id', id) : formData.append('user_ro_id', id)
    formData.append('file', file)
    formData.append('type_id', type_id)
    formData.append('category', category)
    $.ajax({
        url: `${root}/api/work_plan/upload_file`,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(result) {
            // console.log(result.data)
            let value = result.data
            add_file(value.id, value.file, value.type.id)
            customAlert('success', 'File berhasil diupload')
            check_max(value.type.id)
        },
        error: function(xhr) {
            console.log(xhr)
         //    if (xhr.status == 413) customAlert('warning', xhr.statusText)
        	// if (xhr.status == 422) customAlert('danger', xhr.responseJSON.errors.file[0])
        }
    })
}

function add_file(id, title, type_id) {
    let append = `<div class="card mb-2" id="file-${id}" data-id="${id}" data-title="${title.split('/').pop()}" data-type="${type_id}">
		<div class="d-flex align-items-center">
			<a href="${title}" target="_blank" class="d-flex align-items-center text-truncate my-3 ml-3" style="width: 90%">
				<i class="mdi mdi-24px ${icon(title.split('.').pop())} text-dark"></i>
				<div class="text-primary text-truncate" title="${title.split('/').pop()}">${title.split('/').pop()}</div>
			</a>
			<i class="mdi mdi-24px mdi-trash-can-outline ml-auto delete-file px-3" role="button"></i>
		</div>
	</div>`
    $(`#type-${type_id}`).append(append)
}

function check_max(type_id) {
    if (type_id == 1 || type_id == 2) {
        if ($(`#type-${type_id}`).children('div').length < 2) {
            $(`.upload[data-type=${type_id}]`).show()
        } else {
            $(`.upload[data-type=${type_id}]`).hide()
        }
    } else if (type_id == 3) {
        if ($(`#type-${type_id}`).children('div').length < 5) {
            $(`.upload[data-type=${type_id}]`).show()
        } else {
            $(`.upload[data-type=${type_id}]`).hide()
        }
    }
}

$(document).on('click', '.delete-file', function(e) {
    let id = $(this).parents('.card').attr('data-id')
    let title = $(this).parents('.card').attr('data-title')
    let type = $(this).parents('.card').attr('data-type')
    $('#modal-delete-file b').html(title)
    $('#delete-file').attr('data-id', id)
    $('#delete-file').attr('data-type', type)
    $('#modal-delete-file').modal('show')
})

$(document).on('click', '#delete-file', function(e) {
    let id = $(this).attr('data-id')
    let type = $(this).attr('data-type')
    $(this).attr('disabled', true)
    $.ajax({
        url: `${root}/api/work_plan/delete_file/${id}`,
        type: 'DELETE',
        success: function(result) {
            // console.log(result.data)
            $(`#file-${id}`).remove()
            $('#modal-delete-file').modal('hide')
            customAlert('trash', 'File berhasil dihapus')
            check_max(type)
        },
        complete: function() {
            $('#delete-file').attr('disabled', false)
        }
    })
})
