<?php

namespace App\Http\Requests;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AuthorizedFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $error_list = [];
        $validation_errors = $validator->errors()->messages();
        foreach ($validation_errors as $errors)
            foreach ($errors as $err)
                $error_list[] = $err;

        Log::debug("Validation errors: ");
        Log::debug($error_list);
        parent::failedValidation($validator);        
        // throw new HttpResponseException(response()->json($data, Response::HTTP_UNPROCESSABLE_ENTITY)); //422

    }
}
