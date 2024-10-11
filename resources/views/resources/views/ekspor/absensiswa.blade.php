<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Absen</th>
            <th>No Induk</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Kelas</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswa as $s)
            <tr>
                
                <td>{{ $loop->iteration }}</td>
                <td>{{  $s->created_at }}</td>
                <td>{{  $s->siswa->nis }}</td>
                <td>{{  $s->siswa->nama_siswa }}</td>
                <td>{{  $s->siswa->email }}</td>
                <td>{{  $s->siswa->kelas->nama_kelas }}</td>
                <td>{{  $s->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
