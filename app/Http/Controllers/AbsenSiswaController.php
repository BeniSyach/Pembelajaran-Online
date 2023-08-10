<?php

namespace App\Http\Controllers;

use App\Models\AbsenSiswa_Model;
use App\Models\Notifikasi;
use App\Models\Siswa;
use App\Models\TugasSiswa;
use App\Models\WaktuUjian;
use Illuminate\Http\Request;

class AbsenSiswaController extends Controller
{
    public function index()
    {
        $notif_tugas = TugasSiswa::where('siswa_id', session('siswa')->id)
            ->where('date_send', null)
            ->get();

        $notif_ujian = WaktuUjian::where('siswa_id', session('siswa')->id)
            ->where('selesai', null)
            ->get();

         $get_tanggal_absen = AbsenSiswa_Model::where('siswa_id',session('siswa')->id)->latest()->first();
         $tanggal_absen = date('Y-m-d',strtotime($get_tanggal_absen['created_at']?? 'null' ));
        // dd($tanggal_absen);

        return view('siswa.absen.index', [
            'title' => 'Absen Siswa',
            'plugin' => '
                <link rel="stylesheet" type="text/css" href="' . url("/assets/backend") . '/plugins/table/datatable/datatables.css">
                <link rel="stylesheet" type="text/css" href="' . url("/assets/backend") . '/plugins/table/datatable/dt-global_style.css">
                <script src="' . url("/assets/backend") . '/plugins/table/datatable/datatables.js"></script>
                <script src="https://cdn.datatables.net/fixedcolumns/4.1.0/js/dataTables.fixedColumns.min.js"></script>
            ',
            'menu' => [
                'menu' => 'absen',
                'expanded' => 'absen'
            ],
            'siswa' => Siswa::firstWhere('id', session('siswa')->id),
            'notif_tugas' => $notif_tugas,
            'notif_materi' => Notifikasi::where('siswa_id', session('siswa')->id)->get(),
            'notif_ujian' => $notif_ujian,
            'tanggal_absen' => $tanggal_absen
        ]);
    }

    public function store($id)
    {
        $tanggal = date('Y-m-d' );
        $get_tanggal_absen =AbsenSiswa_Model::where('idAbsen',$id)->latest()->first();
        $tanggal_absen = date('Y-m-d',strtotime($get_tanggal_absen['created_at']?? 'null' ));


        if($tanggal == $tanggal_absen)
        {
            return redirect('/siswa/absen')->with('pesan', "
            <script>
                swal({
                    title: 'Gagal!!',
                    text: 'Anda Sudah Absen',
                    type: 'error',
                    padding: '2em'
                })
            </script>
        ");
        }else{
            AbsenSiswa_Model::create([
                'siswa_id' => $id,
                'status' => 'hadir'
            ]);
            return redirect('/siswa/absen')->with('pesan', "
            <script>
                swal({
                    title: 'Berhasil!',
                    text: 'Anda Berhasil Absen',
                    type: 'success',
                    padding: '2em'
                })
            </script>
        ");
        }
    }

    public function lihat()
    {
        $notif_tugas = TugasSiswa::where('siswa_id', session('siswa')->id)
        ->where('date_send', null)
        ->get();

    $notif_ujian = WaktuUjian::where('siswa_id', session('siswa')->id)
        ->where('selesai', null)
        ->get();

        $get_tanggal_absen = AbsenSiswa_Model::where('siswa_id',session('siswa')->id)->get();

        // dd($get_tanggal_absen);

        return view('siswa.absen.lihat', [
            'title' => 'Data Absen',
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
            'siswa' => Siswa::firstWhere('id', session('siswa')->id),
            'notif_tugas' => $notif_tugas,
            'notif_materi' => Notifikasi::where('siswa_id', session('siswa')->id)->get(),
            'notif_ujian' => $notif_ujian,
            'siswaAbsen' => $get_tanggal_absen
        ]);
    }
}