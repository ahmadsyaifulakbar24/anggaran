$.ajax({
    url: `${root}/api/program/get_parent`,
    type: 'GET',
    success: function(result) {
        // console.log(result.data)
        $.each(result.data, function(index, value) {
            append = `<option value="${value.id}">${value.code_program} - ${value.description}</option>`
            $('#parent').append(append)
        })
    }
})

function get_kegiatan(parent_id) {
    $('#program_id').empty()
    $.ajax({
        url: `${root}/api/program`,
        type: 'GET',
        data: { parent_id },
        success: function(result) {
            // console.log(result.data)
            $.each(result.data, function(index, value) {
                append = `<option value="${value.id}">${value.code_program} - ${value.description}</option>`
                $('#program_id').append(append)
            })
        }
    })
}

$.ajax({
    url: `${root}/api/kro`,
    type: 'GET',
    success: function(result) {
        // console.log(result.data)
        $kro = result.data
    }
})

$.ajax({
    url: `${root}/api/ro`,
    type: 'GET',
    success: function(result) {
        // console.log(result.data)
        $.each(result.data, function(index, value) {
            append = `<option value="${value.code_ro}" data-lable="${value.ro}">${value.ro}</option>`
            $('#ro_id').append(append)
        })
    }
})

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

function city_id(province_id) {
    if (province_id != 1) {
        $.ajax({
		    url: `${root}/api/city`,
            type: 'GET',
            data: { province_id },
            success: function(result) {
            	// console.log(result.data)
                $status_location = 'Kab/Kota'
                $city = result.data
                add_location()
            }
        })
    } else {
        let option = [
            { id: 101, city: 'KEMENKOP UKM' },
            { id: 102, city: 'LPDB' },
            { id: 103, city: 'LLP KUKM' }
        ]
        $status_location = 'Pusat'
        $city = option
        add_location()
    }
}

function add_location() {
    let option = `<option value="" disabled selected>Pilih ${$status_location}</option>`
    $.each($city, function(index, value) {
        option += `<option value="${value.id}">${value.city}</option>`
    })
    let append = `<div class="d-flex align-items-start mb-2">
		<div class="col px-0">
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

// Event
$('#parent').change(function() {
    get_kegiatan($(this).val())
})

$('#type_kro').change(function() {
    $('#kro_id').empty()
    if ($(this).val() == 'pn') {
        $.each($kro, function(index, value) {
            append = `<option value="${value.id}">${value.code_kro_pn} - ${value.kro}</option>`
            $('#kro_id').append(append)
        })
    } else {
        $.each($kro, function(index, value) {
            append = `<option value="${value.id}">${value.code_kro_non_pn} - ${value.kro}</option>`
            $('#kro_id').append(append)
        })
    }
})

$('#code_ro').change(function() {
    let name_ro = $("#ro_id option[value='" + $("#code_ro").val() + "']").html()
    $('#name_ro').val(name_ro)
})

$('#province_id').change(function() {
    $('#location').empty()
    city_id($(this).val())
})

$('.number').keyup(function() {
    $(this).val(convert($(this).val()))
})

$(document).on('change', '.city_id', function() {
    $(this).removeClass('is-invalid')
})

$(document).on('click', '.remove-location', function() {
    let length = $('.city_id').length
    length > 1 ? $(this).parents('.d-flex').remove() : ''
})

// Submit
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
                location.href = `${root}/rancangan-anggaran/${result.data.id}`
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
	            }
	            else if (err.component_code == "The component code field is required.") {
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
