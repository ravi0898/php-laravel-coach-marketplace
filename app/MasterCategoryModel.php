<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterCategoryModel extends Model
{
    protected $table='master_category';
    protected $primaryKey='id';
    protected $fillable=['name'];
}
