@extends('layout.v_template')
@section('content')
  <h1>Halaman Detail Menu</h1>
  <div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Detail Menu</h3>
    </div>
    <!-- /.card-header -->
 
    <!-- form start -->
    <form>
    <div class="card-body">
      <div class="form-group">
      <label for="exampleInputEmail1">ID Menu :</label>
      {{ $menu->id_menu }}
      </div>
 
      <div class="form-group">
      <label for="exampleInputPassword1">Nama Menu :</label>
      {{ $menu->nama_menu }}
      </div>
 
      <div class="form-group">
      <label for="exampleInputFile">Harga :</label>
      {{ $menu->harga }}
      </div>

      <div class="form-group">
      <label for="exampleInputFile">Kategori :</label>
      {{ $menu->id_paket }}
      </div>

      <div class="form-group">
      <label for="exampleInputFile">Deskripsi :</label>
      {{ $menu->deskripsi }}
      </div>
 
      <div class="form-group">
      <label for="exampleInputFile"></label>
      <img src="{{ url('foto_menu/' . $menu->foto_menu) }}" width="200px">
      </div>
    </div>
    <!-- /.card-body -->
 
    <div class="card-footer">
      <a href="/menu"><button type="button" class="btn btn-primary">Kembali</button></a>
    </div>
    </form>
  </div>
 
@endsection