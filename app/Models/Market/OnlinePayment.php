<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class OnlinePayment extends Model
{
    use HasFactory;

    public function payments():MorphMany
     {
        return $this->morphMany(Payment::class, 'paymentable');
     }
}
