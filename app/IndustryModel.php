<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndustryModel extends Model
{
    protected $table='industry';
    protected $primaryKey='id';
    protected $fillable=['name'];
}
