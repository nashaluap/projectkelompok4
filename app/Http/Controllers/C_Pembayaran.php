<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Pembayaran;
use App\Models\M_Pesanan;
use App\Models\M_Bank;
use Carbon\Carbon;
use Pdf;

class C_Pembayaran extends Controller
{
    public function formPembayaran($id_pesanan)
    {
        $pesanan = M_Pesanan::findOrFail($id_pesanan);
        return view('v_pembayaran', compact('pesanan'));
    }

    public function simpanPembayaran(Request $request)
    {
        $request->validate([
            'id_pesanan' => 'required|exists:M_Pesanan,id',
            'tipe_pembayaran' => 'required|in:DP,Lunas',
            'nominal' => 'required|numeric|min:0',
        ]);

        $pesanan = M_Pesanan::findOrFail($request->pesanan_id);
        $minDP = 0.2 * $pesanan->total_harga;

        if ($request->tipe_pembayaran == 'DP' && $request->nominal < $minDP) {
            return back()->withErrors(['nominal' => 'Nominal DP minimal 20% dari total pesanan (Rp. ' . number_format($minDP, 0, ',', '.') . ')']);
        }

        M_Pembayaran::create([
            'id_pesanan' => $request->id_pesanan,
            'tipe_pembayaran' => $request->tipe_pembayaran,
            'nominal' => $request->nominal,
            'batas_waktu' => Carbon::now()->addHours(24),
        ]);

        return redirect()->route('pembayaran.pilihBank', ['id_pembayaran' => $pembayaran->id]);
    }
    public function pilihBank($id_pembayaran)
    {
    $pembayaran = M_Pembayaran::findOrFail($id_pembayaran);
    return view('v_pilih_bank', compact('pembayaran'));
    }

    public function prosesBank(Request $request)
    {
    $request->validate([
    'id_pembayaran' => 'required|exists:pembayaran,id_pembayaran',
    'id_bank' => 'required|exists:bank,id_bank',
    ]);

    $pembayaran = M_Pembayaran::findOrFail($request->id_pembayaran);
    $pembayaran->id_bank = $request->id_bank;
    $pembayaran->tgl_pembayaran = now();
    $pembayaran->save();

    return redirect()->route('pesanan.sukses')->with('success', 'Silakan transfer ke rekening yang dipilih sebelum batas waktu.');
    }

    public function invoice($id_pembayaran)
    {
    $pembayaran = M_Pembayaran::with(['pesanan', 'bank'])->findOrFail($id_pembayaran);
    return view('v_invoice', compact('pembayaran'));
    }
    
    public function cetakInvoice($id_pembayaran)
    {
    $pembayaran = M_Pembayaran::with(['pesanan', 'bank'])->findOrFail($id_pembayaran);

    $pdf = Pdf::loadView('v_invoice_pdf', compact('pembayaran'));
    return $pdf->download('invoice-pembayaran-' . $pembayaran->id_pembayaran . '.pdf');
    }

    public function create()
    {
        $pesanan = M_Pesanan::all(); 
        $bank = M_Bank::all();       

        return view('v_pembayaran_create', compact('pesanan', 'bank'));
    }

     public function store(Request $request)
    {
        $request->validate([
            'id_pesanan' => 'required|exists:pesanan,id',
            'tgl_pembayaran' => 'required|date',
            'tipe_pembayaran' => 'required|string',
            'id_bank' => 'nullable|exists:bank,id',
            'nominal' => 'required|numeric',
        ]);

        M_Pembayaran::create([
            'id_pesanan' => $request->id_pesanan,
            'tgl_pembayaran' => $request->tgl_pembayaran,
            'tipe_pembayaran' => $request->tipe_pembayaran,
            'id_bank' => $request->id_bank,
            'nominal' => $request->nominal,
        ]);

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil disimpan');
    }

}
