<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectPostHiringTag extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function project_posts() {
        return $this->hasMany(ProjectPost::class);
    }
}
