<?php

namespace App\Http\Controllers;

use App\Exports\EssayExport;
use App\Exports\PgExport;
use App\Models\Guru;
use App\Models\Ujian;
use App\Models\Gurukelas;
use App\Models\Gurumapel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Imports\PgImport;
use App\Mail\NotifUjian;
use App\Models\DetailEssay;
use App\Models\DetailUjian;
use App\Models\EmailSettings;
use App\Models\EssaySiswa;
use App\Models\KmMateri;
use App\Models\PgSiswa;
use App\Models\Siswa;
use App\Models\WaktuUjian;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class UjianGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guru.ujian.index', [
            'title' => 'Data Ujian',
            'plugin' => '
                <link rel="stylesheet" type="text/css" href="' . url("/assets/backend") . '/plugins/table/datatable/datatables.css">
                <link rel="stylesheet" type="text/css" href="' . url("/assets/backend") . '/plugins/table/datatable/dt-global_style.css">
                <script src="' . url("/assets/backend") . '/plugins/table/datatable/datatables.js"></script>
                <script src="https://cdn.datatables.net/fixedcolumns/4.1.0/js/dataTables.fixedColumns.min.js"></script>
            ',
            'menu' => [
                'menu' => 'ujian',
                'expanded' => 'ujian'
            ],
            'guru' => Guru::firstWhere('id', session('guru')->id),
            'ujian' => Ujian::where('guru_id', session('guru')->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.ujian.create', [
            'title' => 'Tambah Tugas Pilihan Ganda',
            'plugin' => '
                <link href="' . url("/assets/backend") . '/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
                <script src="' . url("/assets/backend") . '/plugins/file-upload/file-upload-with-preview.min.js"></script>
                <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
                <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
            ',
            'menu' => [
                'menu' => 'ujian',
                'expanded' => 'ujian'
            ],
            'guru' => Guru::firstWhere('id', session('guru')->id),
            'guru_kelas' => Gurukelas::where('guru_id', session('guru')->id)->get(),
            'guru_mapel' => Gurumapel::where('guru_id', session('guru')->id)->get(),
            'guru_materi' => KmMateri::where('guru_id', session('guru')->id)->get(),
        ]);
    }
    public function create_essay()
    {
        return view('guru.ujian.create-essay', [
            'title' => 'Tambah Tugas Essay',
            'plugin' => '
                <link href="' . url("/assets/backend") . '/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
                <script src="' . url("/assets/backend") . '/plugins/file-upload/file-upload-with-preview.min.js"></script>
                <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
                <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
            ',
            'menu' => [
                'menu' => 'ujian',
                'expanded' => 'ujian'
            ],
            'guru' => Guru::firstWhere('id', session('guru')->id),
            'guru_kelas' => Gurukelas::where('guru_id', session('guru')->id)->get(),
            'guru_mapel' => Gurumapel::where('guru_id', session('guru')->id)->get(),
            'guru_materi' => KmMateri::where('guru_id', session('guru')->id)->get(),
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

        $pg_tugas = Ujian::where('materi_id',$request->materi)->where('jenis',0)->get();

        if($pg_tugas->count() == 1)
        {
            return redirect('/guru/ujian/create')->with('pesan', "
                <script>
                    swal({
                        title: 'Error!',
                        text: 'Soal dan Materi Sudah Ada',
                        type: 'error',
                        padding: '2em'
                    })
                </script>
            ")->withInput();
        }

        $siswa = Siswa::where('kelas_id', $request->kelas)->get();
        if ($siswa->count() == 0) {
            return redirect('/guru/ujian/create')->with('pesan', "
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

        $kode = Str::random(30);
        $ujian = [
            'kode' => $kode,
            'nama' => $request->nama,
            'jenis' => 0,
            'guru_id' => session('guru')->id,
            'kelas_id' => $request->kelas,
            'mapel_id' => $request->mapel,
            'materi_id' => $request->materi,
            'jam' => $request->jam,
            'menit' => $request->menit,
            'acak' => $request->acak ,
        ];

        $detail_ujian = [];
        $index = 0;
        $nama_soal =  $request->soal;
        foreach ($nama_soal as $soal) {
            array_push($detail_ujian, [
                'kode' => $kode,
                'soal' => $soal,
                'pg_1' => 'A. ' . $request->pg_1[$index],
                'pg_2' => 'B. ' . $request->pg_2[$index],
                'pg_3' => 'C. ' . $request->pg_3[$index],
                'pg_4' => 'D. ' . $request->pg_4[$index],
                // 'pg_5' => 'E. ' . $request->pg_5[$index],
                'jawaban' => $request->jawaban[$index]
            ]);

            $index++;
        }

        $email_siswa = '';
        $waktu_ujian = [];
        foreach ($siswa as $s) {
            $email_siswa .= $s->email . ',';

            array_push($waktu_ujian, [
                'kode' => $kode,
                'siswa_id' => $s->id
            ]);
        }

        $email_siswa = Str::replaceLast(',', '', $email_siswa);
        $email_siswa = explode(',', $email_siswa);
        $details = [
            'nama_guru' => session('guru')->nama_guru,
            'nama_ujian' => $request->nama,
            'jam' => $request->jam,
            'menit' => $request->menit,
        ];
        // Mail::to($email_siswa)->send(new NotifUjian($details));

        Ujian::insert($ujian);
        DetailUjian::insert($detail_ujian);
        WaktuUjian::insert($waktu_ujian);

        return redirect('/guru/ujian')->with('pesan', "
            <script>
                swal({
                    title: 'Success!',
                    text: 'Tugas sudah di posting!',
                    type: 'success',
                    padding: '2em'
                })
            </script>
        ");
    }
    public function pg_excel(Request $request)
    {
        $pg_tugas = Ujian::where('materi_id',$request->e_materi)->where('jenis',0)->get();

        if($pg_tugas->count() == 1)
        {
            return redirect('/guru/ujian/create')->with('pesan', "
                <script>
                    swal({
                        title: 'Error!',
                        text: 'Soal dan Materi Sudah Ada',
                        type: 'error',
                        padding: '2em'
                    })
                </script>
            ")->withInput();
        }

        $siswa = Siswa::where('kelas_id', $request->e_kelas)->get();
        if ($siswa->count() == 0) {
            return redirect('/guru/ujian/create')->with('pesan', "
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

        $kode = Str::random(30);
        $ujian = [
            'kode' => $kode,
            'nama' => $request->e_nama_ujian,
            'jenis' => 0,
            'guru_id' => session('guru')->id,
            'kelas_id' => $request->e_kelas,
            'mapel_id' => $request->e_mapel,
            'materi_id' => $request->e_materi,
            'jam' => $request->e_jam,
            'menit' => $request->e_menit,
            'acak' => $request->e_acak,
        ];

        $email_siswa = '';
        $waktu_ujian = [];
        foreach ($siswa as $s) {
            $email_siswa .= $s->email . ',';

            array_push($waktu_ujian, [
                'kode' => $kode,
                'siswa_id' => $s->id
            ]);
        }

        $email_siswa = Str::replaceLast(',', '', $email_siswa);
        $email_siswa = explode(',', $email_siswa);

        $email_settings = EmailSettings::first();
        if ($email_settings->notif_ujian == 1) {
            $details = [
                'nama_guru' => session('guru')->nama_guru,
                'nama_ujian' => $request->e_nama_ujian,
                'jam' => $request->e_jam,
                'menit' => $request->e_menit,
            ];
            Mail::to($email_siswa)->send(new NotifUjian($details));
        }

        Ujian::insert($ujian);
        Excel::import(new PgImport($kode), $request->excel);
        WaktuUjian::insert($waktu_ujian);

        return redirect('/guru/ujian')->with('pesan', "
            <script>
                swal({
                    title: 'Success!',
                    text: 'Tugas sudah di posting!',
                    type: 'success',
                    padding: '2em'
                })
            </script>
        ");
    }

    public function store_essay(Request $request)
    {
        $pg_tugas = Ujian::where('materi_id',$request->materi)->where('jenis',1)->get();

        if($pg_tugas->count() == 1)
        {
            return redirect('/guru/ujian/create')->with('pesan', "
                <script>
                    swal({
                        title: 'Error!',
                        text: 'Soal dan Materi Sudah Ada',
                        type: 'error',
                        padding: '2em'
                    })
                </script>
            ")->withInput();
        }

        $siswa = Siswa::where('kelas_id', $request->kelas)->get();
        if ($siswa->count() == 0) {
            return redirect('/guru/ujian_essay')->with('pesan', "
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

        $kode = Str::random(30);
        $ujian = [
            'kode' => $kode,
            'nama' => $request->nama,
            'jenis' => 1,
            'guru_id' => session('guru')->id,
            'kelas_id' => $request->kelas,
            'mapel_id' => $request->mapel,
            'materi_id' => $request->materi,
            'jam' => $request->jam,
            'menit' => $request->menit,
        ];

        $detail_ujian = [];
        $index = 0;
        $nama_soal =  $request->soal;
        foreach ($nama_soal as $soal) {
            array_push($detail_ujian, [
                'kode' => $kode,
                'soal' => $soal
            ]);

            $index++;
        }

        $email_siswa = '';
        $waktu_ujian = [];
        foreach ($siswa as $s) {
            $email_siswa .= $s->email . ',';

            array_push($waktu_ujian, [
                'kode' => $kode,
                'siswa_id' => $s->id
            ]);
        }

        $email_siswa = Str::replaceLast(',', '', $email_siswa);
        $email_siswa = explode(',', $email_siswa);

        $email_settings = EmailSettings::first();
        if ($email_settings->notif_ujian == 1) {
            $details = [
                'nama_guru' => session('guru')->nama_guru,
                'nama_ujian' => $request->nama,
                'jam' => $request->jam,
                'menit' => $request->menit,
            ];
            Mail::to($email_siswa)->send(new NotifUjian($details));
        }

        Ujian::insert($ujian);
        DetailEssay::insert($detail_ujian);
        WaktuUjian::insert($waktu_ujian);

        return redirect('/guru/ujian')->with('pesan', "
            <script>
                swal({
                    title: 'Success!',
                    text: 'Tugas sudah di posting!',
                    type: 'success',
                    padding: '2em'
                })
            </script>
        ");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function show(Ujian $ujian)
    {
        return view('guru.ujian.show', [
            'title' => 'Detail Tugas Pilihan Ganda',
            'plugin' => '
                <link href="' . url("/assets") . '/ew/css/style.css" rel="stylesheet" type="text/css" />
                <script src="' . url("/assets") . '/ew/js/examwizard.js"></script>
            ',
            'menu' => [
                'menu' => 'ujian',
                'expanded' => 'ujian'
            ],
            'guru' => Guru::firstWhere('id', session('guru')->id),
            'ujian' => $ujian,
        ]);
    }
    public function pg_siswa($kode, $siswa_id)
    {
        $ujian_siswa = PgSiswa::where('kode', $kode)
            ->where('siswa_id', $siswa_id)
            ->get();
        return view('guru.ujian.show-siswa', [
            'title' => 'Detail Tugas Siswa',
            'plugin' => '
                <link href="' . url("/assets") . '/ew/css/style.css" rel="stylesheet" type="text/css" />
                <script src="' . url("/assets") . '/ew/js/examwizard.js"></script>
            ',
            'menu' => [
                'menu' => 'ujian',
                'expanded' => 'ujian'
            ],
            'guru' => Guru::firstWhere('id', session('guru')->id),
            'ujian_siswa' => $ujian_siswa,
            'ujian' => Ujian::firstWhere('kode', $kode),
            'siswa' => Siswa::firstWhere('id', $siswa_id)
        ]);
    }

    public function ulangi_pg_siswa($kode,$siswa_id)
    {
        return redirect('/guru/ujian')->with('pesan', "
            <script>
                swal({
                    title: 'Success!',
                    text: 'Data jawaban Siswa Di Hapus',
                    type: 'success',
                    padding: '2em'
                })
            </script>
        ");
    }

    public function show_essay(Ujian $ujian)
    {
        return view('guru.ujian.show-essay', [
            'title' => 'Detail Tugas Essay',
            'plugin' => '
                <link href="' . url("/assets") . '/ew/css/style.css" rel="stylesheet" type="text/css" />
                <script src="' . url("/assets") . '/ew/js/examwizard.js"></script>
            ',
            'menu' => [
                'menu' => 'ujian',
                'expanded' => 'ujian'
            ],
            'guru' => Guru::firstWhere('id', session('guru')->id),
            'ujian' => $ujian,
        ]);
    }
    public function essay_siswa($kode, $siswa_id)
    {
        $ujian_siswa = EssaySiswa::where('kode', $kode)
            ->where('siswa_id', $siswa_id)
            ->get();
        return view('guru.ujian.show-essay-siswa', [
            'title' => 'Detail Tugas Essay Siswa',
            'plugin' => '
                <link href="' . url("/assets") . '/ew/css/style.css" rel="stylesheet" type="text/css" />
                <script src="' . url("/assets") . '/ew/js/examwizard.js"></script>
            ',
            'menu' => [
                'menu' => 'ujian',
                'expanded' => 'ujian'
            ],
            'guru' => Guru::firstWhere('id', session('guru')->id),
            'ujian_siswa' => $ujian_siswa,
            'ujian' => Ujian::firstWhere('kode', $kode),
            'siswa' => Siswa::firstWhere('id', $siswa_id)
        ]);
    }
    public function nilai_essay(Request $request)
    {
        EssaySiswa::where('id', $request->id)
            ->update(['nilai' => $request->nilai]);

        return 'berhasil dinilai';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function edit(Ujian $ujian)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ujian $ujian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ujian $ujian)
    {

        WaktuUjian::where('kode', $ujian->kode)
            ->delete();

        if ($ujian->jenis == 0) {
            DetailUjian::where('kode', $ujian->kode)
                ->delete();

            PgSiswa::where('kode', $ujian->kode)
                ->delete();
        } else {
            DetailEssay::where('kode', $ujian->kode)
                ->delete();

            EssaySiswa::where('kode', $ujian->kode)
                ->delete();
        }

        Ujian::destroy($ujian->id);

        return redirect('/guru/ujian')->with('pesan', "
            <script>
                swal({
                    title: 'Success!',
                    text: 'Tugas di hapus!',
                    type: 'success',
                    padding: '2em'
                })
            </script>
        ");
    }


    public function ujian_cetak($kode)
    {
        return view('guru.ujian.cetak-pg', [
            'ujian' => Ujian::firstWhere('kode', $kode)
        ]);
    }
    public function ujian_ekspor($kode)
    {
        $ujian =  Ujian::firstWhere('kode', $kode);
        $nama_kelas = $ujian->kelas->nama_kelas;
        return Excel::download(new PgExport($ujian), "nilai-pg-kelas-$nama_kelas.xlsx");
    }

    public function essay_cetak($kode)
    {
        return view('guru.ujian.cetak-essay', [
            'ujian' => Ujian::firstWhere('kode', $kode)
        ]);
    }
    public function essay_ekspor($kode)
    {
        $ujian =  Ujian::firstWhere('kode', $kode);
        $nama_kelas = $ujian->kelas->nama_kelas;
        return Excel::download(new EssayExport($ujian), "nilai-essay-kelas-$nama_kelas.xlsx");
    }
}
