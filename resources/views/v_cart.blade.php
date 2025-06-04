@extends('layout.v_template2')
@section('content')

<div class="container my-5">
    <h2 class="mb-4">Keranjang Belanja</h2>

    @if(count($cart) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Menu</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $item)
                @if($item->menu) {{-- cek apakah menu ada --}}
                    @php $total += $item->quantity * $item->menu->harga; @endphp
                    <tr>
                        <td><img src="{{ asset('foto_menu/'.$item->menu->foto_menu) }}" width="80"></td>
                        <td>{{ $item->menu->nama_menu ?? '-' }}</td>
                        <td>Rp {{ number_format($item->menu->harga) ?? 0 }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rp {{ number_format($item->quantity * $item->menu->harga) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $item->menu->id_menu) }}" method="POST">
                                @csrf
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td colspan="6">Menu belum ditambahkan.</td>
                    </tr>
                @endif
            @endforeach
                    <tr>
                    <td colspan="4" class="text-end"><strong>Total</strong></td>
                    <td><strong>Rp{{ number_format($total, 0, ',', '.') }}</strong></td>
                </tr>
            </tbody>
        </table>

        <div class="d-flex justify-content-end gap-3">
            <a href="{{ route('menuUser') }}" class="btn btn-secondary">Lanjut Belanja</a>
            <a href="{{ route('pemesanan') }}" class="btn btn-primary">Checkout</a>
        </div>
    @else
        <div class="alert alert-info">
            Keranjang masih kosong. Yuk <a href="{{ route('menuUser') }}">belanja dulu</a>!
        </div>
    @endif
</div>
@endsection
