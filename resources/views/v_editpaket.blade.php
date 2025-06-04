@section('title') 
Paket
@endsection 
@extends ('layout/v_template') 
@section('page') 
Edit Data Paket
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
    <form action="/paket/update/{{$paket->id_paket}}" method="POST" enctype="multipart/form-data"> 
      @csrf 
        <div class="card-body"> 
        <div class="form-group"> 
        <label for="exampleInputEmail1">Id Paket</label> 
        <input type="text" name="id_paket" class="form-control" id="exampleInputEmail1" placeholder="Masukan Id Paket" value="{{$paket->id_paket}}" readonly> 
        <div class="text-danger"> 
            @error('id_paket') 
            {{$message}}
            @enderror 
         </div> 
        </div> 
        <div class="form-group"> 
            <label for="exampleInputEmail1">Nama Paket</label> 
            <input type="text" name="paket" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama Paket" value="{{$paket->paket}}">
            <div class="text-danger"> 
                @error('paket') 
                    {{$message}}
                @enderror 
            </div> 
        </div>
        <div class="form-group"> 
            <label for="exampleInputEmail1">Deskripsi</label> 
            <input type="text" name="uraian" class="form-control" id="exampleInputEmail1" placeholder="Masukan Deskripsi" value="{{$paket->uraian}}"> 
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
                                <label class="custom-file-label" for="exampleInputFile">Choose File</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <br>
                            <div class="text-danger">
                                @error('foto_paket')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <img src="{{url('foto_paket/'.$paket->foto_paket)}}" width="100px">
                    </div>
                </div>
                <!-- /.card-body -->
 
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <div class="card-footer">
                    <a href="/paket"><button type="button" class="btn btn-primary">Kembali</button></a>
                </div>
                </form>
                </div>

            <!-- /.card -->
        </div>
    </div>
</div>
@endsection
 