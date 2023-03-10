<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'price_list_id',
        'quantity',
        'price',
        'sub_total',
    ];

    /**
     * Transaction relation
     * relasi ke transaksi
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }

    /**
     * Price list relation
     * relasi ke daftar harga
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function price_list(): BelongsTo
    {
        return $this->belongsTo(PriceList::class);
    }

    /**
     * Get formatted number of price
     * mengambil format harga 
     * @return string
     */
    public function getFormattedPrice(): string
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    /**
     * Get formatted number of sub total
     * mengambil format total harga
     * @return string
     */
    public function getFormattedSubTotal(): string
    {
        return 'Rp ' . number_format($this->sub_total, 0, ',', '.');
    }
}
