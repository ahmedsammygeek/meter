<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class FieldSurveyRequest extends FormRequest
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
            'segment_type_id' => 'required' , 
            'property_type_id' => 'required' , 
            'meter_type_id' => 'required' , 
            'meter_number' => 'required' , 
            'meters_count' => 'required' , 
            'comments' => 'nullable' , 
            'client_name' => 'nullable' , 
            'client_phone' => 'nullable' , 
            'client_national_id' => 'nullable' , 
            'files' => 'nullable|file' , 
        ];
    }
}
