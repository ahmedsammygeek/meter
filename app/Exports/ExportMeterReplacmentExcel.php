<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ExportMeterReplacmentExcel implements FromCollection ,  WithMapping , WithHeadings
{
    public $MeterReplacements;
    public $i = 1;


    public function __construct($MeterReplacements)
    {
        $this->MeterReplacements = $MeterReplacements;
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->MeterReplacements->get();
    }

    public function headings(): array
    {
        return [
            '#',
            'اسم الموظف',
            'الحى',
            'الحاله',
            'رقم القطعه',
            'رقم العداد القديم',
            'قراءه العداد القديم',
            'رقم العداد الجديد',
            'قراءه العداد الجديد',
            'نوع العداد الجديد',
            'خط الطول',
            'خط العرض',
            'ملاحظات',
            'تاريخ الاضافه',
        ];
    }
    public function map($MeterReplacement): array
    {
        return [
            $this->i++ , 
            $MeterReplacement->user?->name,
            $MeterReplacement->district?->name,
            $MeterReplacement->status == 1 ? 'تم' : 'ملغى' , 
            $MeterReplacement->segment_number , 
            $MeterReplacement->old_meter_number , 
            $MeterReplacement->old_meter_read , 
            $MeterReplacement->new_meter_number , 
            $MeterReplacement->new_meter_read , 
            $MeterReplacement->meter_company?->name , 
            $MeterReplacement->longitude , 
            $MeterReplacement->latitude , 
            $MeterReplacement->comments , 
            $MeterReplacement->created_at , 
        ];
    }
}
