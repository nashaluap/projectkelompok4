<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Invoice Pembayaran - Hanna Catering</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #58320e; /* coklat tua */
            background-color: #fff8e7; /* kuning lembut */
            padding: 30px;
        }
        .invoice-box {
            max-width: 700px;
            margin: auto;
            border: 1px solid #d4af37; /* kuning emas */
            border-radius: 10px;
            padding: 25px 40px;
            background-color: #fff;
        }
        .title {
            text-align: center;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #d4af37; /* kuning emas */
            font-family: 'Georgia', serif;
        }
        .row-data {
            margin-bottom: 15px;
            font-size: 16px;
        }
        .row-data strong {
            width: 180px;
            display: inline-block;
        }
        hr {
            border: 1px solid #d4af37;
            margin: 25px 0;
        }
        .footer {
            text-align: right;
            font-size: 12px;
            color: #7a5c2e;
            margin-top: 40px;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <div class="title">INVOICE PEMBAYARAN</div>

        <hr />

        <div class="row-data"><strong>ID Pembayaran:</strong> {{ $pembayaran->id_pembayaran }}</div>
        <div class="row-data"><strong>Nama Pemesan:</strong> {{ $pembayaran->pesanan->nama_pemesan ?? '-' }}</div>
        <div class="row-data"><strong>Tanggal Pembayaran:</strong> {{ \Carbon\Carbon::parse($pembayaran->tgl_pembayaran)->format('d M Y, H:i') }}</div>
        <div class="row-data"><strong>Tipe Pembayaran:</strong> {{ ucfirst($pembayaran->tipe_pembayaran) }}</div>
        <div class="row-data"><strong>Bank:</strong> {{ $pembayaran->bank->nama_bank ?? '-' }}</div>
        <div class="row-data"><strong>Nominal:</strong> Rp {{ number_format($pembayaran->nominal, 0, ',', '.') }}</div>

        <hr />

        <div class="footer">
            Dicetak pada {{ \Carbon\Carbon::now()->format('d M Y H:i') }}<br/>
            Hanna Catering
        </div>
    </div>
</body>
</html>
