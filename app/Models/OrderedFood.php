<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderedFood extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $fillable = [
        'food_id',
        'food_order_id'
    ];
    
    /**
     * Get the associated food order.
     */
    public function foodOrder()
    {
        return $this->belongsTo(FoodOrder::class, 'food_order_id');
    }
    
    /**
     * Get the associated food.
     */
    public function food()
    {
        return $this->belongsTo(Foods::class, 'food_id');
    }
}
