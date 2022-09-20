<?php

namespace App\Http\Requests\Notify;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EmailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'subject' => "required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,' ]+$/u",
            "body" => "required|regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ?!=':]+$/u",
            'published_at' => 'required|numeric',
        ];
    }
}
