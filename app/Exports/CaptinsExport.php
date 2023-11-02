<?php

namespace App\Exports;

use App\Models\Captin;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CaptinsExport implements FromView, WithStyles
{
    private $name;

    function __construct(
        $name,

    ) {
        $this->name = $name;

    }

    public function view(): View
    {
        //

        $name = $this->name;
        $query =  Captin::query();

        $query->where(function ($q) use ($name) {
            $q->where('name', 'like', "%" . $name . "%");

        });



        $captins = $query->get();
        return view('captins.export', [
            'captins' => $captins
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }
}
