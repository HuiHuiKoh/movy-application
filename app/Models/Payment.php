<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $fillable = [
        'amount',
        'method',
        'ticket_id',
        'food_order_id',
        'user_id'
    ];
    
    /**
     * Get the associated ticket.
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
    
    /**
     * Get the associated food order.
     */
    public function foodOrder()
    {
        return $this->belongsTo(FoodOrder::class, 'food_order_id');
    }
    
    /**
     * Get the associated user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
