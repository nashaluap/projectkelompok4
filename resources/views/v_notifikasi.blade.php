@extends('layout.v_template2')
@section('content')

<div class="container mt-5">
    <h3 class="mb-4">Notifikasi Anda</h3>
    @forelse ($notifikasi as $notif)
        <div class="p-3 mb-2 bg-light border rounded">
            <strong>{{ $notif->judul }}</strong>
            <p>{{ $notif->pesan }}</p>
            <small class="text-muted">{{ $notif->created_at->diffForHumans() }}</small>
        </div>
    @empty
        <p>Tidak ada notifikasi.</p>
    @endforelse
</div>
@endsection
