<?php

use App\Models\Gurukelas;
use App\Models\Gurumapel;
use App\Models\AksesSesi;

function check_kelas($id_guru, $id_kelas)
{

    $where = [
        'guru_id' => $id_guru,
        'kelas_id' => $id_kelas,
    ];

    $result = Gurukelas::where($where)->get();

    if (count($result) > 0) {
        return "checked='checked'";
    }
}

function check_relasi($id_sesi, $id_kelas)
{

    $where = [
        
        'sesi_id' => $id_sesi,
        'kelas_id' => $id_kelas,
    ];

    $result = AksesSesi::where($where)->get();

    if (count($result) > 0) {
        return "checked='checked'";
    }
}


function check_mapel($id_guru, $id_mapel)
{

    $where = [
        'guru_id' => $id_guru,
        'mapel_id' => $id_mapel,
    ];

    $result = Gurumapel::where($where)->get();

    if (count($result) > 0) {
        return "checked='checked'";
    }
}
