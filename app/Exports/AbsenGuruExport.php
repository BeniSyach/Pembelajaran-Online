<?php

namespace App\Exports;

use App\Models\AbsenGuru_Model;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AbsenGuruExport implements FromView
{
    public function view(): View
    {
        return view('ekspor.absenguru', [
            'guru' => AbsenGuru_Model::all()
        ]);
    }
}