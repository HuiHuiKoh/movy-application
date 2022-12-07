<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Showtimes extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    
    protected $fillable = [
        'dateTime',
        'hall',
        'cinemaID',
        'moviesID',

    ];
    
    /**
     * Get the associated ticket.
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
    
    /**
     * Get the associated movie.
     */
    public function movie()
    {
        return $this->belongsTo(Movies::class, 'movies_id');
    }
}
