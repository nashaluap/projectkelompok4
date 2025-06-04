@section('title') 
Menu
@endsection 
@extends ('layout/v_template') 
@section('page') 
Edit Data Menu
@endsection 
@section('content') 
<div class="container-fluid"> 
    <div class="row"> 
    <!-- left column --> 
    <div class="col-md-6"> 

    <!-- general form elements --> 
    <div class="card card-primary"> 
    <div class="card-header"> 
    <h3 class="card-title">Form Edit</h3> 
    </div> 
    <!--/.card-header --> 
    <!-- form start --> 
    <form action="/menu/update/{{$menu->id_menu}}" method="POST" enctype="multipart/form-data"> 
      @csrf 
        <div class="card-body"> 
        <div class="form-group"> 
        <label for="exampleInputEmail1">ID menu</label> 
        <input type="text" name="id_menu" class="form-control" id="exampleInputEmail1" placeholder="Masukan id_menu" value="{{$menu->id_menu}}" readonly> 
        <div class="text-danger"> 
            @error('id_menu') 
            {{$message}}
            @enderror 
         </div> 
        </div> 
        <div class="form-group"> 
            <label for="exampleInputEmail1">Nama menu</label> 
            <input type="text" name="nama_menu" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama menu" value="{{$menu->nama_menu}}">
            <div class="text-danger"> 
                @error('nama_menu') 
                    {{$message}}
                @enderror 
            </div> 
        </div>
        <div class="form-group"> 
        <label for="exampleInputEmail1">Harga</label> 
        <input type="text" name="harga" class="form-control" id="exampleInputEmail1" placeholder="Masukan Harga" value="{{$menu->harga}}"> 
        <div class="text-danger"> 
            @error('harga') 
                {{ $message}} 
            @enderror 
        </div> 
    </div> 
    <div class="form-group"> 
        <label for="exampleInputEmail1">Kategori</label> 
        <input type="text" name="id_paket" class="form-control" id="exampleInputEmail1" placeholder="Masukan Kategori" value="{{$menu->id_paket}}"> 
        <div class="text-danger"> 
            @error('id_paket') 
                {{ $message}} 
            @enderror 
        </div> 
    </div> 
    <div class="form-group"> 
        <label for="exampleInputEmail1">Deskripsi</label> 
        <input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" placeholder="Masukan Deskripsi" value="{{$menu->deskripsi}}"> 
        <div class="text-danger"> 
            @error('deskripsi') 
                {{ $message}} 
            @enderror 
        </div> 
    </div> 
                    <div class="form-group">
                        <label for="exampleInputFile">Foto menu</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="foto_menu" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose File</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <br>
                            <div class="text-danger">
                                @error('foto_menu')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <img src="{{url('foto_menu/'.$menu->foto_menu)}}" width="100px">
                    </div>
                </div>
                <!-- /.card-body -->
 
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <div class="card-footer">
                    <a href="/menu"><button type="button" class="btn btn-primary">Kembali</button></a>
                </div>
            </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection
 