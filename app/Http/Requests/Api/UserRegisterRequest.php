<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
 

class UserRegisterRequest extends FormRequest
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
            'name' => 'required|min:3|max:12',
            'email' => 'required|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'phone' => 'required|min:11|max:11',
            'password' => 'required|min:8|max:16',
        ]; 
    }


    public function messages()
{
    return [
        'name.required' => 'Please add your name',
        'name.min' => ' The name must be between 3 to 12 characters ',
        'name.max' => 'The name must be between 3 to 12 characters',
        'email.required' => 'Please add your email',
        'email.unique' => 'This email is taken',
        'email.regex' => 'This email must contain @ .com',
        'phone.required' => 'Please add your phone',
        'password.required' => 'Please add your password',
        
    ];
}

protected function failedValidation(Validator $validator)
{
    throw new HttpResponseException(response()->json($validator->errors(), 422));
}


}
