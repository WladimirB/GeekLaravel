<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditNewsArticleRequest extends FormRequest
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
            'title' => 'required|string|min:5|max:60',
            'content' => 'required|string|min:60'
        ];
    }

    public function messages()
    {
      return [
        'title.required' => 'Поле заголовок не должно быть пустым',
        'content.required' => 'Поле содержание не должно быть пустым',
        'title.min' => 'Поле заголовок не должно быть короче 4-х символов',
        'content.min' => 'Поле содержание не должно быть короче 60-ти символов',
        'title.string' => 'Поле заголовок должно состоять только из буквенных символов',
        'content.string' => 'Поле содержание должно состоять только из буквенных символов'
      ];
    }
}
