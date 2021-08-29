let profile_photo = null

$(document).on('change', 'input[type="file"]', function(e) {
    let val = $(this).get(0).files[0]
    // let ext = val.name.split('.').pop()
    if (val.size <= 2000000) {
        profile_photo = val
        let input = e.currentTarget
        let reader = new FileReader()
        reader.onload = function() {
        	$('.profile_photo').attr('src', reader.result)
        }
        reader.readAsDataURL(input.files[0])
        $('#profile_photo-feedback').addClass('hide')
    } else {
        $('#profile_photo-feedback').removeClass('hide')
        $('#profile_photo-feedback').html('Ukuran foto maksimal 2MB')
    }
})