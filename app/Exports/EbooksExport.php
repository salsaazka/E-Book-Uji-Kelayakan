<?php

namespace App\Exports;

use App\Models\Ebook;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EbooksExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'title',
            'writer',
            'publisher',
            'category',
            'synopsis',
            'no',
        ];
    }
    public function collection()
    {
        return Ebook::all();
    }
}
