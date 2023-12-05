<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductColor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=['color_name', 'product_id', 'price_increase', 'status',
    'sold_number', 'frozen_number', 'marketable_number'];

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
