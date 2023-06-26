<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingTempModel extends Model
{
    protected $table='booking_tempory';
    protected $primaryKey='id';
    protected $fillable=['name', 'plan', 'price', 'coach_id', 'user_id'];
    
}
