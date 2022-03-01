<?php

namespace App\Http\Requests\Admin\Option;

use Illuminate\Foundation\Http\FormRequest;

class MealOptionRequest extends FormRequest
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
            'meal_id' => 'required' ,
            'option_id' => 'required' ,
        ];
    }

    public function messages()
    {
        return [
            'meal_id.required' => 'Please select Meal Name',
            'option_id.required' => 'Please select Option Name',
        ];
    }

}
