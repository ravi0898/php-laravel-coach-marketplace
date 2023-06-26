<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    protected $table='booking';
    protected $primaryKey='id';
    protected $fillable=['name', 'plan', 'price', 'coach_id', 'user_id', 'order_id', 'rejection', 'status', 'meeting_session', 'meeting_price', 'meeting_start_date', 'paid_amount', 'paid_currency', 'tran_token', 'paid_session'];
    
    public function user_details(){
        return $this->belongsTo(User::class,'user_id');
    }
    
    public function coach_details(){
        return $this->belongsTo(User::class,'coach_id');
    }
}
