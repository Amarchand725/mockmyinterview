<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvitedUser extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hasUser()
    {
        return $this->hasOne(User::class, 'email', 'email');
    }
}
