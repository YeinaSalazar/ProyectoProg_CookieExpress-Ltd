(function () {
    function buildChart(id, config) {
        var canvas = document.getElementById(id);
        if (!canvas || typeof Chart === 'undefined') {
            return;
        }

        new Chart(canvas, config);
    }

    document.addEventListener('DOMContentLoaded', function () {
        buildChart('adminKpiChart', {
            type: 'line',
            data: {
                labels: ['Nov', 'Dic', 'Ene', 'Feb', 'Mar', 'Abr'],
                datasets: [{
                    label: 'Paquetes procesados',
                    data: [410, 462, 505, 544, 598, 684],
                    borderColor: '#0c2340',
                    backgroundColor: 'rgba(12, 35, 64, 0.08)',
                    tension: 0.36,
                    fill: true
                }]
            },
            options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } } }
        });

        buildChart('logisticsStageChart', {
            type: 'bar',
            data: {
                labels: ['Recepcion', 'Clasificacion', 'Aduana', 'Entrega'],
                datasets: [{
                    label: 'Casos',
                    data: [42, 31, 16, 12],
                    backgroundColor: ['#0c2340', '#1570ef', '#ff7a1a', '#109d69'],
                    borderRadius: 14
                }]
            },
            options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } } }
        });
    });
})();
