import Chart from 'chart.js/auto';

export function initProgressCharts() {
    // TASKS CHART
    const tasksChartEl = document.getElementById('tasksChart');

    if (tasksChartEl) {
        const created       = Number(tasksChartEl.dataset.created || 0);
        const completed     = Number(tasksChartEl.dataset.completed || 0);
        const createdPrev   = Number(tasksChartEl.dataset.createdPrev || 0);
        const completedPrev = Number(tasksChartEl.dataset.completedPrev || 0);

        new Chart(tasksChartEl, {
            type: 'bar',
            data: {
                labels: ['Created', 'Completed'],
                datasets: [
                    {
                        data: [created, completed],
                        backgroundColor: '#3b82f6',
                        borderRadius: 6
                    },
                    {
                        data: [createdPrev, completedPrev],
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

    // HABIT CHART
    const habitChartEl = document.getElementById('habitChart');

    if (habitChartEl) {
        const current = Number(habitChartEl.dataset.current || 0);
        const target  = Number(habitChartEl.dataset.target || 100);

        new Chart(habitChartEl, {
            type: 'bar',
            data: {
                labels: [''],
                datasets: [
                    {
                        data: [current],
                        backgroundColor: '#fb923c',
                        borderRadius: 6
                    },
                    {
                        data: [target],
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
                        ticks: { callback: v => `${v}%` },
                        grid: { color: '#e5e7eb' }
                    }
                }
            }
        });
    }
}
