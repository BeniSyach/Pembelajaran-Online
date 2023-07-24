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
                                <h5 class="">Kelas</h5>
                                <a href="javascript:void(0)" class="btn btn-primary btn-sm mt-3" data-toggle="modal" data-target="#tambah_kelas"><span data-feather="home"></span> Tambah</a>
                            </div>
                            <div class="table-responsive mt-3">
                                <table id="datatable-table" class="table table-bordered table-striped text-center text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID Kelas</th>
                                            <th>Kelas</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kelas as $k)
                                            <tr>
                                                <td><?= $k->id; ?></td>
                                                <td><?= $k->nama_kelas; ?></td>
                                                <td>
                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#edit_kelas" data-id_kelas="{{ $k->id }}" data-nama_kelas="{{ $k->nama_kelas }}" class="btn btn-primary btn-sm edit-kelas">
                                                        <i data-feather="edit"></i>
                                                    </a>
                                                    <a href="{{ url('/admin/hapus_kelas') }}/{{ $k->id }}" class="btn btn-danger btn-sm btn-hapus">
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
<div class="modal fade" id="tambah_kelas" tabindex="-1" role="dialog" aria-labelledby="tambah_kelasLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ url('/admin/tambah_kelas') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambah_kelasLabel">Tambah Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        x
                    </button>
                </div>
                <div class="modal-body">
                    <a href="javascript:void(0)" class="btn btn-success mb-3 tambah-baris-kelas">tambah baris</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Kelas</th>
                                <th>opsi</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-kelas">
                            <tr>
                                <td><input type="text" name="nama_kelas[]" required style="border: none; background: transparent; width: 100%; height: 100%;"></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="reset" value="reset" class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal edit -->
<div class="modal fade" id="edit_kelas" tabindex="-1" role="dialog" aria-labelledby="edit_kelasLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ url('/admin/edit_kelas') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_kelasLabel">Edit Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        x
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Kelas</label>
                        <input type="hidden" name="id" id="id_kelas" class="form-control">
                        <input type="text" name="nama_kelas" id="nama_kelas" required class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" value="reset" class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
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
        // KELAS
        $('.tambah-baris-kelas').click(function() {
            const kelas = `
                <tr>
                    <td><input type="text" name="nama_kelas[]" required style="border: none; background: transparent; width: 100%; height: 50px;"></td>
                    <td>
                    <button class="btn btn-danger">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    </button>
                    </td>
                </tr>
           `;

            $('#tbody-kelas').append(kelas)
        });
        $("#datatable-table").DataTable({scrollY:"300px",scrollX:!0,scrollCollapse:!0,paging:!0,oLanguage:{oPaginate:{sPrevious:'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',sNext:'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'},sInfo:"tampilkan halaman _PAGE_ dari _PAGES_",sSearch:'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',sSearchPlaceholder:"Cari Data...",sLengthMenu:"Hasil :  _MENU_"},stripeClasses:[],lengthMenu:[[-1,5,10,25,50],["All",5,10,25,50]]}),$("#tbody-kelas").on("click","tr td button",function(){$(this).parents("tr").remove()}),$(".edit-kelas").click(function(){$("#id_kelas").val($(this).data("id_kelas")),$("#nama_kelas").val($(this).data("nama_kelas"))}),$(".btn-hapus").on("click",function(e){e.preventDefault();var t=$(this).attr("href");swal({title:"yakin di hapus?",text:"data yang berkaitan dengan data kelas ini juga akan di hapus!",type:"warning",showCancelButton:!0,cancelButtonText:"tidak",confirmButtonText:"ya, hapus",padding:"2em"}).then(function(e){e.value&&(document.location.href=t)})});
    })
</script>

    
@endsection