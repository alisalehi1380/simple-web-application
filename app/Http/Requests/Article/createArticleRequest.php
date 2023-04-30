<?php

namespace App\Http\Requests\Article;


use Illuminate\Foundation\Http\FormRequest;

class createArticleRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title'       => ['required', 'max:255'],
            'summery'     => ['required', 'max:255'],
            'description' => ['required'],
            'image'       => ['required', 'max:255'],
            'tags'        => ['required', 'max:255'],
        ];
    }
}
