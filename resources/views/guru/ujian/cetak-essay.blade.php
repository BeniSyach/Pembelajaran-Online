<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nilai Ujian</title>
    <link href="{{ url('/assets/backend') }}/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <h2 class="text-center">NILAI UJIAN</h2>
    <hr>
    <table cellpadding="3">
        <tr>
            <td>Ujian</td>
            <td> : {{ $ujian->nama }} | {{ ($ujian->jenis == 0) ? 'Pilihan Ganda' : 'Essay' }}</td>
        </tr>
        <tr>
            <td>Mapel</td>
            <td> : {{ $ujian->mapel->nama_mapel }}</td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td> : {{ $ujian->kelas->nama_kelas }}</td>
        </tr>
        <tr>
            <td>Total Soal</td>
            <td> : {{ $ujian->detailessay->count() }} soal</td>
        </tr>
    </table>
    <table class="table table-bordered text-nowrap mt-3">
        <thead>
            <tr class="text-center">
                <th>Nama Siswa</th>
                <th>Soal Dijawab</th>
                <th>Tidak dijawab</th>
                <th>Total Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ujian->waktuujian as $s)
                @if ($s->selesai == null)
                    <tr class="text-center">
                        <td>{{ $s->siswa->nama_siswa }}</td>
                        <td colspan="3">Belum Mengerjakan Ujian</td>
                    </tr>
                @else
                    <tr class="text-center">
                        @php
                            $soalDijawab = 0;
                            $tidakDijawab = 0;
                        @endphp
                        @foreach ($s->essaysiswa as $soal)
                            @if ($soal->jawaban == null)
                                @php $tidakDijawab++ @endphp
                            @endif
                            @if ($soal->benar !== 1)
                                @php $soalDijawab++ @endphp
                            @endif
                        @endforeach
                        <td>{{ $s->siswa->nama_siswa }}</td>
                        <td>{{ $soalDijawab }}</td>
                        <td>{{ $tidakDijawab }}</td>
                        <td>{{ $s->essaysiswa->sum('nilai') }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>
</html>