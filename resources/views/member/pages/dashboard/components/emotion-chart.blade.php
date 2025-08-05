@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="{{ asset('assets/member-dashboard/js/emotion-chart.js') }}"></script>
@endpush

<div class="col-span-1 md:col-span-1 lg:col-span-2 bg-white p-4 md:p-6 rounded-3xl shadow-sm">
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4 gap-3 sm:gap-0">
        <div>
            <h3 class="text-lg font-semibold text-gray-800">Perjalanan Emosimu Sepanjang Minggu</h3>
            <p class="text-sm text-gray-600">Pantau fluktuasi emosi harian dan temukan pola yang bisa kamu sadari
                lebih
                awal.</p>
        </div>
        <select class="border border-gray-300 rounded-lg px-3 py-2 text-sm w-full sm:w-auto">
            <option>7 Hari terakhir</option>
        </select>
    </div>

    <!-- Chart -->
    <div class="flex items-center justify-center">
        <div class="w-full max-w-4xl">
            <canvas id="myChart" class="w-full h-64"></canvas>
        </div>
    </div>
</div>