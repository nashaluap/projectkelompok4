@extends('layout.v_template')
@section('content')
  <h1>Halaman Detail Paket</h1>
  <div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Detail Paket</h3>
    </div>
    <!-- /.card-header -->
 
    <!-- form start -->
    <form>
    <div class="card-body">
      <div class="form-group">
      <label for="exampleInputEmail1">Id Paket :</label>
      {{ $paket->id_paket }}
      </div>
 
      <div class="form-group">
      <label for="exampleInputPassword1">Paket :</label>
      {{ $paket->paket }}
      </div>
 
      <div class="form-group">
      <label for="exampleInputFile">Uraian :</label>
      {{ $paket->uraian }}
      </div>

      <div class="form-group">
      <label for="exampleInputFile">Foto :</label>
      <img src="{{ url('foto_paket/' . $paket->foto_paket) }}" width="200px">
      </div>
    </div>
    <!-- /.card-body -->
 
    <div class="card-footer">
      <a href="/paket"><button type="button" class="btn btn-primary">Kembali</button></a>
    </div>
    </form>
  </div>
 
@endsection