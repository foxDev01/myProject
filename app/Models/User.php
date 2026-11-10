<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    const ROLE_ADMIN = 0;
    const ROLE_READER = 1;
    public static function getRoles()
    {
        return[
            self::ROLE_ADMIN => 'АДМИН',
            self::ROLE_READER => 'ЧИТАТЕЛЬ',
        ];
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

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
        'role' => 'integer',
    ];
    public function likedProjects() 
    {
        return $this->belongsToMany(Proj::class, 'project_user_likes', 'user_id', 'project_id');

    }
    public function comments() 
    {
        return $this->hasMany(Comment::class,'user_id', 'id');
    }
    
    
    
}
