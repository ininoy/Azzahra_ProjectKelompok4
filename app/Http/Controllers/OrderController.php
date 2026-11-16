<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Halaman Admin: Daftar Penjualan / Pesanan Masuk
    public function index()
    {
        $orders = Order::with('product')->latest()->get();
        $totalPendapatan = Order::where('status', '!=', 'Dibatalkan')->sum('total_harga');
        return view('admin.order.index', compact('orders', 'totalPendapatan'));
    }

    // Proses Beli dari Halaman Pelanggan
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'nama_pembeli' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'jumlah' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($product->stok < $request->jumlah) {
            return back()->with('error', 'Maaf, stok busana tidak mencukupi!');
        }

        $hargaSatuan = $product->harga_promo ?? $product->harga;
        $totalHarga = $hargaSatuan * $request->jumlah;

        Order::create([
            'product_id' => $product->id,
            'nama_pembeli' => $request->nama_pembeli,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'jumlah' => $request->jumlah,
            'total_harga' => $totalHarga,
            'status' => 'Baru',
        ]);

        // Otomatis kurangi stok produk
        $product->decrement('stok', $request->jumlah);

        return back()->with('success', 'Pesanan berhasil dibuat! Terima kasih telah berbelanja di Azzahra Shop.');
    }

    // Update Status Pesanan di Admin
    public function updateStatus(Request $request, Order $order)
    {
        $order->update(['status' => $request->status]);
        return back()->with('success', 'Status pesanan diperbarui!');
    }
}
