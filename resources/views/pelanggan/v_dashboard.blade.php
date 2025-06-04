@extends('layout.v_template2')
@section('content')

 <div class="container mt-5">
        <h1 class="mb-4" style="color: orange; font-weight: bold;"> Selamat datang, {{ $user->name }}!</h1>
        <ul>
            @forelse ($pesanan as $item)
                <li>{{ $item->nama_paket }} - Status: {{ $item->status }}</li>
            @empty
            @endforelse
        </ul>
    </div>
       <h3 class="mb-4 text-center">Riwayat Pemesanan Anda</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pesanan</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pesanan as $index => $p)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($p->created_at)->format('d M Y') }}</td>
                            <td>Rp{{ number_format($p->total_harga, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge bg-{{ $p->status == 'Selesai' ? 'success' : ($p->status == 'Diproses' ? 'warning' : 'secondary') }}">
                                    {{ $p->status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('dashboard.pelanggan.detail', $p->id_pesanan) }}" class="btn btn-sm btn-primary">Lihat</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada pesanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection