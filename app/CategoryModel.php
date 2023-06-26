<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table='coach_category';
    protected $primaryKey='id';
    protected $fillable=['categoryName','cat_img'];
}
