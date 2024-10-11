@extends('template.main')
@section('content')
    @include('template.navbar.admin')
    

    <!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <h4 class="mt-3">Relasi : {{ $sesi->nama_sesi }}</h4>
        <div class="row layout-top-spacing">
            <div class="col-lg-6 layout-spacing">
                <div class="widget shadow p-3">
                    <div class="widget-heading text-center">
                        <h5 class="text-center">Relasi Sesi - Kelas</h5>
                        <form action="" method="POST">
                            <table class="table table-bordered mt-2">
                                <thead>
                                    <tr>
                                        <th>Kelas</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kelas as $kel)
                                        <tr>
                                            <td>{{ $kel->nama_kelas }}</td>
                                            <td>
                                                <label class="new-control new-checkbox checkbox-primary">
                                                    <input type="checkbox" class="new-control-input check-sesi" {{ check_relasi($sesi->id, $kel->id) }}  data-id_sesi="{{ $sesi->id }}" data-id_kelas="{{ $kel->id }}">
                                                    <span class="new-control-indicator"></span> Mengakses
                                                </label>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>

            {{-- <div class="col-lg-6">
                <div class="widget shadow p-3">
                    <div class="widget-heading text-center">
                        <h5 class="text-center">Relasi Guru - Mapel</h5>
                        <form action="" method="POST">
                            <table class="table table-bordered mt-2">
                                <thead>
                                    <tr>
                                        <th>Mapel</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mapel as $m)
                                        <tr>
                                            <td>{{ $m->nama_mapel }}</td>
                                            <td>
                                                <label class="new-control new-checkbox checkbox-primary">
                                                    <input type="checkbox" class="new-control-input check-mapel" {{ check_mapel($guru->id, $m->id) }} data-id_guru="{{ $guru->id }}" data-id_mapel="{{ $m->id }}">
                                                    <span class="new-control-indicator"></span> Mengajar
                                                </label>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
    @include('template.footer')
</div>
<!--  END CONTENT AREA  -->
<script>
    $(document).ready(function(){$(".check-sesi").on("click",function(){var a=$(this).data("id_sesi"),e=$(this).data("id_kelas");$.ajax({type:"get",data:{id_sesi:a,id_kelas:e},async:!0,url:"{{ route('akses_sesi') }}",success:function(){swal({title:"Berhasil!",text:"relasi di ubah!",type:"success",padding:"2em"})}})})});
</script>


    {!! session('pesan') !!}
@endsection