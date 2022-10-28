<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function Status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function Order_Detail(): BelongsTo
    {
        return $this->belongsTo(Order_Detail::class);
    }
}
