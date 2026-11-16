<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $kategoris = Category::all();
        $produks = Product::with('category')->latest()->get();

        return view('welcome', compact('kategoris', 'produks'));
    }
}
