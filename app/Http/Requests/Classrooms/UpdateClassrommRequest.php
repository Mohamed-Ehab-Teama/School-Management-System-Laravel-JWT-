<?php

namespace App\Http\Requests\Classrooms;

use App\Helpers\Helpers;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;

class UpdateClassrommRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return in_array($this->user()->role, ['admin']);
    }



    /**
     * Failed Validation
     */
    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $res = Helpers::sendResponse(422, 'Validation Errors', $validator->errors());
        throw new ValidationException($validator, $res);
    }



    /**
     * Failed Authorization
     */
    public function failedAuthorization()
    {
        $res = Helpers::sendResponse(403, 'You are not Authorized!!!', []);
        return new AuthorizationException($res);
    }

    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string',
        ];
    }
}
