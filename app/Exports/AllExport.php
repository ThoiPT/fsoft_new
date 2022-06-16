<?php

namespace App\Exports;

use App\Enums\Status;
use App\Models\CV;
use App\Models\Department;
use App\Models\Recruit;
use App\Models\Skill;
use App\Models\User;
use App\Models\Vacancy;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Events\AfterSheet;



class AllExport implements
    FromCollection,
    WithHeadings,
    WithEvents,
    ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return Department::select('name')
            ->withCount('recruit')
            ->withCount('cv')
            ->withCount(['cv','cv as cv_1'=>function($query){
                $query
                    ->where('c_v_s.status',Status::Interview);
            }])
            ->withCount(['cv','cv as cv2'=>function($query){
                $query
                    ->where('c_v_s.status',Status::Offer);
            }])
            ->withCount(['cv','cv as cv3'=>function($query){
                $query
                    ->where('c_v_s.status',Status::Onboard);
            }])
            ->withCount(['cv','cv as cv4'=>function($query){
                $query
                    ->where('c_v_s.status',Status::Reject);
            }])
            ->withCount(['cv','cv as cv5'=>function($query){
                $query
                    ->where('c_v_s.status',Status::working);
            }])
            ->get();
    }


    public function headings(): array
    {
//        $model_vacancy = Vacancy::select('name')->pluck('name')->toArray();
//        array_unshift($model_vacancy,'Week');
        $countRecruit = Recruit::all()->count();
        $countCV = CV::all()->count();
        $countOB = CV::where('status','=',Status::Onboard)->count();
        return [
            ['TRACKING TUYEN DUNG FCT T03.2022'],
            ['Request',$countRecruit],
            ['CV gửi',$countCV],
            ['OB',$countOB],
            [''],
            [''],
            ['',''],
            ['Department','Recruit','Curriculum Vitae','Interview','Offer','Onboard','Reject','Working'],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event)
            {
                $cellRange = 'A8:H14';
                $event->sheet->getStyle($cellRange)->applyFromArray([
                    'borders'=> [
                      'allBorders'=>[
                          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                          'color' => ['argb' => '000000'],
                      ],
                    ],
                ]);
                $event->sheet->getStyle('A8:H8')
                    ->getFont()->setSize(18)->setBold('true')
                    ->getColor()->setARGB('DD4B39');

                $event->sheet->getStyle('A1')
                    ->getFont()->setSize(20)->setBold('true');

                $event->sheet->getStyle('A2:B4')->applyFromArray([
                    'borders'=>[
                        'allBorders'=>[
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
            }

        ];
    }

}
