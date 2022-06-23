<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterviewerInterviewType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hasParentInterviewType()
    {
        return $this->hasOne(InterviewType::class, 'id', 'parent_interview_type_id');
    }
    public function hasChildInterviewType()
    {
        return $this->hasOne(InterviewType::class, 'id', 'child__interview_type_id');
    }
}
