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
                            <div class="custom-file-container" data-upload-id="fileSiswa">
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
        </div>
    </div>
    @include('template.footer')
</div>
<!--  END CONTENT AREA  -->


<script>
    var oneUpload = new FileUploadWithPreview('fileSiswa');

</script>


    {!! session('pesan') !!}

@endsection