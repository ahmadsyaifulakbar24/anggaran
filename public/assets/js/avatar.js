$(document).ready(function(){
	let status = false
	var avatar = $('#avatar-preview').croppie({
		viewport: {
			width: 150,
			height: 150,
			type: 'square'
		},
		boundary: {
			width: 200,
			height: 200
		}
	})

	$('#avatar').change(function(){
		$('#feedback-file').hide()
		let file = this.files[0]
		let fileType = file['type']
		let fileSize = file['size']
		fileName = file['name']

		if(fileType == 'image/jpeg') {
			if(fileSize <= 2000000) {
		        if($('#avatar')[0].files.length !== 0) {
					$('#avatar-form').hide()
					$('#avatar-preview').show()
					var reader = new FileReader()
					reader.onload = function(event){
						avatar.croppie('bind',{
							url: event.target.result
						}).then(function(){
							$('#upload').attr('disabled',false)
						})
					}
					reader.readAsDataURL(this.files[0])
				}
			} else {
				reset()
				$('#feedback-file').show()
				$('#feedback-file').html('Ukuran foto maksimum 2MB')
			}
		} else {
			reset()
			$('#feedback-file').show()
			$('#feedback-file').html('Format foto harus JPG')
		}
	})

	$('#upload').click(function(event){
		status = true
		avatar.croppie('result', {
			type: 'canvas',
			size: 'viewport'
		}).then(function(response){
			console.log(response)
			profile_photo = response
			$('#profile_photo').attr('src',response)
			$('#modal_profile_photo').attr('src',response)
			$('#modal-avatar').modal('hide')
		// 	$('#loadingAvatar').show()
		// 	$('#upload').attr('disabled',true)
		// 	$.ajax({
		// 		url: api_url+"uploadLogo",
		// 		type: "POST",
		// 		headers: {
		// 			'token-id': token
		// 		},
		// 		data: {
		// 			logo_base64: response
		// 		},
		// 		success: function(result) {
		//         },
		//         complete: function() {
		// 			status = false
		// 			$('#alert').show()
		// 			$('#alert').html('Foto profil usaha berhasil disimpan.')
		// 			$('#loadingAvatar').hide()
		// 			$('html, body').scrollTop(0)
		// 			setTimeout(function(){
		// 				$('#alert').hide()
		// 			},3000)
		// 		}
		//     })
		})
	})

	$('#modal-avatar').on('hidden.bs.modal',function(e) {
		reset()
	})
	$('#back').click(function(){
		reset()
	})
	function reset() {
		if(status == true) {
			$('#avatar-form').hide()
			$('#avatar-preview').show()
		} else {
			$('#avatar').val('')
			$('#avatar-form').show()
			$('#avatar-preview').hide()
		}
		$('#feedback-file').hide()
		$('#upload').attr('disabled',true)
	}
})