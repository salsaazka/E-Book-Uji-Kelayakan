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
            'Judul',
            'Penulis',
            'Penerbit',
            'Kategori',
            'Sinopsis',
            'No ISBN',
        ];
    }
    public function collection()
    {
        return Ebook::select(
            'title',
            'writer',
            'publisher',
            'category',
            'synopsis',
            'no',
        )->get();
    }
}
