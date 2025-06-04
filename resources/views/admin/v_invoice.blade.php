@extends('layout.v_template2')
@section('content')

<div class="modal-bg">
    <div class="invoice-box">
        <span class="close-btn" onclick="window.history.back();">&times;</span>
        <h2>Invoice Pembayaran</h2>

        <div class="row-data">
            <strong>ID Pembayaran:</strong> {{ $pembayaran->id_pembayaran }}
        </div>
        <div class="row-data">
            <strong>Nama Pemesan:</strong> {{ $pembayaran->pesanan->nama_pemesan ?? '-' }}
        </div>
        <div class="row-data">
            <strong>Tanggal Pembayaran:</strong> {{ $pembayaran->tgl_pembayaran ? \Carbon\Carbon::parse($pembayaran->tgl_pembayaran)->format('d M Y, H:i') : '-' }}
        </div>
        <div class="row-data">
            <strong>Metode Pembayaran:</strong> {{ $pembayaran->metode_pembayaran }}
        </div>
        <div class="row-data">
            <strong>Bank:</strong> {{ $pembayaran->bank->nama_bank ?? '-' }}
        </div>
        <div class="row-data">
            <strong>Nominal:</strong> Rp {{ number_format($pembayaran->nominal, 0, ',', '.') }}
        </div>
        <div class="row-data">
            <strong>Status:</strong> {{ ucfirst($pembayaran->status) }}
        </div>

        <a href="{{ route('admin.invoice.pdf', $pembayaran->id_pembayaran) }}" class="btn-gold" target="_blank">Download PDF</a>
    </div>
</div>
@endsection

@section('styles')
<style>
    body {
        background: url('https://images.unsplash.com/photo-1606788075763-0b6183be3f5e') no-repeat center center;
        background-size: cover;
        position: relative;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
    .invoice-box {
        background-color: #58320e;
        padding: 30px;
        border-radius: 20px;
        max-width: 500px;
        width: 100%;
        color: white;
        position: relative;
        box-shadow: 0 0 20px rgba(0,0,0,0.2);
        text-align: left;
    }
    .invoice-box h2 {
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
    }
    .invoice-box .row-data {
        margin-bottom: 12px;
    }
    .invoice-box .row-data strong {
        display: inline-block;
        width: 150px;
        font-weight: bold;
        color: #d4af37;
    }
    .btn-gold {
        background-color: #d4af37;
        color: #333;
        width: 100%;
        border-radius: 10px;
        border: none;
        padding: 10px;
        font-weight: bold;
        margin-top: 20px;
        text-align: center;
        display: inline-block;
    }
    .btn-gold:hover {
        background-color: #c29e2e;
        color: #fff;
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
@endsection
