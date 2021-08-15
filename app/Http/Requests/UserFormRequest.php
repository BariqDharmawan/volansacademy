<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

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

    protected function passedValidation()
    {
        if ($this->password != null) {
            $this->merge([
                'password' => Hash::make($this->password)
            ]);
        }
        else {
            unset($this->password);
        }

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => ['required', 'string', 'max:255']
        ];

        if ($this->getMethod() == 'POST') {
            $rules += [
                'email' => [
                    'required', 'string', 'email:rfc,dns', 
                    'max:255', 'unique:users,email'
                ],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'role_id' => ['required']
            ];
        }

        if ($this->getMethod() == 'PATCH') {
            $rules += [
                'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            ];
        }

        return $rules;
    }
}
