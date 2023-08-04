<?php

namespace App\Exports;

use App\Models\AbsenSiswa_Model;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AbsenSiswaExport implements FromView
{
    public function view(): View
    {
        return view('ekspor.absensiswa', [
            'siswa' => AbsenSiswa_Model::all()
        ]);
    }
}