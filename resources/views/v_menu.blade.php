@section('title')
Menu
@endsection
@extends('layout.v_template')
@section('page')
Halaman Menu
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Menu Catering</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            @if (session('pesan'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Success</h5>
                    {{ session('pesan') }}
                </div>
            @endif
            <div align="right">
                <a href="/menu/add" class="btn btn-add">Tambah</a><br>
                <br>
            </div>
            <thead>
                <tr>
                <th>No</th>
                <th>ID Menu</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Foto Menu</th>
                <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach ($menu as $data)
                <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->id_menu }}</td>
                <td>{{ $data->nama_menu }}</td>
                <td>{{ $data->harga }}</td>
                <td>{{ $data->nama_paket }}</td>
                <td>{{ $data->deskripsi }}</td>
                <td><img src="{{ url('foto_menu/' . $data->foto_menu) }}" alt="" width="100px"></td>
                    <td>
                        <a href="/menu/detail/{{ $data->id_menu }}" class="btn btn-detail btn-action">Detail</a>
                        <a href="/menu/edit/{{ $data->id_menu }}" class="btn btn-warning">Edit</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_menu }}">
                          Hapus
                        </button>
                        <form action="{{ route('menu.updateStatus', $data->id_menu) }}" method="POST" class="mt-1">
                            @csrf
                            @method('PUT')
                            <select name="status" onchange="this.form.submit()" class="form-control">
                                <option value="1" {{ ($data->status ?? 1) ? 'selected' : '' }}>Tersedia</option>
                                <option value="0" {{ !($data->status ?? 0) ? 'selected' : '' }}>Tidak Tersedia</option>
                            </select>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @foreach ($menu as $data)
        <div class="modal fade" id="delete{{ $data->id_menu }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">{{ $data->nama_menu }}</h6>
                        <p>{{ $data->nama_menu }} - {{ $data->nama_paket }} - Rp{{ number_format($data->harga) }}</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <p>Apakah anda ingin menghapus data ini ?</p>
                  </div>
                  <div class="modal-footer justify-content-between">
                      <a href="/menu/delete/{{ $data->id_menu }}" class="btn btn-outline-light">Ya</a>
                      <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
          @endforeach
 
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
</div>      
@endsection
