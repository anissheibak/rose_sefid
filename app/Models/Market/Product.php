<?php

namespace App\Models\Market;

use App\Models\Content\Comment;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $casts = ['image' => 'array'];
    protected $fillable=['name', 'introduction', 'slug', 'image', 'weight',
     'length', 'width', 'height', 'price', 'status',
     'marketable', 'tags', 'sold_number', 'frozen_number', 'marketable_number',
     'brand_id', 'category_id', 'published_at'];

     public function brand():BelongsTo
     {
        return $this->belongsTo(Brand::class, 'brand_id');
     }

     public function category():BelongsTo
     {
        return $this->belongsTo(ProductCategory::class, 'category_id');
     }

     public function metas():HasMany
     {
        return $this->hasMany(ProductMeta::class);
     }

     public function colors():HasMany
     {
        return $this->hasMany(ProductColor::class);
     }

     public function images():HasMany
     {
        return $this->hasMany(Gallery::class);
     }

     public function values():HasMany
     {
        return $this->hasMany(CategoryValue::class);
     }

     public function comments():MorphMany
     {
        return $this->morphMany(Comment::class, 'commentable');
     }

}
