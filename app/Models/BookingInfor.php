<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingInfor extends Model
{
    protected $table = 'booking_infor';
    protected $fillable = [
        "room_id",
        "full_name",
        "email_address",
        "phone_number",
        "checkin_date",
        "checkout_date",
        "status",
    ] ;
    public function room(){
        return $this->belongsTo(Room::class);
    }
}
