<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hasInvitedUsers()
    {
        return $this->hasMany(InvitedUser::class, 'invite_id', 'id')->where('registered', 1)->orderby('id', 'desc');
    }

    public function hasReferral()
    {
        return $this->hasOne(Referral::class, 'id', 'referral_id');
    }
}
