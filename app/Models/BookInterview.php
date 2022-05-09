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
}
