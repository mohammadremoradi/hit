<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Question extends Model
{
    use HasFactory , Notifiable;

    protected $fillable = [
        'email',
        'subject',
        'message',
        "fullname",
    ];
}
