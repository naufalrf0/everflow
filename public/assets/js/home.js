// Initialize the performance chart with animated data
const ctx = document.getElementById('performanceChart').getContext('2d');
const performanceChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['08:00', '12:00', '16:00'], // Example time labels
        datasets: [{
            label: 'Daya (kW)',
            data: [145, 148, 150], // Example power data
            borderColor: '#4a90e2',
            backgroundColor: 'rgba(74, 144, 226, 0.2)',
            fill: true,
            tension: 0.3,
            pointBackgroundColor: '#357ab8',
            pointRadius: 5
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true,
                position: 'top',
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
