<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'project_post_id',
        'parent_id',
        'body'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function project() 
    // {
    //     return $this->belongsTo(ProjectPost::class, 'project_post_id');
    // }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
