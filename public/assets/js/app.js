const token = localStorage.getItem('token')
const user = localStorage.getItem('user')
const name = localStorage.getItem('name')
const role = localStorage.getItem('role')
// const photo = localStorage.getItem('photo')

if (localStorage.getItem('token') != null) {
    $.ajaxSetup({
        beforeSend: function(xhr) {
            xhr.setRequestHeader('Authorization', `Bearer ${token}`)
        }
    })
    $('.name').html(name)
    // $('.avatar').attr('src', localStorage.getItem('photo'))
    $.ajax({
        url: `${api_url}/notification`,
        type: 'GET',
        success: function(result) {
            // console.log(result.data)
            let notification = 0
            $.each(result.data, function(index, value) {
            	value.read == 0 ? notification++ : ''
            })
            if (notification > 0) {
            	$('#notification').html(notification > 9 ? '9+' : notification)
            }
        }
    })
}

$(document).on('keydown', 'input', function() {
    $(this).removeClass('is-invalid')
})
$(document).on('keydown', 'textarea', function() {
    $(this).removeClass('is-invalid')
})
$(document).on('change', 'select', function() {
    $(this).removeClass('is-invalid')
})
$(document).on('click', 'input[name="gender"]', function() {
    $('#gender').removeClass('is-invalid')
})
$(document).on('change', 'input[type="date"]', function() {
    $(this).removeClass('is-invalid')
})
$(document).on('click', '.dropdown .dropdown-menu', function(e) {
    e.stopPropagation()
})

// param is in login.js line 1
function logout(param) {
    $.ajax({
        url: `${api_url}/auth/logout`,
        type: 'POST',
        success: function() {
            local_logout(param)
        },
        error: function(xhr) {
            let msg = xhr.responseJSON.message
            // console.log(xhr)
            if (msg == "Unauthenticated.") {
                local_logout(param)
            }
        }
    })
}

function local_logout(param) {
    localStorage.clear()
    $.ajax({
        url: `${root}/session/logout`,
        type: 'GET',
        success: function() {
            param == undefined ? location.href = root : console.log(param)
        }
    })
}

function customAlert(status, param) {
    let icon = ''
    switch (status) {
        case 'success':
            icon = '<i class="mdi mdi-18px mdi-check-circle text-success"></i>'
            break;
        case 'warning':
            icon = '<i class="mdi mdi-18px mdi-alert text-warning"></i>'
            break;
        case 'danger':
            icon = '<i class="mdi mdi-18px mdi-alert-circle text-danger"></i>'
            break;
        case 'trash':
            icon = '<i class="mdi mdi-18px mdi-trash-can-outline"></i>'
    }

    let timeout = setTimeout(function() {
        $('.customAlert').removeClass('active')
        $('.customAlert').animate({ bottom: "-=120px" }, 150)
    }, 2000)

    if ($('.customAlert').hasClass('active')) {
        clearTimeout(timeout)
        $('.customAlert').removeClass('active')
        $('.customAlert').animate({ bottom: "-=120px" }, 150)
    }
    timeout
    $('.customAlert').html(icon + param)
    $('.customAlert').addClass('active')
    $('.customAlert').animate({ bottom: "+=120px" }, 150)
}

function tanggal(date) {
    let d = date.substr(8, 2)
    let m = date.substr(5, 2)
    let y = date.substr(0, 4)
    return `${d} ${bulan_tahun(m, y)}`
}

function bulan(month) {
    let bulan = []
    bulan[1] = 'Januari'
    bulan[2] = 'Februari'
    bulan[3] = 'Maret'
    bulan[4] = 'April'
    bulan[5] = 'Mei'
    bulan[6] = 'Juni'
    bulan[7] = 'Juli'
    bulan[8] = 'Agustus'
    bulan[9] = 'September'
    bulan[10] = 'Oktober'
    bulan[11] = 'November'
    bulan[12] = 'Desember'
    return bulan[month]
}

function bulan_tahun(month, year) {
    let bulan = []
    bulan['01'] = 'Jan'
    bulan['02'] = 'Feb'
    bulan['03'] = 'Mar'
    bulan['04'] = 'Apr'
    bulan['05'] = 'Mei'
    bulan['06'] = 'Jun'
    bulan['07'] = 'Jul'
    bulan['08'] = 'Agu'
    bulan['09'] = 'Sep'
    bulan['10'] = 'Okt'
    bulan['11'] = 'Nov'
    bulan['12'] = 'Des'
    return `${bulan[month]} ${year}`
}

function addLoading(attr, param) {
    let path
    param == undefined ? path = 'path' : path = 'path-' + param
    let append = `<div class="loader loader-sm btn-loading">
		<svg class="circular" viewBox="25 25 50 50">
			<circle class="${path}" cx="50" cy="50" r="20" fill="none" stroke-width="6" stroke-miterlimit="1"/>
		</svg>
	</div>`
    if (attr == undefined) {
        $('#submit').html(append)
        $('#submit').attr('disabled', true)
    } else {
        $(attr).html(append)
        $(attr).attr('disabled', true)
    }
}

function removeLoading(html, attr) {
    if (attr == undefined) {
        $('#submit').attr('disabled', false)
        $('#submit').html(html)
    } else {
        $(attr).attr('disabled', false)
        $(attr).html(html)
    }
}

function pagination(links, meta, path) {
    let current = meta.current_page
    let replace = path + '?page='

    let first = links.first.replace(replace, '')
    if (first != current) {
        $('#first').removeClass('disabled')
        $('#first').data('id', first)
    } else {
        $('#first').addClass('disabled')
    }

    if (links.prev != null) {
        $('#prev').removeClass('disabled')
        let prev = links.prev.replace(replace, '')
        $('#prev').data('id', prev)

        $('#prevCurrent').show()
        $('#prevCurrent span').html(prev)
        $('#prevCurrent').data('id', prev)

        let prevCurrentDouble = prev - 1
        if (prevCurrentDouble > 0) {
            $('#prevCurrentDouble').show()
            $('#prevCurrentDouble span').html(prevCurrentDouble)
            $('#prevCurrentDouble').data('id', prevCurrentDouble)
        } else {
            $('#prevCurrentDouble').hide()
        }
    } else {
        $('#prev').addClass('disabled')
        $('#prevCurrent').hide()
        $('#prevCurrentDouble').hide()
    }

    $('#current').addClass('active')
    $('#current span').html(current)

    if (links.next != null) {
        $('#next').removeClass('disabled')
        let next = links.next.replace(replace, '')
        $('#next').data('id', next)

        $('#nextCurrent').show()
        $('#nextCurrent span').html(next)
        $('#nextCurrent').data('id', next)

        let nextCurrentDouble = ++next
        if (nextCurrentDouble <= meta.last_page) {
            $('#nextCurrentDouble').show()
            $('#nextCurrentDouble span').html(nextCurrentDouble)
            $('#nextCurrentDouble').data('id', nextCurrentDouble)
        } else {
            $('#nextCurrentDouble').hide()
        }
    } else {
        $('#next').addClass('disabled')
        $('#nextCurrent').hide()
        $('#nextCurrentDouble').hide()
    }

    let last = links.last.replace(replace, '')
    if (last != current) {
        $('#last').removeClass('disabled')
        $('#last').data('id', last)
    } else {
        $('#last').addClass('disabled')
    }

    $('#pagination').removeClass('hide')
    $('#pagination-label').html(`Showing ${meta.from} to ${meta.to} of ${meta.total} entries`)
}

$('.page').click(function() {
    if (!$(this).is('.active, .disabled')) {
        let page = $(this).data('id')
        $('#pagination').addClass('hide')
        $('#loading_table').removeClass('hide')
        get_data(page)
    }
})

function currentDate() {
    let d = new Date()
    let date = d.getDate()
    let month = d.getMonth() + 1
    let year = d.getFullYear()
    if (date < 10) date = '0' + date
    if (month < 10) month = '0' + month
    let maxDate = year + '-' + month + '-' + date
    let maxMonth = year + '-' + month
    $('input[type="date"]').attr('max', maxDate)
    $('input[type="month"]').attr('max', maxMonth)
    $('#date').val(maxDate)
    $('#month').val(maxMonth)
}

function returnDate() {
    let d = new Date()
    let date = d.getDate()
    let month = d.getMonth() + 1
    let year = d.getFullYear()
    if (date < 10) date = '0' + date
    return year + '-' + month + '-' + date
}

function delay(fn, ms) {
    let timer = 0
    return function(...args) {
        clearTimeout(timer)
        timer = setTimeout(fn.bind(this, ...args), ms || 0)
    }
}

$('#menu').click(function() {
    if (!$('.sidebar').hasClass('show')) {
        $('.sidebar').addClass('show')
        $('.sidebar').css('left', '0px')
        $('.overlay').show()
    } else {
        $('.sidebar').removeClass('show')
        $('.sidebar').css('left', '-230px')
        $('.overlay').hide()
    }
})

$('.overlay').click(function() {
    $('.sidebar').removeClass('show')
    $('.sidebar').css('left', '-230px')
    $(this).hide()
})

$('.password').click(function() {
    if ($(this).hasClass('mdi-eye')) {
        $(this).removeClass('mdi-eye')
        $(this).addClass('mdi-eye-off')
        if ($(this).data('id') == 'password') {
            $('#password').attr('type', 'password')
        } else if ($(this).data('id') == 'npassword') {
            $('#npassword').attr('type', 'password')
        } else {
            $('#cpassword').attr('type', 'password')
        }
    } else {
        $(this).addClass('mdi-eye')
        $(this).removeClass('mdi-eye-off')
        if ($(this).data('id') == 'password') {
            $('#password').attr('type', 'text')
        } else if ($(this).data('id') == 'npassword') {
            $('#npassword').attr('type', 'text')
        } else {
            $('#cpassword').attr('type', 'text')
        }
    }
})

function formatNpwp(value) {
    value = value.replace(/[A-Za-z\W\s_]+/g, '');
    let split = 6;
    const dots = [];

    for (let i = 0, len = value.length; i < len; i += split) {
        split = i >= 2 && i <= 6 ? 3 : i >= 8 && i <= 12 ? 4 : 2;
        dots.push(value.substr(i, split));
    }

    const temp = dots.join('.');
    return temp.length > 12 ? `${temp.substr(0, 12)}-${temp.substr(12, 7)}` : temp;
}

$(document).on('keyup', '.npwp', function() {
    let value = $(this).val()
    $(this).val(formatNpwp(value))
})

$(document).on('keyup', '.rupiah', function() {
    let value = $(this).val()
    $(this).val(convert(value))
})

function status(param) {
	let status = ''
    switch (param) {
        case 'pending':
            status = '<span class="text-warning">Pending</span>'
            break;
        case 'accept':
            status = '<span class="text-primary">Disetujui</span>'
            break;
        case 'decline':
            status = '<span class="text-danger">Ditolak</span>'
            break;
        case null:
            status = ''
    }
    return status
}

function notification_status(param) {
	let status = ''
    switch (param) {
        case 'create work plan':
            status = 'Membuat kegiatan'
            break;
        case 'accept work plan':
            status = 'Menyetujui kegiatan'
            break;
        case 'pending work plan':
            status = 'Mengajukan kegiatan'
            break;
        case 'decline work plan':
            status = 'Menolak kegiatan'
    }
    return status
}

function icon(param) {
    let icon
    if (param == 'jpg' || param == 'jpeg' || param == 'png') {
        icon = 'mdi-file-image-outline'
    } else if (param == 'xls' || param == 'xlsx' || param == 'csv') {
        icon = 'mdi-file-excel-outline'
    } else if (param == 'doc' || param == 'docx') {
        icon = 'mdi-file-word-outline'
    } else if (param == 'pdf') {
        icon = 'mdi-file-pdf-outline'
    } else {
    	icon = 'mdi-file-outline'
    }
    return icon
}
