<?php

namespace App\Http\Requests\Admin\Pages;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ContactRequest extends FormRequest
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
            "email" => "email",
            "phone_one" => "numeric|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,+ ]+$/u",
            "phone_two" => "numeric|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,+ ]+$/u",
            "address" => "min:5|max:89|regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,' ]+$/u",
            "instagram" => "url|min:10",
            "telegram" => "url|min:10",
            "twitter" => "url|min:10",
            "youtube" => "url|min:10",
            "iframe" => 'min:15',
            "logo" => "required|file|mimes:png,jpg",
            "logo_color" => "required|file|mimes:png,jpg",
        ];
    }
}
