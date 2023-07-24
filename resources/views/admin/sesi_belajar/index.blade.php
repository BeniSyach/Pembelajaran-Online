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
                                <h5 class="">Sesi Belajar</h5>
                                <a href="javascript:void(0)" class="btn btn-primary btn-sm mt-3" data-toggle="modal" data-target="#tambah_sesi">
                                    <i data-feather="user-plus"></i> Tambah
                                </a>
                            </div>
                            <div class="table-responsive mt-4">
                                <table id="datatable-table" class="table text-center text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Nama Sesi</th>
                                            <th>Deskripsi</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($sesi as $s)
                                            <tr>

                                                <td>{{  $s->nama_sesi }}</td>
                                                <td>{{  $s->deskripsi }}</td>
                                                <td>
                                                    <a href="{{ url('/admin/relasi_sesi') }}/{{ $s->id }}" class="btn btn-primary btn-sm">
                                                        <span data-feather="link"></span>
                                                    </a>
                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#edit_sesi" data-id_sesi="{{ $s->id }}" data-nama_sesi="{{ $s->nama_sesi }}" data-deskripsi="{{ $s->deskripsi }}" class="btn btn-primary btn-sm edit-sesi">
                                                        <i data-feather="edit"></i>
                                                    </a>                                                    
                                                    <a href="{{ url("/admin/hapus_sesi?id=$s->id") }}" class="btn btn-danger btn-sm btn-hapus">
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

<!-- MODAL -->
<!-- Modal Tambah -->
<div class="modal fade" id="tambah_sesi" tabindex="-1" role="dialog" aria-labelledby="tambah_sesiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ url("admin/tambah_sesi") }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambah_sesiLabel">Tambah Sesi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        x
                    </button>
                </div>
                <div class="modal-body">
                    <a href="javascript:void(0)" class="btn btn-success mb-3 tambah-baris-sesi">tambah baris</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Sesi</th>
                                <th>Deskripsi</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-sesi">
                            <tr>
                                <td><input type="text" name="nama_sesi[]" required style="border: none; background: transparent; width: 100%; height: 100%;"></td>
                                <td><input type="text" name="deskripsi[]" required style="border: none; background: transparent; width: 100%; height: 100%;"></td>
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
<div class="modal fade" id="edit_sesi" tabindex="-1" role="dialog" aria-labelledby="edit_sesiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ url('/admin/edit_sesi') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_sesiLabel">Edit Sesi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        x
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Sesi</label>
                        <input type="hidden" name="id" id="id_sesi" class="form-control">
                        <input type="text" name="nama_sesi" id="nama_sesi" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <input type="text" name="deskripsi" id="deskripsi" required class="form-control">
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
{!! session('pesan'); !!}

<script>

    $(document).ready(function() {
        $("#datatable-table").DataTable({scrollY:"300px",scrollX:!0,scrollCollapse:!0,paging:!0,oLanguage:{oPaginate:{sPrevious:'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',sNext:'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'},sInfo:"tampilkan halaman _PAGE_ dari _PAGES_",sSearch:'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',sSearchPlaceholder:"Cari Data...",sLengthMenu:"Hasil :  _MENU_"},stripeClasses:[],lengthMenu:[[-1,5,10,25,50],["All",5,10,25,50]]});
        $('.tambah-baris-sesi').click(function() {
            const sesi = `
            <tr>
                <td><input type="text" name="nama_sesi[]" required style="border: none; background: transparent; width: 100%; height: 100%;"></td>
                <td>
                    <input type="text" name="deskripsi[]" required style="border: none; background: transparent; width: 100%; height: 100%;">
                </td>
                <td>
                    <button class="btn btn-danger">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    </button>
                </td>
            </tr>
           `;

            $('#tbody-sesi').append(sesi)
        });
        $("#tbody-sesi").on("click","tr td button",function(){$(this).parents("tr").remove()}),
        $(".edit-sesi").click(function(){$("#id_sesi").val($(this).data("id_sesi"));$("#nama_sesi").val($(this).data("nama_sesi"));$("#deskripsi").val($(this).data("deskripsi"));}),$(".btn-hapus").on("click",function(e){e.preventDefault();var t=$(this).attr("href");swal({title:"yakin di hapus?",text:"data yang berkaitan dengan data kelas ini juga akan di hapus!",type:"warning",showCancelButton:!0,cancelButtonText:"tidak",confirmButtonText:"ya, hapus",padding:"2em"}).then(function(e){e.value&&(document.location.href=t)})});
    })
</script>



@endsection