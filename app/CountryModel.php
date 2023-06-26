<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryModel extends Model
{
    protected $table='country';
    protected $primaryKey='id';
    protected $fillable=['iso','name','nicename','phonecode','numcode','iso3'];

}
