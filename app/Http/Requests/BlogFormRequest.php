<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogFormRequest extends FormRequest
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
            'title' => ['required'],
			'short_description' => ['required'],
			'body' => ['required'],
        ];
		if ($this->getMethod() == 'POST') {
			$rules += ['featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'];
		}
        return $rules;
    }
}
