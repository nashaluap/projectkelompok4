@section('title')
Laporan
@endsection
@extends('layout.v_template')
@section('page')
Halaman Laporan
@endsection
@section('content')
<div class="container">
    <h4>Laporan</h4>
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card p-3">
                <h5>Laporan Transaksi</h5>
                <form method="POST" action="{{ route('laporan.transaksi') }}">
                    @csrf
                    <div class="form-group">
                        <label>Bulan</label>
                        <select name="bulan" class="form-control">
                            <option value="">Pilih Bulan</option>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}">{{ DateTime::createFromFormat('!m', $i)->format('F') }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tahun</label>
                        <select name="tahun" class="form-control">
                            <option value="">Pilih Tahun</option>
                            @for ($i = 2022; $i <= date('Y'); $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <button type="submit" class="btn btn-add mt-2">Cetak</button>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-3">
                <h5>Laporan Menu Terlaris</h5>
                <a href="{{ route('laporan.menuTerlaris') }}" target="_blank" class="btn btn-primary">Cetak Menu Terlaris</a>
            </div>
        </div>
    </div>
</div>
@endsection