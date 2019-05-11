<?php

namespace App\Http\Requests\Project;

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
            'name'   => ['required', 'min:4', 'max:255', 'regex:/^[a-zA-Z0-9\]*[a-zA-Z]+[a-zA-Z0-9\s]*$/'],
            'dob'    => ['required'],
            'gender' => ['required'],
            'mail'   => ['required', 'email'],
            'phone'  => ['required', 'regex:/^([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])$/'],
            'description' => '',
            'avatar' => ['max:3000', 'image']
        ];
    }
}
