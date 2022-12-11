<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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

    public function rules()
    {
        return [
            'company_id'          =>  'required|numeric|gte:0',
            'name'                =>  'required|string',
            'address'             =>  'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required'                     =>  'Не заполнено',
            'address.required'                  =>  'Не заполнено',
        ];
    }
}
