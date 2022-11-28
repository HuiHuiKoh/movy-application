<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thread extends Model
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
        'view_count',
        'forum_id',
        'forum_user_id'
    ];
    
    /**
     * Get the replies associated with the forum user.
     */
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
    
    /**
     * Get the associated thread.
     */
    public function forum()
    {
        return $this->belongsTo(Forum::class, 'forum_id');
    }
    
    /**
     * Get the associated forum user.
     */
    public function forumUser()
    {
        return $this->belongsTo(ForumUser::class, 'forum_user_id');
    }
}
