<?php

namespace App\Http\Requests\Admin\Meal;

use Illuminate\Foundation\Http\FormRequest;

class DeleteMealOptionRequest extends FormRequest
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
            'option_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'option_id.required' => 'Please select Option Name',
        ];
    }
}
