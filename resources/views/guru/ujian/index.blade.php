@extends('template.main')
@section('content')
    @include('template.navbar.guru')

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-lg-12 layout-spacing">
                    <div class="widget shadow p-3" style="min-height: 500px;">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="widget-heading">
                                    <h5 class="">Ujian / Quiz</h5>
                                    <a href="javascript:void(0)" class="btn btn-primary mt-3" data-toggle="modal"
                                        data-target="#tambah_ujian">Tambah</a>
                                </div>
                                <div class="table-responsive mt-3" style="overflow-x: scroll;">
                                    <table id="datatable-table" class="table text-center text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Mapel</th>
                                                <th>Kelas</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ujian as $u)
                                                <tr>
                                                    <td>{{ $u->nama }}</td>
                                                    <td>{{ $u->mapel->nama_mapel }}</td>
                                                    <td>{{ $u->kelas->nama_kelas }}</td>
                                                    <td>
                                                        @if ($u->jenis == 0)
                                                            <a href="{{ url('/guru/ujian/' . $u->kode) }}" class="btn btn-primary btn-sm">
                                                                <span data-feather="eye"></span>
                                                            </a>
                                                        @endif

                                                        @if ($u->jenis == 1)
                                                            <a href="{{ url('/guru/ujian_essay/' . $u->kode) }}" class="btn btn-primary btn-sm">
                                                                <span data-feather="eye"></span>
                                                            </a>
                                                        @endif
                                                        <form action="{{ url('/guru/ujian/' . $u->kode) }}" method="post" class="d-inline" id="formHapus">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm btn-hapus">
                                                                <span data-feather="trash"></span>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-5 d-flex">
                                <img src="{{ url('/assets/img') }}/ujian.svg" style="width: 100%;">
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

    <div class="modal fade" id="tambah_ujian" tabindex="-1" role="dialog" aria-labelledby="tambah_ujianLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambah_ujianLabel">Tambah Tugas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            x
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <a href="{{ url('/guru/ujian/create') }}" class="btn btn-primary">Pilihan Ganda</a>
                        <a href="{{ url('/guru/ujian_essay') }}" class="btn btn-primary ml-2">Essay</a>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" value="reset" class="btn" data-dismiss="modal"><i
                                class="flaticon-cancel-12"></i> Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function(){$(".btn-hapus").on("click",function(e){var t=$(this);e.preventDefault(),swal({title:"yakin di hapus?",text:"data yang berkaitan akan dihapus dan tidak bisa di kembalikan!",type:"warning",showCancelButton:!0,cancelButtonText:"tidak",confirmButtonText:"ya, hapus",padding:"2em"}).then(function(e){e.value&&t.parent("form").submit()})}),$("#datatable-table").DataTable({scrollY:"300px",scrollX:!0,scrollCollapse:!0,paging:!0,oLanguage:{oPaginate:{sPrevious:'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',sNext:'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'},sInfo:"tampilkan halaman _PAGE_ dari _PAGES_",sSearch:'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',sSearchPlaceholder:"Cari Data...",sLengthMenu:"Hasil :  _MENU_"},stripeClasses:[],lengthMenu:[[-1,5,10,25,50],["All",5,10,25,50]]})});
    </script>

    {!! session('pesan') !!}
@endsection
