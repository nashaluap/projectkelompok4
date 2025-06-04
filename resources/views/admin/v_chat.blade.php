@section('title')
Chat
@endsection
@extends('layout.v_template')
@section('page')
Halaman Chat
@endsection
@section('content')
<div class="container">
    <h2>Chat dengan {{ $pelanggan->nama_pelanggan }}</h2>

    <div class="card shadow mb-4">
        <div class="card-body" style="height: 400px; overflow-y: auto;" id="chat-box">
            @foreach($chat as $c)
                <div class="mb-2 {{ $c->pengirim == 'admin' ? 'text-right' : 'text-left' }}">
                    <strong>{{ ucfirst($c->pengirim) }}:</strong>
                    <p class="mb-0">{{ $c->pesan }}</p>
                    <small class="text-muted">
                    @if ($c->created_at->isToday())
                        {{ $c->created_at->format('H:i') }}
                    @else
                        {{ $c->created_at->format('d M Y H:i') }}
                    @endif
                   </small>
                </div>
            @endforeach
        </div>

        <form action="{{ route('chat.admin.kirim') }}" method="POST" class="card-footer d-flex">
            @csrf
            <input type="hidden" name="id_pelanggan" value="{{ $id_pelanggan }}">
            <input type="text" name="pesan" class="form-control mr-2" placeholder="Ketik pesan..." required>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
</div>
@endsection