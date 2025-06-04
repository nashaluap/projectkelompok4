@extends('layout.v_template2')
@section('content')

<div class="container mt-4">
    <h1 class="text-center" style="color: #58320e; font-weight: bold;">Buat Invoice Baru</h1>
    <form action="{{ route('admin.invoice.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="id_klien" class="form-label">Klien (Opsional)</label>
            <select name="id_klien" id="id_klien" class="form-select">
                <option value="">-- Tanpa Klien --</option>
                @foreach($klien as $k)
                    <option value="{{ $k->id_klien }}">{{ $k->pengguna->nama ?? '-' }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nomor_invoice" class="form-label">Nomor Invoice</label>
            <input type="text" name="nomor_invoice" id="nomor_invoice" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_invoice" class="form-label">Tanggal Invoice</label>
            <input type="date" name="tanggal_invoice" class="form-control" value="{{ old('tanggal_invoice', date('Y-m-d')) }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="">-- Status --</option>
                <option value="pending">Pending</option>
                <option value="lunas">Lunas</option>
                <option value="batal">Batal</option>
            </select>
        </div>

        <hr style="border-color: #d4af37;">
        <h5 style="color: #58320e; font-weight: bold;">Item Invoice</h5>

        <div id="items-wrapper">
            <div class="row g-2 mb-2 item-row">
                <div class="col-md-4">
                    <input type="text" name="items[0][deskripsi]" class="form-control" placeholder="Deskripsi" required>
                </div>
                <div class="col-md-2">
                    <input type="number" name="items[0][qty]" class="form-control" placeholder="Qty" required min="1">
                </div>
                <div class="col-md-3">
                    <input type="number" name="items[0][harga_satuan]" class="form-control" placeholder="Harga Satuan" required min="0" step="0.01">
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-danger remove-item">Hapus</button>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-warning mb-3" id="add-item">Tambah Item</button>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan Invoice</button>
            <a href="{{ route('admin.invoice.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
    let index = 1;
    document.getElementById('add-item').addEventListener('click', function() {
        const wrapper = document.getElementById('items-wrapper');
        const row = document.createElement('div');
        row.className = 'row g-2 mb-2 item-row';
        row.innerHTML = `
            <div class="col-md-4">
                <input type="text" name="items[${index}][deskripsi]" class="form-control" placeholder="Deskripsi" required>
            </div>
            <div class="col-md-2">
                <input type="number" name="items[${index}][qty]" class="form-control" placeholder="Qty" required>
            </div>
            <div class="col-md-3">
                <input type="number" name="items[${index}][harga_satuan]" class="form-control" placeholder="Harga Satuan" required>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-danger remove-item">Hapus</button>
            </div>
        `;
        wrapper.appendChild(row);
        index++;
    });

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-item')) {
            e.target.closest('.item-row').remove();
        }
    });
</script>
@endpush

@push('styles')
<style>
    body {
        background-color: #fffaf4;
    }

    .form-label {
        font-weight: 600;
        color: #58320e;
    }

    .form-control,
    .form-select {
        border-radius: 0.5rem;
        border: 1px solid #58320e;
        padding: 0.5rem 1rem;
        background-color: #fff;
        color: #000;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #d4af37;
        box-shadow: 0 0 6px rgba(212, 175, 55, 0.6);
        outline: none;
    }

    .btn-primary {
        background-color: #58320e;
        border-color: #58320e;
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #3e240a;
    }

    .btn-secondary {
        background-color: #d4af37;
        border-color: #d4af37;
        color: #000;
    }

    .btn-secondary:hover {
        background-color: #c19e2d;
    }

    .btn-warning {
        background-color: #d4af37;
        border-color: #d4af37;
        color: #000;
    }

    .btn-warning:hover {
        background-color: #c19e2d;
    }

    .btn-danger {
        background-color: #8b0000;
        border-color: #8b0000;
    }
</style>
@endpush