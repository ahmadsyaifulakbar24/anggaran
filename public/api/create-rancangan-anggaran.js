$('#program').change(function() {
    $('#kegiatan option').show()
    $('#kro option').hide()
    $('#kegiatan option:selected').prop('selected', false)
})

$('#kegiatan').change(function() {
    $('#kro option').show()
    $('#kro option:selected').prop('selected', false)
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

$('#province_id').change(function() {
    city_id($(this).val())
})

let status_location = null
let kota_kabupaten = null

function city_id(province_id) {
    $('#location').empty()
    if (province_id != 10) {
        $.ajax({
            url: 'https://dev.farizdotid.com/api/daerahindonesia/kota',
            type: 'GET',
            data: {
                id_provinsi: province_id
            },
            success: function(result) {
                status_location = 'Kab/Kota'
                kota_kabupaten = result.kota_kabupaten
                add_location()
            }
        })
    } else {
        let option = [
            { id: 1001, nama: 'KEMENKOP UKM' },
            { id: 1002, nama: 'LPDB' },
            { id: 1003, nama: 'LLP KUKM' }
        ]
        status_location = 'Pusat'
        kota_kabupaten = option
        add_location()
    }
}

$(document).on('change', '.city_id', function() {
	$(this).removeClass('is-invalid')
})

$(document).on('click', '.remove-location', function() {
	let length = $('.city_id').length
	length > 1 ? $(this).parents('.d-flex').remove() : ''
})

function add_location() {
    let option = `<option value="" disabled selected>Pilih ${status_location}</option>`
    $.each(kota_kabupaten, function(index, value) {
        option += `<option value="${value.id}">${value.nama}</option>`
    })
    let append = `<div class="d-flex align-items-start mb-2">
		<div class="col px-0">
			<select class="custom-select city_id" role="button">
				${option}
			</select>
			<div class="invalid-feedback">Pilih ${status_location}</div>
		</div>
		<div class="col-1 pt-1">
			<i class="mdi mdi-18px mdi-trash-can-outline remove-location pr-0" role="button"></i>
		</div>
	</div>`
    $('#province_id').val() != null ? $('#location').append(append) : ''
}

function check_location() {
	console.clear()
	$('.is-invalid').removeClass('is-invalid')
    $('.city_id').each(function(index, value) {
        console.log($(this).find(':selected').val())
		if ($(this).find(':selected').val() == '') {
			$(this).addClass('is-invalid')
		}
    })
}
