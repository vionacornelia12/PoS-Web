var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'],
        datasets: [{
            label: 'Total Penjualan',
            data: [125, 109, 302, 215, 162, 193, 456, 147, 258, 366, 500, 567],
            backgroundColor: [
                'rgb(151, 82, 132)',
                'rgb(95, 90, 252)',
                'rgb(34, 84, 122)',
                'rgb(21, 249, 142)',
                'rgb(182, 229, 35)',
                'rgb(95, 90, 252)',
                'rgb(151, 82, 132)',
                'rgb(229, 159, 37)',
                'rgb(169 ,67, 67)',
                'rgb(253, 191, 136)',
                'rgb(108, 183, 146)',
                'rgb(162, 162, 162)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
       responsive: true,
    }
});