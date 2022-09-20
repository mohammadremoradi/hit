<?php

namespace App\Models\Admin\Pages;

use App\Models\Admin\Seo\Seo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About_us extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_one',
        'title_two',
        'title_three',
        'title_four',
        'title_five',
        'title_six',
        'title_seven',
        'text_one',
        'text_two',
        'text_three',
        'text_four',
        'text_five',
        'text_six',
        'text_seven',
        'text_eight',
        'img_one',
        'img_two',
        'img_three',
        'title',
        'description',
        'lang',

    ];

    public function seos()
    {
        return $this->morphMany(Seo::class, 'seoable');
    }

}
