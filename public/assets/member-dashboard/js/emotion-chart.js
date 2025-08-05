const ctx = document.getElementById('myChart');

const stringData = ['😄 Bahagia', '😐 Netral', '😡 Marah', '😟 Kecewa', '😭 Sedih', '😴 Menangis'];

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
        datasets: [{
            label: 'Emosi',
            data: [6, 1, 4, 6, 2, 3, 6], 
            borderWidth: 1,
            backgroundColor: '#d90429',
            borderColor: '#d90429'
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        return stringData[value] || '';
                    }
                }
            }
        },
        plugins: {
            tooltip: {
                callbacks: {
                    label: function(context) {
                        const idx = context.parsed.y;
                        return stringData[idx] || '';
                    }
                }
            }
        }
    }
});