<?php

namespace App\Http\Requests\Project;

use App\Rules\NameFormat;
use App\Rules\PhoneFormat;
use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'name'   => ['required', 'min:4', 'max:255', new NameFormat()],
            'dob'    => ['required'],
            'gender' => ['required'],
            'mail'   => ['required', 'email'],
            'phone'  => ['required', new PhoneFormat()],
            'description' => '',
            'avatar' => ['max:3000', 'image']
        ];
    }
}
