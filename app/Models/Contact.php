<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contact extends Model
{
    use Notifiable;
    
    protected $table = 'contacts';
    protected $fillable = ['name', 'email', 'phone', 'message', 'reply_message'];
}
