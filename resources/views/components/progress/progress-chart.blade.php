{{-- Progress Summary --}}
<div class="bg-white rounded-xl border border-slate-200 p-6">
    <h2 class="text-lg font-semibold mb-4">Progress Summary</h2>
    <x-layout.hr />

    {{-- Stats --}}
    <div class="space-y-3 mb-6">
        <div class="flex items-center gap-2 text-sm">
            <span class="inline-flex items-center justify-center w-5 h-5 rounded bg-blue-500 text-white text-xs">✓</span>
            <span>Tasks Completed:</span>
            <span class="font-semibold">2 / 5</span>

        </div>
        <x-layout.hr />
        <div class="flex items-center gap-2 text-sm">
            <span class="inline-flex items-center justify-center w-5 h-5 rounded bg-green-500 text-white text-xs">✓</span>
            <span>Habits Completed:</span>
            <span class="font-semibold">1 / 3</span>

        </div>
        <x-layout.hr />
    </div>

    {{-- Charts --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        {{-- Tasks This Week --}}
        <div class="border rounded-lg p-4">
            <h3 class="text-sm font-semibold mb-2">Tasks This Week</h3>

            <div class="h-40">
                <canvas id="tasksChart"></canvas>
            </div>
        </div>

        {{-- Habit Success --}}
        <div class="border rounded-lg p-4">
            <h3 class="text-sm font-semibold mb-2">Habit Success</h3>

            <div class="flex items-center gap-6">
                <div class="h-40 w-32">
                    <canvas id="habitChart"></canvas>
                </div>

                <div>
                    <p class="text-2xl font-semibold">80%</p>
                    <p class="text-sm text-slate-600 mt-1">Best Streak</p>
                    <p class="text-sm text-slate-600">7 days</p>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    /* TASKS THIS WEEK — FIXED */
    new Chart(document.getElementById('tasksChart'), {
        type: 'bar',
        data: {
            labels: ['Created', 'Completed'],
            datasets: [{
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
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false
                    },
                    categoryPercentage: 0.55, // 👈 group width
                    barPercentage: 0.65 // 👈 SPACE BETWEEN BLUE & GREEN
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 5
                    },
                    grid: {
                        color: '#e5e7eb'
                    }
                }
            }
        }
    });

    new Chart(document.getElementById('habitChart'), {
        type: 'bar',
        data: {
            labels: [''],
            datasets: [{
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
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                x: {
                    display: false,
                    categoryPercentage: 0.6,
                    barPercentage: 0.6
                },
                y: {
                    beginAtZero: true,
                    max: 100,
                    ticks: {
                        callback: v => v + '%'
                    },
                    grid: {
                        color: '#e5e7eb'
                    }
                }
            }
        }
    });
</script>