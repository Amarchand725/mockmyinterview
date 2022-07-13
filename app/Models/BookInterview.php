<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookInterview extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function hasCandidate()
    {
        return $this->hasOne(User::class, 'id', 'candidate_id');
    }
    public function hasInterviewer()
    {
        return $this->hasOne(User::class, 'id', 'interviewer_id');
    }

    public function hasParentInterviewType()
    {
        return $this->hasOne(InterviewType::class, 'id', 'parent_interview_type_id');
    }

    public function hasChildInterviewType()
    {
        return $this->hasOne(InterviewType::class, 'id', 'child_interview_type_id');
    }
}
