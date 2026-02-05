import Chart from 'chart.js/auto';

export function initProgressCharts() {
    const tasksChartEl = document.getElementById('tasksChart');
    if (tasksChartEl) {
        new Chart(tasksChartEl, {
            type: 'bar',
            data: {
                labels: ['Created', 'Completed'],
                datasets: [
                    {
                        data: [25, 18],
                        backgroundColor: '#3b82f6',
                        borderRadius: 6
                    },
                    {
                        data: [14, 12],
                        backgroundColor: '#22c55e',
                        borderRadius: 6
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: {
                        grid: { display: false },
                        categoryPercentage: 0.55,
                        barPercentage: 0.65
                    },
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 5 },
                        grid: { color: '#e5e7eb' }
                    }
                }
            }
        });
    }

    const habitChartEl = document.getElementById('habitChart');
    if (habitChartEl) {
        new Chart(habitChartEl, {
            type: 'bar',
            data: {
                labels: [''],
                datasets: [
                    {
                        data: [80],
                        backgroundColor: '#fb923c',
                        borderRadius: 6
                    },
                    {
                        data: [60],
                        backgroundColor: '#22c55e',
                        borderRadius: 6
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: {
                        display: false,
                        categoryPercentage: 0.6,
                        barPercentage: 0.6
                    },
                    y: {
                        beginAtZero: true,
                        max: 100,
                        ticks: { callback: v => v + '%' },
                        grid: { color: '#e5e7eb' }
                    }
                }
            }
        });
    }
}
