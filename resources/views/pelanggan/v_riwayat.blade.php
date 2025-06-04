@extends('layout.v_template2')
@section('content')
<h3>Riwayat Pesanan Saya</h3>

@if($pesanan->isEmpty())
    <p>Belum ada riwayat pesanan.</p>
@else
<table class="table">
    <thead>
        <tr>
            <th>ID Pesanan</th>
            <th>Tanggal Pesan</th>
            <th>Status</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pesanan as $p)
        <tr>
            <td>{{ $p->id_pesanan }}</td>
            <td>{{ \Carbon\Carbon::parse($p->tanggal_pesanan)->format('d-m-Y') }}</td>
            <td>{{ $p->status }}</td>
            <td>Rp {{ number_format($p->total_harga, 0, ',', '.') }}</td>
            <td>
                <a href="{{ route('riwayat.pesanan.detail', $p->id_pesanan) }}" class="btn btn-sm btn-primary">Detail</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection
