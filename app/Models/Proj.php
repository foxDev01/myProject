<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proj extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'projects';
    protected $guarded = false;
    protected $withCount = ['likedIUser'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'project_tags', 'project_id','tag_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id', 'id');
    }
    public function likedIuser()
    {
        return $this->belongsToMany(User::class, 'project_user_likes', 'project_id', 'user_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'project_id','id');
    }
}
