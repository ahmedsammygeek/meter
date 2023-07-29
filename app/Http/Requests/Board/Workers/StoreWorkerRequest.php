<?php

namespace App\Http\Requests\Board\Workers;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkerRequest extends FormRequest
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
        return [
            'name' => 'required' , 
            'phone' => 'required|unique:users,phone' , 
            'email' => 'required|email|unique:users,email' , 
            'is_active' => 'nullable' , 
            'password' => 'required|confirmed'  , 
        ];
    }
}
