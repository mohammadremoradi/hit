<?php

namespace App\Http\Requests\Admin\Pages;

use App\Enums\LangType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->is_admin == 1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => "required|min:10|max:70|regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,\" ]+$/u",
            "description" => "required|regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,\" ]+$/u",
            "summary" => 'required|min:15|regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ?!=":]+$/u',
            "slider_image" => "file|mimes:png,jpg",
            "credit" => "max:70|regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u",
            "duration" => "max:70|regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u",
            'video' => 'mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
            'lang' => 'required|enum_value:' . LangType::class,
            'course_lang' => 'required|enum_value:' . LangType::class,
            "start_course_day" => "max:70|regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u",
            "start_course_month" => "max:70|regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u",

        ];
    }
}
