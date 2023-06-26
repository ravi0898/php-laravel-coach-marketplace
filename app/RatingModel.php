<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RatingModel extends Model
{
    protected $table='rating';
    protected $primaryKey='id';
    protected $fillable=['coach_id','user_id','rating','comment'];
}
