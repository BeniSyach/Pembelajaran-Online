<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Benar</th>
            <th>Salah</th>
            <th>Nilai</th>
            <th>Tidak Dijawab</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ujian->waktuujian as $s)
            @if ($s->selesai == null)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $s->siswa->nama_siswa }}</td>
                    <td colspan="3">Belum Mengerjakan Ujian</td>
                </tr>
            @else
                @php
                    $salah = 0;
                    $benar = 0;
                    $tidakDijawab = 0;
                @endphp
                @foreach ($s->pgsiswa as $jawaban)
                    @if ($jawaban->kode == $ujian->kode)
                        @if ($jawaban->benar == 0)
                            @php $salah++ @endphp
                        @endif
                        @if ($jawaban->benar == 1)
                            @php $benar++ @endphp
                        @endif
                        @if ($jawaban->benar == null)
                            @php $tidakDijawab++ @endphp
                        @endif
                    @endif
                @endforeach
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $s->siswa->nama_siswa }}</td>
                    <td>{{ $benar }}</td>
                    <td>{{ $salah }}</td>
                    <td>{{ $tidakDijawab }}</td>
                    <td>{{($benar/($benar+$salah)*100) }}</td>
                </tr> 
            @endif
        @endforeach
    </tbody>
</table>
