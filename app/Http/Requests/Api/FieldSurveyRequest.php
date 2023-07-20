<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
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
            'files' => 'nullable' , 
            'files.*' => 'image'
        ];
    }


    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status'   => false,
            'message'   => 'برجاء ملىء البيانات بشكل صحيح',
            'errors'      => $validator->errors() , 
            'data' => (object)[]
        ]));
    }

     public function messages()
    {
        return [
            'district_id.required' => 'الحى مطلوب',
            'latitude.required' => 'خط الطول  مطلوبه',
            'longitude.required' => 'خط العرض مطلوبه',
            'segment_number.required' => 'رقمه القعه  مطلوبه',
            'segment_type_id.required' => 'نوع القطعه  مطلوبه',
            'property_type_id.required' => 'نوع العقار  مطلوبه',
            'meter_type_id.required' => 'نوع العداد  مطلوبه',
            'meter_number.required' => 'رقم العداد  مطلوبه',
            'meters_count.required' => 'عدد اعدادات  مطلوبه',
        ];
    }
}
