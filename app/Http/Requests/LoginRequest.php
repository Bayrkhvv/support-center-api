<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    const PARAMETER_EMAIL    = 'email';
    const PARAMETER_PASSWORD = 'password';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            self::PARAMETER_EMAIL    => 'required|email',
            self::PARAMETER_PASSWORD => 'required',
        ];
    }
}
