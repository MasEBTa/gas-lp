<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social_media extends Model
{
    use HasFactory;

    protected $table = 'social_medias';
    protected $guarded = ['id'];
}
