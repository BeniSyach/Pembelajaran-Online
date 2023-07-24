<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Gurukelas;
use App\Models\Gurumapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        return view('guru.dashboard', [
            'title' => 'Dashboard Guru',
            'plugin' => '
                <link href="' . url("/assets/backend") . '/assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
                <link href="' . url("/assets/backend") . '/assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" />
                <link href="' . url("/assets/backend") . '/assets/css/elements/infobox.css" rel="stylesheet" type="text/css" />
                <script src="' . url("/assets/backend") . '/assets/js/dashboard/dash_1.js"></script>
            ',
            'menu' => [
                'menu' => 'dashboard',
                'expanded' => 'dashboard'
            ],
            'guru' => Guru::firstWhere('id', session('guru')->id),
            'guru_kelas' => Gurukelas::where('guru_id', session('guru')->id)->get(),
            'guru_mapel' => Gurumapel::where('guru_id', session('guru')->id)->get(),
        ]);
    }
    public function profile()
    {
        return view('guru.profile', [
            'title' => 'My Profile',
            'plugin' => '
                <link href="' . url("assets/backend") . '/assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />
            ',
            'menu' => [
                'menu' => 'profile',
                'expanded' => 'profile'
            ],
            'guru' => Guru::firstWhere('id', session('guru')->id)
        ]);
    }
    public function edit_profile(Guru $guru, Request $request)
    {
        $rules = [
            'nama_guru' => 'required|max:255',
            'avatar' => 'image|file|max:1024',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('avatar')) {
            if ($request->gambar_lama) {
                if ($request->gambar_lama != 'default.png') {
                    Storage::delete('assets/user-profile/' . $request->gambar_lama);
                }
            }
            $validatedData['avatar'] = str_replace('assets/user-profile/', '', $request->file('avatar')->store('assets/user-profile'));
        }
        Guru::where('id', $guru->id)
            ->update($validatedData);

        return redirect('/guru/profile')->with('pesan', "
            <script>
                swal({
                    title: 'Success!',
                    text: 'profile updated!',
                    type: 'success',
                    padding: '2em'
                })
            </script>
        ");
    }
    public function edit_password(Request $request, Guru $guru)
    {
        if (Hash::check($request->current_password, $guru->password)) {
            $data = [
                'password' => bcrypt($request->password)
            ];
            Guru::where('id', $guru->id)
                ->update($data);

            return redirect('/guru/profile')->with('pesan', "
                <script>
                    swal({
                        title: 'Success!',
                        text: 'password updated!',
                        type: 'success',
                        padding: '2em'
                    })
                </script>
            ");
        }

        return redirect('/guru/profile')->with('pesan', "
            <script>
                swal({
                    title: 'Error!',
                    text: 'current password salah!',
                    type: 'error',
                    padding: '2em'
                })
            </script>
        ");
    }
}
