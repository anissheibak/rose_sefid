<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=['name', 'url', 'status', 'parent_id', 'tags'];

    public function parent():BelongsTo
    {
        return $this->belongsTo($this,'parent_id')->with('parent');
    }

    public function children(): HasMany
    {
        return $this->hasMany($this,'parent_id')->with('children');
    }
}
