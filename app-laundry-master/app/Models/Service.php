<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Price lists relation
     * relasi ke daftar harga
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function price_lists(): HasMany
    {
        return $this->hasMany(PriceList::class);
    }
}