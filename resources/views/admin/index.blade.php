@extends('layouts.admin-layout')

@section('title', 'Dashboard Pemantauan')
@section('page-title', 'Dashboard Pemantauan')

@section('meta')
    <meta name="description" content="Dashboard Pemantauan Generator untuk memonitor kinerja alat power generator.">
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Info Cards -->
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5>{{ $dashboardData['kecepatan_bandul'] }} RPM</h5>
                        <p>Kecepatan Bandul</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5>{{ $dashboardData['total_energi'] }} KW</h5>
                        <p>Energi yang Dihasilkan</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5>{{ $dashboardData['voltase_baterai'] }} V</h5>
                        <p>Voltase Baterai</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Performance Report Section -->
        <div class="row">
            <div class="col-12 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Laporan Performa Bandul</h5>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Waktu</th>
                                    <th>Kecepatan (RPM)</th>
                                    <th>Daya (kW)</th>
                                    <th>Fluktuasi Daya (%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dashboardData['report'] as $report)
                                    <tr>
                                        <td>{{ $report->waktu_kinerja_bandul->format('H:i') }}</td>
                                        <td>{{ $report->kecepatan_bandul }}</td>
                                        <td>{{ $report->total_daya }}</td>
                                        <td>{{ number_format(($report->total_daya / 150) * 100, 1) }}%</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">-- No Data Available --</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Grafik Performa Energi</h5>
                        <canvas id="performanceChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('performanceChart').getContext('2d');
            var performanceChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($dashboardData['report']->pluck('waktu_kinerja_bandul')->map(fn($waktu) => $waktu->format('H:i'))),
                    datasets: [{
                        label: 'Daya (kW)',
                        data: @json($dashboardData['report']->pluck('total_daya')),
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            ticks: {
                                autoSkip: true,
                                maxTicksLimit: 3
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection