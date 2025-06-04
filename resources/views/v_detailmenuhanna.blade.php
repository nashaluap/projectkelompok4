@extends('layout.v_template2')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ url('foto_menu/' . $menu->foto_menu) }}"
                 class="img-fluid rounded shadow-sm"
                 alt="{{ $menu->nama_menu }}">
        </div>
        <div class="col-md-6">
            <h2 class="mb-3">{{ $menu->nama_menu }}</h2>
            <p>{{ $menu->deskripsi }}</p>
            <h4 class="text-success2 mb-4">Rp{{ number_format($menu->harga, 0, ',', '.') }}</h4>

            @if(session('pesan'))
              <div class="alert alert-succes">{{ session('pesan') }}</div>
            @endif

            <form action="{{ route('menu.addToCart', $menu->id_menu) }}" method="POST" class="d-flex align-items-center gap-2">
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
                
                    <a href="/menuhanna"><button type="button" class="btn btn-primary">Kembali</button></a>
                  </div>
            </form>
        </div>
    </div>
</div>
@endsection