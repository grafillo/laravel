<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addtopicRequest extends FormRequest
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
            'title' => 'required|max:100',
            'message' => 'required',

        ];
    }


    public function messages()
    {
        return [
            "title.max" =>"В поле 'название' не должно быть больше 100 символов!",
            "title.required" =>"Поле 'название' не может быть пустым!",
            "message.required" =>"Введите текст статьи!",


        ];
    }


}
