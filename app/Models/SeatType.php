<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeatType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $fillable = [
        'seat_type',
        'price'
    ];
    
    /**
     * Get the seats associated with the seat type.
     */
    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
}
