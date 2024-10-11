<body>
    <header class="header_area">
        <div class="top_menu row m0">
            <div class="container">
                <div class="float-left">
                    <ul class="list header_social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        <li><a href="#"><i class="fa fa-github"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="float-right">
                    <a class="dn_btn" href="mailto:#">pkbmmesra@gmail.com</a>
                </div>
            </div>
        </div>

        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
        
                    <a class="navbar-brand logo_h" href="{{ url('/') }}">
         
                        <h4>E - MesraMedia </h4>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
             
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item" id="nav"><a class="nav-link" href="{{ url('/') }}">Beranda</a></li>
                            {{-- <li class="nav-item" id="navtentang"><a class="nav-link" href="{{ url('tentang') }}">Tentang</a>
                            </li>
                            <li class="nav-item submenu dropdown" id="navpelajaran">
                                <a href="{{ url('pelajaran') }}" class="nav-link dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Pelajaran</a>
                            </li> --}}
                            <li class="nav-item" id="navkontak"><a class="nav-link" href="{{ url('kontak') }}">Kontak</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{url('/login')}}">Masuk</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>