$.ajax({
    url: `${root}/api/user`,
    type: 'GET',
    data: { id },
    success: function(result) {
        // console.log(result.data)
        let value = result.data
        $('#name').val(value.name)
        if (value.role != 'asdep') history.back()
    },
    error: function(xhr) {
        // console.log(xhr)
        let err = xhr.responseJSON.errors
        if (err.id) history.back()
    }
})

$('form').submit(function(e) {
    e.preventDefault()
    $('.is-invalid').removeClass('is-invalid')
    $.ajax({
        url: `${root}/api/user/update/${id}`,
        type: 'PATCH',
        data: {
            name: $('#name').val()
        },
        success: function(result) {
            // console.log(result.data)
            customAlert('success', 'Akun berhasil diubah')
            setTimeout(function() {
                location.href = `${root}/akun-asdep`
            }, 1000)
        },
        error: function(xhr) {
            // console.log(xhr)
            let err = xhr.responseJSON.errors
            if (err.name) {
                $('#name').addClass('is-invalid')
                $('#name').siblings('.invalid-feedback').html('Masukkan nama.')
            }
        }
    })
})
