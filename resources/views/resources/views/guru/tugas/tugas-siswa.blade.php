@extends('template.main')
@section('content')
    @include('template.navbar.guru')

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
            <div class="col-lg-6 layout-spacing">
                <div class="widget shadow">
                    <div class="widget-content-area">
                        <h5 class="">{{ $tugas_siswa->tugas->nama_tugas }}</h5>
                        <table cellpadding="2">
                            <tr>
                                <th>Siswa</th>
                                <th> : {{ $tugas_siswa->siswa->nama_siswa }}</th>
                            </tr>
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

                        <form action="{{ url("/guru/nilai_tugas/" . $tugas_siswa->id . '/' . $tugas_siswa->kode) }}" method="POST">
                            @csrf
                            <textarea class="form-control mt-3" name="catatan_guru" placeholder="Tuliskan Catatan Untuk Siswa (Oposional)" rows="3"></textarea>
                            <input type="number" class="form-control mt-3" name="nilai" placeholder="masukkan nilai , maksimal 100" aria-label="masukkan nilai" min="0" max="100" minlength="3" required>
                            <button type="submit" class="btn btn-primary d-flex ml-auto mt-2" type="button">Kirim</button>
                        </form>

                        <a href="{{ url("/guru/tugas/" . $tugas_siswa->kode) }}" class="btn btn-danger btn-sm mt-3"><span data-feather="arrow-left-circle"></span> Kembali</a>
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

</script>


    {!! session('pesan') !!}

@endsection