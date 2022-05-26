<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestorProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'investor_name',
        'investor_surname',
        'industry_tag_id',
        'investor_description',
        'investor_insta_link',
        'investor_face_link',
        'investor_linked_link',
        'founder_description',
        'founder_avatar'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
