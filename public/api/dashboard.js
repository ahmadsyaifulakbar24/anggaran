$.ajax({
    url: `${api_url}/dashboard/budget_statistics`,
    type: 'GET',
    success: function(result) {
        console.log(result)
    }
})

if (role == 'deputi') {
	$('#deputi').hide()
	$('#asdep').hide()
} else if (role == 'asdep') {
	$('#admin').hide()
	$('#deputi').hide()
}
