<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class SkilledProfile extends Model
{
    use HasFactory;
    protected $fillabel = [
        'user_id',
        'skilled_name',
        'skilled_surname',
        'skilled_profession',
        'skilled_industry',
        'skilled_telephone',
        'skilled_description',
        'skilled_experience_organization',
        'skilled_experience_position',
        'skilled_experience_from',
        'skilled_experience_till',
        'skilled_experience_description',
        'skilled_CV',
        'skilled_avatar'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function skilled_posts() {
        return $this->hasMany(SkilledPost::class);
    }
}
