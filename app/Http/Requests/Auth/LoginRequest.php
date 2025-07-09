<?php

namespace App\Http\Requests\Auth;

use App\Helpers\Helpers;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    /**
     * Failed Validation
     */
    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator) 
    {
        $response = Helpers::sendResponse(422, 'Validation Errros', $validator->errors());
        throw new ValidationException($validator, $response);
    }



    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'         => 'email|required',
            'password'      => 'string|required',
        ];
    }
}
