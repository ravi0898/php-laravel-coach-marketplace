<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessModel extends Model
{
    protected $table='business_model';
    protected $primaryKey='id';
    protected $fillable=['name'];
}
