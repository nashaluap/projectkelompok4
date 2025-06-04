@extends('layout.v_template2')
@section('content')

<div class="container">
    <h1 class="text-2xl font-bold mb-4">Testimoni Pelanggan</h1>

     <!-- Menampilkan pesan sukses jika ada -->
     @if(session('success'))
     <div class="alert alert-success mb-4">
         {{ session('success') }}
     </div>
 @endif

    <!-- Tombol Tambah Testimoni -->
    <a href="{{ route('testimoni.create') }}" class="btn btn-primary mb-4">
        Tambah Testimoni
    </a>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-8">
        @forelse($testimoni as $item)
            <div class="border rounded-lg p-4 bg-white shadow">
                <div class="text-sm text-gray-400 italic mb-2"></div>
                <p class="text-gray-700 mb-4">{{ $item->ulasan }}</p>
                
                <div class="flex items-center mb-2">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $item->rating)
                            <span class="text-yellow-400 text-xl">★</span>
                        @else
                            <span class="text-gray-300 text-xl">☆</span>
                        @endif
                    @endfor
                </div>
                
                <div class="flex items-center">
                    <img src="/img/avatar.png" class="w-10 h-10 rounded-full mr-2" alt="avatar">
                    <strong class="text-gray-800">{{ $item->pesanan->nama_pemesan ?? 'Pelanggan'  }}</strong>
                </div>
            </div>
        @empty
            <p class="text-gray-500">Belum ada testimoni.</p>
        @endforelse
    </div>
    
@endsection