@extends('template.main')
@section('content')
    @include('template.navbar.guru')

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-lg-12 layout-spacing">
                    <div class="widget shadow p-3" style="min-height: 450px;">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="widget-heading">
                                    <h5 class="">Absen</h5>
                                </div>
                                <div class="table-responsive" style="overflow-x: scroll;">
                                    <table id="datatable-table" class="table text-center text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Tanggal Absen</th>
                                                <th>Nama Guru</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach ($guruAbsen as $s)
                                                <tr>
                                                    <td>{{ date('d-m-Y H:i:s',strtotime($s->created_at))  }}</td>
                                                    <td>{{  $s->guru->nama_guru }}</td>
                                                    <td>{{  $s->guru->email }}</td>
                                                    <td>{{  $s->status }}</td>

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
    {!! session('pesan') !!}
    <script>
        $("#datatable-table").DataTable({order: [[ 0, 'desc' ]],scrollY:"300px",scrollX:!0,scrollCollapse:!0,paging:!0,oLanguage:{oPaginate:{sPrevious:'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',sNext:'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'},sInfo:"tampilkan halaman _PAGE_ dari _PAGES_",sSearch:'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',sSearchPlaceholder:"Cari Data...",sLengthMenu:"Hasil :  _MENU_"},stripeClasses:[],lengthMenu:[[-1,5,10,25,50],["All",5,10,25,50]]});

        $(".absen_guru").on("click",function(a){a.preventDefault(),swal({title:"Absen ?",type:"warning",showCancelButton:!0,cancelButtonText:"tidak",confirmButtonText:" ya, absen",padding:"2em"}).then(function(a){a.value&&$("#examwizard-question").submit()})});
    </script>

@endsection