<?php

namespace App\Models\Ticket;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['subject', 'description', 'status', 'seen', 'reference_id', 'user_id', 'category_id', 'priority_id', 'ticket_id'];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function admin():BelongsTo
    {
        return $this->belongsTo(TicketAdmin::class, 'reference_id');
    }

    public function priority():BelongsTo
    {
        return $this->belongsTo(TicketPriority::class);
    }

    public function category():BelongsTo
    {
        return $this->belongsTo(TicketCategory::class);
    }

    public function parent():BelongsTo
    {
        return $this->belongsTo($this,'ticket_id')->with('parent');
    }

    public function children(): HasMany
    {
        return $this->hasMany($this,'ticket_id')->with('children');
    }
}
