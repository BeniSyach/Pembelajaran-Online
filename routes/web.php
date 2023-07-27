<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelompokBelajarController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BelajarSiswaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TugasGuruController;
use App\Http\Controllers\TugasAdminController;
use App\Http\Controllers\UjianGuruController;
use App\Http\Controllers\MateriGuruController;
use App\Http\Controllers\MateriAdminController;
use App\Http\Controllers\SummernoteController;
use App\Http\Controllers\TugasSiswaController;
use App\Http\Controllers\MateriSiswaController;
use App\Http\Controllers\UjianSiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route Auth
// ==>View
Route::get('/', [HomeController::class, 'index']);
Route::get('/kontak',[KontakController::class, 'index']);

Route::get('/login', [AuthController::class, 'index']);
Route::get('/install', [AuthController::class, 'install']);
Route::get('/register', [AuthController::class, 'register']);
Route::get('/recovery', [AuthController::class, 'recovery']);
Route::get('/change_password/{token:token}', [AuthController::class, 'change_password']);
Route::get('/logout', [AuthController::class, 'logout']);
// ==>Function
Route::post('/login', [AuthController::class, 'login']);
Route::post('/install', [AuthController::class, 'install_']);
Route::post('/register', [AuthController::class, 'register_']);
Route::post('/recovery', [AuthController::class, 'recovery_']);
Route::get('/aktivasi/{token:token}', [AuthController::class, 'aktivasi']);
Route::post('/change_password/{token:token}', [AuthController::class, 'change_password_']);


// START::ROUTE ADMIN
Route::get('/admin', [AdminController::class, 'index'])->middleware('is_admin');
Route::get('/admin/profile', [AdminController::class, 'profile'])->middleware('is_admin');
Route::post('/admin/edit_profile/{admin:id}', [AdminController::class, 'edit_profile'])->middleware('is_admin');
Route::post('/admin/edit_password/{admin:id}', [AdminController::class, 'edit_password'])->middleware('is_admin');
Route::post('/admin/smtp_email/{id}', [AdminController::class, 'smtp_email'])->middleware('is_admin');
// =============SISWA
// ==>View
Route::get('/admin/siswa', [AdminController::class, 'siswa'])->middleware('is_admin');
Route::get('/admin/edit_siswa', [AdminController::class, 'edit_siswa'])->name('ajaxsiswa')->middleware('is_admin');
Route::get('/admin/impor_siswa', [AdminController::class, 'impor_siswa'])->middleware('is_admin');
Route::get('/admin/ekspor_siswa', [AdminController::class, 'ekspor_siswa'])->middleware('is_admin');

// ==>Function
Route::post('/admin/tambah_siswa', [AdminController::class, 'tambah_siswa_'])->middleware('is_admin');
Route::post('/admin/edit_siswa', [AdminController::class, 'edit_siswa_'])->middleware('is_admin');
Route::post('/admin/impor_siswa', [AdminController::class, 'impor_siswa_'])->middleware('is_admin');
Route::get('/admin/hapus_siswa/{siswa:nis}', [AdminController::class, 'hapus_siswa'])->middleware('is_admin');

// ============GURU
// ==>View
Route::get('/admin/guru', [AdminController::class, 'guru'])->middleware('is_admin');
Route::get('/admin/edit_guru', [AdminController::class, 'edit_guru'])->name('ajaxguru')->middleware('is_admin');
Route::get('/admin/impor_guru', [AdminController::class, 'impor_guru'])->middleware('is_admin');
Route::get('/admin/ekspor_guru', [AdminController::class, 'ekspor_guru'])->middleware('is_admin');

// ==>Function
Route::post('/admin/tambah_guru', [AdminController::class, 'tambah_guru_'])->middleware('is_admin');
Route::post('/admin/edit_guru', [AdminController::class, 'edit_guru_'])->middleware('is_admin');
Route::post('/admin/impor_guru', [AdminController::class, 'impor_guru_'])->middleware('is_admin');
Route::get('/admin/hapus_guru/{guru:id}', [AdminController::class, 'hapus_guru'])->middleware('is_admin');

// ============KELAS
// ==>View
Route::get('/admin/kelas', [AdminController::class, 'kelas'])->middleware('is_admin');
// ==>Function
Route::post('/admin/tambah_kelas', [AdminController::class, 'tambah_kelas'])->middleware('is_admin');
Route::post('/admin/edit_kelas', [AdminController::class, 'edit_kelas'])->middleware('is_admin');
Route::get('/admin/hapus_kelas/{kelas:id}', [AdminController::class, 'hapus_kelas'])->middleware('is_admin');


// ============KELOMPOK BELAJAR
// ==>View
Route::get('/admin/kelompok_belajar', [AdminController::class, 'kelompok_belajar'])->middleware('is_admin');
Route::get('/admin/kelompok_belajar/{id}', [AdminController::class, 'showKelompok'])->middleware('is_admin');


// ==>Function
Route::post('/admin/tambahkelompok', [AdminController::class, 'tambahkelompok'])->middleware('is_admin');
//Route::post('/admin/edit_kelompok', [AdminController::class, 'edit_kelompok'])->middleware('is_admin');
Route::get('/admin/hapus_kelompok/{kelompok_belajar:id}', [AdminController::class, 'hapus_kelompok'])->middleware('is_admin');
Route::get('/admin/getSiswaByKelas/{id_kelas}', [AdminController::class, 'getSiswaByKelas']);

Route::get('/admin/sesi_belajar', [AdminController::class, 'sesi_belajar'])->middleware('is_admin');
Route::post('/admin/tambah_sesi', [AdminController::class, 'tambah_sesi'])->middleware('is_admin');
Route::post('/admin/edit_sesi', [AdminController::class, 'edit_sesi'])->middleware('is_admin');
Route::get('/admin/hapus_sesi', [AdminController::class, 'hapus_sesi'])->middleware('is_admin');
Route::get('/admin/relasi_sesi/{sesi:id}', [AdminController::class, 'relasi_sesi'])->middleware('is_admin');
Route::get('/admin/akses_sesi', [AdminController::class, 'akses_sesi'])->name('akses_sesi')->middleware('is_admin');
//===>Materi+Tugas
Route::resource('/admin/materi', MateriAdminController::class)->middleware('is_admin');
Route::resource('/admin/tugas', TugasAdminController::class)->middleware('is_admin');
// ============MAPEL
// ==>View
Route::get('/admin/mapel', [AdminController::class, 'mapel'])->middleware('is_admin');
// ==>Function
Route::post('/admin/tambah_mapel', [AdminController::class, 'tambah_mapel'])->middleware('is_admin');
Route::post('/admin/edit_mapel', [AdminController::class, 'edit_mapel'])->middleware('is_admin');
Route::get('/admin/hapus_mapel/{mapel:id}', [AdminController::class, 'hapus_mapel'])->middleware('is_admin');

// ============RELASI
// ==>View
Route::get('/admin/relasi', [AdminController::class, 'relasi'])->middleware('is_admin');
Route::get('/admin/relasi_guru/{guru:id}', [AdminController::class, 'relasi_guru'])->middleware('is_admin');
// ==>Function
Route::get('/admin/guru_kelas', [AdminController::class, 'guru_kelas'])->name('guru_kelas')->middleware('is_admin');
Route::get('/admin/guru_mapel', [AdminController::class, 'guru_mapel'])->name('guru_mapel')->middleware('is_admin');
// END::ROUTE ADMIN


// SUMMERNOTE
Route::post('/summernote/upload', [SummernoteController::class, 'upload'])->name('summernote_upload');
Route::post('/summernote/delete', [SummernoteController::class, 'delete'])->name('summernote_delete');
Route::get('/summernote/unduh/{file}', [SummernoteController::class, 'unduh']);
Route::post('/summernote/delete_file', [SummernoteController::class, 'delete_file']);

// START::ROUTE GURU
Route::get('/guru', [GuruController::class, 'index'])->middleware('is_guru');
Route::get('/guru/profile', [GuruController::class, 'profile'])->middleware('is_guru');
Route::post('/guru/edit_profile/{guru:id}', [GuruController::class, 'edit_profile'])->middleware('is_guru');
Route::post('/guru/edit_password/{guru:id}', [GuruController::class, 'edit_password'])->middleware('is_guru');

// ==>Materi
Route::post('/guru/edit_password/{guru:id}', [GuruController::class, 'edit_password'])->middleware('is_guru');
Route::resource('/guru/materi', MateriGuruController::class)->middleware('is_guru');
Route::resource('/guru/tugas', TugasGuruController::class)->middleware('is_guru');
Route::get('/guru/tugas_siswa/{id}', [TugasGuruController::class, 'tugas_siswa'])->middleware('is_guru');
Route::post('/guru/nilai_tugas/{id}/{kode}', [TugasGuruController::class, 'nilai_tugas'])->middleware('is_guru');

// ==>Ujian
Route::resource('/guru/ujian', UjianGuruController::class)->middleware('is_guru');
Route::post('/guru/pg_excel', [UjianGuruController::class, 'pg_excel'])->middleware('is_guru');
Route::get('/guru/ujian/{kode}/{siswa_id}', [UjianGuruController::class, 'pg_siswa'])->middleware('is_guru');
Route::get('/guru/ujian_cetak/{kode}', [UjianGuruController::class, 'ujian_cetak'])->middleware('is_guru');
Route::get('/guru/ujian_ekspor/{kode}', [UjianGuruController::class, 'ujian_ekspor'])->middleware('is_guru');
Route::get('/guru/ujian_essay', [UjianGuruController::class, 'create_essay'])->middleware('is_guru');
Route::post('/guru/ujian_essay', [UjianGuruController::class, 'store_essay'])->middleware('is_guru');
Route::get('/guru/ujian_essay/{ujian:kode}', [UjianGuruController::class, 'show_essay'])->middleware('is_guru');
Route::get('/guru/ujian_essay/{kode}/{siswa_id}', [UjianGuruController::class, 'essay_siswa'])->middleware('is_guru');
Route::post('/guru/nilai_essay', [UjianGuruController::class, 'nilai_essay'])->middleware('is_guru');
Route::get('/guru/essay_cetak/{kode}', [UjianGuruController::class, 'essay_cetak'])->middleware('is_guru');
Route::get('/guru/essay_ekspor/{kode}', [UjianGuruController::class, 'essay_ekspor'])->middleware('is_guru');
// END ROUTE GURU


// START ;; CHAT CONTROLLER
Route::post('/chat/ambil/{key}', [ChatController::class, 'ambil']);
Route::post('/chat/simpan/{key}', [ChatController::class, 'simpan']);
// END :: CHAT CONTROLLER

// START::ROUTE SISWA
Route::get('/siswa', [SiswaController::class, 'index'])->middleware('is_siswa');
Route::get('/siswa/profile', [SiswaController::class, 'profile'])->middleware('is_siswa');
Route::post('/siswa/edit_profile/{siswa:id}', [SiswaController::class, 'edit_profile'])->middleware('is_siswa');
Route::post('/siswa/edit_password/{siswa:id}', [SiswaController::class, 'edit_password'])->middleware('is_siswa');

// ==>belajar
Route::resource('/siswa/belajar', BelajarSiswaController::class)->middleware('is_siswa');
// ==>Materi
Route::resource('/siswa/materi', MateriSiswaController::class)->middleware('is_siswa');
// ==>Tugas
Route::resource('/siswa/tugas', TugasSiswaController::class)->middleware('is_siswa');
Route::get('/siswa/tugas/kerjakan/{tugas_siswa:id}', [TugasSiswaController::class, 'kerjakan'])->middleware('is_siswa');
// ==Ujian
Route::resource('/siswa/ujian', UjianSiswaController::class)->middleware('is_siswa');
Route::post('/siswa/simpan_pg', [UjianSiswaController::class, 'simpan_pg'])->middleware('is_siswa');
Route::post('/siswa/simpan_essay', [UjianSiswaController::class, 'simpan_essay'])->middleware('is_siswa');
Route::post('/siswa/ragu_pg', [UjianSiswaController::class, 'ragu_pg'])->middleware('is_siswa');
Route::post('/siswa/ragu_essay', [UjianSiswaController::class, 'ragu_essay'])->middleware('is_siswa');

Route::get('/siswa/ujian_essay/{ujian:kode}', [UjianSiswaController::class, 'essay'])->middleware('is_siswa');
Route::post('/siswa/ujian_essay', [UjianSiswaController::class, 'store_essay'])->middleware('is_siswa');



Route::get('/siswa/belajar_essay/{belajar:kode}', [BelajarSiswaController::class, 'essay'])->middleware('is_siswa');
Route::post('/siswa/belajar_essay', [BelajarSiswaController::class, 'store_essay'])->middleware('is_siswa');

Route::post('/siswa/belajar/simpan_pg', [BelajarSiswaController::class, 'simpan_pg'])->middleware('is_siswa');
Route::post('/siswa/belajar/simpan_essay', [BelajarSiswaController::class, 'simpan_essay'])->middleware('is_siswa');
