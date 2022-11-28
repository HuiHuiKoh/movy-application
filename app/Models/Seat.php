<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $fillable = [
        'row',
        'number',
        'seat_type_id',
    ];
    
    /**
     * Get the associated seat type.
     */
    public function seatType()
    {
        return $this->belongsTo(SeatType::class, 'seat_type_id');
    }
    
    /**
     * Get the associated ticket.
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
