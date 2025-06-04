<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Menu;
use App\Models\M_Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; 
use App\Models\M_Pesanan;
use App\Models\M_DetailPesanan;


class C_Menu extends Controller
{
    protected $M_Menu;
 
    public $timestamps = false;

    public function __construct()
    {
        $this->M_Menu = new M_Menu();
        $this->middleware('auth')->only([
        'submitPemesanan', 
        'addToCart', 
        'v_pemesanan', 
        'removeFromCart'
        ]);
    }
    public function index()
    {
         $menu = $this->M_Menu->allData();

        $data = [
            'menu' =>$menu,
        ];
        return view('v_menu', $data);
    }

    public function detail($id_menu)
    {
        if (!$this->M_Menu->detailData($id_menu)) {
            abort(404);
        }
        $data = [
            'menu' => $this->M_Menu->detailData($id_menu)
        ];
        return view('v_detailmenu', $data);
    }
    public function add()
    {
        {
            // Ambil ID terakhir
            $last = DB::table('tb_menu')->orderBy('id_menu', 'desc')->first();
            
            if ($last) {
                $num = (int) substr($last->id_menu, 3) + 1;
                $newID = 'MN' . str_pad($num, 4, '0', STR_PAD_LEFT);
            } else {
                $newID = 'MN0001';
            }
            
            $tb_paket = DB::table('tb_paket')->get();

            return view('v_addmenu', [
                'newID' => $newID,
                'tb_paket' => $tb_paket
            ]);
        }
    }
 
    public function insert()
    {
        Request()->validate([
            'id_menu' => 'required|unique:tb_menu,id_menu|min:4|max:10',
            'nama_menu' => 'required',
            'harga' => 'required',
            'id_paket' => 'required', // ganti dari kategori
            'deskripsi' => 'required',
            'foto_menu' => 'required|mimes:jpg,jpeg,png,bmp|max:1024',
        ],[// Ubah konversi keterangan validasi form id_menu dalam bahasa Indonesia
            'id_menu.required' => 'id_menu wajib di isi !',
            'id_menu.unique' => 'id_menu ini sudah terdaftar di database !',
            'id_menu.min' => 'id_menu minimal 4 karakter',
            'id_menu.max' => 'id_menu maksimal 10 karakter',
            'nama_menu.required' => 'Nama Menu wajib di isi !',
            'harga.required' => 'Harga wajib di isi !',
            'id_paket.required' => 'Kategori wajib di isi !',
            'deskripsi.required' => 'Deskripsi wajib di isi !',
            'foto_menu.required' => 'Foto menu wajib di isi !',
        ]);
        // Jika validasi tidak ada maka lakukan simpan data
        // Upload gambar/foto
        $file = Request()->foto_menu;
        $fileName = Request()->id_menu . '.' . $file->extension();
        $file->move(public_path('foto_menu'), $fileName);
 
        $data = [
            'id_menu' => Request()->id_menu,
            'nama_menu' => Request()->nama_menu,
            'harga' => Request()->harga,
            'id_paket' => Request()->id_paket,
            'deskripsi' => Request()->deskripsi,
            'foto_menu' => $fileName,
        ];
        $this->M_Menu->addData($data);
        return redirect()->route('menu')->with('pesan', 'Data berhasil ditambahkan !');
    }
 
    public function edit($id_menu)
    {
        if(!$this->M_Menu->detailData($id_menu)) {
            abort(404);
        }
 
        $data = ['menu' => $this->M_Menu->detailData($id_menu)
    ];
        return view('v_editmenu', $data);
    }
 
    public function update($id_menu)
{
    Request()->validate([
        'id_menu' => 'required',
        'nama_menu' => 'required',
        'harga' => 'required',
        'id_paket' => 'required',
        'deskripsi' => 'required',
        'foto_menu' => 'mimes:jpg,jpeg,png,bmp|max:1024',
    ], [
        'id_menu.required' => 'id_menu wajib di isi !',
        'id_menu.min' => 'id_menu minimal 4 karakter',
        'id_menu.max' => 'id_menu maksimal 10 karakter',
        'nama_menu.required' => 'Nama Menu wajib di isi !',
        'harga.required' => 'Harga wajib di isi !',
        'id_paket.required' => 'Kategori wajib di isi !',
        'deskripsi.required' => 'Deskripsi wajib di isi !',
        'foto_menu.mimes' => 'Format foto harus jpg, jpeg, png, atau bmp!',
    ]);

    // Ambil data lama
    $menu = $this->M_Menu->detailData($id_menu);

    // Cek apakah ada file baru yang diupload
    if (Request()->hasFile('foto_menu')) {
        // Hapus foto lama dulu
        if ($menu->foto_menu != "" && file_exists(public_path('foto_menu/' . $menu->foto_menu))) {
            unlink(public_path('foto_menu/' . $menu->foto_menu));
        }

        // Upload foto baru
        $file = Request()->file('foto_menu');
        $fileName = Request()->id_menu . '.' . $file->extension();
        $file->move(public_path('foto_menu'), $fileName);
    } else {
        // Tidak ganti foto, pakai foto lama
        $fileName = $menu->foto_menu;
    }

    // Data update
    $data = [
        'id_menu' => Request()->id_menu,
        'nama_menu' => Request()->nama_menu,
        'harga' => Request()->harga,
        'id_paket' => Request()->id_paket,
        'deskripsi' => Request()->deskripsi,
        'foto_menu' => $fileName,
    ];

    $this->M_Menu->editData($id_menu, $data);

    return redirect()->route('menu')->with('pesan', 'Data berhasil diupdate !');
    }
    public function delete($id_menu)
    {
        // Hapus atau delete foto
        $menu = $this->M_Menu->detailData($id_menu);
        if ($menu->foto_menu !== "" && file_exists(public_path('foto_menu/' . $menu->foto_menu))) {
            unlink(public_path('foto_menu') . '/' . $menu->foto_menu);
        }
        $this->M_Menu->deleteData($id_menu);
        return redirect()->route('menu')->with('pesan', 'Data berhasil dihapus !');
    }

    public function menuUser(Request $request)
    {
         $query = DB::table('tb_menu')
        ->join('tb_paket', 'tb_menu.id_paket', '=', 'tb_paket.id_paket')
        ->select('tb_menu.*', 'tb_paket.paket as nama_paket')
        ->where('tb_menu.status', 1);

    if ($request->filled('kategori')) {
        $query->where('tb_menu.id_paket', $request->kategori);
    }

    if ($request->filled('keyword')) {
        $query->where(function($q) use ($request) {
            $q->where('tb_menu.nama_menu', 'like', '%' . $request->keyword . '%')
              ->orWhere('tb_menu.deskripsi', 'like', '%' . $request->keyword . '%')
              ->orWhere('tb_menu.harga', 'like', '%' . $request->keyword . '%');
         });
    }

    if ($request->sort == 'nama') {
        $query->orderBy('tb_menu.nama_menu', 'asc');
    } 

    $menu = $query->get();
      foreach ($menu as $item) {
        $item->status = 1; 
    }
    
    $kategori = DB::table('tb_paket')->get();

    // Hitung jumlah item di keranjang
    $cartCount = 0;
    if (auth()->check()) {
        $cartCount = M_Cart::where('id_user', auth()->id())->count();
    }

    return view('v_menuhanna', compact('menu', 'kategori', 'cartCount'));
    }   

    public function updateStatus(Request $request, $id)
    {
    $menu = M_Menu::findOrFail($id);
    $menu->status = $request->status;
    $menu->save();

    return back()->with('pesan', 'Status menu berhasil diperbarui.');
    }

    public function addToCart(Request $request, $id_menu)
    {
    $user = auth()->user();
    if (!$user) return redirect()->route('login');

    $quantity = max(1, (int) $request->input('quantity', 1));

    $existingCart = M_Cart::where('id_user', $user->id)
                          ->where('id_menu', $id_menu)
                          ->first();

    if ($existingCart) {
        $existingCart->quantity += $quantity;
        $existingCart->save();
    } else {
        M_Cart::create([
            'id_user' => $user->id,
            'id_menu' => $id_menu,
            'quantity' => $quantity,
        ]);
    }

    return redirect()->route('menuUser')->with('pesan', 'Menu berhasil ditambahkan ke keranjang!');
    }

    public function detailUser($id_menu)
    {
        $menu = $this->M_Menu->detailData($id_menu);
        if (!$menu) {
            abort(404);
        }

        // Kirimkan juga kategori jika perlu (misal breadcrumb, dsb)
        return view('v_detailmenuhanna', compact('menu'));
    }
    public function viewCart()
    {
        $user = auth()->user();
        $cartItems = M_Cart::with('menu')->where('id_user', $user->id)->get();

    return view('v_cart', ['cart' => $cartItems]);
    }

    public function submitPemesanan(Request $request)
    {
       $request->validate([
        'nama_pemesan' => 'required|string|max:100',
        'alamat' => 'required|string',
        'no_wa' => 'required|string|max:20',
        'catatan' => 'nullable|string',
        'tgl_pesanan' => 'required|date',
        'waktu_pengambilan' => 'required',
    ]);

    $id_user = Auth::id();
    $pelanggan = DB::table('tb_pelanggan1')->where('id_user', $id_user)->first();

    if (!$pelanggan) {
    return redirect()->back()->with('error', 'Data pelanggan tidak ditemukan.');
    }

    $id_pelanggan = $pelanggan->id_pelanggan;
    $tgl_pesanan = $request->tgl_pesanan . ' ' . $request->waktu_pengambilan . ':00';

    // Ambil cart user dari database
    $cart = M_Cart::with('menu')
    ->where('id_user', auth()->user()->id)
    ->get();

    if ($cart->isEmpty()) {
        return redirect()->back()->with('error', 'Keranjang Anda kosong.');
    }

    DB::beginTransaction();

    try {
        $totalHarga = $cart->sum(function($cart) {
            return $cart->menu->harga * $cart->quantity;
        });

        $totalPesanan = $cart->sum('quantity');

        // Simpan pesanan utama
        $pesanan = M_Pesanan::create([
            'id_pelanggan'  => $id_pelanggan,
            'nama_pemesan'  => $request->nama_pemesan,
            'alamat'        => $request->alamat,
            'no_wa'         => $request->no_wa,
            'tgl_pesanan'   => $tgl_pesanan,
            'catatan'       => $request->catatan,
            'total_harga'   => $totalHarga,
            'total_pesanan' => $totalPesanan,
        ]);

        // Simpan detail tiap item dalam keranjang
        foreach ($cart as $cart) {
            M_DetailPesanan::create([
            'id_pesanan'    => $pesanan->id_pesanan,
            'id_menu'       => $cart->id_menu,
            'qty'           => $cart->quantity,
            'harga'         => $cart->menu->harga,
            'subtotal'      => $cart->menu->harga * $cart->quantity,
    ]);
        }

        // Kosongkan cart setelah checkout
        M_Cart::where('id_user', $id_user)->delete();

        DB::commit();

        return redirect()->route('pembayaran.form', ['id_pesanan' => $pesanan->id_pesanan]);
        } catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

    }

    public function v_pemesanan()
    {
    $user = Auth::user();

    $cart = DB::table('tb_cart')
    ->join('tb_menu', 'tb_cart.id_menu', '=', 'tb_menu.id_menu')
    ->where('tb_cart.id_user', $user->id)
    ->select('tb_cart.*', 'tb_menu.nama_menu', 'tb_menu.harga')
    ->get();

    return view('v_pemesanan', ['cart' => $cart]);
    }

    public function removeFromCart($id_menu)
    {
    M_Cart::where('id_user', auth()->id())
        ->where('id_menu', $id_menu)
        ->delete();

    return redirect()->route('viewCart')->with('pesan', 'Item berhasil dihapus dari keranjang!');
    }

    public function ubahStatus(Request $request, $id)
    {
    DB::table('tb_pesanan')
        ->where('id_pesanan', $id)
        ->update(['status' => $request->status]);

    return redirect()->back()->with('pesan', 'Status pesanan berhasil diubah!');
    }
}
