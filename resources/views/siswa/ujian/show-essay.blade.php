@extends('template.main')
@section('content')
    @include('template.navbar.siswa')
    <style>
        .btn-white{
            background: #cacaca;
            color: #fff;
        }
        
        .hidden{
            display: none;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
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
                                    <th>: {{ $ujian->detailessay->count() }} Soal</th>
                                </tr>
                                <tr>
                                    <th>Waktu Ujian</th>
                                    <th>: {{ $ujian->jam }} Jam {{ $ujian->menit }} Menit</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            @if ($waktu_ujian->selesai == null)    
                <div class="row">
                    <div class="col-lg-9">
                        <form id="examwizard-question" action="{{ url("/siswa/ujian_essay") }}" method="POST">
                            @csrf
                            <input type="hidden" name="kode" value="{{ $ujian->kode }}">
                            <div class="widget shadow p-2">
                                <div class="d-flex float-right">
                                    <div class="badge badge-primary" style="font-size: 18px; font-weight: bold;"><span data-feather="clock"></span> | <span class="jam_skrng">00 : 00 : 00</span></div>
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
                                <input type="hidden" value="{{ $ujian->detailessay->count() }}" id="totalOfQuestion"
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
                                            <span>Dari <b>{{ $ujian->detailessay->count() }}</b></span>
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
                            <button class="btn btn-primary btn-block kirim-jawaban">Kirim Jawaban</button>
                        </div>
                    </div>

                </div>
            @else
                <div class="row">
                    <div class="col-lg-9">
                        <form id="examwizard-question" action="javascript:void(0);" method="POST">
                            @csrf
                            <input type="hidden" name="kode" value="{{ $ujian->kode }}">
                            <div class="widget shadow p-2">
                                <div class="d-flex float-right">
                                    <div class="badge badge-success" style="font-size: 14px; font-weight: bold;">ujian selesai</div>
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
                                <input type="hidden" value="{{ $ujian->detailessay->count() }}" id="totalOfQuestion"
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
                                            <span>Dari <b>{{ $ujian->detailessay->count() }}</b></span>
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
        @include('template.footer')
    </div>
    <!--  END CONTENT AREA  -->
    {!! session('pesan') !!}
    @include('ew.ew-s-e')
@endsection
