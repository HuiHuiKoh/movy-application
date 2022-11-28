<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForumUserType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $fillable = [
        'user_type',
    ];
    
    /**
     * Get the forum users associated with the forum user type.
     */
    public function forumUsers()
    {
        return $this->hasMany(ForumUser::class);
    }
}
