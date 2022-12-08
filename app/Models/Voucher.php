<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $fillable = [
        'title',
        'code',
        'discount_amount',
        'exp_date',
    ];
    
    /**
     * Get the membership voucher associated with the voucher.
     */
    public function membershipVouchers()
    {
        return $this->hasMany(MembershipVoucher::class);
    }
}
