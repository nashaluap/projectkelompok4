@section('title')
Chat
@endsection
@extends('layout.v_template')
@section('page')
Halaman Chat
@endsection
@section('content')
<div class="container">
    <h2>Daftar Pelanggan</h2>
    <ul>
        @foreach ($pelanggan as $p)
            @php
                $jumlah = $pesanBelumDibaca[$p->id_pelanggan] ?? 0;
            @endphp
            <li>
                {{ $p->nama_pelanggan }}
                <a href="{{ url('/chatadmin/' . $p->id_pelanggan) }}">
                    Chat
                    @if ($jumlah > 0)
                        <span style="color: red; font-weight: bold;">({{ $jumlah }})</span>
                    @endif
                </a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
