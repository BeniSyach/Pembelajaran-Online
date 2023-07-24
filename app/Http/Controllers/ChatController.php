<?php

namespace App\Http\Controllers;

use App\Models\Userchat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function ambil(Request $request)
    {
        if (session('guru')) {
            $email = session('guru')->email;
        }
        if (session('siswa')) {
            $email = session('siswa')->email;
        }

        $chats = Userchat::where('key', $request->kode)->get();
        foreach ($chats as $chat) {
            if ($chat->guru) {

                if ($chat->guru->email == $email) {
                    echo '
                        <div class="media">
                            <div class="avatar avatar-sm avatar-indicators avatar-online mr-0">
                                <img alt="avatar" src="' . asset('assets/user-profile/' . $chat->guru->avatar) . '" class="rounded-circle" />
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading"><span class="media-title"> ' . $chat->guru->nama_guru . ' <span class="badge badge-primary">You</span> <small>' . $chat->created_at->diffForHumans() . '</small></h5>
                                <p class="media-text" style="white-space: pre-line; margin-top: -30px;">
                                    ' . $chat->chat . '
                                </p>
                            </div>
                        </div>
                        <hr style="margin-top: -10px;">
                    ';
                } else {
                    echo '
                        <div class="media">
                            <div class="avatar avatar-sm avatar-indicators avatar-online mr-0">
                                <img alt="avatar" src="' . asset('assets/user-profile/' . $chat->guru->avatar) . '" class="rounded-circle" />
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading"><span class="media-title"> ' . $chat->guru->nama_guru . ' <small>' . $chat->created_at->diffForHumans() . '</small></h5>
                                <p class="media-text" style="white-space: pre-line; margin-top: -30px;">
                                    ' . $chat->chat . '
                                </p>
                            </div>
                        </div>
                        <hr style="margin-top: -10px;">
                    ';
                }
            } else {

                if ($chat->siswa->email == $email) {
                    echo '
                        <div class="media">
                            <div class="avatar avatar-sm avatar-indicators avatar-online mr-0">
                                <img alt="avatar" src="' . asset('assets/user-profile/' . $chat->siswa->avatar) . '" class="rounded-circle" />
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading"><span class="media-title"> ' . $chat->siswa->nama_siswa . ' <span class="badge badge-primary">You</span> <small>' . $chat->created_at->diffForHumans() . '</small></h5>
                                <p class="media-text" style="white-space: pre-line; margin-top: -30px;">
                                    ' . $chat->chat . '
                                </p>
                            </div>
                        </div>
                        <hr style="margin-top: -10px;">
                    ';
                } else {
                    echo '
                        <div class="media">
                            <div class="avatar avatar-sm avatar-indicators avatar-online mr-0">
                                <img alt="avatar" src="' . asset('assets/user-profile/' . $chat->siswa->avatar) . '" class="rounded-circle" />
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading"><span class="media-title"> ' . $chat->siswa->nama_siswa . ' <small>' . $chat->created_at->diffForHumans() . '</small></h5>
                                <p class="media-text" style="white-space: pre-line; margin-top: -30px;">
                                    ' . $chat->chat . '
                                </p>
                            </div>
                        </div>
                        <hr style="margin-top: -10px;">
                    ';
                }
            }
        }
    }
    public function simpan(Request $request)
    {
        if (session('guru')) {
            $email = session('guru')->email;
        }
        if (session('siswa')) {
            $email = session('siswa')->email;
        }


        $data = [
            'key' => $request->kode,
            'email' => $email,
            'chat' => $request->chat,
        ];

        Userchat::create($data);
    }
}
