<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['searchProduk'] ?? false,
            fn ($query, $searchProduk) => $query->where('nama', 'like', '%' . $searchProduk . '%')
                ->orWhere('harga', 'like', '%' . $searchProduk . '%')
                ->orWhere('keterangan', 'like', '%' . $searchProduk . '%')
                ->orWhere('kode', 'like', '%' . $searchProduk . '%')
        );
    }


    public function Keranjang(): HasMany
    {
        return $this->hasMany(Keranjang::class);
    }

    public function Order(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function Order_Detail(): HasMany
    {
        return $this->hasMany(Order_Detail::class);
    }
}
