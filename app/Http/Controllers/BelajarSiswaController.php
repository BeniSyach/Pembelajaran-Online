<?php

namespace App\Http\Controllers;

use App\Models\DetailUjian;
use App\Models\EssaySiswa;
use App\Models\FileModel;
use App\Models\KmMateri;
use App\Models\Materi;
use App\Models\Notifikasi;
use App\Models\PgSiswa;
use App\Models\Siswa;
use App\Models\TugasSiswa;
use App\Models\Ujian;
use App\Models\WaktuUjian;
use Illuminate\Http\Request;

class BelajarSiswaController extends Controller
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

        return view('siswa.belajar.index', [
            'title' => 'Data Materi Pelajaran',
            'plugin' => '
                <link rel="stylesheet" type="text/css" href="' . url("/assets/backend") . '/plugins/table/datatable/datatables.css">
                <link rel="stylesheet" type="text/css" href="' . url("/assets/backend") . '/plugins/table/datatable/dt-global_style.css">
                <script src="' . url("/assets/backend") . '/plugins/table/datatable/datatables.js"></script>
                <script src="https://cdn.datatables.net/fixedcolumns/4.1.0/js/dataTables.fixedColumns.min.js"></script>
            ',
            'menu' => [
                'menu' => 'belajar',
                'expanded' => 'belajar'
            ],
            'siswa' => Siswa::firstWhere('id', session('siswa')->id),
            'materi' => Materi::where('kelas_id', session('siswa')->kelas_id)->get(),
            'notif_tugas' => $notif_tugas,
            'notif_materi' => Notifikasi::where('siswa_id', session('siswa')->id)->get(),
            'notif_ujian' => $notif_ujian
        ]);
     }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        WaktuUjian::where('kode', $request->kode)
            ->where('siswa_id', session('siswa')->id)
            ->update(['selesai' => 1,'waktu_berakhir' => now()]);

        return redirect('/siswa/belajar/' . $request->kode_belajar)->with('pesan', "
            <script>
                swal({
                    title: 'Success!',
                    text: 'Tugas sudah dikerjakan!',
                    type: 'success',
                    padding: '2em'
                })
            </script>
        ");
    }
    public function store_essay(Request $request)
    {
        WaktuUjian::where('kode', $request->kode)
            ->where('siswa_id', session('siswa')->id)
            ->update(['selesai' => 1]);

       return redirect('/siswa/belajar/' . $request->kode_belajar)->with('pesan', "
       <script>
           swal({
               title: 'Success!',
               text: 'Tugas sudah dikerjakan!',
               type: 'success',
               padding: '2em'
           })
       </script>
   ");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function show(Materi $belajar)
    {
        if($belajar->kunci_materi == 1)
        {
            return redirect('/siswa/belajar')->with('pesan', "
            <script>
                swal({
                    title: 'Gagal!!',
                    text: 'Materi Dikunci Oleh Guru',
                    type: 'error',
                    padding: '2em'
                })
            </script>
            ");
        }

        Notifikasi::where('siswa_id', session('siswa')->id)
            ->where('kode', $belajar->kode)
            ->delete();

            $chek_ujian = is_null(Ujian::where('materi_id',$belajar->id)->first());
            if($chek_ujian == false)
            {
                $kode_ujian = Ujian::where('materi_id',$belajar->id)->first();

                $waktu_selesai_ujian = WaktuUjian::where('siswa_id', session('siswa')->id)
                ->where('kode', $kode_ujian->kode)
                ->first();

                $ambil_notif_ujian = is_null(WaktuUjian::where('siswa_id', session('siswa')->id)
                ->where('kode', $kode_ujian->kode)
                ->first());
                // dd($ambil_notif_ujian);
                if($ambil_notif_ujian == true)
                {
                    $ujian = Ujian::where('materi_id',$belajar->id)->get();
                    $tambahUjianSiswa = [];
                    foreach($ujian as $u)
                    {
                        array_push($tambahUjianSiswa,[
                            'kode' => $u->kode,
                            'siswa_id' =>  session('siswa')->id,
                            'waktu_berakhir' => null ,
                            'selesai' => null
                        ]);
                     
                    }
                    WaktuUjian::insert($tambahUjianSiswa);
                }
            }

        $notif_ujian = WaktuUjian::where('siswa_id', session('siswa')->id)
            ->where('selesai', null)
            ->get();
        $notif_tugas = TugasSiswa::where('siswa_id', session('siswa')->id)
            ->where('date_send', null)
            ->get();
     
        
        // Soal Pilihan Ganda
        $check_pg = is_null(Ujian::where('materi_id',$belajar->id)->where('jenis',0)->where('kunci_ujian',0)->first());
        if($check_pg == false)
        {
                $ujian = Ujian::where('materi_id',$belajar->id)->where('jenis',0)->first();

                $pg_siswa = PgSiswa::where('kode', $ujian->kode)
                ->where('siswa_id', session('siswa')->id)
                ->get();
            if ($pg_siswa->count() == 0) {
                $data_pg_siswa = [];
                foreach ($ujian->detailujian as $soal) {
                    array_push($data_pg_siswa, [
                        'detail_ujian_id' => $soal->id,
                        'kode' => $soal->kode,
                        'siswa_id' => session('siswa')->id
                    ]);
                }
        
                if ($ujian->acak == 1) {
                    $randomize = collect($data_pg_siswa)->shuffle();
                    $soal_pg_siswa = $randomize->toArray();
                } else {
                    $soal_pg_siswa = $data_pg_siswa;
                }
        
        
                $timestamp = strtotime(date('Y-m-d H:i:s', time()));
                $waktu_berakhir =  date('Y-m-d H:i:s', strtotime("+$ujian->jam hour +$ujian->menit minute", $timestamp));
        
        
                PgSiswa::insert($soal_pg_siswa);
            }
        
            $waktu_ujian = WaktuUjian::where('kode', $ujian->kode)
                ->where('siswa_id', session('siswa')->id)
                ->first();
                
            $pg_siswa = PgSiswa::where('kode', $ujian->kode)
                ->where('siswa_id', session('siswa')->id)
                ->get(); 
        }
        

        // Soal Essay 
        $chek_essay = is_null(Ujian::where('materi_id',$belajar->id)->where('jenis',1)->where('kunci_ujian',0)->first());

        if($chek_essay == false)
        {
            $ujian_essay = Ujian::where('materi_id',$belajar->id)->where('jenis',1)->first();
            $essay_siswa = EssaySiswa::where('kode', $ujian_essay->kode)
                ->where('siswa_id', session('siswa')->id)
                ->get();
    
            if ($essay_siswa->count() == 0) {
                $data_essay_siswa = [];
                foreach ($ujian_essay->detailessay as $soal) {
                    array_push($data_essay_siswa, [
                        'detail_ujian_id' => $soal->id,
                        'kode' => $soal->kode,
                        'siswa_id' => session('siswa')->id
                    ]);
                }
                $timestamp = strtotime(date('Y-m-d G:i', time()));
                $waktu_berakhir =  date('Y-m-d G:i', strtotime("+$ujian_essay->jam hour +$ujian_essay->menit minute", $timestamp));
    
                EssaySiswa::insert($data_essay_siswa);
            }
    
            $waktu_ujian_essay = WaktuUjian::where('kode', $ujian_essay->kode)
                ->where('siswa_id', session('siswa')->id)
                ->first();
            $essay_siswa = EssaySiswa::where('kode', $ujian_essay->kode)
                ->where('siswa_id', session('siswa')->id)
                ->get();
        }

       


        return view('siswa.belajar.show', [
            'title' => 'Lihat Materi Pembelajaran',
            'plugin' => '
                <link href="' . url("/assets/backend") . '/assets/css/components/custom-list-group.css" rel="stylesheet" type="text/css" />
                <link href="' . url("/assets/backend") . '/assets/css/components/custom-media_object.css" rel="stylesheet" type="text/css" />
                <link href="' . url("/assets") . '/ew/css/style.css" rel="stylesheet" type="text/css" />
                <script src="' . url("/assets") . '/ew/js/examwizard.js"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
            ',
            'menu' => [
                'menu' => 'belajar',
                'expanded' => 'belajar'
            ],
            'siswa' => Siswa::firstWhere('id', session('siswa')->id),
            'materi'  => $belajar,
            'files' => FileModel::where('kode', $belajar->kode)->get(),
            'notif_tugas' => $notif_tugas,
            'notif_materi' => Notifikasi::where('siswa_id', session('siswa')->id)->get(),
            'notif_ujian' => $notif_ujian,
            // soal pg
            'check_pg' =>  $check_pg ?? 'null',
            'notif_tugas' => $notif_tugas ?? 'null',
            'ujian' => $ujian ?? 'null',
            'pg_siswa' => $pg_siswa ?? 'null',
            'waktu_ujian' => $waktu_ujian ?? 'null',
            // soal essay
            'check_essay' =>$chek_essay ?? 'null',
            'ujian_essay' => $ujian_essay ?? 'null',
            'waktu_ujian_essay' =>$waktu_ujian_essay ?? "null",
            'essay_siswa' => $essay_siswa ?? 'null'
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function edit(Materi $materi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */

    public function simpan_pg(Request $request)
    {
        $id_detail_ujian = $request->idDetail;
        $id_pg = $request->id_pg;
        $jawaban = $request->jawaban;

        $detail_ujian = DetailUjian::firstWhere('id', $id_detail_ujian);

        if ($jawaban == $detail_ujian->jawaban) {
            $benar = 1;
        } else {
            $benar = 0;
        }

        $data = [
            'jawaban' => $jawaban,
            'benar' => $benar
        ];

        try {
            PgSiswa::where('id', $id_pg)
                ->update($data);
            echo 'jawaban dikirim';
        } catch (\Exception $exeption) {
            echo $exeption->getMessage();
        }
    }
    public function ragu_pg(Request $request)
    {
        PgSiswa::where('id', $request->id_pg)
            ->update(['ragu' => $request->ragu]);
        echo 'checked ragu';
    }
    public function simpan_essay(Request $request)
    {
        $id_detail_ujian = $request->idDetail;
        $id_essay = $request->id_essay;
        $jawaban = $request->jawaban;
        try {
            EssaySiswa::where('id', $id_essay)
                ->update(['jawaban' => $jawaban]);
            echo 'jawaban dikirim';
        } catch (\Exception $exeption) {
            echo $exeption->getMessage();
        }
    }
    public function ragu_essay(Request $request)
    {
        EssaySiswa::where('id', $request->id_essay)
            ->update(['ragu' => $request->ragu]);

        echo 'checked ragu';
    }

}