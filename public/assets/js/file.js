let file1 = null
let file2 = null

$(document).on('change', 'input[type="file"]', function(e) {
    let val = $(this).get(0).files[0]
    let ext = val.name.split('.').pop()
    if (val.size <= 20000000) { //20MB
    	if ($(this).hasClass('file1')) {
	        file1 = val
	        addStagingFile(val.name, ext, 'file1')
	        $(this).parents('.file-group1').hide()
	    } else {
	        file2 = val
	        addStagingFile(val.name, ext, 'file2')
	        $(this).parents('.file-group2').hide()
	    }
        $(this).removeClass('is-invalid')
    } else {
        $(this).addClass('is-invalid')
        $(this).siblings('.invalid-feedback').html('Ukuran file maksimal 20MB')
    }
})

function addStagingFile(name, type, file) {
    let append = `<div class="file-group">
		<div class="staging-file d-flex align-items-center border rounded-top rounded-bottom pr-0">
			<div class="d-flex align-items-center text-truncate w-100">
				<i class="mdi ${icon(type)} mdi-18px px-2"></i>
				<small class="text-truncate" title="${name}">${name}</small>
			</div>
			<i class="mdi mdi-close mdi-staging ml-auto pl-2 py-2 ${file}" role="button"></i>
		</div>
	</div>`
	$(`#form-${file}`).append(append)
}

$(document).on('click', '.mdi-staging', function() {
    $(this).parents('.file-group').remove()
	if ($(this).hasClass('file1')) {
	    file1 = null
	    $('#file1').val('')
	    $('.file-group1').show()
	} else {
	    file2 = null
	    $('#file2').val('')
	    $('.file-group2').show()
	}
})
