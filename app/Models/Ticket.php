<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'seat_id',
        'payment_id',
        'food_id',
        'membership_voucher_id',
        'member_id'
    ];
}
