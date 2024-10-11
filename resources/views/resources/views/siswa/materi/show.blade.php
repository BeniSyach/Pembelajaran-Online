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
                        <h5 class="">{{ $materi->nama_materi }}</h5>
                        <table class="mt-3">
                            <tr>
                                <th>Guru</th>
                                <th> : {{ $materi->guru->nama_guru }}</th>
                            </tr>
                            <tr>
                                <th>Kelas</th>
                                <th> : {{  $materi->kelas->nama_kelas  }}</th>
                            </tr>
                            <tr>
                                <th>mapel</th>
                                <th> : {{  $materi->mapel->nama_mapel  }}</th>
                            </tr>
                            <tr>
                                <th>Waktu & Tanggal</th>
                                <th> : {{ $materi->created_at->diffForHumans() }}</th>
                            </tr>
                        </table>
                        <hr>
                        <div style="overflow-wrap: break-word;">
                            {!! $materi->teks !!}
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
                                        <div class="inner-chat-materi">
                                            <button class="btn btn-primary btn-block" type="button" disabled>
                                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                Loading...
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer" style="background: #fff;">
                                    <input type="hidden" name="kode" value="{{ $materi->kode }}">
                                    <textarea class="form-control komentar" name="chat" placeholder="Tulis komentar / chat" aria-label="Tulis komentar / chat" rows="1" wrap="hard"></textarea>
                                    <button id="chat_materi" class="btn btn-primary mt-2 d-flex ml-auto" type="button">Kirim</button>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url("/siswa/materi") }}" class="btn btn-primary mt-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('template.footer')
</div>
<!--  END CONTENT AREA  -->


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
    $("#chat_materi").click(function(){var a=$("textarea[name=chat]").val(),e=$("input[name=kode]").val();$.ajax({headers:{"X-CSRF-TOKEN":"{{ csrf_token() }}"},type:"POST",data:{chat:a,kode:e,_token:"{{ csrf_token() }}"},async:!0,url:"{{ url('/chat/simpan') }}/{{ $materi->kode }}",success:function(a){$("textarea[name=chat]").val("")}})}),setInterval(()=>{var a=$("input[name=kode]").val();$.ajax({headers:{"X-CSRF-TOKEN":"{{ csrf_token() }}"},type:"POST",data:{kode:a,_token:"{{ csrf_token() }}"},url:"{{ url('/chat/ambil') }}/{{ $materi->kode }}",success:function(a){$(".inner-chat-materi").html(a)}})},5e3);
</script>


    {!! session('pesan') !!}
@endsection