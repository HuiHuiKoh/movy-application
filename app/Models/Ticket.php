<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
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
        'showtimes_id',
        'payment_id',
        'user_id'
    ];
    
    /**
     * Get the associated user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    /**
     * Get the payments associated with the ticket.
     */
    public function payments()
    {
        return $this->hasMany(Payment::class, 'payment_id');
    }
    
    /**
     * Get the showtimes associated with the ticket.
     */
    public function showtimes()
    {
        return $this->hasMany(Showtimes::class, 'showtimes_id');
    }
}
