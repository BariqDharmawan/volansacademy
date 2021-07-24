<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TutorFormRequest extends FormRequest
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
            'field' => 'required',
            'name' => 'required',
			'from' => 'required',
        ];
		if ($this->getMethod() == 'POST') {
			$rules += ['fix_image' => 'required'];
		}
        return $rules;
    }
}
