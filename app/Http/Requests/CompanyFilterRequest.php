<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyFilterRequest extends FormRequest
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
            'sortBy'              =>  'nullable|string',
            'sortOrder'           =>  'nullable|string',
            'client_name'         =>  'nullable|string',
            'perPage'             =>  'nullable|numeric',
            'paginate'            =>  'nullable|numeric',
        ];
    }
}
