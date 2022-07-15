<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableSlotDate extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hasBookedSlots()
    {
        return $this->hasMany(AvailableSlot::class, 'available_slot_date_id', 'id');
    }
    public function hasBookedSlot()
    {
        return $this->hasOne(AvailableSlot::class, 'available_slot_date_id', 'id');
    }
}
