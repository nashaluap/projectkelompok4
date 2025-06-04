@section('title') 
Bank
@endsection 
@extends ('layout/v_template') 
@section('page') 
Tambah Data Bank
@endsection 
@section("content") 
<div class="container-fluid"> 
    <div class="row"> 
    <!-- left column --> 
    <div class="col-md-6"> 

    <!-- general form elements--> 
    <div class="card card-primary"> 
      <div class="card-header"> 
        <h3 class="card-title">Form Tambah Bank</h3> 
    </div> 
    <!--/.card-header --> 
    <!-- form start--> 
    <form action="/bank/insert" method="POST" enctype="multipart/form-data"> 
      @csrf 
        <div class="card-body"> 
        <div class="form-group"> 
            <label for="exampleInputEmail1">Id bank</label> 
            <input type="text" name="id_bank" class="form-control" id="exampleInputEmail1" placeholder="Masukan Id bank" value="{{ old('id_bank')}}"> 
            <div class="text-danger"> 
                @error('id_bank') 
                    {{ $message}} 
                @enderror 
            </div> 
        </div> 
        <div class="form-group"> 
            <label for="exampleInputEmail1">Atas Nama</label> 
            <input type="text" name="atas_nama" class="form-control" id="exampleInputEmail1" placeholder="Masukan nama pemilik rekening bank" value="{{  old('atas_nama')}}"> 
            <div class="text-danger"> 
            @error('atas_nama') 
                {{$message}}
            @enderror 
        </div> 
    </div>
        <div class="form-group"> 
            <label for="exampleInputEmail1">Nama Bank</label> 
            <input type="text" name="nama_bank" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama bank" value="{{  old('nama_bank')}}"> 
            <div class="text-danger"> 
            @error('nama_bank') 
                {{$message}}
            @enderror 
        </div> 
    </div>
    <div class="form-group"> 
        <label for="exampleInputEmail1">Nomor Rekening</label> 
        <input type="text" name="no_rekening" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nomor Rekening" value="{{ old('no_rekening')}}"> 
        <div class="text-danger"> 
            @error('no_rekening') 
                {{ $message}} 
            @enderror 
        </div> 
    </div> 
    <div class="form-group"> 
        <label for="exampleInputFile">Foto bank</label> 
        <div class="input-group"> 
          <div class="custom-file"> 
            <input type="file" name="foto_bank" class="custom-file-input" id="exampleInputFile"> 
            <label class="custom-file-label" for="exampleInputFile">Choose file</label> 
        </div> 
        <div class="input-group-append"> 
          <span class="input-group-text">Upload</span> 
        </div> 
        <br> 
        <div class="text-danger"> 
            @error('foto_bank') 
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
      <a href="/bank"><button type="button" class="btn btn-primary">Kembali</button></a>
    </div>
    </form> 
    </div> 
    <!--/.card--> 
    </div> 
    </div> 
</div> 
@endsection