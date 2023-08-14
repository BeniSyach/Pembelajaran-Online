@extends('template.main')
@section('content')
    @include('template.navbar.guru')

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
            {{-- soal ujian & jawaban --}}
            <div id="toggleAccordion" class="shadow">
                <div class="card">
                    <div class="card-header bg-white" id="...">
                        <section class="mb-0 mt-0">
                            <div role="menu" class="" data-toggle="collapse" data-target="#defaultAccordionOne" aria-expanded="true" aria-controls="defaultAccordionOne" style="cursor: pointer;">
                                Soal Ujian & Jawaban (Klik untuk lihat & tutup)
                            </div>
                        </section>
                    </div>

                    <div id="defaultAccordionOne" class="collapse show" aria-labelledby="..." data-parent="#toggleAccordion">
                        <div class="card-body">
                        
                            <div class="row">
                                <div class="col-lg-9">
                                    <form id="examwizard-question" action="#" method="POST">
                                        <div class="widget shadow p-2">
                                            <div>
                                                @php
                                                    $no = 1;
                                                    $soal_hidden = '';
                                                @endphp
                                                @foreach ($ujian->detailessay as $soal)
                                                    <div class="question {{ $soal_hidden }} question-{{ $no }}"
                                                        data-question="{{ $no }}">
                                                        <div class="widget-heading pl-2 pt-2" style="border-bottom: 1px solid #e0e6ed;">
                                                            <div class="">
                                                                <h6 class="" style="font-weight: bold">Soal No. <span
                                                                        class="badge badge-primary no-soal">{{ $no }}</span>
                                                                </h6>
                                                            </div>
                                                        </div>

                                                        <div class="widget p-3 mt-3">
                                                            <div class="widget-heading" style="min-height: 150px;">
                                                                <h6 class="question-title color-green" style="word-wrap: break-word">
                                                                    {!! $soal->soal !!}
                                                                </h6>
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

                                </div>

                                <div class="col-lg-3" id="quick-access-section" class="table-responsive">
                                    <div class="widget shadow p-3">
                                        <div class="widget-content">
                                            <table class="table text-center table-hover">
                                                <thead class="question-response-header">
                                                    <tr>
                                                        <th class="text-center">No. Soal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach ($ujian->detailessay as $soal)
                                                        <tr class="question-response-rows" data-question="{{ $no }}"
                                                            style="cursor: pointer;">
                                                            <td style="font-weight: bold;">{{ $no }}</td>
                                                        </tr>
                                                        @php
                                                            $no++;
                                                        @endphp
                                                    @endforeach

                                                </tbody>
                                            </table>
                                            <div class="text-nowrap text-center">
                                                <a href="javascript:void(0)" class="btn btn-success" id="quick-access-prev">
                                                    &laquo;
                                                </a>
                                                <span class="alert alert-info" id="quick-access-info"></span>
                                                <a href="javascript:void(0)" class="btn btn-success" id="quick-access-next">&raquo;</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Exmas Footer - Multi Step Pages Footer -->
                            <div class="row mt-3">
                                <div class="col-lg-12 exams-footer p-3">
                                    <div class="row">
                                        <div class="col-sm-1 back-to-prev-question-wrapper text-center">
                                            <a href="javascript:void(0);" id="back-to-prev-question" class="btn btn-success disabled">
                                                Back
                                            </a>
                                        </div>
                                        <div class="col-sm-2 footer-question-number-wrapper text-center">
                                            <div>
                                                <span id="current-question-number-label">1</span>
                                                <span>Dari <b>{{ $ujian->detailessay->count() }}</b></span>
                                            </div>
                                            <div>
                                                Nomor Soal
                                            </div>
                                        </div>
                                        <div class="col-sm-1 go-to-next-question-wrapper text-center">
                                            <a href="javascript:void(0);" id="go-to-next-question" class="btn btn-success">
                                                Next
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>


            {{-- Ujian siswa & nilai --}}
            <div id="iconsAccordion" class="accordion-icons shadow mt-3">
                <div class="card">
                    <div class="card-header bg-white" id="...">
                        <section class="mb-0 mt-0">
                            <div role="menu" class="" data-toggle="collapse" data-target="#iconAccordionOne" aria-expanded="true" aria-controls="iconAccordionOne" style="cursor: pointer;">
                                Nilai Siswa (Klik untuk lihat & tutup)
                            </div>
                        </section>
                    </div>

                    <div id="iconAccordionOne" class="collapse show" aria-labelledby="..." data-parent="#iconsAccordion">
                        <div class="card-body">
                        
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="widget p-3 shadow">
                                        <div class="widget-heading pl-2 pb-2" style="border-bottom: 1px solid #e0e6ed;">
                                            Nilai Siswa
                                        </div>

                                        <div class="widget-content pt-3">
                                            <a href="{{ url('/guru/essay_cetak/' . $ujian->kode) }}" class="btn btn-info btn-sm" target="_blank"><span data-feather="printer"></span> Cetak</a>
                                            <a href="{{ url('/guru/essay_ekspor/' . $ujian->kode) }}" class="btn btn-success btn-sm" target="_blank"><span data-feather="file-text"></span> Ekspor Excel</a>
                                            <div class="table-responsive mt-3">
                                                <table class="table table-bordered text-nowrap">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>Nama Siswa</th>
                                                            <th>Soal Dijawab</th>
                                                            <th>Tidak dijawab</th>
                                                            <th>Total Nilai</th>
                                                            <th>opsi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($ujian->waktuujian as $s)
                                                            @if ($s->selesai == null)
                                                                <tr class="text-center">
                                                                    <td>{{ $s->siswa->nama_siswa }}</td>
                                                                    <td colspan="4">Belum Mengerjakan Tugas</td>
                                                                </tr>
                                                            @else
                                                                <tr class="text-center">
                                                                    @php
                                                                        $soalDijawab = 0;
                                                                        $tidakDijawab = 0;
                                                                    @endphp
                                                                    @foreach ($s->essaysiswa as $soal)
                                                                        @if ($soal->kode == $ujian->kode)
                                                                            @if ($soal->jawaban == null)
                                                                                @php $tidakDijawab++ @endphp
                                                                            @endif
                                                                            @if ($soal->benar !== 1)
                                                                                @php $soalDijawab++ @endphp
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                    <td>{{ $s->siswa->nama_siswa }}</td>
                                                                    <td>{{ $soalDijawab }}</td>
                                                                    <td>{{ $tidakDijawab }}</td>
                                                                    <td>{{ $s->essaysiswa->sum('nilai') }}</td>
                                                                    <td>
                                                                        <a href="{{ url("/guru/ujian_essay/" . $ujian->kode . "/" . $s->siswa->id) }}" class="btn btn-info"><span data-feather="eye"></span></a>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <a href="{{ url('/guru/ujian') }}" class="btn btn-danger btn-sm mt-3"><span data-feather="arrow-left-circle"></span> kembali</a>
        </div>
        @include('template.footer')
    </div>
    <!--  END CONTENT AREA  -->
    {!! session('pesan') !!}
    @include('ew.ew-t-e')
@endsection
