<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Foods extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',

    ];
    
    /**
     * Get the associated ticket.
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
    
    /**
     * Get the associated ticket.
     */
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
    
    /**
     * Get the ordered foods associated with the food.
     */
    public function orderedFoods()
    {
        return $this->hasMany(OrderedFood::class);
    }
}
