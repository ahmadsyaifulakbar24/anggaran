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
        $('#target').html(`${value.total_target} ${value.unit_target}`)
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
            check = `<i class="mdi ${value.read == 0 ? 'mdi-check text-secondary' : 'mdi-check-all text-primary'} pr-0"></i>`
            append = `<div class="d-flex align-items-start mb-3">
				<img src="https://ui-avatars.com/api/?name=${value.user.name}" class="rounded-circle mb-1" width="30" alt="">
				<div class="ml-3">
					<div class="font-weight-bold">${value.user.name}</div>
					<pre class="mb-0">${value.comment}</pre>
					<small class="pr-1 text-secondary">${tanggal(value.created_at)}</small>
					${value.user.id == user ? check : ''}
				</div>
			</div>`
            $('#comments').prepend(append)
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
            let check = `<i class="mdi mdi-check"></i>`
            let append = `<div class="d-flex align-items-start mb-3">
				<img src="https://ui-avatars.com/api/?name=${value.user.name}" class="rounded-circle mb-1" width="30" alt="">
				<div class="ml-3">
					<div class="font-weight-bold">${value.user.name}</div>
					<pre class="mb-0">${value.comment}</pre>
					<small class="pr-1 text-secondary">${tanggal(value.created_at)}</small>
					${value.user.id == user ? check : ''}
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
