@extends('template.main')
@section('content')
    @include('template.navbar.siswa')

<style>
    iframe{
        width: 100%;
    }
    .btn-white{
            background: #cacaca;
            color: #fff;
        }
        
        .hidden{
            display: none;
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


    @if ($check_pg == false)
    <!-- Start Soal PG -->
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-lg-12 layout-spacing">
                    <div class="widget shadow p-3">
                        <div class="widget-heading">
                            <h5 class="">{{ $ujian->nama }}</h5>
                            <table class="mt-2">
                                <tr>
                                    <th>Kelas</th>
                                    <th>: {{ $ujian->kelas->nama_kelas }}</th>
                                </tr>
                                <tr>
                                    <th>Mapel</th>
                                    <th>: {{ $ujian->mapel->nama_mapel }}</th>
                                </tr>
                                <tr>
                                    <th>Jumlah Soal</th>
                                    <th>: {{ $ujian->detailujian->count() }} Soal</th>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

            @if ($waktu_ujian->selesai == null)    
                <div class="row">
                    <div class="col-lg-9">
                        <form id="examwizard-question" action="{{ url("/siswa/belajar") }}" method="POST">
                            @csrf
                            <input type="hidden" name="kode" value="{{ $ujian->kode }}">
                            <div class="widget shadow p-2">
                                <div>
                                    @php
                                        $no = 1;
                                        $soal_hidden = '';
                                    @endphp
                                    @foreach ($pg_siswa as $soal)
                                        <div class="question {{ $soal_hidden }} question-{{ $no }}" data-question="{{ $no }}">
                                            <div class="widget-heading pl-2 pt-2" style="border-bottom: 1px solid #e0e6ed;">
                                                <div class="">
                                                    <h6 class="" style="font-weight: bold">Soal No. <span
                                                            class="badge badge-primary no-soal" style="font-size: 1rem">{{ $no }}</span>
                                                    </h6>
                                                </div>
                                            </div>

                                            <div class="widget p-3 mt-3">
                                                <div class="widget-heading" style="border-bottom: 1px solid #e0e6ed;">
                                                    <h6 class="question-title color-green" style="word-wrap: break-word">
                                                        {!! $soal->detailujian->soal !!}
                                                    </h6>
                                                </div>
                                                <div class="widget-content mt-3" style="position: relative;">
                                                    <div class="alert alert-danger hidden"></div>
                                                    <div class="timer-check hidden" style="position: absolute; width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.5);">
                                                        <h5 style="display: flex; justify-content: center; align-items: center; margin-top: 60px;">
                                                            <span class="badge badge-danger">Waktu Habis!</span>
                                                        </h5>
                                                    </div>
                                                    <div class="green-radio color-green">
                                                        <ol type="A" style="color: #000; margin-left: -20px;">
                                                            <li class="answer-number">
                                                                <input type="radio" data-alternatetype="radio" name="{{ $soal->detailujian->id }}" value="{{ substr($soal->detailujian->pg_1, 0, 1) }}" id="soal{{ $no }}-{{ substr($soal->detailujian->pg_1, 0 ,1) }}" data-pg_siswa="{{ $soal->id }}" data-noSoal="{{ $no }}" @if($soal->jawaban == substr($soal->detailujian->pg_1, 0 ,1)) checked @endif/>
                                                                <label for="soal{{ $no }}-{{ substr($soal->detailujian->pg_1, 0, 1) }}" class="answer-text" style="color: #000;">
                                                                    <span>{{ substr($soal->detailujian->pg_1, 3, strlen($soal->detailujian->pg_1)) }}</span>
                                                                </label>
                                                            </li>
                                                            <li class="answer-number">
                                                                <input type="radio" data-alternatetype="radio" name="{{ $soal->detailujian->id }}" value="{{ substr($soal->detailujian->pg_2, 0, 1) }}" id="soal{{ $no }}-{{ substr($soal->detailujian->pg_2, 0 ,1) }}" data-pg_siswa="{{ $soal->id }}" data-noSoal="{{ $no }}" @if($soal->jawaban == substr($soal->detailujian->pg_2, 0 ,1)) checked @endif/>
                                                                <label for="soal{{ $no }}-{{ substr($soal->detailujian->pg_2, 0, 1) }}" class="answer-text" style="color: #000;">
                                                                    <span>{{ substr($soal->detailujian->pg_2, 3, strlen($soal->detailujian->pg_2)) }}</span>
                                                                </label>
                                                            </li>
                                                            <li class="answer-number">
                                                                <input type="radio" data-alternatetype="radio" name="{{ $soal->detailujian->id }}" value="{{ substr($soal->detailujian->pg_3, 0, 1) }}" id="soal{{ $no }}-{{ substr($soal->detailujian->pg_3, 0 ,1) }}" data-pg_siswa="{{ $soal->id }}" data-noSoal="{{ $no }}" @if($soal->jawaban == substr($soal->detailujian->pg_3, 0 ,1)) checked @endif/>
                                                                <label for="soal{{ $no }}-{{ substr($soal->detailujian->pg_3, 0, 1) }}" class="answer-text" style="color: #000;">
                                                                    <span>{{ substr($soal->detailujian->pg_3, 3, strlen($soal->detailujian->pg_3)) }}</span>
                                                                </label>
                                                            </li>
                                                            <li class="answer-number">
                                                                <input type="radio" data-alternatetype="radio" name="{{ $soal->detailujian->id }}" value="{{ substr($soal->detailujian->pg_4, 0, 1) }}" id="soal{{ $no }}-{{ substr($soal->detailujian->pg_4, 0 ,1) }}" data-pg_siswa="{{ $soal->id }}" data-noSoal="{{ $no }}" @if($soal->jawaban == substr($soal->detailujian->pg_4, 0 ,1)) checked @endif/>
                                                                <label for="soal{{ $no }}-{{ substr($soal->detailujian->pg_4, 0, 1) }}" class="answer-text" style="color: #000;">
                                                                    <span>{{ substr($soal->detailujian->pg_4, 3, strlen($soal->detailujian->pg_4)) }}</span>
                                                                </label>
                                                            </li>
                                                            <li class="answer-number">
                                                                <input type="radio" data-alternatetype="radio" name="{{ $soal->detailujian->id }}" value="{{ substr($soal->detailujian->pg_5, 0, 1) }}" id="soal{{ $no }}-{{ substr($soal->detailujian->pg_5, 0 ,1) }}" data-pg_siswa="{{ $soal->id }}" data-noSoal="{{ $no }}" @if($soal->jawaban == substr($soal->detailujian->pg_5, 0 ,1)) checked @endif/>
                                                                <label for="soal{{ $no }}-{{ substr($soal->detailujian->pg_5, 0, 1) }}" class="answer-text" style="color: #000;">
                                                                    <span>{{ substr($soal->detailujian->pg_5, 3, strlen($soal->detailujian->pg_5)) }}</span>
                                                                </label>
                                                            </li>
                                                        </ol>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        @php
                                            $soal_hidden = 'hidden';
                                            $no++;
                                        @endphp
                                    @endforeach
                                </div>
                                <!-- SOAL -->

                                <input type="hidden" value="1" id="currentQuestionNumber" name="currentQuestionNumber" />
                                <input type="hidden" value="{{ $ujian->detailujian->count() }}" id="totalOfQuestion"
                                    name="totalOfQuestion" />
                                <input type="hidden" value="[]" id="markedQuestion" name="markedQuestions" />
                                <!-- END SOAL -->
                            </div>
                        </form>

                        <!-- Exmas Footer - Multi Step Pages Footer -->
                        <div class="row">
                            <div class="col-lg-12 exams-footer">
                                <div class="row pb-3">
                                    <div class="col-sm-1 back-to-prev-question-wrapper text-center mt-3">
                                        <a href="javascript:void(0);" id="back-to-prev-question" class="btn btn-primary disabled">
                                            Back
                                        </a>
                                    </div>

                                    <div class="col-sm-2 footer-question-number-wrapper text-center mt-3">
                                        <div>
                                            <span id="current-question-number-label">1</span>
                                            <span>Dari <b>{{ $ujian->detailujian->count() }}</b></span>
                                        </div>
                                        <div>
                                            Nomor Soal
                                        </div>
                                    </div>
                                    <div class="col-sm-1 go-to-next-question-wrapper text-center mt-3">
                                        <a href="javascript:void(0);" id="go-to-next-question" class="btn btn-primary">
                                            Next
                                        </a>
                                    </div>

                                    <div class="col-sm-3 text-center mt-3 ragu-container">
                                        @php
                                            $no = 1;
                                            $hidden = '';
                                        @endphp
                                        @foreach ($pg_siswa as $soal)
                                            <div class="question {{ $hidden }} question-{{ $no }} ragus ragus-{{ $no }}" data-question="{{ $no }}">
                                                <a href="javascript:void(0);" class="btn btn-warning">
                                                    <input type="checkbox" class="ragu" id="ragu{{ $soal->detailujian->id }}" data-id_pg="{{ $soal->id }}" data-mark_name="{{ $soal->detailujian->id }}" data-question="{{ $no }}" @if($soal->ragu !== null ) checked @endif>
                                                    <label for="ragu{{ $soal->detailujian->id }}" class="mb-0 text-white">Ragu - Ragu</label>
                                                </a>
                                            </div>
                                            @php
                                                $no++;
                                                $hidden = 'hidden';
                                            @endphp
                                        @endforeach
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-3" id="quick-access-section" class="table-responsive">
                        <div class="widget shadow p-3">
                            <div class="widget-heading pl-2 pt-2" style="border-bottom: 1px solid #e0e6ed;">
                                <h6 style="font-weight: bold;">Nomor Soal</h6>
                            </div>
                            <div class="widget-content">
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($pg_siswa as $soal)
                                <div class="question-response-rows d-inline" data-question="{{ $no }}">
                                    <button class="btn @if($soal->ragu == null && $soal->jawaban == null) btn-white @endif shadow mt-2 question-response-rows-value @if($soal->jawaban !== null ) btn-info @endif @if($soal->ragu !== null ) btn-warning @endif" id="soalId{{ $soal->detailujian->id }}" style="width: 40px; height: 40px; font-weight: bold;">
                                        {{ $no }}
                                    </button>
                                </div>
                                @php
                                    $no++;
                                @endphp
                                @endforeach
                                <div class="mt-3">
                                    <span class="badge badge-info text-info" style="padding: 0px 6px;">-</span> = Sudah dikerjakan
                                    <br>
                                    <span class="badge badge-warning text-warning" style="padding: 0px 6px;">-</span> = Ragu - Ragu
                                    <br>
                                    <span class="badge btn-white" style="color: #cacaca; padding: 0px 6px;">-</span> = Belum dikerjakan
                                </div>
                            </div>
                        </div>
                        <div class="widget shadow p-3 mt-3">
                            <button class="btn btn-primary btn-block kirim-jawaban">Kirim Jawaban</button>
                        </div>
                    </div>

                </div>
            @else
                <div class="row">
                    <div class="col-lg-9">
                        <form id="examwizard-question" action="#" method="POST">
                            <div class="widget shadow p-2">
                                <div class="d-flex float-right">
                                    <div class="badge badge-success" style="font-size: 14px; font-weight: bold;">Tugas Selesai</div>
                                </div>
                                <div>
                                    @php
                                        $no = 1;
                                        $soal_hidden = '';
                                    @endphp
                                    @foreach ($pg_siswa as $soal)
                                        <div class="question {{ $soal_hidden }} question-{{ $no }}" data-question="{{ $no }}">
                                            <div class="widget-heading pl-2 pt-2" style="border-bottom: 1px solid #e0e6ed;">
                                                <div class="">
                                                    <h6 class="" style="font-weight: bold">Soal No. <span
                                                            class="badge badge-primary no-soal" style="font-size: 1rem">{{ $no }}</span>
                                                    </h6>
                                                </div>
                                            </div>

                                            <div class="widget p-3 mt-3">
                                                <div class="widget-heading" style="border-bottom: 1px solid #e0e6ed;">
                                                    <h6 class="question-title color-green" style="word-wrap: break-word">
                                                        {!! $soal->detailujian->soal !!}
                                                    </h6>
                                                </div>
                                                <div class="widget-content mt-3">
                                                    <div class="alert alert-danger hidden"></div>
                                                    <div class="green-radio color-green">
                                                        <ol type="A" style="color: #000; margin-left: -20px;">
                                                            <li class="answer-number">
                                                                <label for="soal{{ $no }}-{{ substr($soal->detailujian->pg_1, 0, 1) }}" class="answer-text" style="color: #000;">
                                                                    <span>{{ substr($soal->detailujian->pg_1, 3, strlen($soal->detailujian->pg_1)) }}</span>
                                                                </label>
                                                            </li>
                                                            <li class="answer-number">
                                                                <label for="soal{{ $no }}-{{ substr($soal->detailujian->pg_2, 0, 1) }}" class="answer-text" style="color: #000;">
                                                                    <span>{{ substr($soal->detailujian->pg_2, 3, strlen($soal->detailujian->pg_2)) }}</span>
                                                                </label>
                                                            </li>
                                                            <li class="answer-number">
                                                                <label for="soal{{ $no }}-{{ substr($soal->detailujian->pg_3, 0, 1) }}" class="answer-text" style="color: #000;">
                                                                    <span>{{ substr($soal->detailujian->pg_3, 3, strlen($soal->detailujian->pg_3)) }}</span>
                                                                </label>
                                                            </li>
                                                            <li class="answer-number">
                                                                <label for="soal{{ $no }}-{{ substr($soal->detailujian->pg_4, 0, 1) }}" class="answer-text" style="color: #000;">
                                                                    <span>{{ substr($soal->detailujian->pg_4, 3, strlen($soal->detailujian->pg_4)) }}</span>
                                                                </label>
                                                            </li>
                                                            <li class="answer-number">
                                                                <label for="soal{{ $no }}-{{ substr($soal->detailujian->pg_5, 0, 1) }}" class="answer-text" style="color: #000;">
                                                                    <span>{{ substr($soal->detailujian->pg_5, 3, strlen($soal->detailujian->pg_5)) }}</span>
                                                                </label>
                                                            </li>
                                                        </ol>
                                                    </div>

                                                    <div class="mt-2" style="font-weight: bold;">
                                                        Jawaban Kamu : 
                                                        @if($soal->jawaban == null) tidak dijawab @endif 
                                                        @if($soal->jawaban !== null) {{ $soal->jawaban }} @endif 
                                                        @if($soal->benar == 1) <span class="badge badge-success ml-1">benar</span> @endif 
                                                        @if($soal->benar == 0) <span class="badge badge-danger ml-1">salah</span> @endif
                                                        @if($soal->ragu == 1) <span class="badge badge-warning">Ragu - Ragu</span> @endif
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                        @php
                                            $soal_hidden = 'hidden';
                                            $no++;
                                        @endphp
                                    @endforeach
                                </div>
                                <!-- SOAL -->

                                <input type="hidden" value="1" id="currentQuestionNumber" name="currentQuestionNumber" />
                                <input type="hidden" value="{{ $ujian->detailujian->count() }}" id="totalOfQuestion"
                                    name="totalOfQuestion" />
                                <input type="hidden" value="[]" id="markedQuestion" name="markedQuestions" />
                                <!-- END SOAL -->
                                @php
                                    $salah = 0;
                                    $benar = 0;
                                    $tidakDijawab = 0;
                                @endphp
                                @foreach ($pg_siswa as $soal)
                                    @if ($soal->benar == '0')
                                        @php $salah++ @endphp
                                    @endif
                                    @if ($soal->benar == '1')
                                        @php $benar++ @endphp
                                    @endif
                                    @if ($soal->benar === null)
                                        @php $tidakDijawab++ @endphp
                                    @endif
                                @endforeach
                                <div class="widget-footer pl-2 py-2 mt-3" style="border-top: 1px solid #e0e6ed; font-weight: bold;">
                                    Hasil Ujian |  
                                    Benar : <span class="badge badge-success mr-1">{{ $benar }}</span>  
                                    Salah : <span class="badge badge-danger mr-1">{{ $salah }}</span> 
                                    Tidak dijawab : <span class="badge btn-white">{{ $tidakDijawab }}</span>
                                </div>

                            </div>
                        </form>

                        <!-- Exmas Footer - Multi Step Pages Footer -->
                        <div class="row">
                            <div class="col-lg-12 exams-footer">
                                <div class="row pb-3">
                                    <div class="col-sm-1 back-to-prev-question-wrapper text-center mt-3">
                                        <a href="javascript:void(0);" id="back-to-prev-question" class="btn btn-primary disabled">
                                            Back
                                        </a>
                                    </div>

                                    <div class="col-sm-2 footer-question-number-wrapper text-center mt-3">
                                        <div>
                                            <span id="current-question-number-label">1</span>
                                            <span>Dari <b>{{ $ujian->detailujian->count() }}</b></span>
                                        </div>
                                        <div>
                                            Nomor Soal
                                        </div>
                                    </div>
                                    <div class="col-sm-1 go-to-next-question-wrapper text-center mt-3">
                                        <a href="javascript:void(0);" id="go-to-next-question" class="btn btn-primary">
                                            Next
                                        </a>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-3" id="quick-access-section" class="table-responsive">
                        <div class="widget shadow p-3">
                            <div class="widget-heading pl-2 pt-2" style="border-bottom: 1px solid #e0e6ed;">
                                <h6 style="font-weight: bold;">Nomor Soal</h6>
                            </div>
                            <div class="widget-content">
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($pg_siswa as $soal)
                                <div class="question-response-rows d-inline" data-question="{{ $no }}">
                                    <button class="btn @if($soal->ragu == null && $soal->jawaban == null) btn-white @endif shadow mt-2 question-response-rows-value @if($soal->jawaban !== null ) btn-info @endif @if($soal->ragu !== null ) btn-warning @endif" id="soalId{{ $soal->detailujian->id }}" style="width: 40px; height: 40px; font-weight: bold;">
                                        {{ $no }}
                                    </button>
                                </div>
                                @php
                                    $no++;
                                @endphp
                                @endforeach
                                <div class="mt-3">
                                    <span class="badge badge-info text-info" style="padding: 0px 6px;">-</span> = Sudah dikerjakan
                                    <br>
                                    <span class="badge badge-warning text-warning" style="padding: 0px 6px;">-</span> = Ragu - Ragu
                                    <br>
                                    <span class="badge btn-white" style="color: #cacaca; padding: 0px 6px;">-</span> = Belum dikerjakan
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endif

        </div>
    @include('ew.ew-s-p')
    <!--  END Soal PG  -->
    @endif


    @if ($check_essay == false)
            <!-- Start Essay -->
            <div class="layout-px-spacing">
                <div class="row layout-top-spacing">
                    <div class="col-lg-12 layout-spacing">
                        <div class="widget shadow p-3">
                            <div class="widget-heading">
                                <h5 class="">{{ $ujian_essay->nama }}</h5>
                                <table class="mt-2">
                                    <tr>
                                        <th>Kelas</th>
                                        <th>: {{ $ujian_essay->kelas->nama_kelas }}</th>
                                    </tr>
                                    <tr>
                                        <th>Mapel</th>
                                        <th>: {{ $ujian_essay->mapel->nama_mapel }}</th>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Soal</th>
                                        <th>: {{ $ujian_essay->detailessay->count() }} Soal</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
    
                @if ($waktu_ujian_essay->selesai == null)    
                    <div class="row">
                        <div class="col-lg-9">
                            <form id="examwizard-question_essay" action="{{ url("/siswa/belajar_essay") }}" method="POST">
                                @csrf
                                <input type="hidden" name="kode" value="{{ $ujian_essay->kode }}">
                                <div class="widget shadow p-2">
                                    <div>
                                        @php
                                            $no = 1;
                                            $soal_hidden = '';
                                        @endphp
                                        @foreach ($essay_siswa as $soal)
                                            <div class="question {{ $soal_hidden }} question-{{ $no }}" data-question="{{ $no }}">
                                                <div class="widget-heading pl-2 pt-2" style="border-bottom: 1px solid #e0e6ed;">
                                                    <div class="">
                                                        <h6 class="" style="font-weight: bold">Soal No. <span
                                                                class="badge badge-primary no-soal" style="font-size: 1rem">{{ $no }}</span>
                                                        </h6>
                                                    </div>
                                                </div>
    
                                                <div class="widget p-3 mt-3">
                                                    <div class="widget-heading" style="border-bottom: 1px solid #e0e6ed;">
                                                        <h6 class="question-title color-green" style="word-wrap: break-word">
                                                            {!! $soal->detailessay->soal !!}
                                                        </h6>
                                                    </div>
                                                    <div class="widget-content mt-3" style="position: relative;">
                                                        <div class="alert alert-danger hidden"></div>
                                                        <div class="timer-check hidden" style="position: absolute; width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.5);">
                                                            <h5 style="display: flex; justify-content: center; align-items: center; margin-top: 30px;">
                                                                <span class="badge badge-danger">Waktu Habis!</span>
                                                            </h5>
                                                        </div>
                                                        <div class="green-radio color-green">
                                                            <textarea name="{{ $soal->detailessay->id }}" data-alternateName="{{ $soal->detailessay->id }}" data-alternateValue="{{ $no }}" id="soal{{ $no }}-{{ $soal->detailessay->id }}" data-essay_siswa="{{ $soal->id }}" data-noSoal="{{ $no }}" class="form-control" placeholder="tuliskan jawaban...">@if($soal->jawaban !== null) {{ $soal->jawaban }} @endif</textarea>
                                                        </div>
                                                    </div>
                                                </div>
    
                                            </div>
    
                                            @php
                                                $soal_hidden = 'hidden';
                                                $no++;
                                            @endphp
                                        @endforeach
                                    </div>
                                    <!-- SOAL -->
    
                                    <input type="hidden" value="1" id="currentQuestionNumber" name="currentQuestionNumber" />
                                    <input type="hidden" value="{{ $ujian_essay->detailessay->count() }}" id="totalOfQuestion"
                                        name="totalOfQuestion" />
                                    <input type="hidden" value="[]" id="markedQuestion" name="markedQuestions" />
                                    <!-- END SOAL -->
                                </div>
                            </form>
    
                            <!-- Exmas Footer - Multi Step Pages Footer -->
                            <div class="row">
                                <div class="col-lg-12 exams-footer">
                                    <div class="row pb-3">
                                        <div class="col-sm-1 back-to-prev-question-wrapper text-center mt-3">
                                            <a href="javascript:void(0);" id="back-to-prev-question" class="btn btn-primary disabled">
                                                Back
                                            </a>
                                        </div>
    
                                        <div class="col-sm-2 footer-question-number-wrapper text-center mt-3">
                                            <div>
                                                <span id="current-question-number-label">1</span>
                                                <span>Dari <b>{{ $ujian_essay->detailessay->count() }}</b></span>
                                            </div>
                                            <div>
                                                Nomor Soal
                                            </div>
                                        </div>
                                        <div class="col-sm-1 go-to-next-question-wrapper text-center mt-3">
                                            <a href="javascript:void(0);" id="go-to-next-question" class="btn btn-primary">
                                                Next
                                            </a>
                                        </div>
    
                                        <div class="col-sm-3 text-center mt-3 ragu-container">
                                            @php
                                                $no = 1;
                                                $hidden = '';
                                            @endphp
                                            @foreach ($essay_siswa as $soal)
                                                <div class="question {{ $hidden }} question-{{ $no }} ragus ragus-{{ $no }}" data-question="{{ $no }}">
                                                    <a href="javascript:void(0);" class="btn btn-warning">
                                                        <input type="checkbox" class="ragu" id="ragu{{ $soal->detailessay->id }}" data-id_essay="{{ $soal->id }}" data-mark_name="{{ $soal->detailessay->id }}" data-question="{{ $no }}" @if($soal->ragu !== null ) checked @endif>
                                                        <label for="ragu{{ $soal->detailessay->id }}" class="mb-0 text-white">Ragu - Ragu</label>
                                                    </a>
                                                </div>
                                                @php
                                                    $no++;
                                                    $hidden = 'hidden';
                                                @endphp
                                            @endforeach
                                        </div>
    
                                    </div>
                                </div>
    
                            </div>
    
                        </div>
    
                        <div class="col-lg-3" id="quick-access-section" class="table-responsive">
                            <div class="widget shadow p-3">
                                <div class="widget-heading pl-2 pt-2" style="border-bottom: 1px solid #e0e6ed;">
                                    <h6 style="font-weight: bold;">Nomor Soal</h6>
                                </div>
                                <div class="widget-content">
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($essay_siswa as $soal)
                                    <div class="question-response-rows d-inline" data-question="{{ $no }}">
                                        <button class="btn @if($soal->ragu == null && $soal->jawaban == null) btn-white @endif shadow mt-2 question-response-rows-value @if($soal->jawaban !== null ) btn-info @endif @if($soal->ragu !== null ) btn-warning @endif" id="soalId{{ $soal->detailessay->id }}" style="width: 40px; height: 40px; font-weight: bold;">
                                            {{ $no }}
                                        </button>
                                    </div>
                                    @php
                                        $no++;
                                    @endphp
                                    @endforeach
                                    <div class="mt-3">
                                        <span class="badge badge-info text-info" style="padding: 0px 6px;">-</span> = Sudah dikerjakan
                                        <br>
                                        <span class="badge badge-warning text-warning" style="padding: 0px 6px;">-</span> = Ragu - Ragu
                                        <br>
                                        <span class="badge btn-white" style="color: #cacaca; padding: 0px 6px;">-</span> = Belum dikerjakan
                                    </div>
                                </div>
                            </div>
                            <div class="widget shadow p-3 mt-3">
                                <button class="btn btn-primary btn-block kirim-jawaban_essay">Kirim Jawaban</button>
                            </div>
                        </div>
    
                    </div>
                @else
                    <div class="row">
                        <div class="col-lg-9">
                            <form id="examwizard-question" action="javascript:void(0);" method="POST">
                                @csrf
                                <input type="hidden" name="kode" value="{{ $ujian_essay->kode }}">
                                <div class="widget shadow p-2">
                                    <div class="d-flex float-right">
                                        <div class="badge badge-success" style="font-size: 14px; font-weight: bold;">Tugas Selesai</div>
                                    </div>
                                    <div>
                                        @php
                                            $no = 1;
                                            $soal_hidden = '';
                                        @endphp
                                        @foreach ($essay_siswa as $soal)
                                            <div class="question {{ $soal_hidden }} question-{{ $no }}" data-question="{{ $no }}">
                                                <div class="widget-heading pl-2 pt-2" style="border-bottom: 1px solid #e0e6ed;">
                                                    <div class="">
                                                        <h6 class="" style="font-weight: bold">Soal No. <span
                                                                class="badge badge-primary no-soal" style="font-size: 1rem">{{ $no }}</span>
                                                        </h6>
                                                    </div>
                                                </div>
    
                                                <div class="widget p-3 mt-3">
                                                    <div class="widget-heading" style="border-bottom: 1px solid #e0e6ed;">
                                                        <h6 class="question-title color-green" style="word-wrap: break-word">
                                                            {!! $soal->detailessay->soal !!}
                                                        </h6>
                                                    </div>
                                                    <div class="widget-content mt-3" style="position: relative;">
                                                        <div class="alert alert-danger hidden"></div>
                                                        <div class="green-radio color-green">
                                                            <textarea name="{{ $soal->detailessay->id }}" data-alternateName="{{ $soal->detailessay->id }}" data-alternateValue="{{ $no }}" id="soal{{ $no }}-{{ $soal->detailessay->id }}" data-essay_siswa="{{ $soal->id }}" data-noSoal="{{ $no }}" class="form-control" placeholder="Tidak Dijawab..." contenteditable readonly style="background-color: #fff !important">@if($soal->jawaban !== null){{ $soal->jawaban }}@endif</textarea>
                                                        </div>
                                                        <p class="mt-2" style="font-weight: bold">Nilai : {{ ($soal->nilai == null) ? 'belum dinilai' : $soal->nilai }}</p>
                                                    </div>
                                                    <div class="widget-footer pt-2" style="border-top: 1px solid #e0e6ed; font-weight: bold;">
                                                        Total Nilai : {{ $essay_siswa->sum('nilai') }}
                                                    </div>
                                                </div>
    
                                            </div>
    
                                            @php
                                                $soal_hidden = 'hidden';
                                                $no++;
                                            @endphp
                                        @endforeach
                                    </div>
                                    <!-- SOAL -->
    
                                    <input type="hidden" value="1" id="currentQuestionNumber" name="currentQuestionNumber" />
                                    <input type="hidden" value="{{ $ujian_essay->detailessay->count() }}" id="totalOfQuestion"
                                        name="totalOfQuestion" />
                                    <input type="hidden" value="[]" id="markedQuestion" name="markedQuestions" />
                                    <!-- END SOAL -->
                                </div>
                            </form>
    
                            <!-- Exmas Footer - Multi Step Pages Footer -->
                            <div class="row">
                                <div class="col-lg-12 exams-footer">
                                    <div class="row pb-3">
                                        <div class="col-sm-1 back-to-prev-question-wrapper text-center mt-3">
                                            <a href="javascript:void(0);" id="back-to-prev-question" class="btn btn-primary disabled">
                                                Back
                                            </a>
                                        </div>
    
                                        <div class="col-sm-2 footer-question-number-wrapper text-center mt-3">
                                            <div>
                                                <span id="current-question-number-label">1</span>
                                                <span>Dari <b>{{ $ujian_essay->detailessay->count() }}</b></span>
                                            </div>
                                            <div>
                                                Nomor Soal
                                            </div>
                                        </div>
                                        <div class="col-sm-1 go-to-next-question-wrapper text-center mt-3">
                                            <a href="javascript:void(0);" id="go-to-next-question" class="btn btn-primary">
                                                Next
                                            </a>
                                        </div>
    
                                    </div>
                                </div>
    
                            </div>
    
                        </div>
    
                        <div class="col-lg-3" id="quick-access-section" class="table-responsive">
                            <div class="widget shadow p-3">
                                <div class="widget-heading pl-2 pt-2" style="border-bottom: 1px solid #e0e6ed;">
                                    <h6 style="font-weight: bold;">Nomor Soal</h6>
                                </div>
                                <div class="widget-content">
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($essay_siswa as $soal)
                                    <div class="question-response-rows d-inline" data-question="{{ $no }}">
                                        <button class="btn @if($soal->ragu == null && $soal->jawaban == null) btn-white @endif shadow mt-2 question-response-rows-value @if($soal->jawaban !== null ) btn-info @endif @if($soal->ragu !== null ) btn-warning @endif" id="soalId{{ $soal->detailessay->id }}" style="width: 40px; height: 40px; font-weight: bold;">
                                            {{ $no }}
                                        </button>
                                    </div>
                                    @php
                                        $no++;
                                    @endphp
                                    @endforeach
                                    <div class="mt-3">
                                        <span class="badge badge-info text-info" style="padding: 0px 6px;">-</span> = Sudah dikerjakan
                                        <br>
                                        <span class="badge badge-warning text-warning" style="padding: 0px 6px;">-</span> = Ragu - Ragu
                                        <br>
                                        <span class="badge btn-white" style="color: #cacaca; padding: 0px 6px;">-</span> = Belum dikerjakan
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </div>
                @endif
    
            </div>
    @include('ew.ew-s-e')
    <!--  END Essay  -->

    @endif

    <!--  END CONTENT AREA  -->
    @include('template.footer')
</div>


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