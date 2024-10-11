@extends('template.main')
@section('content')
    @include('template.navbar.guru')

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-lg-6">
                    <div class="infobox-3 bg-white" style="width: 100%;">
                        <div class="info-icon">
                            <span data-feather="airplay"></span>
                        </div>
                        <h5 class="info-heading">{{ $guru->nama_guru }}</h5>
                        <p class="info-text">data ini diatur oleh administrator., jika ada perubahan bisa hubungi admin</p>
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-group">
                                    <li class="list-group-item bg-primary light text-center">Kelas Saya</li>
                                    @if ($guru_kelas->count() > 0)
                                        @foreach ($guru_kelas as $gk)
                                            <li class="list-group-item">{{ $gk->kelas->nama_kelas }}</li>
                                        @endforeach
                                    @else
                                        <li class="list-group-item">Tidak Ada</li>
                                    @endif
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-group">
                                    <li class="list-group-item bg-primary light text-center">Mapel Saya</li>
                                    @if ($guru_mapel->count() > 0)
                                        @foreach ($guru_mapel as $gm)
                                            <li class="list-group-item">{{ $gm->mapel->nama_mapel }}</li>
                                        @endforeach
                                    @else
                                        <li class="list-group-item">Tidak Ada</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @include('template.footer')
    </div>
    <!--  END CONTENT AREA  -->

    {!! session('pesan') !!}

@endsection