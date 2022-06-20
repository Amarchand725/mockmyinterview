<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InterviewCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $guard = [];

    public function hasCreatedBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function hasParent()
    {
        return $this->hasOne(InterviewCategory::class, 'id', 'parent_id');
    }
}
