<?php

namespace App\Http\Requests\Notify;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SmsRequest extends FormRequest
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
            'title' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
            'status' => 'required|numeric|in:0,1',
            "body" => 'required|min:15|regex:/^[A-ZÁÉÚŐÓÜÖÍa-záéúőóüöíا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ?!=":]+$/u',
            'published_at' => 'required|numeric',
        ];
    }
}
