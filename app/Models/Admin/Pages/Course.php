<?php

namespace App\Models\Admin\Pages;

use App\Models\Admin\Register;
use App\Models\Admin\Seo\Seo;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'body',
        'img',
        "credit",
        "duration",
        "video",
        "summary",
        "lang",
        "start_course_day",
        "start_course_month",
        "slug",
        "course_lang",
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    public function seos()
    {
        return $this->morphMany(Seo::class, 'seoable');
    }
    public function registers()
    {
        return $this->hasMany(Register::class , 'program_id');
    }

}
