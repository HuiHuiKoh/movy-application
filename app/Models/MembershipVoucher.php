<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MembershipVoucher extends Model
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
        'redemption_date',
        'member_id',
        'voucher_id'
    ];
    
    /**
     * Get the associated membership.
     */
    public function membership()
    {
        return $this->belongsTo(Membership::class, 'member_id');
    }
    
    /**
     * Get the associated voucher.
     */
    public function voucher()
    {
        return $this->belongsTo(Voucher::class, 'voucher_id');
    }
    
    /**
     * Get the associated ticket.
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
