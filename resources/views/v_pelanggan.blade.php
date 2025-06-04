@section('title')
Pelanggan
@endsection
@extends('layout.v_template')
@section('page')
Halaman Pelanggan
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Pelanggan</h3>
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
            <thead>
                <tr>
                <th>No</th>
                <th>Id pelanggan</th>
                <th>Nama pelanggan</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
                <th>Email</th>
                <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach ($pelanggan as $data)
                <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->id_pelanggan }}</td>
                <td>{{ $data->nama_pelanggan }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->no_telepon }}</td>
                <td>{{ $data->email }}</td>
                <td>
                        <a href="/pelanggan/edit/{{ $data->id_pelanggan }}" class="btn btn-warning btn-action">Edit</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_pelanggan }}">
                          Hapus
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @foreach ($pelanggan as $data)
        <div class="modal fade" id="delete{{ $data->id_pelanggan }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">{{ $data->nama_pelanggan }}</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <p>Apakah anda ingin menghapus data ini ?</p>
                  </div>
                  <div class="modal-footer justify-content-between">
                      <a href="/pelanggan/delete/{{ $data->id_pelanggan }}" class="btn btn-outline-light">Ya</a>
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
