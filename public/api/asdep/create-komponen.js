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
        }
    })
    $.ajax({
        url: `${root}/api/param/target`,
        type: 'GET',
        success: function(result) {
            // console.log(result.data)
            $.each(result.data, function(index, value) {
                append = `<option value="${value.id}">${value.param}</option>`
                $('#target_id').append(append)
            })
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
        }
    })
    $.ajax({
        url: `${root}/api/param/sources_of_funding`,
        type: 'GET',
        success: function(result) {
            // console.log(result.data)
            // $.each(result.data, function(index, value) {
            //     append = `<option value="${value.id}">${value.param}</option>`
            //     $('#indicator_id').append(append)
            // })
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
        }
    })
}

$(document).on('change', '.province_id', function() {
	let id = $(this).parents('.card').attr('data-id')
    $(`#city${id}`).empty()
    city_id(id, $(this).val())
    console.clear()
    console.log(id)
    console.log($(this).val())
})

$(document).on('change', '.city_id', function() {
    $(this).removeClass('is-invalid')
})

function city_id(card_id, province_id) {
    if (province_id == 1) {
        let option = [
            { id: 101, city: 'KEMENKOP UKM' },
            { id: 102, city: 'LPDB' },
            { id: 103, city: 'LLP KUKM' }
        ]
        $status_location = 'Pusat'
        $city = option
        add_city(card_id, province_id)
    } else {
        $.ajax({
            url: `${root}/api/city`,
            type: 'GET',
            data: { province_id },
            success: function(result) {
                // console.log(result.data)
                $status_location = 'Kab/Kota'
                $city = result.data
                add_city(card_id, province_id)
            }
        })
    }
}

function add_province(province_id) {
	let length = $('.location').length + 1
    let option = `<option value="" disabled selected>Pilih Lokasi</option>`
    $.each($province, function(index, value) {
        option += `<option value="${value.id}">${value.province}</option>`
    })
    append = `<div class="card card-body location shadow mb-3" data-id=${length}>
		<div class="form-row">
			<div class="col-md-6 mb-2">
				<select class="custom-select province_id" role="button">
					${option}
				</select>
				<div class="invalid-feedback"></div>
			</div>
			<div class="col-md-6">
				<div id="city${length}"></div>
				<div class="btn btn-block btn-outline-primary py-1" onclick="return add_city(${length})">Tambah</div>
			</div>
		</div>
	</div>`
    $('#province').append(append)
}

function add_city(card_id, province_id) {
	// console.log($status_location)
	$status_location == null ? customAlert('danger', 'Pilih lokasi terlebih dahulu') : ''
    let option = `<option value="" disabled selected>Pilih ${$status_location}</option>`
    $.each($city, function(index, value) {
        option += `<option value="${value.id}">${value.city}</option>`
    })
    let append = `<div class="d-flex align-items-start mb-2">
		<div class="col">
			<div class="row">
				<div class="col-12 mb-2 px-0">
					<select class="custom-select city_id" role="button">
						${option}
					</select>
					<div class="invalid-feedback">Pilih ${$status_location}</div>
				</div>
				<div class="col-12 mb-2 px-0">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Rp.</span>
						</div>
						<input type="tel" class="form-control number" placeholder="Anggaran (RM)">
					</div>
					<div class="invalid-feedback"></div>
				</div>
				<div class="col-12 mb-2 px-0">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Rp.</span>
						</div>
						<input type="tel" class="form-control number" placeholder="Anggaran (BLU)">
					</div>
					<div class="invalid-feedback"></div>
				</div>
			</div>
		</div>
		<div class="col-1 pt-1">
			<i class="mdi mdi-18px mdi-trash-can-outline remove-location pr-0" role="button"></i>
		</div>
	</div>`
	$(`#city${card_id}`).append(append)
}

$(document).on('click', '.remove-location', function() {
    let length = $('.city_id').length
    length > 1 ? $(this).parents('.d-flex').remove() : ''
})

function add_location() {
    let option = `<option value="" disabled selected>Pilih ${$status_location}</option>`
    $.each($city, function(index, value) {
        option += `<option value="${value.id}">${value.city}</option>`
    })
    let append = `<div class="d-flex align-items-start mb-2">
		<div class="col-12 px-0">
			<select class="custom-select city_id" role="button">
				${option}
			</select>
			<div class="invalid-feedback">Pilih ${$status_location}</div>
		</div>
		<div class="col-1 pt-1">
			<i class="mdi mdi-18px mdi-trash-can-outline remove-location pr-0" role="button"></i>
		</div>
	</div>`
    $('#province_id').val() != null ? $('#location').append(append) : ''
}

function validation() {
    $('.is-invalid').removeClass('is-invalid')
    $('#parent').val() == null ? $('#parent').addClass('is-invalid') : ''
    $('.city_id').each(function(index, value) {
        if ($(this).find(':selected').val() == '') {
            $(this).addClass('is-invalid')
        }
    })
}

$(document).on('keyup', '.number', function() {
    $(this).val(convert($(this).val()))
})


$('form').submit(function(e) {
    validation()
    e.preventDefault()
    $('#submit').attr('disabled', true)
    let formData = new FormData()
    formData.append('program_id', $('#program_id').val())
    formData.append('type_kro', $('#type_kro').val())
    formData.append('kro_id', $('#kro_id').val())
    formData.append('code_ro', $('#code_ro').val())
    formData.append('name_ro', $('#name_ro').val())
    formData.append('component_code', $('#component_code').val())
    formData.append('component_name', $('#component_name').val())
    formData.append('title', $('#component_name').val())
    formData.append('total_target', number($('#total_target').val()))
    formData.append('unit_target', $('#unit_target').val())
    formData.append('budged', number($('#budged').val()))
    formData.append('province_id', $('#province_id').val())
    $('.city_id').each(function(index, value) {
        formData.append(`sub_work_plan[${index}][city_id]`, $(this).find(':selected').val())
    })
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
            customAlert('success', 'Kegiatan berhasil dibuat.')
            setTimeout(function() {
                location.href = `${root}/asdep/komponen/${result.data.id}`
            }, 1000)
        },
        error: function(xhr) {
            // console.log(xhr)
            let err = xhr.responseJSON.errors
            if (err.program_id) {
                $('#program_id').addClass('is-invalid')
                $('#program_id').siblings('.invalid-feedback').html('Pilih kegiatan.')
            }
            if (err.type_kro) {
                $('#type_kro').addClass('is-invalid')
                $('#type_kro').siblings('.invalid-feedback').html('Pilih tipe KRO.')
            }
            if (err.kro_id) {
                $('#kro_id').addClass('is-invalid')
                $('#kro_id').siblings('.invalid-feedback').html('Pilih KRO.')
            }
            if (err.code_ro) {
                $('#code_ro').addClass('is-invalid')
                $('#code_ro').siblings('.invalid-feedback').html('Masukkan kode RO.')
            }
            if (err.name_ro) {
                $('#name_ro').addClass('is-invalid')
                $('#name_ro').siblings('.invalid-feedback').html('Masukkan nama RO.')
            }
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
            // if (err.title) {
            //     $('#title').addClass('is-invalid')
            //     $('#title').siblings('.invalid-feedback').html('Masukkan nama kegiatan.')
            // }
            if (err.total_target) {
                $('#total_target').addClass('is-invalid')
                $('#total_target').siblings('.invalid-feedback').html('Masukkan jumlah.')
            }
            if (err.unit_target) {
                $('#unit_target').addClass('is-invalid')
                $('#unit_target').siblings('.invalid-feedback').html('Masukkan satuan.')
            }
            if (err.budged) {
                $('#budged').addClass('is-invalid')
                $('#budged').siblings('.invalid-feedback').html('Masukkan anggaran.')
            }
            if (err.province_id) {
                $('#province_id').addClass('is-invalid')
                $('#province_id').siblings('.invalid-feedback').html('Pilih provinsi.')
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
