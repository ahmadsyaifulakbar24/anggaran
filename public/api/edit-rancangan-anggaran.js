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

function get_kegiatan(parent_id, id) {
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
            $('#program_id').val(id)
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
    url: 'https://dev.farizdotid.com/api/daerahindonesia/provinsi',
    type: 'GET',
    success: function(result) {
        // console.log(result.provinsi)
        $.each(result.provinsi, function(index, value) {
            append = `<option value="${value.id}">${value.nama}</option>`
            $('#province_id').append(append)
        })
    }
})

function city_id(province_id, city_id) {
    if (province_id != 1) {
        $.ajax({
            url: 'https://dev.farizdotid.com/api/daerahindonesia/kota',
            type: 'GET',
            data: {
                id_provinsi: province_id
            },
            success: function(result) {
                $status_location = 'Kab/Kota'
                $kota_kabupaten = result.kota_kabupaten
                add_location(city_id)
            }
        })
    } else {
        let option = [
            { id: 101, nama: 'KEMENKOP UKM' },
            { id: 102, nama: 'LPDB' },
            { id: 103, nama: 'LLP KUKM' }
        ]
        $status_location = 'Pusat'
        $kota_kabupaten = option
        add_location(city_id)
    }
}

function add_location(city_id) {
    let option = `<option value="" disabled selected>Pilih ${$status_location}</option>`
    $.each($kota_kabupaten, function(index, value) {
        option += `<option value="${value.id}" ${value.id == city_id ? 'selected' : ''}>${value.nama}</option>`
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

function type_kro(value, kro_id) {
    if (value == 'pn') {
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
    setTimeout(function() {
        $('#kro_id').val(kro_id)
    }, 1000)
}

$status = false
$(document).ajaxStop(function() {
    $status == false ? get_data() : ''
})

function get_data() {
    $.ajax({
        url: `${root}/api/work_plan`,
        type: 'GET',
        data: { id },
        success: function(result) {
            // console.log(result.data)
            let value = result.data
            $('#parent').val(value.program.parent.id)
            get_kegiatan(value.program.parent.id, value.program.id)
            $('#type_kro').val(value.type_kro)
            type_kro(value.type_kro, value.kro.id)
            $('#code_ro').val(value.ro.code_ro)
            $('#name_ro').val(value.ro.ro)
            $('#component_code').val(value.component_code)
            $('#component_name').val(value.component_name)
            $('#total_target').val(convert(value.total_target))
            $('#unit_target').val(value.unit_target)
            $('#budged').val(convert(value.budged))
            $('#province_id').val(value.province.id)
            $.each(value.sub_work_plan, function(index, values) {
                city_id(value.province.id, values.city.id)
            })
            $('#detail').val(value.detail)
            $('#description').val(value.description)
            $status = true
        },
        error: function(xhr) {
            // console.log(xhr)
            let err = xhr.responseJSON.errors
            if (err.id) history.back()
        }
    })
}

// Event
$('#parent').change(function() {
    get_kegiatan($(this).val())
})

$('#type_kro').change(function() {
    $('#kro_id').empty()
    type_kro($(this).val())
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

$(document).on('click', '.remove-location', function() {
    let length = $('.city_id').length
    length > 1 ? $(this).parents('.d-flex').remove() : ''
})

// Submit
$('form').submit(function(e) {
    validation()
    e.preventDefault()
    $('#submit').attr('disabled', true)
    let sub_work_plan = []
    $('.city_id').each(function(index, value) {
        sub_work_plan.push({
	        city_id: $(this).find(':selected').val()
	    })
    })
    $.ajax({
        url: `${root}/api/work_plan`,
        type: 'POST',
        data: {
            program_id: $('#program_id').val(),
            type_kro: $('#type_kro').val(),
            kro_id: $('#kro_id').val(),
            code_ro: $('#code_ro').val(),
            name_ro: $('#name_ro').val(),
            component_code: $('#component_code').val(),
            component_name: $('#component_name').val(),
            title: $('#component_name').val(),
            total_target: number($('#total_target').val()),
            unit_target: $('#unit_target').val(),
            budged: number($('#budged').val()),
            province_id: $('#province_id').val(),
            sub_work_plan: sub_work_plan,
		    detail: $('#detail').val(),
		    description: $('#description').val()
        },
        success: function(result) {
            // console.log(result.data)
            customAlert('success', 'Kegiatan berhasil dibuat.')
            setTimeout(function() {
                location.href = `${root}/rancangan-anggaran/${result.data.id}`
            }, 1000)
        },
        error: function(xhr) {
            console.log(xhr)
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
                $('#component_code').addClass('is-invalid')
                $('#component_code').siblings('.invalid-feedback').html('Masukkan kode komponen.')
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
