<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectUserLike extends Model
{
    use HasFactory;
    protected $table = 'project_user_likes';
    protected $guarded = false;
}
