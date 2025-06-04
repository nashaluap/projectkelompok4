@section('title') 
Pelanggan
@endsection 
@extends ('layout/v_template') 
@section('page') 
Edit Data Pelanggan
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
    <form action="/pelanggan/update/{{$pelanggan->id_pelanggan}}" method="POST" enctype="multipart/form-data"> 
      @csrf 
        <div class="card-body"> 
        <div class="form-group"> 
        <label for="exampleInputEmail1">ID Pelanggan</label> 
        <input type="text" name="id_pelanggan" class="form-control" id="exampleInputEmail1" placeholder="Masukan id_pelanggan" value="{{$pelanggan->id_pelanggan}}" readonly> 
        <div class="text-danger"> 
            @error('id_pelanggan') 
            {{$message}}
            @enderror 
         </div> 
        </div> 
        <div class="form-group"> 
            <label for="exampleInputEmail1">Nama pelanggan</label> 
            <input type="text" name="nama_pelanggan" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama pelanggan" value="{{$pelanggan->nama_pelanggan}}">
            <div class="text-danger"> 
                @error('nama_pelanggan') 
                    {{$message}}
                @enderror 
            </div> 
        </div>
        <div class="form-group"> 
        <label for="exampleInputEmail1">Alamat</label> 
        <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" placeholder="Masukan Alamat" value="{{ old('alamat', $pelanggan->alamat) }}"> 
        <div class="text-danger"> 
            @error('alamat') 
                {{ $message}} 
            @enderror 
        </div> 
    </div> 
    <div class="form-group"> 
        <label for="exampleInputEmail1">Nomor Telepon</label> 
        <input type="text" name="no_telepon" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nomor Telepon" value="{{$pelanggan->no_telepon}}"> 
        <div class="text-danger"> 
            @error('no_telepon') 
                {{ $message}} 
            @enderror 
        </div> 
    </div> 
    <div class="form-group"> 
        <label for="exampleInputEmail1">Email</label> 
        <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Masukan Email" value="{{$pelanggan->email}}"> 
        <div class="text-danger"> 
            @error('email') 
                {{ $message}} 
            @enderror 
        </div> 
    </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <div class="card-footer">
                    <a href="/pelanggan"><button type="button" class="btn btn-primary">Kembali</button></a>
                </div>
            </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection
 