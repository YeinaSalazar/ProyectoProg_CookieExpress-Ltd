(function () {
    function buildChart(id, config) {
        var canvas = document.getElementById(id);
        if (!canvas || typeof Chart === 'undefined') {
            return;
        }

        new Chart(canvas, config);
    }

    document.addEventListener('DOMContentLoaded', function () {
        buildChart('reportsChart', {
            type: 'line',
            data: {
                labels: ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4'],
                datasets: [
                    { label: 'Ingresos', data: [8200, 9600, 10800, 14200], borderColor: '#ff7a1a', tension: 0.35 },
                    { label: 'Paquetes', data: [122, 148, 173, 241], borderColor: '#0c2340', tension: 0.35 }
                ]
            },
            options: { responsive: true, maintainAspectRatio: false }
        });

        buildChart('reportsDonutChart', {
            type: 'doughnut',
            data: {
                labels: ['Miami > San Jose', 'Madrid > Cartago', 'Houston > Heredia'],
                datasets: [{ data: [58, 24, 18], backgroundColor: ['#0c2340', '#1570ef', '#ff7a1a'] }]
            },
            options: { responsive: true, maintainAspectRatio: false }
        });
    });
})();
