<?php

namespace App\Models\Admin\Seo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo_ContactUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'script',
        'location',
        'lang',
    ];

}
