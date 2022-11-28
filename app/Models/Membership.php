<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Membership extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $fillable = [
        'points',
        'user_id'
    ];
    
    /**
     * Get the membership voucher associated with the membership.
     */
    public function membershipVouchers()
    {
        return $this->hasMany(MembershipVoucher::class);
    }
    
    /**
     * Get the associated user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
