<?php

namespace App\Http\Requests\Admin\Meal;

use Illuminate\Foundation\Http\FormRequest;

class MealRequest extends FormRequest
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
            'name' => 'required|min:6|max:20',
            'price' => 'required',
            'description' => 'required|min:10|max:100',
            'category_id' => 'required',
            'meal_img' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please fill Category Name',
            'name.min' => 'The name must be between 6 to 20 character',
            'name.max' => 'The name must be between 6 to 20 character',  
            'price.required' => 'Please fill Price',  
            'description.required' => 'Please fill description',
            'description.min' => 'The description must be between 10 to 100 character',
            'description.max' => 'The description must be between 10 to 100 character',
            'category_id.required' => 'Please select Category Name',
            'meal_img.required' => 'Please select an image',
        ];
    }
}
