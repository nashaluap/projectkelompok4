@extends('layout.v_template')
@section('content')
  <h1>Halaman Detail Bank</h1>
  <div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Detail Bank</h3>
    </div>
    <!-- /.card-header -->
 
    <!-- form start -->
    <form>
    <div class="card-body">
      <div class="form-group">
      <label for="exampleInputEmail1">Id bank :</label>
      {{ $bank->id_bank }}
      </div>
 
      <div class="form-group">
      <label for="exampleInputPassword1">atas nama :</label>
      {{ $bank->atas_nama }}
      </div>

      <div class="form-group">
      <label for="exampleInputPassword1">nama bank :</label>
      {{ $bank->nama_bank }}
      </div>
 
      <div class="form-group">
      <label for="exampleInputFile">nomor rekening :</label>
      {{ $bank->no_rekening }}
      </div>

      <div class="form-group">
      <label for="exampleInputFile">Foto :</label>
      <img src="{{ url('foto_bank/' . $bank->foto_bank) }}" width="200px">
      </div>
    </div>
    <!-- /.card-body -->
 
    <div class="card-footer">
      <a href="/bank"><button type="button" class="btn btn-primary">Kembali</button></a>
    </div>
    </form>
  </div>
 
@endsection