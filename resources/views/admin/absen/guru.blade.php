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
                        <div class="col-lg-12">
                            <div class="widget-heading">
                                <h5 class="">Guru</h5>
                                <a href="{{ url("/admin/absen/cetak_absen_guru") }}" class="btn btn-warning btn-sm mt-3" target="_blank">
                                    <i data-feather="file-text"></i> Ekspor Excel
                                </a>
                            </div>
                            <div class="table-responsive mt-4">
                                <table id="datatable-table" class="table text-center text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Tanggal Absen</th>
                                            <th>Nama Guru</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($guru as $s)
                                            <tr>
                                                <td>{{ date('d-m-Y H:i:s',strtotime($s->created_at))  }}</td>
                                                <td>{{  $s->guru->nama_guru }}</td>
                                                <td>{{  $s->guru->email }}</td>
                                                <td>{{  $s->status }}</td>
                                                <td>
                                                    <a href="{{ url("/admin/absen/hapus_absen_guru") }}/{{ $s->idAbsen }}" class="btn btn-danger btn-sm btn-hapus">
                                                        <i data-feather="x-circle"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('template.footer')
</div>
<!--  END CONTENT AREA  -->

{!! session('pesan'); !!}



@endsection