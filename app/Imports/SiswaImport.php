<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Siswa([
            'nis'     => $row['nis'],
            'nama_siswa'    => $row['nama_siswa'],
            'gender'    => $row['gender'],
            'kelas_id'    => $row['kelas_id'],
            'email'    => $row['email'],
            'password' => bcrypt($row['nis']),
            'avatar' => 'default.png',
            'role' => 3,
            'is_active' => 1
        ]);
    }
}
