<?php

namespace App\Http\Controllers;

use App\Exports\AbsenGuruExport;
use App\Exports\AbsenSiswaExport;
use App\Models\AbsenGuru_Model;
use App\Models\AbsenSiswa_Model;
use App\Models\Admin;
use App\Models\Guru;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AbsenAdminController extends Controller
{
    public function siswa()
    {

        // dd(AbsenSiswa_Model::all());
        return view('admin.absen.siswa', [
            'title' => 'Data Siswa',
            'plugin' => '
                <link rel="stylesheet" type="text/css" href="' . url("/assets/backend") . '/plugins/table/datatable/datatables.css">
                <link rel="stylesheet" type="text/css" href="' . url("/assets/backend") . '/plugins/table/datatable/dt-global_style.css">
                <script src="' . url("/assets/backend") . '/plugins/table/datatable/datatables.js"></script>
                <script src="https://cdn.datatables.net/fixedcolumns/4.1.0/js/dataTables.fixedColumns.min.js"></script>
            ',
            'menu' => [
                'menu' => 'absen',
                'expanded' => 'absen',
                'collapse' => 'absen',
                'sub' => 'absen_siswa',
            ],
            'admin' => Admin::firstWhere('id', session('admin')->id),
            'siswa' => AbsenSiswa_Model::all(),
            'kelas' => Kelas::all()
        ]);
    }

    public function hapus_absen_siswa($id)
    {
        AbsenSiswa_Model::destroy($id);
        return redirect('/admin/absen/siswa')->with('pesan', "
            <script>
                swal({
                    title: 'Berhasil!',
                    text: 'data Absen siswa berhasil di hapus!',
                    type: 'success',
                    padding: '2em'
                })
            </script>
        ");
    }

    public function cetak_absen_siswa()
    {
        return Excel::download(new AbsenSiswaExport, 'data-absen-siswa.xlsx');
    }

    public function guru()
    {
        // dd(AbsenGuru_Model::all());
        return view('admin.absen.guru', [
            'title' => 'Data Siswa',
            'plugin' => '
                <link rel="stylesheet" type="text/css" href="' . url("/assets/backend") . '/plugins/table/datatable/datatables.css">
                <link rel="stylesheet" type="text/css" href="' . url("/assets/backend") . '/plugins/table/datatable/dt-global_style.css">
                <script src="' . url("/assets/backend") . '/plugins/table/datatable/datatables.js"></script>
                <script src="https://cdn.datatables.net/fixedcolumns/4.1.0/js/dataTables.fixedColumns.min.js"></script>
            ',
            'menu' => [
                'menu' => 'absen',
                'expanded' => 'absen',
                'collapse' => 'absen',
                'sub' => 'absen_guru',
            ],
            'admin' => Admin::firstWhere('id', session('admin')->id),
            'guru' => AbsenGuru_Model::all(),
        ]);
    }

    public function hapus_absen_guru($id)
    {
        AbsenGuru_Model::destroy($id);
        return redirect('/admin/absen/guru')->with('pesan', "
            <script>
                swal({
                    title: 'Berhasil!',
                    text: 'data Absen Guru berhasil di hapus!',
                    type: 'success',
                    padding: '2em'
                })
            </script>
        ");
    }

    public function cetak_absen_guru()
    {
        return Excel::download(new AbsenGuruExport, 'data-absen-guru.xlsx');
    }
}