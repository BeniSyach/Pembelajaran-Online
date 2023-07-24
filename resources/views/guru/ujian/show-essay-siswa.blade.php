@extends('template.main')
@section('content')
    @include('template.navbar.guru')


    <style>
        .btn-white{
            background: #cacaca;
            color: #fff;
        }
    </style>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-lg-12">
                    <div class="widget shadow p-3">
                        <div class="widget-heading">
                            <h6 class="text-center">{{ $ujian->nama }}</h6>
                            Nama Siswa : {{ $siswa->nama_siswa }}
                        </div>

                        <div class="widget-content">
                            <div class="row">
                                <div class="col-lg-9">
                                    <form id="examwizard-question" action="javascript:void(0);" method="POST">
                                        @csrf
                                        <input type="hidden" name="kode" value="{{ $ujian->kode }}">
                                        <div class="widget shadow p-2">
                                            <div>
                                                @php
                                                    $no = 1;
                                                    $soal_hidden = '';
                                                @endphp
                                                @foreach ($ujian_siswa as $soal)
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
                                                                <input type="number" name="nilai" class="form-control" class="nilai" placeholder="input nilai disini" data-id="{{ $soal->id }}">
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
                                            <input type="hidden" value="{{ $ujian_siswa->count() }}" id="totalOfQuestion"
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
                                                        <span>Dari <b>{{ $ujian_siswa->count() }}</b></span>
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
                                            @foreach ($ujian_siswa as $soal)
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
                        </div>

                    </div>
                </div>
            </div>

            <a href="{{ url('/guru/ujian_essay/' . $ujian->kode) }}" class="btn btn-danger btn-sm mt-3"><span data-feather="arrow-left-circle"></span> kembali</a>
        </div>
        @include('template.footer')
    </div>
    <!--  END CONTENT AREA  -->
    {!! session('pesan') !!}
    @include('ew.ew-t-e-s')
@endsection
