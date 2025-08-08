@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush

<div class="col-span-1 md:col-span-1 lg:col-span-2 bg-white p-4 md:p-6 rounded-3xl shadow-sm border border-gray-100">
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6 gap-3 sm:gap-0">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                Perjalanan Emosimu Sepanjang Minggu
            </h3>
            <p class="text-sm text-gray-600 mt-1">
                Pantau fluktuasi emosi harian dan temukan pola yang bisa kamu sadari lebih awal.
            </p>
        </div>
        <div class="flex items-center gap-3">
            <select disabled
                class="border border-gray-200 rounded-lg px-3 py-2 text-sm w-full sm:w-auto bg-gray-100 text-gray-500 cursor-not-allowed">
                <option>7 Hari terakhir</option>
            </select>
        </div>
    </div>

    <!-- Chart Container -->
    <div class="flex items-center justify-center bg-gradient-to-br from-gray-50 to-white rounded-xl p-4">
        <div class="w-full max-w-4xl">
            <canvas id="{{ $chartId }}" class="w-full" style="height: 300px;"></canvas>
        </div>
    </div>

    {{-- <!-- Summary Stats -->
    <div class="mt-6 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
        @foreach($moodStats as $mood => $stat)
        <div class="text-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
            <div class="text-2xl mb-1">{{ $stat['icon'] }}</div>
            <div class="text-lg font-bold text-gray-800">{{ $stat['percentage'] }}%</div>
            <div class="text-xs text-gray-600 capitalize">{{ ucfirst($mood) }}</div>
            <div class="text-xs text-gray-400">{{ $stat['count'] }} kali</div>
        </div>
        @endforeach
    </div> --}}

    <!-- Summary Stats -->
    <div class="mt-6 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
        <div class="flex items-center justify-center gap-2 p-3 rounded-lg hover:bg-gray-100 transition-colors">
            <img src="{{ asset('assets/member-dashboard/images/1-happy-active.png') }}" alt="Bahagia Icon"
                class="w-6 h-6">
            <span class="text-sm font-medium text-gray-800 capitalize">Bahagia</span>
        </div>
        <div class="flex items-center justify-center gap-2 p-3 rounded-lg hover:bg-gray-100 transition-colors">
            <img src="{{ asset('assets/member-dashboard/images/2-netral-active.png') }}" alt="Netral Icon"
                class="w-6 h-6">
            <span class="text-sm font-medium text-gray-800 capitalize">Netral</span>
        </div>
        <div class="flex items-center justify-center gap-2 p-3 rounded-lg hover:bg-gray-100 transition-colors">
            <img src="{{ asset('assets/member-dashboard/images/3-angry-active.png') }}" alt="Marah Icon"
                class="w-6 h-6">
            <span class="text-sm font-medium text-gray-800 capitalize">Marah</span>
        </div>
        <div class="flex items-center justify-center gap-2 p-3 rounded-lg hover:bg-gray-100 transition-colors">
            <img src="{{ asset('assets/member-dashboard/images/4-disappointed-active.png') }}" alt="Kecewa Icon"
                class="w-6 h-6">
            <span class="text-sm font-medium text-gray-800 capitalize">Kecewa</span>
        </div>
        <div class="flex items-center justify-center gap-2 p-3 rounded-lg hover:bg-gray-100 transition-colors">
            <img src="{{ asset('assets/member-dashboard/images/5-sad-active.png') }}" alt="Sedih Icon" class="w-6 h-6">
            <span class="text-sm font-medium text-gray-800 capitalize">Sedih</span>
        </div>
        <div class="flex items-center justify-center gap-2 p-3 rounded-lg hover:bg-gray-100 transition-colors">
            <img src="{{ asset('assets/member-dashboard/images/6-cry-active.png') }}" alt="Menangis Icon"
                class="w-6 h-6">
            <span class="text-sm font-medium text-gray-800 capitalize">Menangis</span>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let chartInstance = null;

            function initChart(chartLabels, chartData, moodLabels) {
                const ctx = document.getElementById('{{ $chartId }}');

                if (!ctx) {
                    console.warn('Chart canvas not found');
                    return;
                }

                // Destroy existing chart if it exists
                if (chartInstance) {
                    chartInstance.destroy();
                    chartInstance = null;
                }

                // Enhanced color palette
                const moodColors = [
                    '#fbe6ea', // Happy 
                    '#f9d9df', // Neutral 
                    '#f3b1bd', // Angry 
                    '#d90429', // Disappointed 
                    '#c30425', // Sad 
                    '#ae0321'  // Crying
                ];

                chartInstance = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: chartLabels,
                        datasets: [{
                            label: 'Mood Dominan',
                            data: chartData,
                            backgroundColor: chartData.map(value => moodColors[value] + '80'),
                            borderColor: chartData.map(value => moodColors[value]),
                            borderWidth: 2,
                            borderRadius: 8,
                            borderSkipped: false,
                            maxBarThickness: 50
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                                titleColor: '#ffffff',
                                bodyColor: '#ffffff',
                                borderColor: '#ffffff',
                                borderWidth: 1,
                                cornerRadius: 8,
                                callbacks: {
                                    label: function (context) {
                                        const moodIndex = context.parsed.y;
                                        return moodLabels[moodIndex] || 'Tidak ada data';
                                    }
                                }
                            }
                        },
                        scales: {
                            x: {
                                grid: {
                                    display: false
                                },
                                border: {
                                    display: false
                                },
                                ticks: {
                                    color: '#6B7280',
                                    font: {
                                        size: 12,
                                        weight: 'bold'
                                    }
                                }
                            },
                            y: {
                                beginAtZero: true,
                                max: moodLabels.length - 1,
                                grid: {
                                    color: '#F3F4F6',
                                    borderDash: [5, 5]
                                },
                                border: {
                                    display: false
                                },
                                ticks: {
                                    stepSize: 1,
                                    color: '#6B7280',
                                    font: {
                                        size: 11
                                    },
                                    callback: function (value) {
                                        return moodLabels[value] || '';
                                    }
                                }
                            }
                        },
                        animation: {
                            duration: 1500,
                            easing: 'easeInOutQuart'
                        },
                        interaction: {
                            intersect: false,
                            mode: 'index'
                        }
                    }
                });
            }

            // Initialize chart on page load with initial data
            const initialLabels = @json($chartData['labels']);
            const initialData = @json($chartData['data']);
            const initialMoodLabels = @json($chartData['moodLabels']);

            initChart(initialLabels, initialData, initialMoodLabels);

            // Listen for chart update events from Livewire
            document.addEventListener('livewire:init', () => {
                Livewire.on('updateChart', (newChartData) => {
                    console.log('Updating chart with new data:', newChartData);
                    initChart(
                        newChartData[0].labels,
                        newChartData[0].data,
                        newChartData[0].moodLabels
                    );
                });
            });
        });
    </script>
@endpush