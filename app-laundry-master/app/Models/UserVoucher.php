<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserVoucher extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * Atribut yang dapat ditetapkan secara massal.

     * @var array<string>
     */
    protected $fillable = [
        'voucher_id',
        'user_id',
        'used',
    ];

    /**
     * User relation
     * relasi ke user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Voucher relation
     * relasi ke voucher
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function voucher(): BelongsTo
    {
        return $this->belongsTo(Voucher::class);
    }
}
