<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderItem extends Model
{
    use HasFactory;

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function singleProduct(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function amazingSale(): BelongsTo
    {
        return $this->belongsTo(AmazingSale::class, 'amazing_sale_id');
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(ProductColor::class);
    }

    public function guarantee(): BelongsTo
    {
        return $this->belongsTo(Guarantee::class);
    }

    public function orderItemAttributes(): HasMany
    {
        return $this->hasMany(OrderItemSelectedAttribute::class);
    }

}
