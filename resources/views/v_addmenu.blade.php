@section('title') 
Menu
@endsection 
@extends ('layout/v_template') 
@section('page') 
Tambah Data Menu
@endsection 
@section("content") 
<div class="container-fluid"> 
    <div class="row"> 
    <!-- left column --> 
    <div class="col-md-6"> 

    <!-- general form elements--> 
    <div class="card card-primary"> 
      <div class="card-header"> 
        <h3 class="card-title">Form Tambah Menu</h3> 
    </div> 
    <!--/.card-header --> 
    <!-- form start--> 
    <form action="/menu/insert" method="POST" enctype="multipart/form-data"> 
      @csrf 
        <div class="card-body"> 
        <div class="form-group"> 
            <label for="exampleInputEmail1">ID Menu</label> 
            <input type="text" name="id_menu" class="form-control" value="{{ $newID }}" readonly> 
            <div class="text-danger"> 
                @error('id_menu') 
                    {{ $message}} 
                @enderror 
            </div> 
        </div> 
        <div class="form-group"> 
            <label for="exampleInputEmail1">Nama Menu</label> 
            <input type="text" name="nama_menu" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama Menu" value="{{ old('nama_menu')}}"> 
            <div class="text-danger"> 
            @error('nama_menu') 
                {{$message}}
            @enderror 
        </div> 
    </div>
    <div class="form-group"> 
        <label for="exampleInputEmail1">Harga</label> 
        <input type="text" name="harga" class="form-control" id="exampleInputEmail1" placeholder="Masukan Harga" value="{{old('harga')}}"> 
        <div class="text-danger"> 
            @error('harga') 
                {{ Smessage}} 
            @enderror 
        </div> 
    </div> 
    <div class="form-group">
        <label for="id_paket">Kategori</label>
        <select name="id_paket" class="form-control">
            <option value="">-- Pilih Kategori --</option>
            @foreach($tb_paket as $p)
                <option value="{{ $p->id_paket }}">{{ $p->paket }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group"> 
        <label for="exampleInputEmail1">Deskripsi</label> 
        <input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" placeholder="Masukan Deskripsi" value="{{old('deskripsi')}}"> 
        <div class="text-danger"> 
            @error('deskripsi') 
                {{ Smessage}} 
            @enderror 
        </div> 
    </div> 
    <div class="form-group"> 
        <label for="exampleInputFile">Foto Menu</label> 
        <div class="input-group"> 
          <div class="custom-file"> 
            <input type="file" name="foto_menu" class="custom-file-input" id="exampleInputFile" onchange="previewImage(event)"> 
            <label class="custom-file-label" for="exampleInputFile">Choose file</label> 
        </div> 
        <div class="input-group-append"> 
          <span class="input-group-text">Upload</span> 
        </div> 
        </div> 
        <div class="mt-2">
        <img id="preview" src="#" alt="Preview Foto Menu" style="max-width: 200px; display: none; margin-top: 10px;">
        </div>
        <div class="text-danger"> 
            @error('foto_menu') 
                {{ $message}}
            @enderror 
        </div>
        </div>
        </div>
        </div> 
    </div> 
    </div> 
    <!--/.card-body--> 

    <div class="card-footer"> 
        <button type="submit" class="btn btn-primary">Insert</button> 
    </div> 
    <div class="card-footer">
      <a href="/menu"><button type="button" class="btn btn-primary">Kembali</button></a>
    </div>
    </form> 
    </div> 
    <!--/.card--> 
    </div> 
    </div> 
</div> 

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('preview');
        const file = input.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }
</script>
@endsection