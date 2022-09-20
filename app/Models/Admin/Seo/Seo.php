<?php

namespace App\Models\Admin\Seo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;
    public function seoable()
    {
        return $this->morphTo();
    }
}
