<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryValue extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['product_id', 'category_attribute_id', 'value', 'type'];

    public function attribute():BelongsTo
    {
        return $this->belongsTo(CategoryAttribute::class);
    }

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
