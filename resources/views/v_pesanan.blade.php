@section('title')
Pesanan
@endsection
@extends('layout.v_template')
@section('page')
Halaman Pesanan
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Pesanan</h3>
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
                <th>Id Pesanan</th>
                <th>Pelanggan</th>
                <th>Menu yang di Pesan</th>
                <th>Catatan</th>
                <th>Tanggal Pesanan</th>
                <th>Status</th>
                <th>Alamat</th>
                <th>Total Harga</th>
                <th>Total pesanan</th>
                <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach ($pesanan as $data)
                @php
                // Jika menu ada lebih dari satu, gabungkan nama menu dengan koma
                $menu = DB::table('tb_pesanan_menu')
                            ->join('tb_menu', 'tb_pesanan_menu.id_menu', '=', 'tb_menu.id_menu')
                            ->where('tb_pesanan_menu.id_pesanan', $data->id_pesanan)
                            ->pluck('tb_menu.nama_menu')
                            ->toArray();
                $menuList = implode(', ', $menu); // Menggabungkan menu dengan koma
            @endphp
                <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->id_pesanan }}</td>
                <td>{{ $data->nama_pemesan }}</td>
                <td>{{ $menuList }}</td>
                <td>{{ $data->catatan }}</td>
                <td>{{ $data->tgl_pesanan }}</td>
                <td>{{ $data->status }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->total_harga }}</td>
                <td>{{ $data->total_pesanan }}</td>
                    <td>
                        <a href="/pesanan/detail/{{ $data->id_pesanan }}" class="btn btn-detail btn-action">Detail</a>
                        <form action="{{ route('ubahStatusPesanan', $data->id_pesanan) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status" onchange="this.form.submit()" class="form-control form-control-sm">
                                <option value="tertunda" {{ $data->status == 'tertunda' ? 'selected' : '' }}>Tertunda</option>
                                <option value="diproses" {{ $data->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="selesai" {{ $data->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                <option value="dibatalkan" {{ $data->status == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                            </select>
                        </form>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_pesanan }}">
                            Hapus
                          </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @foreach ($pesanan as $data)
        <div class="modal fade" id="delete{{ $data->id_pesanan }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">{{ $data->id_pesanan }}</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <p>Apakah anda ingin menghapus data ini ?</p>
                  </div>
                  <div class="modal-footer justify-content-between">
                      <a href="/pesanan/delete/{{ $data->id_pesanan }}" class="btn btn-outline-light">Ya</a>
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
