<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForumUser extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $fillable = [
        'username',
        'email',
        'password',
        'forum_user_type_id'
    ];
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * Get the associated forum user type.
     */
    public function forumUserType()
    {
        return $this->belongsTo(ForumUserType::class, 'forum_user_type_id');
    }
    
    /**
     * Get the forums associated with the forum user.
     */
    public function forums()
    {
        return $this->hasMany(Forum::class);
    }
    
    /**
     * Get the threads associated with the forum user.
     */
    public function threads()
    {
        return $this->hasMany(Thread::class);
    }
    
    /**
     * Get the replies associated with the forum user.
     */
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
