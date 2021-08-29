if (localStorage.getItem('token')) logout('Session cleared')

$('form').submit(function(e) {
    addLoading()
    e.preventDefault()
    $('.alert').hide()
    const username = $('#username').val()
    const password = $('#password').val()
    $.ajax({
        url: `${api_url}/auth/login`,
        type: 'POST',
        data: {
            username: username,
            password: password
        },
        success: function(result) {
            let value = result.data
            // console.log(value)
            localStorage.setItem('token', value.access_token)
            localStorage.setItem('user', value.user.id)
            localStorage.setItem('name', value.user.name)
            localStorage.setItem('role', value.user.role)
            $.ajax({
                url: `${root}/session/login`,
                type: 'GET',
                data: {
                    token: value.access_token,
                    role: value.user.role
                },
                success: function(result) {
                    location.href = `${root}/dashboard`
                }
            })
        },
        error: function(xhr) {
            // let err = JSON.parse(xhr.responseText)
            // console.log(err)
            $('.alert').show()
            removeLoading('Login')
        }
    })
})
