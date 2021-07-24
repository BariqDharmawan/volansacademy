<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChatFormRequest extends FormRequest
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
			
        ];
		if ($this->getMethod() == 'POST') {
			$rules += ['chat' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:512'];
		}
        return $rules;
    }
}
