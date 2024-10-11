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
                            <div class="col-lg-9">
                                <div class="widget-heading">
                                    <h5 class="">Data Materi Pelajaran</h5>
                                </div>
                                <div class="table-responsive" style="overflow-x: scroll;">
                                    <table id="datatable-table" class="table text-center text-wrap">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Mapel</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($materi as $m)
                                                <tr>
                                                    <td data-order="{{ $m->nama_materi }}">{{ $m->nama_materi }}</td>
                                                    <td>{{ $m->mapel->nama_mapel }}</td>
                                                    <td>
                                                        @if($m->kunci_materi == 0)
                                                        <a href="{{ url("/siswa/belajar/" . $m->kode) }}" class="btn btn-primary"><span data-feather="eye"></span> Lihat</a>
                                                        @else
                                                        <a href="#" class="btn btn-warning" style="pointer-events: none;
                                                        cursor: default;"><span data-feather="eye-off"></span> Materi Dikunci Oleh Guru</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-3 d-flex">
                                <img src="{{ url('assets/img') }}/materi.svg" class="align-middle" alt="" style="width: 100%;">
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
        $("#datatable-table").DataTable({order: [],columnDefs: [{
      targets: [0], 
      orderData: [0] 
    }],scrollY:"300px",scrollX:!0,scrollCollapse:!0,paging:!0,oLanguage:{oPaginate:{sPrevious:'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',sNext:'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'},sInfo:"tampilkan halaman _PAGE_ dari _PAGES_",sSearch:'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',sSearchPlaceholder:"Cari Data...",sLengthMenu:"Hasil :  _MENU_"},stripeClasses:[],lengthMenu:[[-1,5,10,25,50],["All",5,10,25,50]]});
    </script>
{!! session('pesan') !!}
@endsection