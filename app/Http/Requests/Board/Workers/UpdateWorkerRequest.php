<?php

namespace App\Http\Requests\Board\Workers;

use Illuminate\Foundation\Http\FormRequest;
use Request;
class UpdateWorkerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $id = Request::segment(3);
        return [
            'name' => 'required' , 
            'phone' => 'required|unique:users,phone,'.$id , 
            'email' => 'required|email|unique:users,email,'.$id , 
            'is_active' => 'nullable' , 
            'password' => 'nullable|confirmed'  , 
        ];
    }
}
