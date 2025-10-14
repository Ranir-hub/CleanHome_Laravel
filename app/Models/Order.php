<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    public $timestamps = false;
    use HasFactory;
    
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function items(): BelongsToMany{
        return $this->belongsToMany(Item::class, 'item_orders')
                    ->withPivot(['amount']);
    }
}