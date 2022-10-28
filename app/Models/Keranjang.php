<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Keranjang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class);
    }


    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
