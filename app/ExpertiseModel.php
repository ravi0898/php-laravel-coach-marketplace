<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpertiseModel extends Model
{
    protected $table='expertise';
    protected $primaryKey='id';
    protected $fillable=['name'];
}
