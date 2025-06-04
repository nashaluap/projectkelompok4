@extends('layout.v_template2')
@section('content')
<div class="container mt-5">

    <form method="GET" action="{{ route('menuUser') }}" class="mb-4 row g-3 align-items-end">
    <div class="col-md-4">
        <input type="text" name="keyword" placeholder="Cari menu..." value="{{ request('keyword') }}" class="form-control">
    </div>

    <div class="col-md-3">
        <select name="sort" class="form-select" onchange="this.form.submit()">
            <option value="">-- Urutkan --</option>
            <option value="nama" {{ request('sort') == 'nama' ? 'selected' : '' }}>Nama Menu (A-Z)</option>
        </select>
    </div>

    <div class="col-md-3">
        <select name="kategori" class="form-select" onchange="this.form.submit()">
            <option value="">-- Pilih Kategori --</option>
            @foreach ($kategori as $k)
                <option value="{{ $k->id_paket }}" {{ request('kategori') == $k->id_paket ? 'selected' : '' }}>
                    {{ $k->paket }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-2">
        <button type="submit" class="btn btn-primary w-100">Cari</button>
    </div>
</form>

<div style="text-align: center; margin: 20px;">
    <h2 class="text-center text-darkorange mt-5 mb-4" style="color: darkorange;">Menu Kami</h2>
  <div style="margin: 20px;">

    <div class="row gy-4 justify-content=center">
    @foreach ($menu as $m)
    <div class="col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
        <div class="card h-100">
            <img src="{{ url('foto_menu/' . $m->foto_menu) }}" class="card-img-top" alt="{{ $m->nama_menu }}">
            <div class="card-body text-center d-flex flex-column justify-content-between">
                <div>
                    <h5 class="card-title">{{ $m->nama_menu }}</h5>
                    <p class="card-text">{{ $m->deskripsi }}</p>
                    <p class="text-muted mb-1">Kategori: {{ $m->nama_paket }}</p>
                    <p class="card-text"><strong>Harga:</strong> Rp{{ number_format($m->harga, 0, ',', '.') }}</p>
                </div>
                <div class="mt-3">
                    <a href="{{ route('menu.detail', $m->id_menu) }}" class="btn btn-add">View Details</a>
                </div>
                <form action="{{ route('menu.addToCart', $m->id_menu) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="quantity">Jumlah:</label>
                        <input type="number"
                               name="quantity"
                               id="quantity"
                               value="1"
                               min="1"
                               class="form-control"
                               style="width: 100px;">
                    </div>
                    <div class="card-footer">
                    <button type="submit" class="btn btn-add">Tambah ke Keranjang</button>    
                </form>
            </div>

            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
</div>

@endsection