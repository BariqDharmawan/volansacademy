<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'roles' => ['required']
        ];
        if ($this->getMethod() == 'POST') {
            $rules += [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'password' => ['required', 'string', 'min:8', 'same:confirm-password'],
            ];
        }
        if ($this->getMethod() == 'PATCH') {
            $rules += [
                'password' => ['nullable', 'string', 'min:8', 'same:confirm-password'],
            ];
        }
        return $rules;
    }
}