<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hasUserDetails()
    {
        return $this->hasOne(UserDetail::class, 'user_id', 'id');
    }
    public function hasUserQualification()
    {
        return $this->hasMany(Qualification::class, 'user_id', 'id');
    }
    public function hasUserQualificationDetails()
    {
        return $this->hasOne(QualificationDetail::class, 'user_id', 'id');
    }
    public function hasUserExperiences()
    {
        return $this->hasMany(Experience::class, 'user_id', 'id');
    }
    public function hasUserExperienceDetails()
    {
        return $this->hasOne(ExperienceDetail::class, 'user_id', 'id');
    }
    public function hasResume()
    {
        return $this->hasOne(Resume::class, 'user_id', 'id');
    }
    public function hasSkills()
    {
        return $this->hasOne(Skill::class, 'user_id', 'id');
    }
    public function hasProjects()
    {
        return $this->hasOne(Project::class, 'user_id', 'id');
    }
    public function hasInterviewTypes()
    {
        return $this->hasMany(InterviewerInterviewType::class, 'interviewer_id', 'id');
    }
}
