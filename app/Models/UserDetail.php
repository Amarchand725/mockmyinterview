<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function hasLanguage()
    {
        return $this->hasOne(Language::class, 'slug', 'language_slug');
    }
}
