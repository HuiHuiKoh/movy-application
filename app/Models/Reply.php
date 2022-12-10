<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $fillable = [
        'content',
        'thread_id',
        'user_id'
    ];
    
    /**
     * Get the associated thread.
     */
    public function thread()
    {
        return $this->belongsTo(Thread::class, 'thread_id');
    }
    
    /**
     * Get the associated forum user.
     */
    public function forumUser()
    {
        return $this->belongsTo(ForumUser::class, 'forum_user_id');
    }
}
