<?php

namespace App\Models\Admin\Pages;

use App\Models\Admin\Seo\Seo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'slider_text_one',
        'slider_text_two',
        "slider_image",
        "about_us_text",
        "about_us_video",
        "lang",
    ];


    public function seos()
    {
        return $this->morphMany(Seo::class, 'seoable');
    }
}
