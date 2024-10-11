<table >
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Absen</th>
            <th>Nama Guru</th>
            <th>Email</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($guru as $s)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{  $s->created_at }}</td>
                <td>{{  $s->guru->nama_guru }}</td>
                <td>{{  $s->guru->email }}</td>
                <td>{{  $s->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>