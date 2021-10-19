let stop = false
let value = null
let deputi_status = null
$.ajax({
    url: `${root}/api/user_ro/fetch`,
    type: 'GET',
    data: {
        user_ro_id
    },
    success: function(result) {
        // console.log(result.data)
		$.ajax({
		    url: `${root}/api/work_plan`,
		    type: 'GET',
		    data: {
		        id
		    },
		    success: function(result) {
		        // console.log(result.data)
		        if (result.data.user.id == user) {
		        	value = result.data
		            get_data()
		        } else {
		            history.back()
		        }
		    },
		    error: function(xhr) {
		        // console.log(xhr)
		        let err = xhr.responseJSON.errors
		        if (err.id) history.back()
		    }
		})
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
            // console.log(xhr)
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
            // console.log(xhr)
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
            // console.log(xhr)
        }
    })
    $.ajax({
        url: `${root}/api/param/sources_of_funding`,
        type: 'GET',
        success: function(result) {
            // console.log(result.data)
            $sources_funding = result.data
            // add_sources_funding()
        },
        error: function(xhr) {
            // console.log(xhr)
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
            // add_province()
        }
    })
}

$(document).ajaxStop(function() {
	if (stop == false) {
        $('#component_code').val(value.component_code)
        $('#component_name').val(value.component_name)
        $('#total_target').val(value.total_target)
        $('#unit_target').val(value.unit_target.id)
        let first = null
        let location_id = -1
        $.each(value.sub_work_plan, function(index, value) {
        	if (first != value.province.id) {
        		first = value.province.id
        		location_id++
        		add_province(value.province.id)
        		add_city(location_id, value.province.id, value.city.id)
        	} else if (first == value.province.id) {
        		add_city(location_id, value.province.id, value.city.id)
        	}
        })
        $.each(value.source_funding, function(index, value) {
        	add_sources_funding(value.param_id, value.nominal)
        })
        $('#indicator_id').val(value.indicator.id)
        $('#detail').val(value.detail)
        $('#description').val(value.description)

        if (value.deputi_status == 'decline') {
        	deputi_status = value.deputi_status
        	$('#submit').html('Submit & Ajukan Kembali')
        }
        $('#submit').attr('disabled', false)
        stop = true
	}
})

$(document).on('change', '.province_id', function() {
    $(this).parents('.location').find('.city').empty()
    let location_id = $(this).parents('.location').attr('data-id')
    let province_id = $(this).val()
    add_city(location_id, province_id)
    // console.clear()
    // console.log(location_id)
    // console.log(province_id)
})

function add_province(province_id = null) {
    let length = $('.location').length
    let option = `<option value="" disabled ${province_id == null ? 'selected' : ''}>Pilih Lokasi</option>`
    $.each($province, function(index, value) {
        option += `<option value="${value.id}" ${province_id == value.id ? 'selected' : ''}>${value.province}</option>`
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

function add_city(card_id, province_id, city_id = null) {
    if (province_id == 1) {
        let option = [
            { id: 101, city: 'KEMENKOP UKM' },
            { id: 102, city: 'LPDB' },
            { id: 103, city: 'LLP KUKM' }
        ]
        add_cities(card_id, province_id, option, 'Pusat', city_id)
    } else {
        $.ajax({
            url: `${root}/api/city`,
            type: 'GET',
            data: { province_id },
            success: function(result) {
                // console.log(result.data)
                add_cities(card_id, province_id, result.data, 'Kab/Kota', city_id)
            }
        })
    }
}

function add_cities(location_id, province_id, city_id, status_location, city_selected = null) {
    let option = `<option value="" disabled ${city_selected == null ? 'selected' : ''}>Pilih ${status_location}</option>`
    $.each(city_id, function(index, value) {
        option += `<option value="${value.id}" ${city_selected == value.id ? 'selected' : ''}>${value.city}</option>`
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

function add_sources_funding(param_id = null, nominal = '') {
    let length = $('.sources_funding').length
    let option = `<option value="" disabled ${param_id == null ? 'selected' : ''}>Pilih</option>`
    $.each($sources_funding, function(index, value) {
        option += `<option value="${value.id}" ${value.id == param_id ? 'selected' : ''}>${value.param}</option>`
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
									<input type="tel" class="form-control number nominal" placeholder="Anggaran" value="${nominal != '' ? convert(nominal) : nominal}">
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

function change_deputi_status() {
	let formData = new FormData()
    formData.append('status', 'pending')
    formData.append('comment', 'Komponen diperbarui')
    $.ajax({
        url: `${root}/api/work_plan/status/${id}`,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(result) {
            console.log(result.data)
            customAlert('success', 'Komponen berhasil disimpan & diajukan kembali')
            setTimeout(function() {
                location.href = `${root}/asdep/komponen/detail/${result.data.id}`
            }, 1000)
        }
    })
}

$('form').submit(function(e) {
    e.preventDefault()
    $('#submit').attr('disabled', true)
    $('.is-invalid').removeClass('is-invalid')
    let sub_work_plan = []
    $('.city_id').each(function(index, value) {
    	sub_work_plan.push({
	        province_id: ($(this).parents('.location').find('.province_id').val()),
	        city_id: ($(this).find(':selected').val())
        })
    })
    let source_funding = []
    $('.sources_funding').each(function(index, value) {
    	source_funding.push({
	        param_id: ($(this).find(':selected').val()),
	        nominal: (number($(this).find('.nominal').val()))
	    })
    })
    $.ajax({
        url: `${root}/api/work_plan/${id}`,
        type: 'PATCH',
        data: {
		    user_ro_id,
		    component_code: $('#component_code').val(),
		    component_name: $('#component_name').val(),
		    title: $('#title').val(),
		    total_target: number($('#total_target').val()),
		    unit_target: $('#unit_target').val(),
		    target_id: $('#target_id').val(),
		    indicator_id: $('#indicator_id').val(),
		    sub_work_plan,
		    source_funding,
		    detail: $('#detail').val(),
		    description: $('#description').val()
        },
        success: function(result) {
            // console.log(result.data)
            if (deputi_status != 'decline') {
	            customAlert('success', 'Komponen berhasil disimpan')
	            setTimeout(function() {
	                location.href = `${root}/asdep/komponen/detail/${result.data.id}`
	            }, 1000)
	        } else {
	        	change_deputi_status()
	        }
        },
        error: function(xhr) {
            // console.log(xhr)
            let err = xhr.responseJSON.errors
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
            if (err.indicator_id) {
                $('#indicator_id').addClass('is-invalid')
                $('#indicator_id').siblings('.invalid-feedback').html('Masukkan indikator.')
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
