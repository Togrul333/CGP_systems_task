<?php

namespace App\Http\Requests;

use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AjaxFormRequest extends AuthorizedFormRequest
{
    protected function failedValidation(Validator $validator)
    {
        $error_list = [];
        $validation_errors = $validator->errors()->messages();
        foreach ($validation_errors as $field => $errors) {
            $field = explode('.', $field);
            $field = $field[0];
            $error = [
                'field'     =>  $field,
                'errors'    =>  []
            ];
            foreach ($errors as $err){
                $error['errors'][] = $err;
            }
            $error_list[] = $error;
        }


        $data = [
            'result' => 'error',
            'message'   => 'Введенная информация является неполной',
            'data'  => $error_list
        ];
        throw new HttpResponseException(response()->json($data, Response::HTTP_UNPROCESSABLE_ENTITY)); //422

    }
}
