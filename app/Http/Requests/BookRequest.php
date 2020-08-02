<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'     => 'required|min:8|max:64',
            'isbn'      => 'required|min:8|max:32',
            'pages'     => 'required|min:1',
            'about'     => 'required|min:0|max:256',
            'author_id' => 'required',
        ];
    }
}