<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $guarded = ['id'];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // PENCARIAN DASHBOARD USER
    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['searchUsers'] ?? false,
            fn ($query, $searchUsers) => $query
                ->where('role_id', 'like', '%' . $searchUsers . '%')
                ->orWhere('nama', 'like', '%' . $searchUsers . '%')
                ->orWhere('username', 'like', '%' . $searchUsers . '%')
                ->orWhere('email', 'like', '%' . $searchUsers . '%')
                ->orWhere('alamat', 'like', '%' . $searchUsers . '%')
                ->orWhere('telp', 'like', '%' . $searchUsers . '%')
        );
    }

    // RELASI TABEL
    public function Role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function Keranjang(): HasMany
    {
        return $this->hasMany(Keranjang::class);
    }

    public function Order(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
