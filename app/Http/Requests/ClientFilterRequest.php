<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientFilterRequest extends FormRequest
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
            'name'                =>  'nullable|string',
            'address'             =>  'nullable|string',
            'number'             =>  'nullable|numeric',
            'sortBy'              =>  'nullable|string',
            'sortOrder'           =>  'nullable|string',
            'company_name'         =>  'nullable|string',
            'perPage'             =>  'nullable|numeric',
            'paginate'            =>  'nullable|numeric',
        ];
    }
}
