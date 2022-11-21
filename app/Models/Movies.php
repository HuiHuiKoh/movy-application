<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;


class Movies extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    
    protected $fillable = [
        'name',
        'releasedDate',
        'image',
        'casts',
        'synopsis',
        'language',
        'type',
        'duration',
        'trailer',
        'director',
        'categoryID',

    ];
    
//   public function releasedDateAttributes($value){
//       $this->attributes['releasedDate'] = Carbon::createFromFormat('m/d/Y',$value)->format('Y-m-d');
//   }
}
