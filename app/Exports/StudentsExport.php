<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class StudentsExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $conditions;
    protected $index;

    public function __construct($conditions)
    {
        $this->conditions = $conditions;
        $this->index = 0;
    }

    public function collection()
    {
        return collect($this->conditions);
    }

    public function headings(): array
    {
        return [
            '#',
            'Dni',
            'Apellido',
            'Nombre',
            'Cant. Asistencias',
            'Condición'
        ];
    }


    public function map($student): array
    {
        $this->index++;
        return [
            $this->index,
            $student['dni'],
            $student['lastname'],
            $student['name'],
            $student['countAssists'],
            $student['condition'],
        ];
    }
}
