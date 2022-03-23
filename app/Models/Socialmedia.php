<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Socialmedia extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'socialmedia';
    public $timestamps = true;
    protected $fillable = array('facebook', 'twitter', 'linkedin', 'googleplus', 'pinterest', 'youtube', 'instagram', 'tumblr', 'flickr', 'reddit', 'snapchat', 'whatsapp', 'quora', 'stumbleupon', 'delicious', 'digg');
}
