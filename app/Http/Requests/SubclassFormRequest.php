<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubclassFormRequest extends FormRequest
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
			//'description' => ['required'],
			//'facilities' => ['required'],
			//'price' => ['required'],
			//'price_discount' => ['required'],
			//'periode' => ['required'],
			
        ];
		if ($this->getMethod() == 'POST') {
			$rules += ['icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:512'];
		}
        return $rules;
    }
}
