@extends('template.main')
@section('content')
    @include('template.navbar.siswa')

<style>
    iframe{
        width: 100%;
    }
</style>
    <!--  BEGIN CONTENT AREA  -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            @if ($tugas_siswa->nilai == null)
                <div class="col-lg-6 layout-spacing">
                    <div class="widget shadow">
                        <div class="widget-content-area">
                            <h5 class="">{{ $tugas_siswa->tugas->nama_tugas }}</h5>
                            <table class="mt-3">
                                <tr>
                                    <th>Guru</th>
                                    <th> : {{ $tugas_siswa->tugas->guru->nama_guru }}</th>
                                </tr>
                                <tr>
                                    <th>Kelas</th>
                                    <th> : {{  $tugas_siswa->tugas->kelas->nama_kelas  }}</th>
                                </tr>
                                <tr>
                                    <th>mapel</th>
                                    <th> : {{  $tugas_siswa->tugas->mapel->nama_mapel  }}</th>
                                </tr>
                                <tr>
                                    <th>Due date</th>
                                    <th> : {{ $tugas_siswa->tugas->due_date }}</th>
                                </tr>
                            </table>
                            <hr>

                            <form action="{{ url("/siswa/tugas/" . $tugas_siswa->kode) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Jawaban</label>
                                    <textarea class="form-control" name="teks" id="text_siswa" cols="30" rows="5" wrap="hard">{{ $tugas_siswa->teks }}</textarea>
                                </div>
                                <p>File Sebelumnya</p>
                                <div class="row">
                                    @foreach ($file_siswa as $file)
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
                                <div class="custom-file-container mt-3" data-upload-id="fileSiswa">
                                    <label>Upload File <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file file_materi">
                                        <input type="file" class="custom-file-container__custom-file__custom-file-input" name="files[]" multiple>
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                                <a href="{{ url("/siswa/tugas/" . $tugas_siswa->kode) }}" class="btn btn-danger btn-sm mt-3"><span data-feather="arrow-left-circle"></span> Kembali</a>
                                <button type="submit" class="btn btn-primary btn-sm mt-3"><span data-feather="save"></span> simpan</button>
                            </form>

                        </div>
                    </div>
                </div>                
            @endif
            <div class="col-lg-6 layout-spacing">
                <div class="widget shadow">
                    <div class="widget-content-area">
                        <h5 class="">Jawaban Saya</h5>

                        <table cellpadding="2">
                            <tr>
                                <th>Waktu dikirim</th>
                                <th> : {{ $tugas_siswa->date_send }}</th>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td> : {!! ($tugas_siswa->is_telat == 1) ? '<span class="badge badge-danger">Terlambat</span>' : '<span class="badge badge-success">Sukses</span>' !!}</td>
                            </tr>
                            <tr>
                                <th>Nilai</th>
                                <th> : {!! ($tugas_siswa->nilai === null) ? 'Belum dinilai' : '<span class="text-primary">' . $tugas_siswa->nilai . '/100 Point </span>' !!}</th>
                            </tr>
                        </table>
                        <table class="mt-2">
                            <tr>
                                <th>Catatan Guru</th>
                            </tr>
                        </table>
                        {{-- cek apakah ada catatan guru --}}
                        {!! ($tugas_siswa->catatan_guru === null) ? '<p>Tidak ada</p>' : '<p>'. $tugas_siswa->catatan_guru .'</p>' !!}
                        <hr>
                        <p style="">
                            {{ $tugas_siswa->teks }}
                        </p>

                        @if ($tugas_siswa->file !== null)
                            <div class="row">

                                @foreach ($file_siswa as $fs)
                                    @php
                                        $file_info = pathinfo(asset('assets/files/' . $fs->nama));
                                        $ekstensi = $file_info['extension'];
                                    @endphp
                                        <div class="col-lg-6 mt-2">
                                            <ul class="list-group list-group-media">
                                                <li class="list-group-item list-group-item-action" style="padding: 0px 10px;">
                                                    <div class="media lihat-file" data-toggle="modal" data-target="#fileModal" data-source="{{ $fs->nama }}" data-extension="{{ $ekstensi }}" style="cursor: pointer; margin-top: 5px; margin-bottom: 5px;">
                                                        <div class="mr-1">
                                                            @if ($ekstensi == 'mp4' || $ekstensi == 'mkv' || $ekstensi == 'ogg')
                                                                <img alt="avatar" src="{{ url("/assets/img/docs/mp4.svg") }}" class="img-fluid">
                                                            
                                                                @elseif ($ekstensi == 'mp3' || $ekstensi == 'mpeg' || $ekstensi == 'm4a')
                                                                    <img alt="avatar" src="{{ url("/assets/img/docs/mp3.svg") }}" class="img-fluid">
                                                                
                                                                @elseif ($ekstensi == 'jpg' || $ekstensi == 'png' || $ekstensi == 'jpeg' || $ekstensi == 'svg' || $ekstensi == 'gif')
                                                                    <img alt="avatar" src="{{ asset('assets/files/' . $fs->nama) }}" class="img-fluid">
                                                                
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
                                                            <p class="mg-b-0">klik untuk lihat/download</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                @endforeach
                            </div>
                        @endif
                        @if ($tugas_siswa->nilai !== null)
                            <a href="{{ url("/siswa/tugas/" . $tugas_siswa->kode) }}" class="btn btn-danger btn-sm mt-3"><span data-feather="arrow-left-circle"></span> Kembali</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('template.footer')
</div>
<!--  END CONTENT AREA  -->

{{-- File Modal --}}
<div class="modal fade" id="fileModal" tabindex="-1" aria-labelledby="fileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fileModalLabel">File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="file-content"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>

    $('.lihat-file').click(function () {
        var source = $(this).data('source');
        var extension = $(this).data('extension');
        if (extension == 'mp4' || extension == 'mkv' || extension == 'ogg') {
            var html = `
            
                <video controls preload="metadata" style="width: 100%">
                    <source src="{{ asset('assets/files') }}/`+ source +`" type="video/`+ extension +`"/>
                    browsermu tidak support video
                </video>

            `;
        }else if(extension == 'mp3' || extension == 'mpeg' || extension == 'm4a'){

            var html = `
            
                <audio controls>
                    <source src="{{ asset('assets/files') }}/`+ source +`" type="audio/`+ extension +`"/>
                    browsermu tidak support audio
                </audio>

            `;
            
        }else if(extension == 'jpg' || extension == 'png' || extension == 'jpeg' || extension == 'svg' || extension == 'gif'){

            var html = `
                <img alt="file" src="{{ asset('assets/files') }}/`+ source +`" class="img-fluid">
            `;
            
        }else if(extension == 'xls' || extension == 'xlsx' || extension == 'csv'){

            var html = `
                <img alt="avatar" src="{{ url("/assets/img/docs/xls.svg") }}" style="width: 150px"><br>
                <a href="{{ url("/summernote/unduh") }}/`+ source +`" class="btn btn-success btn-sm mt-3">Download File</a>
            `;
            
        }else if(extension == 'doc' || extension == 'docx' || extension == 'csv'){

            var html = `
                <img alt="avatar" src="{{ url("/assets/img/docs/doc.svg") }}" style="width: 150px"><br>
                <a href="{{ url("/summernote/unduh") }}/`+ source +`" class="btn btn-success btn-sm mt-3">Download File</a>
            `;
            
        }else if(extension == 'ppt' || extension == 'pptx'){

            var html = `
                <img alt="avatar" src="{{ url("/assets/img/docs/ppt.svg") }}" style="width: 150px"><br>
                <a href="{{ url("/summernote/unduh") }}/`+ source +`" class="btn btn-success btn-sm mt-3">Download File</a>
            `;
            
        }else if(extension == 'pdf'){

            var html = `
                <object data="{{ asset('assets/files') }}/`+ source +`" type="application/pdf" width="100%" height="500px">
                    <p>
                        Browser kamu tidak support untuk menampilan pdf, tapi kamu bisa mendownloadnya <a href="{{ url("/summernote/unduh") }}/`+ source +`" class="text-primary">di sini</a>
                    </p>
                </object>
            `;
            
        }else{

            var html = `
                <img alt="avatar" src="{{ url("/assets/img/docs/file.png") }}" style="width: 150px"><br>
                <a href="{{ url("/summernote/unduh") }}/`+ source +`" class="btn btn-success btn-sm mt-3">Download File</a>
            `;

        }
        $('.file-content').html(html);

    });
    $(".hapus-file").on("click",function(){const a=$(this);var t=$(this).data("src");swal({title:"yakin di hapus?",text:"file tidak bisa dikembalikan!",type:"warning",showCancelButton:!0,cancelButtonText:"tidak",confirmButtonText:"ya, hapus",padding:"2em"}).then(function(e){e.value&&$.ajax({headers:{"X-CSRF-TOKEN":"{{ csrf_token() }}"},data:{src:t},type:"post",url:"{{ url('/summernote/delete_file') }}",cache:!1,success:function(e){a.remove(),location.reload()}})})});var oneUpload=new FileUploadWithPreview("fileSiswa");
</script>


    {!! session('pesan') !!}

@endsection