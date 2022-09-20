<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fullname' => "required|max:200|regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,' ]+$/u" ,
            'current_citizenship' => "required|max:500|regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,' ]+$/u",
            'passport_number' => 'required|max:500|regex:/^[A-Z-a-zA-Z0-9\ ]+$/u',
            'mother_name' => "required|max:500|regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي., ' ]+$/u",
            'sex' => 'required|in:male,female',
            'birth_day' => 'required|max:100|regex:/^[0-9\/\ ]+$/u',
            'address' => "required|max:500|regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,' ]+$/u",
            'post_code' => "required|max:500|regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي., ' ]+$/u",
            'nationality' => "required|max:500|regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي., ' ]+$/u",
            'email' => 'required|email|unique:registers,email',
            'phone' => "required|unique:registers,phone|max:500|regex:/^[A-Z a-zA-Z0-9\ + ]+$/u",
            'agent_email' => 'email',
            'degree' => "required|max:500|regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,' ]+$/u",
            'major' => "required|max:500|regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,' ]+$/u",
            'course_id' => 'required|max:500|exists:courses,id',
            'passport' => 'mimes:jpeg,jpg,png',
            // 'g-recaptcha-response' => 'required|recaptchav3:register-form,0.5'
        ];
    }
}
