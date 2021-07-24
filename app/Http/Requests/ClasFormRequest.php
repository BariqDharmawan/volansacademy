<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClasFormRequest extends FormRequest
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
			'description' => ['required']
		];
		if ($this->getMethod() == 'POST') {
			$rules += ['banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'];
		}
        return $rules;
    }
}
