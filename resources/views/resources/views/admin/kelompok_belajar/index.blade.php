@extends('template.main')
@section('content')
    @include('template.navbar.admin')
    <!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-lg-12 layout-spacing">
                <div class="widget shadow p-3">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="widget-heading">
                                <h5 class="">Kelompok Belajar</h5>
                                <a href="javascript:void(0)" class="btn btn-primary btn-sm mt-3" data-toggle="modal" data-target="#tambah_kelompok"><span data-feather="home"></span> Tambah</a>
                            </div>
                            <div class="table-responsive mt-3">
                                <table id="datatable-table" class="table table-bordered table-striped text-center text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Nama Kelompok</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kelompok_belajar as $kb)
                                            <tr>
                                                <td><?= $kb->nama_kelompok; ?></td> 
                                                <td>
                                                    <a href="{{ url('/admin/kelompok_belajar/' . $kb->id_kelompok) }}"
                                                        class="btn btn-primary btn-sm"><span
                                                            data-feather="eye"></span></a>                                                               
                                                    {{-- <a href="javascript:void(0)" data-toggle="modal" data-target="#edit_kelompok_belajar" data-id="{{ $kb->id_kelompok }}" data-nama_kelompok="{{ $kb->nama_kelompok }}" data-id_kelas="{{ $kb->kelas->id_kelompok }}" class="btn btn-primary btn-sm edit-kelompok-belajar">
                                                        <i data-feather="edit"></i>
                                                    </a> --}}
                                                    <a href="{{ url('/admin/hapus_kelompok')}}/{{ $kb->id_kelompok }}" class="btn btn-danger btn-sm btn-hapus">
                                                        <i data-feather="x-circle"></i>
                                                    </a>
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-5 d-flex">
                            <img src="{{ url('assets/img') }}/kelas.svg" class="align-middle" alt="" style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('template.footer')
</div>
<!--  END CONTENT AREA  -->

<!-- MODAL -->
<!-- Modal Tambah -->
<div class="modal fade" id="tambah_kelompok" tabindex="-1" role="dialog" aria-labelledby="tambah_kelompokLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ url("admin/tambahkelompok") }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambah_kelompokLabel">Tambah Kelompok Belajar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_kelas">Kelas</label>
                        <select name="id_kelas" id="id_kelas" class="form-control" required onchange="getSiswaByKelas()">
                            <option value="id_kelas">Pilih Kelas</option>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}">{{  $k->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_kelompok">Jumlah per Kelompok</label>
                        <input type="number" class="form-control" id="jumlah_kelompok" name="jumlah_kelompok" required>
                    </div>
                    <div id="siswaContainer">
                        <!-- Daftar siswa yang akan ditampilkan setelah memilih kelas -->
                    </div>
                    <div class="form-group">
                        <label for="id_guru">Kelas</label>
                        <select name="id_guru" id="id_guru" class="form-control">
                            <option value="id_guru">Pilih Guru</option>
                            @foreach ($guru as $g)
                                <option value="{{ $g->id }}">{{  $g->nama_guru }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- END MODAL -->

{!! session('pesan') !!}
<script>
$(document).ready(function() {
    $('.btn-detail-kelompok').click(function() {
        var id_kelompok = $(this).data('id_kelompok');
        $('#detail_kelompok_modal').attr('data-id_kelompok', id_kelompok);
    });
    function getSiswaByKelas() {
        var id_kelas = document.getElementById('id_kelas').value;
        if (id_kelas) {
            // Lakukan permintaan AJAX untuk mendapatkan daftar siswa berdasarkan kelas
            var xhr = new XMLHttpRequest();
            var url = "/admin/getSiswaByKelas/" + id_kelas; // Ubah menjadi query parameter
            xhr.open('GET', url, true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    // Tampilkan daftar siswa
                    var siswaContainer = document.getElementById('siswaContainer');
                    siswaContainer.innerHTML = '';

                    // Buat elemen tabel
                    var table = document.createElement('table');
                    table.classList.add('table');

                    // Buat elemen tbody untuk menampung baris-baris dalam tabel
                    var tbody = document.createElement('tbody');

                    // Iterasi melalui respons JSON untuk membuat baris-baris dalam tabel
                    var response = JSON.parse(xhr.responseText);
                    response.forEach(function(siswa) {
                        // Buat baris dalam tabel
                        var row = document.createElement('tr');

                        // Buat sel-sel dalam baris untuk menampilkan data siswa
                        var idCell = document.createElement('td');
                        idCell.textContent = siswa.id;
                        var namaCell = document.createElement('td');
                        namaCell.textContent = siswa.nama_siswa;

                        // Tambahkan sel-sel ke dalam baris
                        row.appendChild(idCell);
                        row.appendChild(namaCell);

                        // Tambahkan baris ke dalam tbody
                        tbody.appendChild(row);
                    });

                    // Tambahkan tbody ke dalam tabel
                    table.appendChild(tbody);

                    // Tambahkan tabel ke dalam siswaContainer
                    siswaContainer.appendChild(table);
                }
            };
            xhr.send();
        } else {
            // Kosongkan daftar siswa jika tidak ada kelas yang dipilih
            var siswaContainer = document.getElementById('siswaContainer');
            siswaContainer.innerHTML = '';
        }
    }
    
    // Menggunakan event listener untuk memicu permintaan AJAX saat pilihan kelas berubah
    document.getElementById('id_kelas').addEventListener('change', getSiswaByKelas);
});

</script>





@endsection