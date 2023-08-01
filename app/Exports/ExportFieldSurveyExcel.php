<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ExportFieldSurveyExcel implements FromCollection , WithMapping , WithHeadings
{
    public $FieldSurveys;
    public $i = 1;


    public function __construct($FieldSurveys)
    {
        $this->FieldSurveys = $FieldSurveys;
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->FieldSurveys->get();
    }

    public function headings(): array
    {
        return [
            '#',
            'اسم الموظف',
            'الحى',
            'رقم القطعه',
            'نوع القطعه',
            'نوع العقار',
            'نوع العداد',
            'رقم العداد',
            'عدد العدادات',
            'اسم العميل',
            'رقم جوال العميل',
            'رقم هويه العميل',
            'خط الطول',
            'خط العرض',
            'ملاحظات',
            'تاريخ الاضافه',
        ];
    }



    /**
    * @var Invoice $invoice
    */
    public function map($FieldSurvey): array
    {
        return [
            $this->i++ , 
            $FieldSurvey->user?->name,
            $FieldSurvey->district?->name,
            $FieldSurvey->segment_number , 
            $FieldSurvey->segment_type?->name , 
            $FieldSurvey->property_type?->name , 
            $FieldSurvey->meter_type?->name , 
            $FieldSurvey->meter_number , 
            $FieldSurvey->meters_count , 
            $FieldSurvey->client_name , 
            $FieldSurvey->client_phone , 
            $FieldSurvey->client_national_id , 
            $FieldSurvey->longitude , 
            $FieldSurvey->latitude , 
            $FieldSurvey->comments , 
            $FieldSurvey->created_at , 
        ];
    }
}
