<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="profile-info">
            <figure class="user-cover-image" style="background: #fafafa"></figure>
            <div class="user-info">
                <img src="{{ asset('assets/user-profile/' . $siswa->avatar) }}" alt="avatar" class="bg-white">
                <h6 class="">{{ $siswa->nama_siswa }}</h6>
                <p class="">SISWA E-MesraMedia</p>
            </div>
        </div>
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu {{ ($menu['menu'] == 'dashboard') ? 'active' : ''; }}">
                <a href="{{ url("/siswa") }}" aria-expanded="{{ ($menu['expanded'] == 'dashboard') ? 'true' : 'false'; }}" class="dropdown-toggle">
                    <div class="">
                        <span data-feather="airplay"></span>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>
            <li class="menu menu-heading">
                <div class="heading">
                    <span data-feather="minus"></span>
                    <span>SEKOLAH MERDEKA</span>
                </div>
            </li>
            <!--Kelompok Belajar-->
            <li class="menu {{ ($menu['menu'] == 'absen') ? 'active' : ''; }}">
                <a href="{{ url("/siswa/absen") }}" aria-expanded="{{ ($menu['expanded'] == 'absen') ? 'true' : 'false'; }}" class="dropdown-toggle">
                    <div class="">
                        <span data-feather="book"></span>
                        <span>Absen</span>
                    </div>
                </a>
            </li>
            <li class="menu {{ ($menu['menu'] == 'belajar') ? 'active' : ''; }}">
                <a href="{{ url("/siswa/belajar") }}" aria-expanded="{{ ($menu['expanded'] == 'belajar') ? 'true' : 'false'; }}" class="dropdown-toggle">
                    <div class="">
                        <span data-feather="book-open"></span>
                        <span>Belajar</span>
                    </div>
                </a>
            </li>
            <li class="menu {{ ($menu['menu'] == 'nilai') ? 'active' : ''; }}">
                <a href="{{ url("/siswa/nilai") }}" aria-expanded="{{ ($menu['expanded'] == 'nilai') ? 'true' : 'false'; }}" class="dropdown-toggle">
                    <div class="">
                        <span data-feather="book-open"></span>
                        <span>Nilai</span>
                    </div>
                </a>
            </li>
            {{-- <li class="menu {{ ($menu['menu'] == 'materi') ? 'active' : ''; }}">
                <a href="{{ url("/siswa/materi") }}" aria-expanded="{{ ($menu['expanded'] == 'materi') ? 'true' : 'false'; }}" class="dropdown-toggle">
                    <div class="">
                        <span data-feather="book-open"></span>
                        <span>Materi</span>
                    </div>
                </a>
            </li>
            <li class="menu {{ ($menu['menu'] == 'tugas') ? 'active' : ''; }}">
                <a href="{{ url("/siswa/tugas") }}" aria-expanded="{{ ($menu['expanded'] == 'tugas') ? 'true' : 'false'; }}" class="dropdown-toggle">
                    <div class="">
                        <span data-feather="book"></span>
                        <span>Tugas</span>
                    </div>
                </a>
            </li>
            <li class="menu {{ ($menu['menu'] == 'ujian') ? 'active' : ''; }}">
                <a href="{{ url("/siswa/ujian") }}" aria-expanded="{{ ($menu['expanded'] == 'ujian') ? 'true' : 'false'; }}" class="dropdown-toggle">
                    <div class="">
                        <span data-feather="cast"></span>
                        <span>Ujian</span>
                    </div>
                </a>
            </li> --}}
            <li class="menu menu-heading">
                <div class="heading">
                    <span data-feather="minus"></span>
                    <span>USER MENU</span>
                </div>
            </li>
            <li class="menu {{ ($menu['menu'] == 'profile') ? 'active' : ''; }}">
                <a href="{{ url("/siswa/profile") }}" aria-expanded="{{ ($menu['expanded'] == 'profile') ? 'true' : 'false'; }}" class="dropdown-toggle">
                    <div class="">
                        <span data-feather="user"></span>
                        <span>Profile</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="{{ url("/logout") }}" aria-expanded="false" class="dropdown-toggle logout">
                    <div class="">
                        <span data-feather="log-out"></span>
                        <span>Logout</span>
                    </div>
                </a>
            </li>
        </ul>

    </nav>

</div>
<!--  END SIDEBAR  -->