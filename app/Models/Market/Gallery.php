<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    protected $table = 'product_images';

    use HasFactory, SoftDeletes;

    protected $fillable = ['image', 'product_id'];

    protected $casts = ['image' => 'array'];


    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
