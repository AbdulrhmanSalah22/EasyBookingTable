<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|min:6|max:20' ,
            'cat_img' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please fill Category Name',
            'name.min' => 'The name must be between 6 to 20 character',
            'name.max' => 'The name must be between 6 to 20 character',  
            'cat_img.required' => 'Please add Category Image',  
        ];
    }
}
