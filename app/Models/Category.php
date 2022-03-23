<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function hasCreatedBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
}
