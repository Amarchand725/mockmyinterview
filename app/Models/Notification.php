<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Notification extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hasReadNotification()
    {
        return $this->hasOne(ReadNotification::class, 'notification_id', 'id')->where('read_by', '!=', Auth::user()->id);
    }
}
