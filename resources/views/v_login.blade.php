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
  
        .phone-group {
      display: flex;
      align-items: center;
      border: 1px solid #ccc;
      border-radius: 10px;
      overflow: hidden;
      background-color: white;
      width: 100%;
      max-width: 500px;
    }

    .phone-group .prefix {
      padding: 10px 14px;
      background-color: #f2f2f2;
      border-right: 1px solid #ccc;
      font-size: 14px;
      color: #333;
      white-space: nowrap;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .phone-group input {
      flex: 1;
      padding: 10px;
      border: none;
      font-size: 14px;
      outline: none;
    }
</style>

<div class="modal-bg">
    <div class="login-box">
        <div class="close-btn" onclick="window.history.back()">×</div>
        <h2>Masuk</h2>
        
            <form action="/login" method="POST">
            @csrf
            <div class="phone-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <div class="my-2 text-end">
                <a href="#">Lupa kata sandi</a>
            </div>
            <button type="submit" class="btn btn-gold">Masuk</button>
        </form>
        <div class="mt-3">
            Belum punya akun? <a href="/register">Daftar disini</a>
        </div>
    </div>
</div>
@endsection