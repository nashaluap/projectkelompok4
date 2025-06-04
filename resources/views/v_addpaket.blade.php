@section('title') 
Paket
@endsection 
@extends ('layout/v_template') 
@section('page') 
Tambah Data Paket
@endsection 
@section("content") 
<div class="container-fluid"> 
    <div class="row"> 
    <!-- left column --> 
    <div class="col-md-6"> 

    <!-- general form elements--> 
    <div class="card card-primary"> 
      <div class="card-header"> 
        <h3 class="card-title">Form Tambah Paket</h3> 
    </div> 
    <!--/.card-header --> 
    <!-- form start--> 
    <form action="/paket/insert" method="POST" enctype="multipart/form-data"> 
      @csrf 
        <div class="card-body"> 
        <div class="form-group"> 
            <label for="exampleInputEmail1">ID Paket</label> 
            <input type="text" name="id_paket" class="form-control" value="{{ $newID }}"readonly> 
            <div class="text-danger"> 
                @error('id_paket') 
                    {{ $message}} 
                @enderror 
            </div> 
        </div> 
        <div class="form-group"> 
            <label for="exampleInputEmail1">Nama Paket</label> 
            <input type="text" name="paket" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama Paket" value="{{ old('paket')}}"> 
            <div class="text-danger"> 
            @error('paket') 
                {{$message}}
            @enderror 
        </div> 
    </div>
    <div class="form-group"> 
        <label for="exampleInputEmail1">Uraian</label> 
        <input type="text" name="uraian" class="form-control" id="exampleInputEmail1" placeholder="Masukan uraian" value="{{ old('uraian')}}"> 
        <div class="text-danger"> 
            @error('uraian') 
                {{ $message}} 
            @enderror 
        </div> 
    </div> 
    <div class="form-group"> 
        <label for="exampleInputFile">Foto paket</label> 
        <div class="input-group"> 
          <div class="custom-file"> 
            <input type="file" name="foto_paket" class="custom-file-input" id="exampleInputFile"> 
            <label class="custom-file-label" for="exampleInputFile">Choose file</label> 
        </div> 
        <div class="input-group-append"> 
          <span class="input-group-text">Upload</span> 
        </div> 
        <br> 
        <div class="text-danger"> 
            @error('foto_paket') 
                {{ $message}}
            @enderror 
            </div> 
        </div> 
    </div> 
    </div> 
    <!--/.card-body--> 

    <div class="card-footer"> 
        <button type="submit" class="btn btn-primary">Insert</button> 
    </div> 
    <div class="card-footer">
      <a href="/paket"><button type="button" class="btn btn-primary">Kembali</button></a>
    </div>
    </form> 
    </div> 
    <!--/.card--> 
    </div> 
    </div> 
</div> 
@endsection