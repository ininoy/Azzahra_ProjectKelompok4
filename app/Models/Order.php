<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'nama_pembeli',
        'no_hp',
        'alamat',
        'jumlah',
        'total_harga',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
