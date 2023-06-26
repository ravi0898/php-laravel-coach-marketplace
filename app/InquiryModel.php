<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class InquiryModel extends Model
{
    protected $table='contactus';
    protected $primaryKey='id';
    protected $fillable=['name','emails','company','comments'];

}

