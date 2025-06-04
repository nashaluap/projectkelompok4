@extends('layout.v_template2')
@section('content')

<div class="container">
    <h2>Pilih Metode Pembayaran Bank</h2>
    <p>Nominal: <strong>Rp {{ number_format($pembayaran->nominal, 0, ',', '.') }}</strong></p>
    <p>Batas Waktu Pembayaran: <strong>{{ $pembayaran->batas_waktu->format('d-m-Y H:i') }}</strong></p>

    <form action="{{ route('pembayaran.prosesBank') }}" method="POST">
        @csrf
        <input type="hidden" name="id_pembayaran" value="{{ $pembayaran->id }}">

        <div class="mb-3">
            <label for="id_bank">Pilih Bank:</label>
            <select name="id_bank" class="form-control" required>
                <option value="">-- Pilih Bank --</option>
                @foreach($banks as $bank)
                    <option value="{{ $bank->id }}">
                        {{ $bank->nama_bank }} - No. Rek: {{ $bank->no_rekening }} a.n. {{ $bank->atas_nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Lanjutkan</button>
    </form>
</div>

@endsection