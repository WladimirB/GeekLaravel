<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSourceRequest extends FormRequest
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
           'sourceofnews' => 'required|string|min:12|unique:App\Models\SourceOfNews,source'
        ];
    }

    public function messages()
    {
      return [
        'sourceofnews.required' => 'Поле источник новостей не должно быть пустым',
        'sourceofnews.min' => 'Поле источник новостей не должно быть короче 12-ти символов',
        'sourceofnews.string' => 'Поле источник новостей должно состоять только из буквенных символов',
        'sourceofnews.unique' => 'Такой источник новостей уже существует'
      ];
    }
}
