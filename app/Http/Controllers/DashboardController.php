<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKategori = Category::count();
        $totalProduk = Product::count();
        $totalPesanan = Order::count();
        $totalPendapatan = Order::where('status', '!=', 'Dibatalkan')->sum('total_harga');
        $totalPelanggan = User::where('role', 'pelanggan')->count();

        return view('admin.dashboard', compact(
            'totalKategori',
            'totalProduk',
            'totalPesanan',
            'totalPendapatan',
            'totalPelanggan'
        ));
    }
}
