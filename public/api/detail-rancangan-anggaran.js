$.ajax({
    url: `${root}/api/work_plan`,
    type: 'GET',
    data: { id },
    success: function(result) {
        // console.log(result.data)
        let value = result.data
        $('#code').append(`${value.program.parent.code_program}/`)
        $('#code').append(`${value.program.code_program}/`)
        $('#code').append(`${value.type_kro == 'pn' ? value.kro.code_kro_pn : value.kro.code_kro_non_pn}/`)
        $('#code').append(`${value.ro.code_ro}/`)
        $('#code').append(`${value.component_code}`)
        $('#component_name').html(value.component_name)
        $('#target').html(`${value.total_target} ${value.unit_target.name}`)
        $('#budged').html(convert(value.budged))
        $('#province').html(value.province.id == 1 ? value.province.province : 'Provinsi ' + value.province.province)
        $.each(result.data.sub_work_plan, function(index, value) {
            $('#city').append(`<div>- ${value.city.city}</div>`)
        })
        $('#detail').html(value.detail)
        $('#description').html(value.description)

        $.each(result.data.file_manager, function(index, value) {
            add_file(value.id, value.file, value.type.id)
            check_max(value.type.id)
        })

        $.each(result.data.comment, function(index, value) {
            // check = `<i class="mdi ${value.read == 0 ? 'mdi-check text-secondary' : 'mdi-check-all text-primary'} pr-0"></i>`
            append = `<div class="d-flex align-items-start mb-3">
				<img src="https://ui-avatars.com/api/?name=${value.user.name}" class="rounded-circle mb-1" width="30" alt="">
				<div class="ml-3">
					<div class="font-weight-bold">${value.user.name}</div>
					<pre class="mb-0" style="white-space: pre-wrap;">${value.comment}</pre>
					<small class="pr-1 text-secondary">${tanggal(value.created_at)}</small>
					${value.user.id == user ? '' : ''}
				</div>
			</div>`
            $('#comments').prepend(append)
        })

        $.each(result.data.history, function(index, value) {
            // console.log(value)
            border = (index != 0) ? 'border-right' : ''
            append = `<div class="row">
                <div class="col-auto text-center flex-column d-sm-flex px-1">
                    <div class="m-2">
                        <i class="mdi mdi-checkbox-blank-circle mdi-18px pr-0" style="color:#dee2e6"></i>
                    </div>
                    <div class="row" style="height:45px;margin:-15px">
                        <div class="col ${border}">&nbsp;</div>
                        <div class="col">&nbsp;</div>
                    </div>
                </div>
                <div class="col col-xl-10 pl-0" style="padding-top:11px">
                    <div class="d-flex flex-column align-items-start">
                        <small class="text-secondary">${tanggal(value.created_at)}</small>
                        <small class="text-capitalize"><b>${value.action_by.name}</b> ${notification_status(value.status)}</small>
                    </div>
                </div>
            </div>`
            $('#history').prepend(append)
        })

        if (value.user.id != user) {
            $('.upload').remove()
            $('.delete').remove()
        }
    },
    error: function(xhr) {
        // console.log(xhr)
        let err = xhr.responseJSON.errors
        if (err.id) history.back()
    }
})

$('#form-comment').submit(function(e) {
    e.preventDefault()
    $('.is-invalid').removeClass('.is-invalid')
    $('#submit-comment').attr('disabled', true)
    let formData = new FormData()
    formData.append('work_plan_id', id)
    formData.append('comment', $('#comment').val())
    $.ajax({
        url: `${root}/api/comment`,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(result) {
            // console.log(result.data)
            let value = result.data
            // let check = `<i class="mdi mdi-check"></i>`
            let append = `<div class="d-flex align-items-start mb-3">
				<img src="https://ui-avatars.com/api/?name=${value.user.name}" class="rounded-circle mb-1" width="30" alt="">
				<div class="ml-3">
					<div class="font-weight-bold">${value.user.name}</div>
					<pre class="mb-0">${value.comment}</pre>
					<small class="pr-1 text-secondary">${tanggal(value.created_at)}</small>
					${value.user.id == user ? '' : ''}
				</div>
			</div>`
            $('#comments').prepend(append)
        },
        error: function(xhr) {
            // console.log(xhr)
            let err = xhr.responseJSON.errors
            if (err.comment) {
                $('#comment').addClass('is-invalid')
                $('#comment').siblings('.invalid-feedback').html('Tulis komentar terlebih dahulu.')
            }
        },
        complete: function() {
            $('#comment').val('')
            $('#submit-comment').attr('disabled', false)
        }
    })
})

function auto_grow(element) {
	element.value != '' ? $('#submit-comment').attr('disabled', false) : $('#submit-comment').attr('disabled', true)
    element.style.height = "0px";
    element.style.height = (element.scrollHeight)+"px";
}
