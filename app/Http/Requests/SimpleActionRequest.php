<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SimpleActionRequest extends AjaxFormRequest
{
    public function rules()
    {
        return [
            'id'            =>  'required|numeric|gte:0',
        ];
    }
}
