@extends('layout.v_template')
@section('content')
  <h1>Halaman Detail Pesanan</h1>
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Detail Pesanan</h3>
    </div>

    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label>Id pesanan :</label>
          {{ $pesanan->id_pesanan }}
        </div>

        <div class="form-group">
          <label>Pelanggan :</label>
          {{ $pesanan->nama_pemesan }}
        </div>

        <div class="form-group">
          <label>Tanggal Pesanan :</label>
          {{ $pesanan->tgl_pesanan }}
        </div>

        <div class="form-group">
          <label>Status :</label>
          {{ $pesanan->status }}
        </div>

        <div class="form-group">
          <label>Total Harga :</label>
          Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}
        </div>

        <div class="form-group">
          <label>Total Pesanan :</label>
          {{ $pesanan->total_pesanan }}
        </div>

        <div class="form-group">
          <label>Rincian Menu yang Dipesan:</label>
          <div class="table-responsive mt-2">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Menu</th>
                  <th>Jumlah</th>
                  <th>Subtotal</th>
                </tr>
              </thead>
              <tbody>
                @php
        $total_jumlah = 0;
        $total_harga = 0;
      @endphp
      @foreach($detail_menu as $index => $item)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $item->nama_menu }}</td>
          <th>{{ $pesanan->total_pesanan }}</th>
          <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
        </tr>
        @php
        $total_jumlah += $item->jumlah_pesanan;
        $total_harga += $item->subtotal;
        @endphp
        @endforeach
          <tr>
            <th colspan="2" class="text-center">Total</th>
            <th>{{ $total_jumlah }}</th>
            <th>Rp {{ number_format($total_harga, 0, ',', '.') }}</th>
          </tr>
          </tbody>
        </table>
        </div>
        </div>
      </div>

      <!-- /.card-body -->
      <div class="card-footer">
        <a href="/pesanan"><button type="button" class="btn btn-primary">Kembali</button></a>
      </div>
    </form>
  </div>
@endsection