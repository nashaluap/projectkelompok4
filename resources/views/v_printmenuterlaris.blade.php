<!DOCTYPE html>
<html>
<head>
    <title>Laporan Menu Terlaris</title>
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 8px; }
    </style>
</head>
<body>
    <h2>Laporan Menu Terlaris</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Menu</th>
                <th>Nama Menu</th>
                <th>Total Terjual</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menuTerlaris as $no => $menu)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $menu->id_menu }}</td>
                    <td>{{ $menu->nama_menu }}</td>
                    <td>{{ $menu->total_terjual }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
