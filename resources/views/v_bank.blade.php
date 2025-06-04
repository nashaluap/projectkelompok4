@section('title')
Bank
@endsection
@extends('layout.v_template')
@section('page')
Halaman Bank
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Bank</h3>
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
                <a href="/bank/add" class="btn btn-add">Tambah</a><br>
                <br>
            </div>
            <thead>
                <tr>
                <th>No</th>
                <th>Id Bank</th>
                <th>Atas Nama</th>
                <th>Nama Bank</th>
                <th>Nomor Rekening</th>
                <th>Foto Bank</th>
                <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach ($bank as $data)
                <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->id_bank }}</td>
                <td>{{ $data->atas_nama }}</td>
                <td>{{ $data->nama_bank }}</td>
                <td>{{ $data->no_rekening }}</td>
                <td><img src="{{ url('foto_bank/' . $data->foto_bank) }}" alt="" width="100px"></td>
                    <td>
                        <a href="/bank/detail/{{ $data->id_bank }}" class="btn btn-detail btn-action">Detail</a>
                        <a href="/bank/edit/{{ $data->id_bank }}" class="btn btn-warning">Edit</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_bank }}">
                          Hapus
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @foreach ($bank as $data)
        <div class="modal fade" id="delete{{ $data->id_bank }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">{{ $data->id_bank }}</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <p>Apakah anda ingin menghapus data ini ?</p>
                  </div>
                  <div class="modal-footer justify-content-between">
                      <a href="/bank/delete/{{ $data->id_bank }}" class="btn btn-outline-light">Ya</a>
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
