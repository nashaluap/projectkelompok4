<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>
</head>
<body>
    <h2>Laporan Transaksi Bulan {{ $bulan }} Tahun {{ $tahun }}</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Pesanan</th>
                <th>Tanggal</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanan as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->id_pesanan }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                    <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td colspan="3" align="right"><strong>Total Pendapatan</strong></td>
            <td><strong>Rp 
                {{ number_format($pesanan->sum('total_harga'), 0, ',', '.') }}
            </strong></td>
        </tr>
    </tfoot>
    </table>
</body>
</html>