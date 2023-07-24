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
            <div class="col-lg-12 layout-spacing">
                <div class="widget shadow">
                    <div class="widget-content-area">
                        <h5 class="">{{ $tugas->nama_tugas }}</h5>
                        <table class="mt-3">
                            <tr>
                                <th>Guru</th>
                                <th> : {{ $tugas->guru->nama_guru }}</th>
                            </tr>
                            <tr>
                                <th>Kelas</th>
                                <th> : {{  $tugas->kelas->nama_kelas  }}</th>
                            </tr>
                            <tr>
                                <th>mapel</th>
                                <th> : {{  $tugas->mapel->nama_mapel  }}</th>
                            </tr>
                            <tr>
                                <th>Due date</th>
                                <th> : {{ $tugas->due_date }}</th>
                            </tr>
                        </table>
                        <hr>
                        <div style="overflow-wrap: break-word;">
                            {!! $tugas->teks !!}
                        </div>

                        <hr>
                        @if ($files)
                            <div class="row">
                                @foreach ($files as $file)
                                {{-- getfilepath --}}
                                @php
                                    $file_info = pathinfo(asset('assets/files/' . $file->nama));
                                    $ekstensi = $file_info['extension'];
                                @endphp
                                    <div class="col-lg-4 mt-2">
                                        <ul class="list-group list-group-media">
                                            <li class="list-group-item list-group-item-action" style="padding: 0px 10px;">
                                                <div class="media lihat-file" data-toggle="modal" data-target="#fileModal" data-source="{{ $file->nama }}" data-extension="{{ $ekstensi }}" style="cursor: pointer; margin-top: 5px; margin-bottom: 5px;">
                                                    <div class="mr-1">
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
                                                        <p class="mg-b-0">klik untuk lihat/download</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                            <hr>
                        @endif

                        <div id="toggleAccordion">
                            <div class="card">
                                <div class="card-header" id="...">
                                    <section class="mb-0 mt-0">
                                        <div role="menu" class="collapsed" data-toggle="collapse" data-target="#defaultAccordionOne" aria-expanded="true" aria-controls="defaultAccordionOne">
                                            Lihat Chat
                                        </div>
                                    </section>
                                </div>

                                <div id="defaultAccordionOne" class="collapse" aria-labelledby="..." data-parent="#toggleAccordion">
                                    <div class="card-body" style="height: 250px; overflow-y: scroll;">
                                        <div class="inner-chat-tugas">
                                            <button class="btn btn-primary btn-block" type="button" disabled>
                                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                Loading...
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer" style="background: #fff;">
                                    <input type="hidden" name="kode" value="{{ $tugas->kode }}">
                                    <textarea class="form-control komentar" name="chat" placeholder="Tulis komentar / chat" aria-label="Tulis komentar / chat" rows="1" wrap="hard"></textarea>
                                    <button id="chat_tugas" class="btn btn-primary mt-2 d-flex ml-auto" type="button">Kirim</button>
                                </div>
                            </div>
                        </div>

                        <div class="row layout-top-spacing">
                            <div class="col-lg-4 layout-spacing">
                                <div class="widget shadow p-3">
                                    <div class="widget-heading">
                                        <h5>Tugas Saya</h5>
                                    </div>

                                    {{-- cek apakah dia daftar sebelum tugas dibuat --}}
                                    @if ($tugas_siswa != null)

                                        {{-- cek apakah tugasnya sudah dikerjakan --}}
                                        @if ($tugas_siswa->date_send === null)

                                            <p>Tugas Belum Dikerjakan. Segera dikerjakan sebelum <?= $tugas->due_date; ?></p>
                                            <a href="{{ url('/siswa/tugas/kerjakan/' . $tugas_siswa->id) }}" class="btn btn-primary btn-kerjakan">Kerjakan</a>
                                        
                                        @else

                                            <table cellpadding="5">
                                                <tr>
                                                    <th>Status</th>
                                                    <td> : {!! ($tugas_siswa->is_telat == 1) ? '<span class="badge badge-danger">Terlambat</span>' : '<span class="badge badge-success">Sukses</span>' !!}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nilai</th>
                                                    <td> : {!! ($tugas_siswa->nilai === null) ? 'Belum dinilai' : '<span class="text-primary">' . $tugas_siswa->nilai . '/100 Point </span>' !!}</td>
                                                </tr>
                                            </table>
                                            <table class="mt-2">
                                                <tr>
                                                    <th>Catatan Guru</th>
                                                </tr>
                                            </table>

                                            {{-- cek apakah ada catatan guru --}}
                                            {!! ($tugas_siswa->catatan_guru === null) ? '<p>Tidak ada</p>' : '<p>'. $tugas_siswa->catatan_guru .'</p>' !!}

                                            {{-- cek apakah ada nilai, jika belum dinilia jawaban masih bisa di edit --}}
                                            @if ($tugas_siswa->nilai === null)
                                                <a href="{{ url("/siswa/tugas/" . $tugas_siswa->kode . '/edit') }}" class="btn btn-primary btn-sm btn-kerjakan">lihat / edit jawaban</a>
                                            @else
                                                <a href="{{ url("/siswa/tugas/" . $tugas_siswa->kode . '/edit') }}" class="btn btn-primary btn-sm btn-kerjakan">lihat jawaban</a>
                                            @endif

                                        @endif

                                        
                                    @else
                                        <p>Anda tidak bisa mengerjakan tugas ini dikarenakan akun anda terdaftar setelah tugas ini dibuat.</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <a href="{{ url("/siswa/tugas") }}" class="btn btn-danger btn-sm mt-3"><span data-feather="arrow-left-circle"></span> Kembali</a>
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


@if ($tugas_siswa != null)
    <!-- MODAL -->
    <!-- Modal Kerjakan Tugas -->
    <div class="modal fade" id="kerjakan_tugas" tabindex="-1" role="dialog" aria-labelledby="kerjakan_tugasLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{ url("/siswa/tugas/" . $tugas->kode) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="kerjakan_tugasLabel">Tugas Saya</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            x
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Text</label>
                            <textarea class="form-control" name="teks" id="text_siswa" cols="30" rows="5" wrap="hard">{{ $tugas_siswa->teks }}</textarea>
                        </div>
                        <div class="custom-file-container" data-upload-id="fileSiswa">
                            <label>Upload File <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file file_materi">
                                <input type="file" class="custom-file-container__custom-file__custom-file-input" name="files[]" multiple>
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview"></div>
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

    <!-- Modal lihat Tugas -->
    <div class="modal fade" id="lihat_tugas" tabindex="-1" role="dialog" aria-labelledby="lihat_tugasLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lihat_tugasLabel">Jawaban Saya</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        x
                    </button>
                </div>
                <div class="modal-body">
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
                                    <div class="col-lg-5 mt-2">
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
                <div class="modal-footer">
                    <button type="reset" value="reset" class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button>
                </div>
            </div>

        </div>
    </div>
@endif


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

    $("#chat_tugas").click(function(){var a=$("textarea[name=chat]").val(),e=$("input[name=kode]").val();$.ajax({headers:{"X-CSRF-TOKEN":"{{ csrf_token() }}"},type:"POST",data:{chat:a,kode:e,_token:"{{ csrf_token() }}"},async:!0,url:"{{ url('/chat/simpan') }}/{{ $tugas->kode }}",success:function(a){$("textarea[name=chat]").val("")}})}),setInterval(()=>{var a=$("input[name=kode]").val();$.ajax({headers:{"X-CSRF-TOKEN":"{{ csrf_token() }}"},type:"POST",data:{kode:a,_token:"{{ csrf_token() }}"},url:"{{ url('/chat/ambil') }}/{{ $tugas->kode }}",success:function(a){$(".inner-chat-tugas").html(a)}})},5e3);var oneUpload=new FileUploadWithPreview("fileSiswa");
</script>


    {!! session('pesan') !!}

@endsection