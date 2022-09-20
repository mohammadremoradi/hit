<?php

namespace App\Models\Admin;

use App\Models\Admin\Pages\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Register extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        "fullname",
        "current_citizenship",
        "passport_number",
        "mother_name",
        "sex",
        "birth_day",
        "address",
        "post_code",
        "nationality",
        "email",
        "phone",
        "agent_email",
        "degree",
        "major",
        "course_id",
        "passport",
    ];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }


}
