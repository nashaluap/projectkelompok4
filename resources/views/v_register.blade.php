@extends('layout.v_template2')
@section('content')

<style>
    body {
        background: url('https://images.unsplash.com/photo-1606788075763-0b6183be3f5e') no-repeat center center;
        background-size: cover;
        position: relative;
    }
    .modal-bg {
        backdrop-filter: blur(6px);
        background-color: rgba(0, 0, 0, 0.4);
        position: fixed;
        inset: 0;
        z-index: 10;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .login-box {
        background-color: #58320e;
        padding: 30px;
        border-radius: 20px;
        max-width: 400px;
        width: 100%;
        color: white;
        position: relative;
        box-shadow: 0 0 20px rgba(0,0,0,0.2);
        text-align: center;
    }
    .login-box h2 {
        font-weight: bold;
        margin-bottom: 20px;
    }
    .login-box .form-control {
        border-radius: 10px;
        margin-bottom: 15px;
    }
    .login-box .btn-gold {
        background-color: #d4af37;
        color: #333;
        width: 100%;
        border-radius: 10px;
        border: none;
        padding: 10px;
        font-weight: bold;
    }
    .login-box .btn-gold:hover {
        background-color: #c29e2e;
    }
    .login-box a {
        color: #d4af37;
        text-decoration: none;
        font-size: 14px;
    }
    .login-box a:hover {
        text-decoration: underline;
    }
    .close-btn {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 24px;
        color: white;
        cursor: pointer;
    }
</style>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="modal-bg">
    <div class="login-box">
        <div class="close-btn" onclick="window.history.back()">×</div>
        <h2>Daftar</h2>
        <form class="user" action="{{ route('register.store') }}" method="POST">
        @csrf
        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
        <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
        <input type="text" name="no_telepon" class="form-control" placeholder="Nomor Telepon" required>
        <input type="email" name="email" class="form-control" placeholder="Email" required>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
        <button type="submit" class="btn btn-gold">Daftar</button>
        </form>

        <div class="mt-3">
            Sudah punya akun? <a href="/login">Masuk disini</a>
        </div>
    </div>
</div>
@endsection
