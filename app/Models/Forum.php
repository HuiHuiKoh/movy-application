<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Forum extends Model
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
        'forum_user_id'
    ];
    
    /**
     * Get the threads associated with the forum user.
     */
    public function threads()
    {
        return $this->hasMany(Thread::class);
    }
    
    /**
     * Get the associated forum user.
     */
    public function forumUser()
    {
        return $this->belongsTo(ForumUser::class);
    }
}
