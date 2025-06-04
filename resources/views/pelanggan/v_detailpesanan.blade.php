@extends('layout.v_template2')
@section('content')

<h3>Detail Pesanan: {{ $pesanan->id_pesanan }}</h3>

<table class="table table-bordered">
    <tr>
        <th>ID Pesanan</th>
        <td>{{ $pesanan->id_pesanan }}</td>
    </tr>
    <tr>
        <th>Tanggal Pesanan</th>
        <td>{{ \Carbon\Carbon::parse($pesanan->tanggal_pesanan)->format('d-m-Y') }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>{{ ucfirst($pesanan->status) }}</td>
    </tr>
    <tr>
        <th>Total Harga</th>
        <td>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
    </tr>
    <tr>
        <th>Nama Pemesan</th>
        <td>{{ $pesanan->nama_pemesan }}</td>
    </tr>
    <tr>
        <th>No. WhatsApp</th>
        <td>{{ $pesanan->no_wa }}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>{{ $pesanan->alamat }}</td>
    </tr>
    <tr>
        <th>Catatan</th>
        <td>{{ $pesanan->catatan ?? '-' }}</td>
    </tr>
</table>

<a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
@endsection