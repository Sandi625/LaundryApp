<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PriceList extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'category_id',
        'service_id',
        'price',
    ];

    /**
     * Item relation
     * relasi ke barang
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * Category relation
     * relasi ke kategori
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Service relation
     * relasi ke service
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Transaction detail relation
     * relasi ke detail transaksi
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaction_detail(): BelongsTo
    {
        return $this->belongsTo(TransactionDetail::class);
    }

    /**
     * Get formatted number of price
     * mengambil format nomer dari harga
     * @return string
     */
    public function getFormattedPrice(): string
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }
}
