<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Materi;
use App\Mail\NotifMateri;
use App\Models\EmailSettings;
use App\Models\FileModel;
use App\Models\Gurukelas;
use App\Models\Gurumapel;
use App\Models\KmMateri;
use App\Models\Notifikasi;
use App\Models\Userchat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class MateriGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(KmMateri::all());
        return view('guru.materi.index', [
            'title' => 'Data Materi',
            'plugin' => '
                <link rel="stylesheet" type="text/css" href="' . url("/assets/backend") . '/plugins/table/datatable/datatables.css">
                <link rel="stylesheet" type="text/css" href="' . url("/assets/backend") . '/plugins/table/datatable/dt-global_style.css">
                <script src="' . url("/assets/backend") . '/plugins/table/datatable/datatables.js"></script>
                <script src="https://cdn.datatables.net/fixedcolumns/4.1.0/js/dataTables.fixedColumns.min.js"></script>
            ',
            'menu' => [
                'menu' => 'materi',
                'expanded' => 'materi'
            ],
            'guru' => Guru::firstWhere('id', session('guru')->id),
            'materi' => KmMateri::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.materi.create', [
            'title' => 'Tambah Materi',
            'plugin' => '
                <link href="' . url("/assets/backend") . '/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
                <script src="' . url("/assets/backend") . '/plugins/file-upload/file-upload-with-preview.min.js"></script>
                <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
                <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
                <script src="' . url("/assets/backend") . '/plugins/resumable.js"></script>
            ',
            'menu' => [
                'menu' => 'materi',
                'expanded' => 'materi'
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
        $siswa = Siswa::where('kelas_id', $request->kelas)->get();
        if ($siswa->count() == 0) {
            return redirect('/guru/materi/create')->with('pesan', "
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

        $validateMateri = $request->validate([
            'nama_materi' => 'required',
            'teks' => 'required',
        ]);
        $validateMateri['kode'] = Str::random(20);
        $validateMateri['guru_id'] = session('guru')->id;
        $validateMateri['kelas_id'] = $request->kelas;
        $validateMateri['mapel_id'] = $request->mapel;
        $validateMateri['kunci_materi'] = 1;

        

        $email_siswa = '';
        $notifikasi = [];
        foreach ($siswa as $s) {
            $email_siswa .= $s->email . ',';

            array_push($notifikasi, [
                'nama' => $request->nama_materi,
                'siswa_id' => $s->id,
                'key' => 'materi',
                'kode' => $validateMateri['kode']
            ]);
        }

        $email_siswa = Str::replaceLast(',', '', $email_siswa);
        $email_siswa = explode(',', $email_siswa);
        if ($email_settings->notif_materi == 1) {
            $details = [
                'nama_guru' => session('guru')->nama_guru,
                'nama_materi' => $request->nama_materi
            ];
            Mail::to($email_siswa)->send(new NotifMateri($details));
        }

        if ($request->file('file_materi')) {
            $files = [];
            foreach ($request->file('file_materi') as $file) {
                array_push($files, [
                    'kode' => $validateMateri['kode'],
                    'nama' => Str::replace('assets/files/', '', $file->store('assets/files'))
                ]);
            }
            FileModel::insert($files);
        }

        Materi::create($validateMateri);
        Notifikasi::insert($notifikasi);

        return redirect('/guru/materi')->with('pesan', "
            <script>
                swal({
                    title: 'Success!',
                    text: 'materi sudah di posting!',
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
    public function show(Materi $materi)
    {
        return view('guru.materi.show', [
            'title' => 'Lihat Materi',
            'plugin' => '
                <link href="' . url("/assets/backend") . '/assets/css/components/custom-list-group.css" rel="stylesheet" type="text/css" />
                <link href="' . url("/assets/backend") . '/assets/css/components/custom-media_object.css" rel="stylesheet" type="text/css" />
            ',
            'menu' => [
                'menu' => 'materi',
                'expanded' => 'materi'
            ],
            'guru' => Guru::firstWhere('id', session('guru')->id),
            'materi'  => $materi,
            'files' => FileModel::where('kode', $materi->kode)->get()
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
        return view('guru.materi.edit', [
            'title' => 'Tambah Materi',
            'plugin' => '
                <link href="' . url("/assets/backend") . '/assets/css/components/custom-list-group.css" rel="stylesheet" type="text/css" />
                <link href="' . url("/assets/backend") . '/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
                <script src="' . url("/assets/backend") . '/plugins/file-upload/file-upload-with-preview.min.js"></script>
                <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
                <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
            ',
            'menu' => [
                'menu' => 'materi',
                'expanded' => 'materi'
            ],
            'guru' => Guru::firstWhere('id', $materi->guru_id),
            'materi'  => $materi,
            'files' => FileModel::where('kode', $materi->kode)->get(),
            'guru_kelas' => Gurukelas::where('guru_id', $materi->guru_id)->get(),
            'guru_mapel' => Gurumapel::where('guru_id', $materi->guru_id)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materi $materi)
    {
        $validateMateri = $request->validate([
            'nama_materi' => 'required',
            'teks' => 'required',
        ]);
        $validateMateri['kelas_id'] = $request->kelas;
        $validateMateri['mapel_id'] = $request->mapel;

        if ($request->file('file_materi')) {
            $files = [];
            foreach ($request->file('file_materi') as $file) {
                array_push($files, [
                    'kode' => $materi->kode,
                    'nama' => Str::replace('assets/files/', '', $file->store('assets/files'))
                ]);
            }
            FileModel::insert($files);
        }

        Materi::where('id', $materi->id)
            ->update($validateMateri);

        return redirect('/guru/materi')->with('pesan', "
            <script>
                swal({
                    title: 'Success!',
                    text: 'materi sudah di update!',
                    type: 'success',
                    padding: '2em'
                })
            </script>
        ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materi $materi)
    {
        $files = FileModel::where('kode', $materi->kode)->get();
        if ($files) {
            foreach ($files as $file) {
                Storage::delete('assets/files/' . $file->nama);
            }

            FileModel::where('kode', $materi->kode)
                ->delete();
        }

        Notifikasi::where('kode', $materi->kode)
            ->delete();

        Userchat::where('key', $materi->kode)
            ->delete();

        Materi::destroy($materi->id);
        return redirect('/guru/materi')->with('pesan', "
            <script>
                swal({
                    title: 'Success!',
                    text: 'materi di hapus!',
                    type: 'success',
                    padding: '2em'
                })
            </script>
        ");
    }

    public function kunci_materi($kode)
    {
        $data = [
            'kunci_materi' => 0
        ];

        $hapus_waktu_pg_siswa = KmMateri::where('kode',$kode)->where('guru_id', session('guru')->id)->update($data);

        return redirect('/guru/materi')->with('pesan', "
            <script>
                swal({
                    title: 'Success!',
                    text: 'materi di buka!',
                    type: 'success',
                    padding: '2em'
                })
            </script>
        ");
    }

    public function buka_materi($kode)
    {
        $data = [
            'kunci_materi' => 1
        ];

        $hapus_waktu_pg_siswa = KmMateri::where('kode',$kode)->where('guru_id', session('guru')->id)->update($data);

        return redirect('/guru/materi')->with('pesan', "
            <script>
                swal({
                    title: 'Success!',
                    text: 'materi di kunci!',
                    type: 'success',
                    padding: '2em'
                })
            </script>
        ");
    }
}
