<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationModel extends Model
{
    protected $table='notification';
    protected $primaryKey='id';
    protected $fillable=['user_id', 'sender_id', 'notification_msg', 'status', 'url', 'page', 'admin_status'];
    

}
