<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return transliterator_create_from_rules;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {//入力したデータがルールを守っているか確認する
        return [
            'name' => 'required|max:255',
            'price' => 'required|integer|min:1',
            'img_url' => 'required|url',
        ];
    }
}
