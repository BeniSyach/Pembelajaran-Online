@extends('template.main')
@section('content')
    @include('template.navbar.siswa')

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-lg-12 layout-spacing">
                    <div class="widget shadow p-3" style="min-height: 450px;">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="widget-heading">
                                    <h5 class="">Ujian</h5>
                                </div>
                                <div class="table-responsive" style="overflow-x: scroll;">
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
                                            @foreach ($ujian->sortBy('id') as $u)
                                                <tr>
                                                    <td>{{ $u->ujian->nama }}</td>
                                                    <td>{{ $u->ujian->mapel->nama_mapel }}</td>
                                                    <td>{{ $u->ujian->kelas->nama_kelas }}</td>
                                                    <td>
                                                        @if ($u->ujian->jenis == 0)
                                                            <a href="{{ url('siswa/ujian/' . $u->kode) }}" class="btn btn-primary btn-sm @if($u->waktu_berakhir == null) btn-kerjakan @endif">

                                                                @if ($u->waktu_berakhir == NULL)
                                                                    <span data-feather="edit-3"></span> kerjakan
                                                                @endif

                                                                @if ($u->waktu_berakhir)

                                                                    @if ($u->selesai == NULL)
                                                                        <span data-feather="edit-3"></span> lanjut kerjakan    
                                                                    @else
                                                                        <span data-feather="eye"></span>  lihat
                                                                    @endif

                                                                @endif
                                                                
                                                            </a>
                                                        @else
                                                            <a href="{{ url('siswa/ujian_essay/' . $u->kode) }}" class="btn btn-primary btn-sm @if($u->waktu_berakhir == null) btn-kerjakan @endif">

                                                                @if ($u->waktu_berakhir == NULL)
                                                                    <span data-feather="edit-3"></span> kerjakan
                                                                @endif

                                                                @if ($u->waktu_berakhir)

                                                                    @if ($u->selesai == NULL)
                                                                        <span data-feather="edit-3"></span> lanjut kerjakan    
                                                                    @else
                                                                        <span data-feather="eye"></span>  lihat
                                                                    @endif

                                                                @endif
                                                                
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-5 d-flex">
                                <img src="{{ url('assets/img') }}/ujian.svg" class="align-middle" alt=""
                                    style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('template.footer')
    </div>
    <!--  END CONTENT AREA  -->

    <script>
        $("#datatable-table").DataTable({scrollY:"300px",scrollX:!0,scrollCollapse:!0,paging:!0,oLanguage:{oPaginate:{sPrevious:'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',sNext:'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'},sInfo:"tampilkan halaman _PAGE_ dari _PAGES_",sSearch:'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',sSearchPlaceholder:"Cari Data...",sLengthMenu:"Hasil :  _MENU_"},stripeClasses:[],lengthMenu:[[-1,5,10,25,50],["All",5,10,25,50]]}),$(".btn-kerjakan").click(function(e){e.preventDefault();var t=$(this).attr("href");swal({title:"yakin mulai ujian?",text:"waktu ujian akan dimulai & tidak bisa berhenti!",type:"warning",showCancelButton:!0,cancelButtonText:"tidak",confirmButtonText:"ya, mulai",padding:"2em"}).then(function(e){e.value&&(document.location.href=t)})});
    </script>
@endsection
