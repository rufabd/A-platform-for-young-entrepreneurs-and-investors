<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectPost extends Model
{
    use HasFactory;
    protected $fillable = [
        'founder_id',
        'hiring_tag_id',
        'industry_tag_id',
        'title',
        'organization_description',
        'post_description',
        'country',
        'city',
        'organization',
        'organization_year',
        'project_stage',
        'hours_per_week',
        'type_week',
        'investment'
    ];

    public function founder_profile() {
        return $this->belongsTo(FounderProfile::class, 'founder_id');
    }

    public function hiring_tag() {
        return $this->belongsTo(ProjectPostHiringTag::class);
    }

    public function industry_tag() {
        return $this->belongsTo(ProjectPostIndustryTag::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function favorite(){
        return $this->hasMany(Favorite::class);
    }
}
