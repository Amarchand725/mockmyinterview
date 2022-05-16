<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Coupon extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function hasUsages()
    {
        return $this->hasMany(CouponUsage::class, 'coupon_id', 'id')->where('candidate_id', Auth::user()->id);
    }
}
