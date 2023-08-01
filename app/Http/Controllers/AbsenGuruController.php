<?php

namespace App\Http\Controllers;

use App\Models\AbsenGuru_Model;
use App\Models\Guru;

use Illuminate\Http\Request;

class AbsenGuruController extends Controller
{
    public function index()
    {
        $get_tanggal_absen = AbsenGuru_Model::where('guru_id',session('guru')->id)->latest()->first();
        $tanggal_absen = date('Y-m-d',strtotime($get_tanggal_absen['created_at'] ));

        return view('guru.absen.index', [
            'title' => 'Absen',
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
            'guru' => Guru::firstWhere('id', session('guru')->id),
            'tanggal_absen' => $tanggal_absen
        ]);
    }

    public function store($id)
    {
        $tanggal = date('Y-m-d' );
        $get_tanggal_absen = AbsenGuru_Model::where('idAbsen',$id)->latest()->first();
        $tanggal_absen = date('Y-m-d',strtotime($get_tanggal_absen['created_at'] ));


        if($tanggal == $tanggal_absen)
        {
            return redirect('/guru/absen')->with('pesan', "
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
            AbsenGuru_Model::create([
                'guru_id' => $id,
                'status' => 'hadir'
            ]);
            return redirect('/guru/absen')->with('pesan', "
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
}