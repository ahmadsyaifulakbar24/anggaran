new Chart(document.getElementById('chartAnggaran'), {
    type: 'bar',
    data: {
        labels: [
        	'Total Anggaran Terkonfirmasi',
        	'Total Pengajuan Rancangan Anggaran'
    	],
        datasets: [{
            label: 'Total Anggaran',
            data: [10000, 20000],
            backgroundColor: [
                'rgb(54, 162, 235, 0.2)',
                'rgb(241, 196, 15, 0.2)'
            ],
            borderColor: [
                'rgb(54, 162, 235)',
                'rgb(241, 196, 15)'
            ],
            hoverOffset: 4
        }]
    }
})

// $.ajax({
//     url: `${api_url}report/total_participant_by_training_type`,
//     type: 'GET',
//     beforeSend: function(xhr) {
//         xhr.setRequestHeader("Authorization", "Bearer " + token)
//     },
//     success: function(result) {
//         let value = result.data
//         let labelChart = [],
//             dataChart = []
//         $.each(result.data, function(index, value) {
//             labelChart.push(value.training_type)
//             dataChart.push(value.total)
//         })
//         new Chart(document.getElementById('chartTraining'), {
//             type: 'bar',
//             data: {
//                 labels: labelChart,
//                 datasets: [{
//                     label: 'Total Peserta',
//                     data: dataChart,
//                     backgroundColor: [
//                         'rgb(231, 76, 60)',
//                         'rgb(241, 196, 15)',
//                         'rgb(46, 204, 113)',
//                         'rgb(52, 152, 219)',
//                         'rgb(155, 89, 182)',
//                         'rgb(52, 73, 94)'
//                     ],
//                     hoverOffset: 4
//                 }]
//             },
//             options: {
//                 indexAxis: 'y',
//                 scales: {
//                     y: {
//                         beginAtZero: true
//                     }
//                 }
//             }
//         })
//     }
// })
