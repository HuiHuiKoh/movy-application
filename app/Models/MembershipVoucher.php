<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'code',
        'redemption_date',
        'member_id'
    ];
}
