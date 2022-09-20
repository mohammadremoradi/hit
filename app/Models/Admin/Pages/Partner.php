<?php

namespace App\Models\Admin\Pages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    protected $fillable = [
        'img',
        'url',
    ];
    public function seos()
    {
        return $this->morphMany(Seo::class, 'seoable');
    }
}
