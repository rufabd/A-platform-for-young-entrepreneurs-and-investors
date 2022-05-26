<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FounderProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'founder_name',
        'founder_surname',
        'founder_position',
        'founder_organization',
        'founder_telephone',
        'founder_insta_link',
        'founder_face_link',
        'founder_linked_link',
        'founder_description',
        'founder_avatar'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function project_posts() {
        return $this->hasMany(ProjectPost::class);
    }
}
