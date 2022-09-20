<?php

namespace App\Http\Requests\Admin\Pages;

use App\Enums\LangType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AdmissionRequest extends FormRequest
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
            'title' => "required|max:70|regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,' ’, ]+$/u",
            "description" => 'required|max:170|regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ?!=":.’,]+$/u',
            "text_one" => "regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\r& ?!=':.’,]+$/u",
            "text_two" => "regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\r& ?!=':.’,]+$/u",
            "pr_title_one" => 'regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ?!=".:’,]+$/u',
            "pr_title_two" => "regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\r& ?!=':.’,]+$/u",
            "pr_title_three" => "regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\r& ?!=':.’,]+$/u",
            "pr_title_four" => "regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\r& ?!=':.’,]+$/u",
            "pr_title_five" => 'regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ?!=".:’,]+$/u',
            "pr_title_six" => "regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\r& ?!=':.’,]+$/u",
            "pr_text_one" => "regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\r& ?!=':.’,]+$/u",
            "pr_text_two" => "regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\r& ?!=':.’,]+$/u",
            "pr_text_three" => "regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\r& ?!=':.’,]+$/u",
            "pr_text_four" => "regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\r& ?!=':.’,]+$/u",
            "pr_text_five" => "regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\r& ?!=':.’,]+$/u",
            "pr_text_six" => "regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\r& ?!=':.’,]+$/u",
            "need_one" => "regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\r& ?!=':.’,]+$/u",
            "need_two" => "regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\r& ?!=':.’,]+$/u",
            "need_three" => "regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\r& ?!=':.’,]+$/u",
            "need_four" => "regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\r& ?!=':.’,]+$/u",
            'lang' => 'required|enum_value:' . LangType::class,
        ];
    }
}
