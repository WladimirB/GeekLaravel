<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
        'category' => 'required|string|min:5|unique:App\Models\Category,category'
       ];
    }


    public function messages()
    {
      return [
        'category.required' => 'Поле Category не должно быть пустым',
        'category.min' => 'Поле Category не должно быть короче 5-ти символов',
        'category.string' => 'Поле Category должно состоять только из буквенных символов',
        'category.unique' => 'Такая категория уже существует'
      ];
   }
}
