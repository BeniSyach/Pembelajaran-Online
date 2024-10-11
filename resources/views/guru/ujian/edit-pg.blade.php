@extends('template.main')

@section('content')

    @include('template.navbar.guru')



    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--  BEGIN CONTENT AREA  -->

    <div id="content" class="main-content">

        <div class="layout-px-spacing">

            <form action="{{ url('/guru/ujian_update/'. $tugas->kode) }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="row layout-top-spacing">

                    <div class="col-lg-12 layout-spacing">

                        <div class="widget shadow p-3">

                            <div class="widget-heading">

                                <h5 class="">Tugas Pilihan Ganda</h5>

                                <div class="row mt-2">

                                    <div class="col-lg-4">

                                        <div class="form-group">

                                            <label for="">Nama Ujian / Quiz</label>

                                            <input type="text" name="nama" class="form-control" value="{{ $tugas->nama}}" required>

                                        </div>

                                    </div>

                                    <div class="col-lg-4">

                                        <div class="form-group">

                                            <label for="">Mapel</label>

                                            <select class="form-control" name="mapel" id="mapel" required>

                                                <option value="">Pilih</option>

                                                @foreach ($guru_mapel as $gm)

                                                    <option value="{{ $gm->mapel->id }}" {{ $gm->mapel->id == $tugas->mapel_id ? 'selected' : '' }}>{{ $gm->mapel->nama_mapel }}

                                                    </option>

                                                @endforeach

                                            </select>

                                        </div>

                                    </div>

                                    <div class="col-lg-4">

                                        <div class="form-group">

                                            <label for="">Kelas</label>

                                            <select class="form-control" name="kelas" id="kelas" required>

                                                <option value="">Pilih</option>

                                                @foreach ($guru_kelas as $gk)

                                                    <option value="{{ $gk->kelas->id }}" {{ $gk->kelas->id == $tugas->kelas_id ? 'selected' : '' }}>{{ $gk->kelas->nama_kelas }}

                                                    </option>

                                                @endforeach

                                            </select>

                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="form-group">

                                            <label for="">Materi</label>

                                            <select class="form-control" name="materi" id="materi" required>

                                                <option value="">Pilih</option>

                                                @foreach ($guru_materi as $gm)

                                                    <option value="{{ $gm->id }}" {{ $gm->id == $tugas->materi_id ? 'selected' : '' }}>{{ $gm->nama_materi }}

                                                    </option>

                                                @endforeach

                                            </select>

                                        </div>

                                    </div>

                                    {{-- <div class="col-lg-6">

                                        <div class="form-group">

                                            <label for="">Waktu Jam</label>

                                            <input type="number" name="jam" class="form-control" value="0"

                                                required>

                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="form-group">

                                            <label for="">Waktu Menit</label>

                                            <input type="number" name="menit" class="form-control" value="0"

                                                required>

                                        </div>

                                    </div> --}}

                                </div>

                                <div class="row mt-2">

                                    <div class="col-lg-12">

                                        <div class="custom-control custom-checkbox">

                                            <input type="checkbox" class="custom-control-input" id="customCheck1" name="acak" value="1" checked="checked">

                                            <label class="custom-control-label" for="customCheck1">Acak Soal Siswa</label>

                                        </div>

                                    </div>

                                </div>

                                <div class="mt-4">

                                    <button class="btn btn-primary">Submit</button>

                                </div> 

                            </div>

                        </div>

                    </div>

                </div>

            </form>

                {{-- soal --}}

                <div class="row layout-top-spacing">

                    <div class="col-lg-12 layout-spacing">

                        <div class="widget shadow p-3">

                            <div class="widget-heading">

                                <h5 class="">Soal Ujian</h5>

                            </div>

                            <div id="soal_pg">



                                @foreach ( $detail_tugas as $dt )

                                <form action="{{ url('/guru/soal_ujian_update/'. $dt->id) }}" method="POST" enctype="multipart/form-data">

                                    @csrf

                                <div class="isi_soal">

                                    <div class="form-group">

                                        <label for="">Soal No. {{ $loop->iteration }} </label>

                                        <textarea name="soal" cols="30" rows="2" class="summernote" wrap="hard" required> {{$dt->soal}} </textarea>

                                    </div>

                                    <div class="row mt-2">

                                        <div class="col-lg-4">

                                            <div class="form-group">

                                                <label for="">Pilihan A</label>

                                                <div class="input-group">

                                                    <div class="input-group-prepend">

                                                        <span class="input-group-text" id="basic-addon5">A</span>

                                                    </div>

                                                    <textarea name="pg_1" cols="30" rows="2" class="summernote" wrap="hard"

                                                         required> {{$dt->pg_1}} </textarea>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-4">

                                            <div class="form-group">

                                                <label for="">Pilihan B</label>

                                                <div class="input-group">

                                                    <div class="input-group-prepend">

                                                        <span class="input-group-text" id="basic-addon5">B</span>

                                                    </div>

                                                    <textarea name="pg_2" cols="30" rows="2" class="summernote" wrap="hard" required> {{$dt->pg_2}} </textarea>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-4">

                                            <div class="form-group">

                                                <label for="">Pilihan C</label>

                                                <div class="input-group">

                                                    <div class="input-group-prepend">

                                                        <span class="input-group-text" id="basic-addon5">C</span>

                                                    </div>

                                                    <textarea name="pg_3" cols="30" rows="2" class="summernote" wrap="hard" required> {{$dt->pg_3}} </textarea>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-4">

                                            <div class="form-group">

                                                <label for="">Pilihan D</label>

                                                <div class="input-group">

                                                    <div class="input-group-prepend">

                                                        <span class="input-group-text" id="basic-addon5">D</span>

                                                    </div>

                                                    <textarea name="pg_4" cols="30" rows="2" class="summernote" wrap="hard" required> {{$dt->pg_4}} </textarea>

                                                </div>

                                            </div>

                                        </div>

                                        {{-- <div class="col-lg-4">

                                            <div class="form-group">

                                                <label for="">Pilihan E</label>

                                                <div class="input-group">

                                                    <div class="input-group-prepend">

                                                        <span class="input-group-text" id="basic-addon5">E</span>

                                                    </div>

                                                    <textarea name="pg_5" cols="30" rows="2" class="summernote" wrap="hard" required> </textarea>

                                                </div>

                                            </div>

                                        </div> --}}

                                        <div class="col-lg-4">

                                            <div class="form-group">

                                                <label for="">Jawaban</label>

                                                <div class="input-group">

                                                    <div class="input-group-prepend">

                                                        <span class="input-group-text" id="basic-addon5">

                                                            <svg viewBox="0 0 24 24" width="24" height="24"

                                                                stroke="currentColor" stroke-width="2" fill="none"

                                                                stroke-linecap="round" stroke-linejoin="round"

                                                                class="css-i6dzq1">

                                                                <polyline points="20 6 9 17 4 12"></polyline>

                                                            </svg>

                                                        </span>

                                                    </div>

                                                    <input type="text" name="jawaban" class="form-control"

                                                        placeholder="Contoh : A" autocomplete="off" value="{{$dt->jawaban}} {{$loop->last}}" required>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="mt-2 mb-3">

                                        <button class="btn btn-primary">Edit Soal Nomor {{ $loop->iteration }}</button>

                                    </div>

                                </div>

                                </form>

                                @endforeach

                            </div>

                        </div>

                    </div>

                </div>

                {{-- end soal --}}

            

        </div>

        @include('template.footer')

    </div>

    <!--  END CONTENT AREA  -->





    <script>

        $('#customCheck1').on('change', function(){

   this.value = this.checked ? 1 : 0;

   // alert(this.value);

        }).change();



        $(document).ready(function() {

            function uploadImage(e,o){var a=new FormData;a.append("image",e),$.ajax({headers:{"X-CSRF-TOKEN":"{{ csrf_token() }}"},url:"{{ route('summernote_upload') }}",cache:!1,contentType:!1,processData:!1,data:a,type:"post",success:function(e){$(o).summernote("insertImage",e)},error:function(e){console.log(e)}})}function deleteImage(e){$.ajax({headers:{"X-CSRF-TOKEN":"{{ csrf_token() }}"},data:{src:e},type:"post",url:"{{ route('summernote_delete') }}",cache:!1,success:function(e){console.log(e)}})}setInterval(()=>{$(".summernote").summernote({placeholder:"Hello stand alone ui",tabsize:2,height:120,toolbar:[["style",["style"]],["font",["bold","underline","clear"]],["color",["color"]],["para",["ul","ol","paragraph"]],["table",["table"]],["insert",["link","picture","video"]],["view",["fullscreen","help"]]],callbacks:{onImageUpload:function(e,o=this){uploadImage(e[0],o)},onMediaDelete:function(e){deleteImage(e[0].src)}}})},1e3);

            var no_soal = {{$jumlah_tugas +1}};

            $("#soal_pg").on("click",".isi_soal a",function(){$(this).parents(".isi_soal").remove(),--no_soal});

        })

    </script>



    {!! session('pesan') !!}

@endsection

