@extends('layout.v_template2')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Tambah Testimoni</h1>

    <form action="{{ route('testimoni.store') }}" method="POST">
        @csrf

        <!-- Pilih Riwayat Pesanan -->
        <div class="mb-4">
            <label for="id_pesanan" class="block text-sm font-medium">Pesanan</label>
            <select name="id_pesanan" id="id_pesanan" class="form-control" required>
                <option disabled selected>Pilih Pesanan Anda</option>
                @foreach($pesanan as $item)
                <option value="{{ $item->id_pesanan ?? '' }}">
                    {{ $item->nama_pemesan }} - {{ $item->nama_paket }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Komentar -->
        <div class="mb-4">
            <label for="komentar" class="block text-sm font-medium">Komentar</label>
            <textarea name="komentar" id="komentar" rows="4" class="form-control" required></textarea>
        </div>

        <!-- Rating -->
        <div class="mb-4">
            <label for="rating" class="block text-sm font-medium">Rating</label>
            <select name="rating" id="rating" class="form-control" required>
                <option value="">Pilih Rating</option>
                @for($i=5; $i>=1; $i--)
                    <option value="{{ $i }}">{{ $i }} Bintang</option>
                @endfor
            </select>
        </div>

        <button type="submit" class="btn btn-success">Kirim Testimoni</button>
    </form>
</div>
@endsection
