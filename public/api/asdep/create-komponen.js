$.ajax({
    url: `${root}/api/user_ro/fetch`,
    type: 'GET',
    data: {
        user_ro_id
    },
    success: function(result) {
        // console.log(result.data)
        get_data()
    },
    error: function(xhr) {
        // console.log(xhr)
        let err = xhr.responseJSON.errors
        if (err.user_ro_id) history.back()
    }
})

function get_data() {
    $.ajax({
        url: `${root}/api/unit_target`,
        type: 'GET',
        success: function(result) {
            // console.log(result.data)
            $.each(result.data, function(index, value) {
                append = `<option value="${value.id}">${value.name}</option>`
                $('#unit_target').append(append)
            })
        },
        error: function(xhr) {
            console.log(xhr)
        }
    })
    $.ajax({
        url: `${root}/api/province`,
        type: 'GET',
        success: function(result) {
            // console.log(result.data)
            $.each(result.data, function(index, value) {
                append = `<option value="${value.id}">${value.province}</option>`
                $('.province_id').append(append)
            })
            $province = result.data
            $status_location = null
            add_province()
        },
        error: function(xhr) {
            console.log(xhr)
        }
    })
    $.ajax({
        url: `${root}/api/param/sources_of_funding`,
        type: 'GET',
        success: function(result) {
            // console.log(result.data)
            $sources_funding = result.data
            add_sources_funding()
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
        url: `${root}/api/param/target`,
        type: 'GET',
        success: function(result) {
            // console.log(result.data)
            $.each(result.data, function(index, value) {
                append = `<option value="${value.id}" selected>${value.param}</option>`
                $('#target_id').append(append)
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
                append = `<div class="form-check">
					<input class="form-check-input" type="checkbox" name="assignment" value="${value.id}" id="assignment${value.id}" role="button">
					<label class="form-check-label" for="assignment${value.id}" role="button">${value.param}</label>
				</div>`
                $('#assignment').append(append)
            })
        },
        error: function(xhr) {
            console.log(xhr)
        }
    })
}

$(document).on('change', '.province_id', function() {
    $(this).parents('.location').find('.city').empty()
    let location_id = $(this).parents('.location').attr('data-id')
    let province_id = $(this).val()
    add_city(location_id, province_id)
    // console.clear()
    // console.log(location_id)
    // console.log(province_id)
})

function add_province() {
    let length = $('.location').length
    let option = `<option value="" disabled selected>Pilih Lokasi</option>`
    $.each($province, function(index, value) {
        option += `<option value="${value.id}">${value.province}</option>`
    })
    append = `<div class="location mb-2" data-id=${length}>
		<div class="form-row">
			<div class="col-md-6 mb-2">
				<select class="custom-select province_id" role="button">
					${option}
				</select>
				<div class="invalid-feedback">Pilih lokasi.</div>
			</div>
			<div class="col-md-6">
				<div class="city"></div>
				<div class="btn btn-block btn-outline-primary py-1 mb-2 add_city">
					<i class="mdi mdi-plus"></i>
				</div>
			</div>
		</div>
	</div>`
    $('#location').append(append)
}

$(document).on('click', '.add_city', function() {
    let location_id = $(this).parents('.location').attr('data-id')
    let province_id = $(this).parents('.location').find('.province_id').val()
    province_id == undefined ? $(`.location[data-id=${location_id}] .province_id`).addClass('is-invalid') : add_city(location_id, province_id)
    // console.clear()
    // console.log(location_id)
    // console.log(province_id)
})

function add_city(card_id, province_id) {
    if (province_id == 1) {
        let option = [
            { id: 101, city: 'KEMENKOP UKM' },
            { id: 102, city: 'LPDB' },
            { id: 103, city: 'LLP KUKM' }
        ]
        add_cities(card_id, province_id, option, 'Pusat')
    } else {
        $.ajax({
            url: `${root}/api/city`,
            type: 'GET',
            data: { province_id },
            success: function(result) {
                // console.log(result.data)
                add_cities(card_id, province_id, result.data, 'Kab/Kota')
            }
        })
    }
}

function add_cities(location_id, province_id, city_id, status_location) {
    let option = `<option value="" disabled selected>Pilih ${status_location}</option>`
    $.each(city_id, function(index, value) {
        option += `<option value="${value.id}">${value.city}</option>`
    })
    let append = `<div class="d-flex align-items-start mb-2">
		<div class="col">
			<div class="row">
				<div class="col-12 px-0">
					<select class="custom-select city_id" role="button">
						${option}
					</select>
					<div class="invalid-feedback">Pilih ${status_location}</div>
				</div>
			</div>
		</div>
		<div class="col-1 pt-1">
			<i class="mdi mdi-18px mdi-trash-can-outline remove-location pr-0" role="button"></i>
		</div>
	</div>`
    $(`.location[data-id=${location_id}] .city`).append(append)
}

$(document).on('click', '.remove-location', function() {
    let location_id = $(this).parents('.location').attr('data-id')
    let province_length = $('.province_id').length
    let city_length = $(`.location[data-id*=${location_id}] .d-flex`).length
    // console.clear()
    // console.log(province_length)
    // console.log(city_length)
    if (city_length > 1) {
        $(this).parents('.d-flex').remove()
    } else {
        if (province_length > 1) {
            $(this).parents('.location').remove()
            $('.location').each(function(index, value) {
                $(this).attr('data-id', index)
            })
        }
    }
})

function add_sources_funding() {
    let length = $('.sources_funding').length
    let option = `<option value="" disabled selected>Pilih</option>`
    $.each($sources_funding, function(index, value) {
        option += `<option value="${value.id}">${value.param}</option>`
    })
    append = `<div class="sources_funding mb-2" data-id=${length}>
		<div class="form-row">
			<div class="col-md-6 col-3 mb-2">
				<select class="custom-select param_id" role="button">
					${option}
				</select>
				<div class="invalid-feedback">Pilih sumber pendanaan.</div>
			</div>
			<div class="col-md-6 col-9">
				<div class="d-flex align-items-start hidee mb-2">
					<div class="col">
						<div class="row">
							<div class="col-12 px-0">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">Rp.</span>
									</div>
									<input type="tel" class="form-control number nominal" placeholder="Anggaran">
									<div class="invalid-feedback">Masukkan anggaran.</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-1 pt-1">
						<i class="mdi mdi-18px mdi-trash-can-outline remove-sources-funding pr-0" role="button"></i>
					</div>
				</div>
			</div>
		</div>
	</div>`
    $('#sources_funding').append(append)
    if (length < 1) {
        $('.add_sources_funding').show()
    } else {
        $('.add_sources_funding').hide()
    }
}

$(document).on('change', '.param_id', function() {
    // 	$(this).parents('.form-row').find('.d-flex').removeClass('hide')
})

$(document).on('click', '.remove-sources-funding', function() {
    let length = $('.sources_funding').length
    if (length > 1) {
        $(this).parents('.sources_funding').remove()
        $('.add_sources_funding').show()
        $('.sources_funding').each(function(index, value) {
            $(this).attr('data-id', index)
        })
    }
})

$(document).on('keyup', '.number', function() {
    $(this).val(convert($(this).val()))
})

$(document).on('change', 'input[name=target_indicator_status]', function() {
    let value = $(this).val()
    value == '1' ? $('#target_indicator-form').show() : $('#target_indicator-form').hide()
    $('#target_indicator_status').removeClass('is-invalid')
})

$(document).on('change', 'input[name=pp7_status]', function() {
    let value = $(this).val()
    value == '1' ? $('#pp7-form').show() : $('#pp7-form').hide()
    $('#pp7_status').removeClass('is-invalid')
})

$(document).on('change', 'input[name=assignment_status]', function() {
    let value = $(this).val()
    value == '1' ? $('#assignment-form').show() : $('#assignment-form').hide()
    $('#assignment_status').removeClass('is-invalid')
})

$('form').submit(function(e) {
    e.preventDefault()
    $('#submit').attr('disabled', true)
    $('.is-invalid').removeClass('is-invalid')
    let formData = new FormData()
    formData.append('user_ro_id', user_ro_id)
    formData.append('component_code', $('#component_code').val())
    formData.append('component_name', $('#component_name').val())
    formData.append('total_target', number($('#total_target').val()))
    formData.append('unit_target', $('#unit_target').val())
    $('.city_id').each(function(index, value) {
        formData.append(`sub_work_plan[${index}][province_id]`, $(this).parents('.location').find('.province_id').val())
        formData.append(`sub_work_plan[${index}][city_id]`, $(this).find(':selected').val())
    })
    $('.sources_funding').each(function(index, value) {
        formData.append(`source_funding[${index}][param_id]`, $(this).find(':selected').val())
        formData.append(`source_funding[${index}][nominal]`, number($(this).find('.nominal').val()))
    })
    formData.append('target_indicator_status', $('input[name=target_indicator_status]:checked').val())
    if ($('input[name=target_indicator_status]:checked').val() == '1') {
        formData.append('target_id', $('#target_id').val())
        formData.append('indicator_id', $('#indicator_id').val())
    }
    formData.append('pph7_status', $('input[name=pp7_status]:checked').val())
    if ($('input[name=pp7_status]:checked').val() == '1') {
        formData.append('pph7_id', $('#pp7_id').val())
    }
    formData.append('assignment_status', $('input[name=assignment_status]:checked').val())
    if ($('input[name=assignment_status]:checked').val() == '1') {
        $('input[name=assignment]:checked').each(function(index, value) {
            formData.append(`assignment[${index}][assignment_id]`, $(this).val())
        })
    }
    formData.append('detail', $('#detail').val())
    formData.append('description', $('#description').val())
    $.ajax({
        url: `${root}/api/work_plan`,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(result) {
            // console.log(result.data)
            customAlert('success', 'Komponen berhasil dibuat')
            setTimeout(function() {
                location.href = `${root}/asdep/komponen/detail/${result.data.id}`
            }, 1000)
        },
        error: function(xhr) {
            let err = xhr.responseJSON.errors
            // console.log(err)
            if (err.component_code) {
                if (err.component_code == "The component code has already been taken.") {
                    $('#component_code').addClass('is-invalid')
                    $('#component_code').siblings('.invalid-feedback').html('Kode komponen telah digunakan.')
                } else if (err.component_code == "The component code field is required.") {
                    $('#component_code').addClass('is-invalid')
                    $('#component_code').siblings('.invalid-feedback').html('Masukkan kode komponen.')
                }
            }
            if (err.component_name) {
                $('#component_name').addClass('is-invalid')
                $('#component_name').siblings('.invalid-feedback').html('Masukkan nama komponen.')
            }
            if (err.total_target) {
                $('#total_target').addClass('is-invalid')
                $('#total_target').siblings('.invalid-feedback').html('Masukkan jumlah.')
            }
            if (err.unit_target) {
                $('#unit_target').addClass('is-invalid')
                $('#unit_target').siblings('.invalid-feedback').html('Masukkan satuan.')
            }
            $('.province_id').each(function(index, value) {
                if ($(this).find(':selected').val() == '') {
                    $(this).addClass('is-invalid')
                }
            })
            $('.city_id').each(function(index, value) {
                if ($(this).find(':selected').val() == '') {
                    $(this).addClass('is-invalid')
                }
            })
            $('.sources_funding').each(function(index, value) {
                if ($(this).find(':selected').val() == '') {
                    $(`.sources_funding[data-id=${index}] .param_id`).addClass('is-invalid')
                }
                if ($(this).find('.nominal').val() == '') {
                    $(`.sources_funding[data-id=${index}] .nominal`).addClass('is-invalid')
                }
            })
            if (err.target_indicator_status) {
                $('#target_indicator_status').addClass('is-invalid')
                $('#target_indicator_status').siblings('.invalid-feedback').html('Pilih status sasaran & indikator.')
            }
            if (err.indicator_id) {
                $('#indicator_id').addClass('is-invalid')
                $('#indicator_id').siblings('.invalid-feedback').html('Masukkan indikator.')
            }
            if (err.pph7_status) {
                $('#pp7_status').addClass('is-invalid')
                $('#pp7_status').siblings('.invalid-feedback').html('Pilih status PP 7 tahun 2021.')
            }
            if (err.pph7_id) {
                $('#pp7_id').addClass('is-invalid')
                $('#pp7_id').siblings('.invalid-feedback').html('Pilih program PP 7 tahun 2021.')
            }
            if (err.assignment_status) {
                $('#assignment_status').addClass('is-invalid')
                $('#assignment_status').siblings('.invalid-feedback').html('Pilih status penugasan.')
            }
            if (err.assignment) {
                $('#assignment').addClass('is-invalid')
                $('#assignment').siblings('.invalid-feedback').html('Pilih penugasan.')
            }
            if (err.detail) {
                $('#detail').addClass('is-invalid')
                $('#detail').siblings('.invalid-feedback').html('Masukkan rincian detail.')
            }
            if (err.description) {
                $('#description').addClass('is-invalid')
                $('#description').siblings('.invalid-feedback').html('Masukkan keterangan.')
            }
            $('#submit').attr('disabled', false)
        }
    })
})
