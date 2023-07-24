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
                            <h5 class="">Edit Tugas</h5>
                            <a href="{{ url("/guru/tugas") }}" class="btn btn-danger btn-sm mt-3"><span data-feather="arrow-left-circle"></span> Kembali</a>
                        </div>
                        <form action="{{ url('guru/tugas/' . $tugas->kode) }}" method="POST" enctype="multipart/form-data" class="mt-3">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Nama Tugas</label>
                                        <input type="text" name="nama_tugas" class="form-control" value="{{ old('nama_tugas', $tugas->nama_tugas) }}" required>
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
                                                @if (old('mapel', $tugas->mapel_id) == $gm->mapel->id)
                                                    <option value="{{ $gm->mapel->id }}" selected>{{ $gm->mapel->nama_mapel }}</option>
                                                @else
                                                    <option value="{{ $gm->mapel->id }}">{{ $gm->mapel->nama_mapel }}</option>
                                                @endif
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
                                                @if (old('kelas', $tugas->kelas_id) == $gk->kelas->id)
                                                    <option value="{{ $gk->kelas->id }}" selected>{{ $gk->kelas->nama_kelas }}</option>
                                                @else
                                                    <option value="{{ $gk->kelas->id }}">{{ $gk->kelas->nama_kelas }}</option>
                                                @endif
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
                                   {!! old('teks', $tugas->teks) !!}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Due Date</label>
                                <div class="row">
                                    <div class="col-lg-6"><input type="date" class="form-control" name="tgl" value="{{ old('tgl', Str::substr($tugas->due_date, 0, 10)) }}" required></div>
                                    <div class="col-lg-6"><input type="time" class="form-control" name="jam" value="{{ old('jam', Str::substr($tugas->due_date, 11, 5)) }}" required></div>
                                </div>
                            </div>
                            @if ($files)
                            <p>File Sebelumnya</p>
                            <div class="row">
                                @foreach ($files as $file)
                                {{-- getfilepath --}}
                                @php
                                    $file_info = pathinfo(asset('assets/files/' . $file->nama));
                                    $ekstensi = $file_info['extension'];
                                @endphp
                                    <div class="col-lg-6 mt-2 hapus-file" data-src="{{ $file->nama }}" style="cursor: pointer;">
                                        <ul class="list-group list-group-media">
                                            <li class="list-group-item list-group-item-action" style="padding: 0px 10px;">
                                                <div class="media lihat-file position-relative" style="margin-top: 5px; margin-bottom: 5px;">
                                                    <div class="mr-3">
                                                        @if ($ekstensi == 'mp4' || $ekstensi == 'mkv' || $ekstensi == 'ogg')
                                                            <img alt="avatar" src="{{ url("/assets/img/docs/mp4.svg") }}" class="img-fluid">
                                                        
                                                            @elseif ($ekstensi == 'mp3' || $ekstensi == 'mpeg' || $ekstensi == 'm4a')
                                                                <img alt="avatar" src="{{ url("/assets/img/docs/mp3.svg") }}" class="img-fluid">
                                                            
                                                            @elseif ($ekstensi == 'jpg' || $ekstensi == 'png' || $ekstensi == 'jpeg' || $ekstensi == 'svg' || $ekstensi == 'gif')
                                                                <img alt="avatar" src="{{ asset('assets/files/' . $file->nama) }}" class="img-fluid">
                                                            
                                                            @elseif ($ekstensi == 'xls' || $ekstensi == 'xlsx' || $ekstensi == 'csv')
                                                                <img alt="avatar" src="{{ url("/assets/img/docs/xls.svg") }}" class="img-fluid">
                                                            
                                                            @elseif ($ekstensi == 'doc' || $ekstensi == 'docx')
                                                                <img alt="avatar" src="{{ url("/assets/img/docs/doc.svg") }}" class="img-fluid">
                                                            
                                                            @elseif ($ekstensi == 'pdf')
                                                                <img alt="avatar" src="{{ url("/assets/img/docs/pdf.svg") }}" class="img-fluid">
                                                            
                                                            @elseif ($ekstensi == 'ppt' || $ekstensi == 'pptx')
                                                                <img alt="avatar" src="{{ url("/assets/img/docs/ppt.svg") }}" class="img-fluid">
                                                            @else
                                                                <img alt="avatar" src="{{ url("/assets/img/docs/file.png") }}" class="img-fluid">
                                                        @endif
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="tx-inverse">File {{ $ekstensi }}</h6>
                                                        <p class="mg-b-0">klik untuk menghapus file</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                            <hr>
                        @endif
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
        $(document).ready(function(){$(".summernote").summernote({placeholder:"Hello stand alone ui",tabsize:2,height:120,toolbar:[["style",["style"]],["font",["bold","underline","clear"]],["color",["color"]],["para",["ul","ol","paragraph"]],["table",["table"]],["insert",["link","picture","video"]],["view",["fullscreen","help"]]],callbacks:{onImageUpload:function(e,t=this){var a;e=e[0],a=t,(t=new FormData).append("image",e),$.ajax({headers:{"X-CSRF-TOKEN":"{{ csrf_token() }}"},url:"{{ route('summernote_upload') }}",cache:!1,contentType:!1,processData:!1,data:t,type:"post",success:function(e){$(a).summernote("insertImage",e)},error:function(e){console.log(e)}})},onMediaDelete:function(e){e=e[0].src,$.ajax({headers:{"X-CSRF-TOKEN":"{{ csrf_token() }}"},data:{src:e},type:"post",url:"{{ route('summernote_delete') }}",cache:!1,success:function(e){console.log(e)}})}}});new FileUploadWithPreview("fileTugas");$(".hapus-file").on("click",function(){const t=$(this);var a=$(this).data("src");swal({title:"yakin di hapus?",text:"file tidak bisa dikembalikan!",type:"warning",showCancelButton:!0,cancelButtonText:"tidak",confirmButtonText:"ya, hapus",padding:"2em"}).then(function(e){e.value&&$.ajax({headers:{"X-CSRF-TOKEN":"{{ csrf_token() }}"},data:{src:a},type:"post",url:"{{ url('/summernote/delete_file') }}",cache:!1,success:function(e){t.remove(),swal({title:"Berhasil!",text:"file berhasil di hapus!",type:"success",padding:"2em"})}})})})});
    </script>

    {!! session('pesan') !!}
@endsection