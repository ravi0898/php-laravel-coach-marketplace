<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeniorityModel extends Model
{
    protected $table='seniority';
    protected $primaryKey='id';
    protected $fillable=['name'];
}
