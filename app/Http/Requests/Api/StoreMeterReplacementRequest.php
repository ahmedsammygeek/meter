<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreMeterReplacementRequest extends FormRequest
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
            'district_id' => 'required' , 
            'latitude' => 'required' , 
            'longitude' => 'required' , 
            'segment_number' => 'required' , 
            'status' => 'required' , 
            'old_meter_number' => 'required' , 
            'old_meter_read' => 'required' , 
            'new_meter_number' => 'required' , 
            'new_meter_read' => 'nullable' , 
            'new_meter_company_id' => 'required' , 
            'comments' => 'nullable' , 
            'files' => 'nullable', 
            'files.*' => 'file' , 
        ];
    }
}
