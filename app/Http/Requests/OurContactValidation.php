<?php

namespace App\Http\Requests;

use App\Helper;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class OurContactValidation extends FormRequest
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
     * Change request before validation
     */
    protected function prepareForValidation()
    {
        $prefixLink = '';
        $waNumber = '';

        if ($this->link_to != 'custom') {
            switch ($this->link_to) {
                case 'whatsapp':
                    $prefixLink = 'https://wa.me/';
                    $phone = $this->value;

                    if ($phone[0] == '0') {
                        $phone = str_replace($phone[0], '62', $phone);
                    }
                    
                    if ($phone[0] != '0' and !Str::contains($phone, '62') and $phone[0] != '+') {
                        $phone = '62' . $phone;
                    }

                    if ($phone[0] == '+') {
                        $phone = ltrim($phone, '+');
                    }

                    $this->link = $phone;

                    break;
    
                case 'instagram':
                    $prefixLink = 'https://instagram.com/';

                    $username = $this->value;
                    if ($username[0] == '@') {
                        $username = ltrim($username, '@');
                    }

                    $this->link = $username;
                    
                    break;
            }
        }
        
        $this->merge([
            'name' => $this->name,
            'value' => $this->value,
            'link'  => $this->link_to != 'custom' ? $prefixLink . $this->link : 
                    $this->link,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'value' => ['required', 'string'],
            'link' => ['required', 'string', 'min:4', 'url'],
        ];
    }

}
