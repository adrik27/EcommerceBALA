<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order_Detail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function Order()
    {
        return $this->belongsTo(Order::class);
    }

    public function Produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
