<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hasDegree()
    {
        return $this->hasOne(Degree::class, 'slug', 'degree_slug');
    }

    public function hasCourse()
    {
        return $this->hasOne(Course::class, 'slug', 'course_slug');
    }
}
