<?php

namespace App\Models\Admin\Pages;

use App\Models\Admin\Seo\Seo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;
    protected $fillable = [
        'text_one',
        'text_two',
        'pr_title_one',
        'pr_title_two',
        'pr_title_three',
        'pr_title_four',
        'pr_title_five',
        'pr_title_six',
        'pr_text_one',
        'pr_text_two',
        'pr_text_three',
        'pr_text_four',
        'pr_text_five',
        'pr_text_six',
        'need_one',
        'need_two',
        'need_three',
        'need_four',
        'title',
        'description',
        'lang',
    ];
    public function seos()
    {
        return $this->morphMany(Seo::class, 'seoable');
    }
}
