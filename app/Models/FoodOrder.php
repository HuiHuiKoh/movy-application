<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodOrder extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $fillable = [
        'total_amount',
        'user_id'
    ];
    
    /**
     * Get the ordered foods associated with the order.
     */
    public function orderedFoods()
    {
        return $this->hasMany(OrderedFood::class);
    }
    
    /**
     * Get the associated user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}