<?php

namespace App\Exports;

use App\Enums\Status;
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
        return Department::select('name') ->withCount('recruit')->get();
    }


    public function headings(): array
    {
        $model_vacancy = Vacancy::select('name')->pluck('name')->toArray();
        array_unshift($model_vacancy,'Week');
        return [
            ['TRACKING TUYEN DUNG FCT T03.2022'],
            ['Request','20'],
            ['CV gửi','10'],
            ['OB','30'],
            [''],
            [''],
            ['','','Skill'],
            $model_vacancy,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event)
            {
                $cellRange = 'A1:W1';
                $event->sheet->getDelegate()->getStyle($cellRange)
                    ->getFont()->setSize(14)->setBold(true);
//                $styleArray = [
//                    'borders' => [
//                        'allBorders' =>[
//                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
//                        ],
////                        'outline' => [
////                            'color' => ['argb' => 'FFFF0000'],
////                        ],
//                    ],
//                ];
//                $event->sheet->getStyle('A1:I1',)->applyFromArray($styleArray);
            }
        ];
    }

}
