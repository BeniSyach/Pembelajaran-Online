<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Notifikasi;
use App\Models\Siswa;
use App\Models\TugasSiswa;
use App\Models\WaktuUjian;
use Illuminate\Http\Request;

class NilaiSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notif_tugas = TugasSiswa::where('siswa_id', session('siswa')->id)
        ->where('date_send', null)
        ->get();

    $notif_ujian = WaktuUjian::where('siswa_id', session('siswa')->id)
        ->where('selesai', null)
        ->get();

    return view('siswa.nilai.index', [
        'title' => 'Data nilai Siswa',
        'plugin' => '
            <link rel="stylesheet" type="text/css" href="' . url("/assets/backend") . '/plugins/table/datatable/datatables.css">
            <link rel="stylesheet" type="text/css" href="' . url("/assets/backend") . '/plugins/table/datatable/dt-global_style.css">
            <script src="' . url("/assets/backend") . '/plugins/table/datatable/datatables.js"></script>
            <script src="https://cdn.datatables.net/fixedcolumns/4.1.0/js/dataTables.fixedColumns.min.js"></script>
        ',
        'menu' => [
            'menu' => 'nilai',
            'expanded' => 'nilai'
        ],
        'siswa' => Siswa::firstWhere('id', session('siswa')->id),
        'materi' => Materi::where('kelas_id', session('siswa')->kelas_id)->get(),
        
        'notif_tugas' => $notif_tugas,
        'notif_materi' => Notifikasi::where('siswa_id', session('siswa')->id)->get(),
        'notif_ujian' => $notif_ujian
    ]);
    }
}