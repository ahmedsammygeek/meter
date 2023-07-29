<?php

namespace App\Http\Requests\Board\Areas;

use Illuminate\Foundation\Http\FormRequest;
use Request;
class UpdateAreaRequest extends FormRequest
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
            'name' => 'required|unique:areas,name,'.$id , 
            'active' => 'nullable'
        ];
    }
}
