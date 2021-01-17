<?php

namespace App\Http\Requests\Auth;

use App\Rules\AllLowercaseRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'username' => ['required','alpha_num','unique:users', new AllLowercaseRule],
            'email' => 'required|email|unique:users',
            'password' => ['required', 'min:6','confirmed']
        ];
    }
}
