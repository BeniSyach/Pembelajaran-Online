<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama guru</th>
            <th>Gender</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($guru as $g)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $g->nama_guru }}</td>
                <td>{{ $g->gender }}</td>
                <td>{{ $g->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
