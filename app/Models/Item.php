<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'category_id',
        'balance',
        'picture_url'
    ];
    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }
    public function order(): BelongsToMany{
        return $this->belongsToMany(Order::class, 'item_orders');
    }
}
