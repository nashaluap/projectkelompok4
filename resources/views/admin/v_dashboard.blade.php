@extends('layout.v_template')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-penjualan">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahPesananBulanan ?? '0' }}</div>
                             <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Pesanan</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-pendapatan">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                           <div class="h5 mb-0 font-weight-bold text-gray-800">Rp{{ number_format($pendapatanBulanan ?? 0, 0, ',', '.') }}</div>
                           <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pendapatan Bulanan</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-coins fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-pesanan">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                           <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalPesanan ?? 0 }}</div>
                           <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Pesanan</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                </div>
                                <div class="col">
                                    <div class="">
                                        <div style="width: 10%" aria-valuenow="10" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-earnings">Earnings Overview</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-revenue">Revenue Sources</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-online"></i> Online
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-referral"></i> Referral
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-offline"></i> Offline
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            
            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-10">
                    <h6 class="m-0 font-weight-bold text-selamat">Selamat Datang Admin</h6>
                </div>
                <div class="card-body">
                <p>Anda login sebagai administrator. Anda memiliki akses penuh terhadap Sistem.</p>
                </div>
            </div>
            <!-- Content Row -->

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-hannacatering">Hanna Catering</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="{{asset('template')}}/img/fotocafe.jpg" alt="...">
                    </div>
                    <p>Ki Hajar Dewantara no.19 Tegal Kelapa Subang, Subang Indonesia 41212</p>
                </div>
            </div>

    <div class="row">
        <!-- Calendar Section -->
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-hannacatering">Jadwal Pengambilan Pesanan</h6>
                </div>
                <div class="card-body">
                    <div id='calendar'></div>   
                </div>
            </div>
        </div>
    </div>   
       
        </div>
    </div>

</div>

@endsection

@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        if (calendarEl) {
            var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            initialDate: '{{ \Carbon\Carbon::now()->toDateString() }}',
            events: [
             @if(isset($jadwalPengambilan) && $jadwalPengambilan->count() > 0)
                @foreach ($jadwalPengambilan as $jadwal)
                    {
                        title: '{{ $jadwal->nama_pemesan }} - {{ \Carbon\Carbon::parse($jadwal->tgl_pesanan)->format("H:i") }}',
                        start: '{{ \Carbon\Carbon::parse($jadwal->tgl_pesanan)->toDateString() }}T{{ \Carbon\Carbon::parse($jadwal->tgl_pesanan)->format("H:i:s") }}',
                        description: '{{ $jadwal->alamat }}',
                        allDay: false
                    }@if (!$loop->last),@endif
                @endforeach
            @endif
            ],
            eventClick: function(info) {
            // Cegah default behavior
            info.jsEvent.preventDefault();

            // Tampilkan alert atau modal
            alert('Nama: ' + info.event.title + '\nAlamat: ' + info.event.extendedProps.description);
        }
        });

            calendar.render();
        } else {
            console.error("Elemen #calendar tidak ditemukan.");
        } 
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myAreaChart').getContext('2d');

    const pendapatanBulanan = @json($pendapatanBulan ?? []);
    const bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: bulan,
            datasets: [{
                label: 'Pendapatan Bulanan',
                data: pendapatanBulanan,
                borderColor: 'rgba(78, 115, 223, 1)',
                backgroundColor: 'rgba(78, 115, 223, 0.05)',
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp' + value.toLocaleString('id-ID');
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>
@endpush