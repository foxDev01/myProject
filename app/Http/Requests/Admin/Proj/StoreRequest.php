<?php

namespace App\Http\Requests\Admin\Proj;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title'=>'required|string',
            'content'=>'required|string',
            'preview_image'=>'required|file',
            'main_image'=>'required|file',
            'category_id'=>'required|integer|exists:categories,id',
            'tag_ids'=>'nullable|array',
            'tag_ids.*'=>'nullable|integer|exists:tags,id',

        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'Это поле необходимо заполнить',
            'title.string'=>'Данные должны соответсвовать строчному типу',
            'content.required'=>'Это поле необходимо заполнить',
            'content.string'=>'Данные должны соответсвовать строчному типу',
            'preview_image.required'=>'Это поле необходимо заполнить',
            'preview_image.file'=>'Необходимо выбрать файл',
            'main_image.required'=>'Это поле необходимо заполнить',
            'main_image.file'=>'Необходимо выбрать файл',
            'category_id.required'=>'Это поле необходимо заполнить',
            'category_id.integer'=>'Id Категории должно быть числом',
            'category_id.exist'=>'Id Категории должно быть в БД',
            'tag_ids.array'=>'Необходимо отпрвить масси данных',

        ];
    }
}
