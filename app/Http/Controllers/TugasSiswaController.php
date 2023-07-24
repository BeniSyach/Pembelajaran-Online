<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Tugas;
use App\Models\FileModel;
use App\Models\Notifikasi;
use App\Models\TugasSiswa;
use App\Models\WaktuUjian;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TugasSiswaController extends Controller
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

        return view('siswa.tugas.index', [
            'title' => 'Data Tugas',
            'plugin' => '
                <link rel="stylesheet" type="text/css" href="' . url("/assets/backend") . '/plugins/table/datatable/datatables.css">
                <link rel="stylesheet" type="text/css" href="' . url("/assets/backend") . '/plugins/table/datatable/dt-global_style.css">
                <script src="' . url("/assets/backend") . '/plugins/table/datatable/datatables.js"></script>
                <script src="https://cdn.datatables.net/fixedcolumns/4.1.0/js/dataTables.fixedColumns.min.js"></script>
            ',
            'menu' => [
                'menu' => 'tugas',
                'expanded' => 'tugas'
            ],
            'siswa' => Siswa::firstWhere('id', session('siswa')->id),
            'tugas' => Tugas::where('kelas_id', session('siswa')->kelas_id)->get(),
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function show(Tugas $tuga)
    {
        $notif_tugas = TugasSiswa::where('siswa_id', session('siswa')->id)
            ->where('date_send', null)
            ->get();

        $tugas_siswa = TugasSiswa::where('kode', $tuga->kode)
            ->where('siswa_id', session('siswa')->id)
            ->first();

        $notif_ujian = WaktuUjian::where('siswa_id', session('siswa')->id)
            ->where('selesai', null)
            ->get();

        return view('siswa.tugas.show', [
            'title' => 'Lihat Tugas',
            'plugin' => '
                <link href="' . url("/assets/backend") . '/assets/css/components/custom-list-group.css" rel="stylesheet" type="text/css" />
                <link href="' . url("/assets/backend") . '/assets/css/components/custom-media_object.css" rel="stylesheet" type="text/css" />
                <link href="' . url("/assets/backend") . '/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
                <script src="' . url("/assets/backend") . '/plugins/file-upload/file-upload-with-preview.min.js"></script>
            ',
            'menu' => [
                'menu' => 'tugas',
                'expanded' => 'tugas'
            ],
            'siswa' => Siswa::firstWhere('id', session('siswa')->id),
            'tugas' => $tuga,
            'tugas_siswa' => $tugas_siswa,
            'files' => FileModel::where('kode', $tuga->kode)->get(),
            'file_siswa' => FileModel::where('kode', $tugas_siswa->file)->get(),
            'notif_tugas' => $notif_tugas,
            'notif_materi' => Notifikasi::where('siswa_id', session('siswa')->id)->get(),
            'notif_ujian' => $notif_ujian
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function edit(Tugas $tuga)
    {
        $notif_tugas = TugasSiswa::where('siswa_id', session('siswa')->id)
            ->where('date_send', null)
            ->get();

        $tugas_siswa = TugasSiswa::where('kode', $tuga->kode)
            ->where('siswa_id', session('siswa')->id)
            ->first();

        $notif_ujian = WaktuUjian::where('siswa_id', session('siswa')->id)
            ->where('selesai', null)
            ->get();

        return view('siswa.tugas.edit', [
            'title' => 'Kerjakan Tugas',
            'plugin' => '
                <link href="' . url("/assets/backend") . '/assets/css/components/custom-list-group.css" rel="stylesheet" type="text/css" />
                <link href="' . url("/assets/backend") . '/assets/css/components/custom-media_object.css" rel="stylesheet" type="text/css" />
                <link href="' . url("/assets/backend") . '/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
                <script src="' . url("/assets/backend") . '/plugins/file-upload/file-upload-with-preview.min.js"></script>
            ',
            'menu' => [
                'menu' => 'tugas',
                'expanded' => 'tugas'
            ],
            'siswa' => Siswa::firstWhere('id', session('siswa')->id),
            'tugas_siswa' => $tugas_siswa,
            'file_siswa' => FileModel::where('kode', $tugas_siswa->file)->get(),
            'notif_tugas' => $notif_tugas,
            'notif_materi' => Notifikasi::where('siswa_id', session('siswa')->id)->get(),
            'notif_ujian' => $notif_ujian
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tugas $tuga)
    {
        $tugas_siswa = TugasSiswa::where('kode', $tuga->kode)
            ->where('siswa_id', session('siswa')->id)
            ->first();
        if ($tugas_siswa->file == null) {
            $kode_file = Str::random(20);
        } else {
            $kode_file = $tugas_siswa->file;
        }

        if ($tugas_siswa->date_send == null) {
            $time = Carbon::now();
            $date_send = $time->toDateTimeString();
        } else {
            $date_send = $tugas_siswa->date_send;
        }

        if ($tugas_siswa->is_telat == null) {

            if (strtotime($date_send) > strtotime($tuga->due_date)) {
                $is_telat = 1;
            } else {
                $is_telat = 0;
            }
        } else {
            $is_telat = $tugas_siswa->is_telat;
        }

        $tugas = [
            'teks' => $request->teks,
            'file' => $kode_file,
            'date_send' => $date_send,
            'is_telat' => $is_telat,
        ];

        if ($request->file('files')) {
            $files = [];
            foreach ($request->file('files') as $file) {
                array_push($files, [
                    'kode' => $tugas['file'],
                    'nama' => Str::replace('assets/files/', '', $file->store('assets/files'))
                ]);
            }
            FileModel::insert($files);
        }
        TugasSiswa::where('id', $tugas_siswa->id)
            ->update($tugas);


        return redirect('/siswa/tugas/' . $tuga->kode)->with('pesan', "
            <script>
                swal({
                    title: 'Success!',
                    text: 'tugas sudah dikerjakan!',
                    type: 'success',
                    padding: '2em'
                })
            </script>
        ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tugas $tugas)
    {
        //
    }

    public function kerjakan(TugasSiswa $tugas_siswa)
    {
        $notif_tugas = TugasSiswa::where('siswa_id', session('siswa')->id)
            ->where('date_send', null)
            ->get();

        $notif_ujian = WaktuUjian::where('siswa_id', session('siswa')->id)
            ->where('selesai', null)
            ->get();

        return view('siswa.tugas.kerjakan', [
            'title' => 'Kerjakan Tugas',
            'plugin' => '
                <link href="' . url("/assets/backend") . '/assets/css/components/custom-list-group.css" rel="stylesheet" type="text/css" />
                <link href="' . url("/assets/backend") . '/assets/css/components/custom-media_object.css" rel="stylesheet" type="text/css" />
                <link href="' . url("/assets/backend") . '/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
                <script src="' . url("/assets/backend") . '/plugins/file-upload/file-upload-with-preview.min.js"></script>
            ',
            'menu' => [
                'menu' => 'tugas',
                'expanded' => 'tugas'
            ],
            'siswa' => Siswa::firstWhere('id', session('siswa')->id),
            'tugas_siswa' => $tugas_siswa,
            'notif_tugas' => $notif_tugas,
            'notif_materi' => Notifikasi::where('siswa_id', session('siswa')->id)->get(),
            'notif_ujian' => $notif_ujian
        ]);
    }
}
