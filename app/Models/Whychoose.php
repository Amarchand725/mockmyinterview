<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Whychoose extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'whychooses';
    public $timestamps = true;
    protected $fillable = array('name', 'content', 'icon', 'photo');
}
