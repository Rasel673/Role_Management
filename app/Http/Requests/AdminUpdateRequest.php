<?php

namespace App\Http\Requests;

use App\Http\Middleware\Admin;
use Illuminate\Validation\Rules;
use Illuminate\Foundation\Http\FormRequest;


class AdminUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',],
            'phone' => ['required', 'string', 'max:11','min:11',],
            'password' => ['required', Rules\Password::defaults()],
        ];
    }
}
