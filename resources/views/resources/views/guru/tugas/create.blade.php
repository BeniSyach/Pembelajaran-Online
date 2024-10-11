@extends('template.main')
@section('content')
    @include('template.navbar.guru')

    <style>
        .custom-file-label::after{
            background-color: rgba(27, 85, 226, 0.23921568627450981);
            color: #1b55e2;
        }
        .progress{
            display: none;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-lg-8 layout-spacing">
                    <div class="widget shadow p-3">
                        <div class="widget-heading">
                            <h5 class="">Tambah Tugas</h5>
                            <a href="{{ url("/guru/tugas") }}" class="btn btn-danger btn-sm mt-3"><span data-feather="arrow-left-circle"></span> Kembali</a>
                        </div>
                        <form action="{{ url('guru/tugas') }}" method="POST" enctype="multipart/form-data" class="mt-3">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Nama Tugas</label>
                                        <input type="text" name="nama_tugas" class="form-control" required>
                                        @error('nama_tugas')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Mapel</label>
                                        <select class="form-control" name="mapel" id="mapel_tugas" required>
                                            <option value="">Pilih</option>
                                            @foreach ($guru_mapel as $gm)
                                                <option value="{{ $gm->mapel->id }}">{{ $gm->mapel->nama_mapel }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Kelas</label>
                                        <select class="form-control" name="kelas" id="kelas_tugas" required>
                                            <option value="">Pilih</option>
                                            @foreach ($guru_kelas as $gk)
                                                <option value="{{ $gk->kelas->id }}">{{ $gk->kelas->nama_kelas }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Text</label>
                                @error('teks')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <textarea class="form-control summernote" name="teks" id="teks" cols="30" rows="5" wrap="hard">
                                   {!! old('teks') !!}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Due Date</label>
                                <div class="row">
                                    <div class="col-lg-6"><input type="date" class="form-control" name="tgl" value="{{ old('tgl') }}" required></div>
                                    <div class="col-lg-6"><input type="time" class="form-control" name="jam" value="{{ old('jam') }}" required></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="custom-file-container" data-upload-id="fileTugas">
                                        <label>Upload File <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                        <small>Upload file berukuran dibawah 10mb</small>
                                        <label class="custom-file-container__custom-file file_tugas">
                                            <input type="file" class="custom-file-container__custom-file__custom-file-input" name="file_tugas[]" multiple>
                                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                                        </label>
                                        <div class="custom-file-container__image-preview"></div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm"><span data-feather="save"></span> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('template.footer')
    </div>

    <script>
        $(document).ready(function(){$(".summernote").summernote({placeholder:"Hello stand alone ui",tabsize:2,height:120,toolbar:[["style",["style"]],["font",["bold","underline","clear"]],["color",["color"]],["para",["ul","ol","paragraph"]],["table",["table"]],["insert",["link","picture","video"]],["view",["fullscreen","help"]]],callbacks:{onImageUpload:function(e,o=this){var a;e=e[0],a=o,(o=new FormData).append("image",e),$.ajax({headers:{"X-CSRF-TOKEN":"{{ csrf_token() }}"},url:"{{ route('summernote_upload') }}",cache:!1,contentType:!1,processData:!1,data:o,type:"post",success:function(e){$(a).summernote("insertImage",e)},error:function(e){console.log(e)}})},onMediaDelete:function(e){e=e[0].src,$.ajax({headers:{"X-CSRF-TOKEN":"{{ csrf_token() }}"},data:{src:e},type:"post",url:"{{ route('summernote_delete') }}",cache:!1,success:function(e){console.log(e)}})}}});new FileUploadWithPreview("fileTugas")});
    </script>

    {!! session('pesan') !!}
@endsection