<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>E-MesraMedia | {{ $title }}</title>
    {{-- <link rel="icon" type="image/x-icon" href="{{ url('/assets/img') }}/" /> --}}
    <link href="{{ url('/assets/backend') }}/assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="{{ url('/assets/backend') }}/assets/js/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="{{ url('/assets/backend') }}/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/assets/backend') }}/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    {{-- PLUGIN --}}
    <link href="{{ url('/assets/backend') }}/plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/assets/backend') }}/assets/css/components/custom-sweetalert.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('/assets/backend') }}/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <script src="{{ url('/assets/backend') }}/assets/js/libs/jquery-3.1.1.min.js"></script>
    {!! $plugin !!}
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ url('/assets/backend') }}/plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="{{ url('/assets/backend') }}/plugins/sweetalerts/custom-sweetalert.js"></script>
    <script src="{{ url('/assets/backend') }}/bootstrap/js/popper.min.js"></script>
    <script src="{{ url('/assets/backend') }}/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ url('/assets/backend') }}/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ url('/assets/backend') }}/assets/js/app.js"></script>
    <script src="{{ url('/assets/backend') }}/plugins/font-icons/feather/feather.min.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ url('/assets/backend') }}/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ url('/assets/backend') }}/assets/js/scrollspyNav.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <style>
        .btn {
            padding-left: 0.6rem;
            padding-right: 0.6rem;
        }
    </style>

</head>

<body class="sidebar-noneoverflow">
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->
    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">

            <ul class="navbar-nav theme-brand flex-row  text-center">
                <li class="nav-item theme-logo">
                    <a href="">
                        {{-- <img src="{{ url('/assets/img') }}/" class="navbar-logo" alt="logo"> --}}
                        <h3>Pembelajaran Online</h3>
                    </a>
                </li>
                <li class="nav-item theme-text">
                    <a href="" class="nav-link"></a>
                </li>
                <li class="nav-item toggle-sidebar">
                    <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-list">
                            <line x1="8" y1="6" x2="21" y2="6"></line>
                            <line x1="8" y1="12" x2="21" y2="12"></line>
                            <line x1="8" y1="18" x2="21" y2="18"></line>
                            <line x1="3" y1="6" x2="3" y2="6"></line>
                            <line x1="3" y1="12" x2="3" y2="12"></line>
                            <line x1="3" y1="18" x2="3" y2="18"></line>
                        </svg>
                    </a>
                </li>
            </ul>
            <ul class="navbar-item flex-row search-ul">
            </ul>
            <ul class="navbar-item flex-row navbar-dropdown">

                @if (session('siswa'))
                    <li class="nav-item dropdown notification-dropdown">
                        <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span data-feather="bell"></span>
                            @if ($notif_tugas->count() > 0 || $notif_materi->count() > 0 || $notif_ujian->count() > 0)
                                <span class="badge badge-danger"></span>
                            @endif
                        </a>
                        <div class="dropdown-menu position-absolute animated fadeInUp"
                            aria-labelledby="notificationDropdown">
                            <div class="notification-scroll">
                                @if ($notif_tugas->count() > 0 || $notif_materi->count() > 0 || $notif_ujian->count() > 0)

                                    @foreach ($notif_materi as $nm)
                                        <a href="{{ url('/siswa/materi/' . $nm->kode) }}">
                                            <div class="dropdown-item">
                                                <div class="media server-log">
                                                    <span data-feather="book-open"></span>
                                                    <div class="media-body">
                                                        <div class="data-info">
                                                            <h6 class="">{{ $nm->materi->nama_materi }}</h6>
                                                            <p class="">{{ $nm->materi->mapel->nama_mapel }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach

                                    @foreach ($notif_tugas as $nt)
                                        <a href="{{ url('/siswa/tugas/' . $nt->kode) }}">
                                            <div class="dropdown-item">
                                                <div class="media">
                                                    <span data-feather="file-text"></span>
                                                    <div class="media-body">
                                                        <div class="data-info">
                                                            <h6 class="">{{ $nt->tugas->nama_tugas }}</h6>
                                                            <p class="">{{ $nt->tugas->mapel->nama_mapel }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach

                                    @foreach ($notif_ujian as $nu)
                                        <a href="{{ url('/siswa/ujian/' . $nu->kode) }}">
                                            <div class="dropdown-item">
                                                <div class="media file-upload">
                                                    <span data-feather="cast"></span>
                                                    <div class="media-body">
                                                        <div class="data-info">
                                                            <h6 class="">{{ $nu->ujian->nama }}</h6>
                                                            <p class="">{{ $nu->ujian->mapel->nama_mapel }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                @else
                                    <div class="dropdown-item">
                                        <div class="media server-log">
                                            <div class="media-body">
                                                <div class="data-info">
                                                    <p class="">Belum ada Pemberitahuan</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </li>
                @endif

                <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span data-feather="settings"></span>
                    </a>
                    <div class="dropdown-menu position-absolute animated fadeInUp"
                        aria-labelledby="userProfileDropdown">
                        <div class="user-profile-section">
                            <div class="media mx-auto">
                                @if (session('admin'))
                                    <img src="{{ asset('assets/user-profile/' . $admin->avatar) }}"
                                        class="img-fluid mr-2 bg-white" alt="avatar">
                                    <div class="media-body">
                                        <h5>{{ $admin->nama_admin }}</h5>
                                        <p>ADMIN</p>
                                    </div>
                                    @php
                                        $link_profile = '/admin/profile';
                                    @endphp
                                @endif
                                @if (session('guru'))
                                    <img src="{{ asset('assets/user-profile/' . $guru->avatar) }}"
                                        class="img-fluid mr-2 bg-white" alt="avatar">
                                    <div class="media-body">
                                        <h5>{{ $guru->nama_guru }}</h5>
                                        <p>GURU E-MesraMedia</p>
                                    </div>
                                    @php
                                        $link_profile = '/guru/profile';
                                    @endphp
                                @endif
                                @if (session('siswa'))
                                    <img src="{{ asset('assets/user-profile/' . $siswa->avatar) }}"
                                        class="img-fluid mr-2 bg-white" alt="avatar">
                                    <div class="media-body">
                                        <h5>{{ $siswa->nama_siswa }}</h5>
                                        <p>SISWA E-MesraMedia</p>
                                    </div>
                                    @php
                                        $link_profile = '/siswa/profile';
                                    @endphp
                                @endif
                            </div>
                        </div>
                        <div class="dropdown-item">
                            <a href="{{ url("$link_profile") }}">
                                <span data-feather="user"></span> <span>My Profile</span>
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a href="{{ url('/logout') }}" class="logout">
                                <span data-feather="log-out"></span> <span>Log Out</span>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!-- Content -->
        @yield('content');

    </div>
    <!-- END MAIN CONTAINER -->
    <script>
        $(".logout").on("click",function(t){t.preventDefault();var n=$(this).attr("href");swal({title:"yakin logout?",text:"anda harus login ulang untuk masuk ke aplikasi!",type:"warning",showCancelButton:!0,cancelButtonText:"tidak",confirmButtonText:"ya, logout",padding:"2em"}).then(function(t){t.value&&(document.location.href=n)}),$("#swal2-container").css("z-index","9999")}),feather.replace();
    </script>
</body>


</html>
