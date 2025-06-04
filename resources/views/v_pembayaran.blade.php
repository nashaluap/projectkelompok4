@extends('layout.v_template2')
@section('content')

<div class="container">
    <h2>Form Pembayaran</h2>

    <p>Total Pesanan: <strong>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</strong></p>

    <form action="{{ route('pembayaran.simpan') }}" method="POST">
        @csrf
        <input type="hidden" name="pesanan_id" value="{{ $pesanan->id }}">

        <div class="mb-3">
            <label>Tipe Pembayaran</label><br>
            <input type="radio" name="tipe_pembayaran" value="DP" required> DP (20% minimal)<br>
            <input type="radio" name="tipe_pembayaran" value="Lunas" required> Lunas
        </div>

        <div class="mb-3">
            <label>Nominal Pembayaran</label>
            <input type="number" name="nominal" class="form-control" required>
            @error('nominal')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <button type="submit" class="btn btn-primary">Bayar</button>
    </form>
</div>
@endsection