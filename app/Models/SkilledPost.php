<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkilledPost extends Model
{
    use HasFactory;
    protected $fillable = [
        'skilled_id',
        'hiring_tag_id',
        'industry_tag_id',
        'title',
        'post_desciption',
        'country',
        'city',
        'hours_per_week',
        'type',
    ];

    public function skilled_profile() {
        return $this->belongsTo(SkilledProfile::class, 'skilled_id');
    }

    public function hiring_tag() {
        return $this->belongsTo(ProjectPostHiringTag::class);
    }

    public function industry_tag() {
        return $this->belongsTo(ProjectPostIndustryTag::class);
    }

    // public function comments() {
    //     return $this->hasMany(Comment::class)->whereNull('parent_id');
    // }
}
