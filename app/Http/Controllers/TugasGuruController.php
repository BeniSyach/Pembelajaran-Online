<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Tugas;
use App\Mail\NotifTugas;
use App\Models\Userchat;
use App\Models\FileModel;
use App\Models\Gurukelas;
use App\Models\Gurumapel;
use App\Models\TugasSiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmailSettings;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class TugasGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guru.tugas.index', [
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
            'guru' => Guru::firstWhere('id', session('guru')->id),
            'tugas' => Tugas::where('guru_id', session('guru')->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.tugas.create', [
            'title' => 'Tambah Tugas',
            'plugin' => '
                <link href="' . url("/assets/backend") . '/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
                <script src="' . url("/assets/backend") . '/plugins/file-upload/file-upload-with-preview.min.js"></script>
                <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
                <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
            ',
            'menu' => [
                'menu' => 'tugas',
                'expanded' => 'tugas'
            ],
            'guru' => Guru::firstWhere('id', session('guru')->id),
            'guru_kelas' => Gurukelas::where('guru_id', session('guru')->id)->get(),
            'guru_mapel' => Gurumapel::where('guru_id', session('guru')->id)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email_settings = EmailSettings::first();

        // CEK APAKAH SUDAH ADA SISWA DI KELAS YG MAU DI ISI TUGAS
        $siswa = Siswa::where('kelas_id', $request->kelas)->get();
        if ($siswa->count() == 0) {
            return redirect('/guru/tugas/create')->with('pesan', "
                <script>
                    swal({
                        title: 'Error!',
                        text: 'belum ada siswa di kelas tersebut!',
                        type: 'error',
                        padding: '2em'
                    })
                </script>
            ")->withInput();
        }

        $validateTugas = $request->validate([
            'nama_tugas' => 'required',
            'teks' => 'required',
        ]);
        $validateTugas['kode'] = Str::random(20);
        $validateTugas['guru_id'] = session('guru')->id;
        $validateTugas['kelas_id'] = $request->kelas;
        $validateTugas['mapel_id'] = $request->mapel;
        $validateTugas['due_date'] = $request->tgl . ' ' . $request->jam;

        $email_siswa = '';
        $tugas_siswa = [];
        foreach ($siswa as $s) {
            $email_siswa .= $s->email . ',';

            array_push($tugas_siswa, [
                'kode' => $validateTugas['kode'],
                'siswa_id' => $s->id
            ]);
        }

        $email_siswa = Str::replaceLast(',', '', $email_siswa);
        $email_siswa = explode(',', $email_siswa);

        if ($email_settings->notif_tugas == 1) {
            $details = [
                'nama_guru' => session('guru')->nama_guru,
                'nama_tugas' => $request->nama_tugas,
                'due_date' => $validateTugas['due_date']
            ];
            Mail::to($email_siswa)->send(new NotifTugas($details));
        }

        if ($request->file('file_tugas')) {
            $files = [];
            foreach ($request->file('file_tugas') as $file) {
                array_push($files, [
                    'kode' => $validateTugas['kode'],
                    'nama' => Str::replace('assets/files/', '', $file->store('assets/files'))
                ]);
            }
            FileModel::insert($files);
        }

        Tugas::create($validateTugas);
        TugasSiswa::insert($tugas_siswa);

        return redirect('/guru/tugas')->with('pesan', "
            <script>
                swal({
                    title: 'Success!',
                    text: 'tugas sudah di posting!',
                    type: 'success',
                    padding: '2em'
                })
            </script>
        ");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function show(Tugas $tuga)
    {
        $tugas_siswa = TugasSiswa::where('kode', $tuga->kode)->get();
        return view('guru.tugas.show', [
            'title' => 'Lihat Tugas',
            'plugin' => '
                <link href="' . url("/assets/backend") . '/assets/css/components/custom-list-group.css" rel="stylesheet" type="text/css" />
                <link href="' . url("/assets/backend") . '/assets/css/components/custom-media_object.css" rel="stylesheet" type="text/css" />
            ',
            'menu' => [
                'menu' => 'tugas',
                'expanded' => 'tugas'
            ],
            'guru' => Guru::firstWhere('id', session('guru')->id),
            'tugas'  => $tuga,
            'tugas_siswa' => $tugas_siswa,
            'files' => FileModel::where('kode', $tuga->kode)->get()
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
        return view('guru.tugas.edit', [
            'title' => 'Edit Tugas',
            'plugin' => '
                <link href="' . url("/assets/backend") . '/assets/css/components/custom-list-group.css" rel="stylesheet" type="text/css" />
                <link href="' . url("/assets/backend") . '/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
                <script src="' . url("/assets/backend") . '/plugins/file-upload/file-upload-with-preview.min.js"></script>
                <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
                <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
            ',
            'menu' => [
                'menu' => 'tugas',
                'expanded' => 'tugas'
            ],
            'guru' => Guru::firstWhere('id', session('guru')->id),
            'tugas'  => $tuga,
            'files' => FileModel::where('kode', $tuga->kode)->get(),
            'guru_kelas' => Gurukelas::where('guru_id', session('guru')->id)->get(),
            'guru_mapel' => Gurumapel::where('guru_id', session('guru')->id)->get(),
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
        $validateTugas = $request->validate([
            'nama_tugas' => 'required',
            'teks' => 'required',
        ]);
        $validateTugas['kelas_id'] = $request->kelas;
        $validateTugas['mapel_id'] = $request->mapel;
        $validateTugas['due_date'] = $request->tgl . ' ' . $request->jam;

        if ($request->file('file_tugas')) {
            $files = [];
            foreach ($request->file('file_tugas') as $file) {
                array_push($files, [
                    'kode' => $tuga->kode,
                    'nama' => Str::replace('assets/files/', '', $file->store('assets/files'))
                ]);
            }
            FileModel::insert($files);
        }

        Tugas::where('id', $tuga->id)
            ->update($validateTugas);


        return redirect('/guru/tugas')->with('pesan', "
            <script>
                swal({
                    title: 'Success!',
                    text: 'tugas sudah di edit!',
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
    public function destroy(Tugas $tuga)
    {
        $files = FileModel::where('kode', $tuga->kode)->get();
        if ($files) {
            foreach ($files as $file) {
                Storage::delete('assets/files/' . $file->nama);
            }

            FileModel::where('kode', $tuga->kode)
                ->delete();
        }
        TugasSiswa::where('kode', $tuga->kode)
            ->delete();

        Userchat::where('key', $tuga->kode)
            ->delete();

        Tugas::destroy($tuga->id);
        return redirect('/guru/tugas')->with('pesan', "
            <script>
                swal({
                    title: 'Success!',
                    text: 'tugas di hapus!',
                    type: 'success',
                    padding: '2em'
                })
            </script>
        ");
    }

    public function tugas_siswa($id)
    {
        $tugas_siswa = TugasSiswa::firstWhere('id', $id);

        return view('guru.tugas.tugas-siswa', [
            'title' => 'Lihat Tugas',
            'plugin' => '
                <link href="' . url("/assets/backend") . '/assets/css/components/custom-list-group.css" rel="stylesheet" type="text/css" />
                <link href="' . url("/assets/backend") . '/assets/css/components/custom-media_object.css" rel="stylesheet" type="text/css" />
            ',
            'menu' => [
                'menu' => 'tugas',
                'expanded' => 'tugas'
            ],
            'guru' => $tugas_siswa->tugas->guru,
            'tugas_siswa' => $tugas_siswa,
            'file_siswa' => FileModel::where('kode', $tugas_siswa->file)->get()
        ]);
    }
    public function nilai_tugas(Request $request, $id, $kode)
    {

        $data = [
            'nilai' => $request->nilai,
            'catatan_guru' => $request->catatan_guru
        ];

        TugasSiswa::where('id', $id)
            ->update($data);

        return redirect('/guru/tugas/' . $kode)->with('pesan', "
            <script>
                swal({
                    title: 'Success!',
                    text: 'tugas di nilai!',
                    type: 'success',
                    padding: '2em'
                })
            </script>
        ");
    }
}
