@section('title')
Menu
@endsection
@extends('layout.v_template2')
@section('page')
Halaman Menu
@endsection
@section('content')
<div class="container text-center mt-5">
        <h2>Terima kasih!</h2>
        <p>Pesanan kamu berhasil dikirim. Kami akan segera memprosesnya.</p>
        <a href="{{ route('menuhanna') }}" class="btn btn-primary mt-3">Kembali ke Menu</a>
    </div>
@endsection