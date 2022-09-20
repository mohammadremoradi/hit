<?php

namespace App\Models\Admin\Pages;

use App\Models\Admin\Seo\Seo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'phone_one',
        'phone_two',
        'address',
        "instagram",
        "telegram",
        "twitter",
        "youtube",
        "iframe",
        "logo",
        "logo_color",
    ];
    public function seos()
    {
        return $this->morphMany(Seo::class, 'seoable');
    }
}
