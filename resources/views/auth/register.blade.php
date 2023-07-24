<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ $title }}</title>
    <link rel="icon" type="image/x-icon" href="{{ url("/assets/img") }}/backend.png" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="{{ url("/assets/backend") }}/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url("/assets/backend") }}/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="{{ url("/assets/backend") }}/assets/css/authentication/form-1.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ url("/assets/backend") }}/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="{{ url("/assets/backend") }}/assets/css/forms/switches.css">
    <script src="{{ url("/assets/backend") }}/assets/js/libs/jquery-3.1.1.min.js"></script>
    <link href="{{ url("/assets/backend") }}/plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <script src="{{ url("/assets/backend") }}/plugins/sweetalerts/sweetalert2.min.js"></script>
    <style>
        svg#freepik_stories-mobile-login:not(.animated) .animable {
            opacity: 0;
        }

        svg#freepik_stories-mobile-login.animated #freepik--background-complete--inject-39 {
            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideDown, 1.5s Infinite linear floating;
            animation-delay: 0s, 1s;
        }

        svg#freepik_stories-mobile-login.animated #freepik--Floor--inject-39 {
            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideDown;
            animation-delay: 0s;
        }

        svg#freepik_stories-mobile-login.animated #freepik--Plant--inject-39 {
            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) zoomOut;
            animation-delay: 0s;
        }

        svg#freepik_stories-mobile-login.animated #freepik--Padlock--inject-39 {
            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideDown;
            animation-delay: 0s;
        }

        svg#freepik_stories-mobile-login.animated #freepik--Device--inject-39 {
            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) zoomOut, 1.5s Infinite linear wind;
            animation-delay: 0s, 1s;
        }

        svg#freepik_stories-mobile-login.animated #freepik--speech-bubble--inject-39 {
            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) zoomIn;
            animation-delay: 0s;
        }

        svg#freepik_stories-mobile-login.animated #freepik--Character--inject-39 {
            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideLeft;
            animation-delay: 0s;
        }

        @keyframes slideDown {
            0% {
                opacity: 0;
                transform: translateY(-30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes floating {
            0% {
                opacity: 1;
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                opacity: 1;
                transform: translateY(0px);
            }
        }

        @keyframes zoomOut {
            0% {
                opacity: 0;
                transform: scale(1.5);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes wind {
            0% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(1deg);
            }

            75% {
                transform: rotate(-1deg);
            }
        }

        @keyframes zoomIn {
            0% {
                opacity: 0;
                transform: scale(0.5);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes slideLeft {
            0% {
                opacity: 0;
                transform: translateX(-30px);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>

<body class="form">

    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">
                        <h1 class="">Daftar Akun<br /><span class="brand-name">E-MesraMedia</span></h1>
                        <p class="signup-link">Sudah punya akun? <a href="{{ url("/") }}">Log in</a></p>
                        <form action="{{ url("/register") }}" method="POST" class="text-left" id="myform">
                            @csrf
                            <div class="form">
                                <div id="username-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input type="text" id="username" name="nama" type="text" class="form-control" value="<?= old('nama'); ?>" placeholder="Nama" required>
                                    @error('nama')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror  
                                </div>
                                <div id="email-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign">
                                        <circle cx="12" cy="12" r="4"></circle>
                                        <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                                    </svg>
                                    <input type="email" id="email" name="email" type="text" value="<?= old('email'); ?>" placeholder="Email" required>
                                    @error('email')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror  
                                </div>
                                <div id="password-field" class="field-wrapper input mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input type="password" id="password" name="password" type="password" value="" placeholder="Password" required>
                                    @error('password')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror  
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="laki-laki" name="gender" value="Laki - Laki" class="custom-control-input" @if(old('gender') == "Laki - Laki") checked @endif @if(old('gender') == null) checked @endif>
                                        <label class="custom-control-label" for="laki-laki">Laki Laki</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="Perempuan" name="gender" value="Perempuan" class="custom-control-input" @if(old('gender') == "Perempuan") checked @endif>
                                        <label class="custom-control-label" for="Perempuan">Perempuan</label>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top: 10px;">
                                     @if (old('saya_siswa') != null)
                                        <input type="checkbox" id="saya_siswa" name="saya_siswa" value="1" checked><label for="saya_siswa" style="margin-left: 5px;">Saya Siswa</label>
                                    @else
                                        <input type="checkbox" id="saya_siswa" name="saya_siswa" value="1"><label for="saya_siswa" style="margin-left: 5px;">Saya Siswa</label>
                                    @endif
                                </div>
                                <div class="siswa-field">
                                    <div id="username-field" class="field-wrapper input">
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                            <line x1="4" y1="9" x2="20" y2="9"></line>
                                            <line x1="4" y1="15" x2="20" y2="15"></line>
                                            <line x1="10" y1="3" x2="8" y2="21"></line>
                                            <line x1="16" y1="3" x2="14" y2="21"></line>
                                        </svg>
                                        <input type="text" id="no_induk" name="nis" type="text" class="form-control no-induk" placeholder="Nomor Induk" autocomplete="off">
                                        @error('nis')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror  
                                    </div>
                                    <div id="no_induk-field" class="field-wrapper input">
                                        <select name="kelas_id" id="" class="form-control">
                                            @foreach ($kelas as $k)
                                                <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper toggle-pass">
                                        <p class="d-inline-block">Show Password</p>
                                        <label class="switch s-primary">
                                            <input type="checkbox" id="toggle-password" class="d-none">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">Get Started!</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <p class="terms-conditions" style="margin-top: 30px;">© 2023 E-MesraMedia by <a href="#" target="_blank"></a> All Rights Reserved. <a href="https://www.freepik.com/" target="_blank"></a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-image">
            <div class="l-image d-flex align-center">
                <svg class="animated" id="freepik_stories-mobile-login" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs">
                    <g id="freepik--background-complete--inject-39" class="animable" style="transform-origin: 253.285px 218.165px;">
                        <path d="M466.89,316.2H303V221.36H466.89ZM304,315.2H465.89V222.36H304Z" style="fill: rgb(224, 224, 224); transform-origin: 384.945px 268.78px;" id="elsn9xspix7so" class="animable"></path>
                        <rect x="324.95" y="271.93" width="108.13" height="3.17" style="fill: rgb(240, 240, 240); transform-origin: 379.015px 273.515px;" id="elv9q898r5rxs" class="animable"></rect>
                        <rect x="324.95" y="283.75" width="115.58" height="3.46" style="fill: rgb(240, 240, 240); transform-origin: 382.74px 285.48px;" id="eli37flqblzw9" class="animable"></rect>
                        <rect x="324.95" y="295.71" width="115.58" height="3.46" style="fill: rgb(240, 240, 240); transform-origin: 382.74px 297.44px;" id="elkmqq8wl1fxn" class="animable"></rect>
                        <rect x="324.95" y="254.76" width="37.79" height="8.23" style="fill: rgb(240, 240, 240); transform-origin: 343.845px 258.875px;" id="eld0kte8lqj0e" class="animable"></rect>
                        <rect x="303.53" y="221.86" width="162.86" height="15.1" style="fill: rgb(224, 224, 224); transform-origin: 384.96px 229.41px;" id="eliclmvmxip2i" class="animable"></rect>
                        <path d="M453.86,234.7c-.21-.2,1.89-2.73,4.68-5.65s5.24-5.13,5.44-4.94-1.89,2.73-4.68,5.66S454.06,234.9,453.86,234.7Z" style="fill: rgb(255, 255, 255); transform-origin: 458.919px 229.406px;" id="elg6wyllp4qs" class="animable"></path>
                        <path d="M464,234.7c-.2.2-2.64-2-5.44-4.93s-4.89-5.46-4.68-5.66,2.64,2,5.44,4.94S464.19,234.5,464,234.7Z" style="fill: rgb(255, 255, 255); transform-origin: 458.939px 229.405px;" id="elfzs1j6yipn" class="animable"></path>
                        <rect x="102.36" y="34.05" width="162.86" height="93.85" style="fill: rgb(230, 230, 230); transform-origin: 183.79px 80.975px;" id="elhzykftzi0j5" class="animable"></rect>
                        <rect x="123.79" y="84.13" width="108.13" height="3.17" style="fill: rgb(240, 240, 240); transform-origin: 177.855px 85.715px;" id="ellz2gn30h26f" class="animable"></rect>
                        <rect x="123.79" y="95.95" width="115.58" height="3.46" style="fill: rgb(240, 240, 240); transform-origin: 181.58px 97.68px;" id="elih341uo5ynq" class="animable"></rect>
                        <rect x="123.79" y="107.91" width="115.58" height="3.46" style="fill: rgb(240, 240, 240); transform-origin: 181.58px 109.64px;" id="eld28jety8c7h" class="animable"></rect>
                        <rect x="123.79" y="66.96" width="37.79" height="8.23" style="fill: rgb(240, 240, 240); transform-origin: 142.685px 71.075px;" id="eljunqi352zl8" class="animable"></rect>
                        <rect x="102.36" y="34.05" width="162.86" height="15.1" style="fill: rgb(224, 224, 224); transform-origin: 183.79px 41.6px;" id="elsqxlm4jq70f" class="animable"></rect>
                        <path d="M252.14,46.82c-.21-.19,1.89-2.73,4.68-5.65s5.24-5.13,5.44-4.93-1.89,2.73-4.68,5.65S252.34,47,252.14,46.82Z" style="fill: rgb(255, 255, 255); transform-origin: 257.199px 41.5289px;" id="elun5rftsyd2n" class="animable"></path>
                        <path d="M262.26,46.82c-.2.2-2.64-2-5.44-4.93s-4.89-5.45-4.68-5.65,2.64,2,5.44,4.93S262.47,46.63,262.26,46.82Z" style="fill: rgb(255, 255, 255); transform-origin: 257.2px 41.53px;" id="el596uds03chs" class="animable"></path>
                        <path d="M203.54,208.39H39.68V113.54H203.54Zm-162.86-1H202.54V114.54H40.68Z" style="fill: rgb(224, 224, 224); transform-origin: 121.61px 160.965px;" id="elbpnporn9t8i" class="animable"></path>
                        <rect x="61.61" y="164.12" width="108.13" height="3.17" style="fill: rgb(240, 240, 240); transform-origin: 115.675px 165.705px;" id="elsojkna978bi" class="animable"></rect>
                        <rect x="61.61" y="175.94" width="115.58" height="3.46" style="fill: rgb(240, 240, 240); transform-origin: 119.4px 177.67px;" id="el1nwcgxsuoxh" class="animable"></rect>
                        <rect x="61.61" y="187.9" width="115.58" height="3.46" style="fill: rgb(240, 240, 240); transform-origin: 119.4px 189.63px;" id="el0ifb32owh0if" class="animable"></rect>
                        <rect x="61.61" y="146.95" width="37.79" height="8.23" style="fill: rgb(240, 240, 240); transform-origin: 80.505px 151.065px;" id="elv3vn4im916" class="animable"></rect>
                        <rect x="40.18" y="114.04" width="162.86" height="15.1" style="fill: rgb(224, 224, 224); transform-origin: 121.61px 121.59px;" id="elx1g8htt7v7" class="animable"></rect>
                        <rect x="200.35" y="230.12" width="192.3" height="172.16" style="fill: rgb(230, 230, 230); transform-origin: 296.5px 316.2px;" id="ellle69vywuo" class="animable"></rect>
                        <rect x="59.38" y="175.89" width="150.64" height="156.51" style="fill: rgb(240, 240, 240); transform-origin: 134.7px 254.145px;" id="elckl6e6njzjn" class="animable"></rect>
                        <rect x="59.38" y="175.89" width="150.64" height="17.05" style="fill: rgb(224, 224, 224); transform-origin: 134.7px 184.415px;" id="elvzkei79de9q" class="animable"></rect>
                        <path d="M71.82,184.24a3.16,3.16,0,1,1-3.16-3.3A3.24,3.24,0,0,1,71.82,184.24Z" style="fill: rgb(255, 255, 255); transform-origin: 68.6618px 184.1px;" id="elcfj55a8xg2q" class="animable"></path>
                        <path d="M84.65,184.24a3.17,3.17,0,1,1-3.16-3.3A3.24,3.24,0,0,1,84.65,184.24Z" style="fill: rgb(255, 255, 255); transform-origin: 81.4816px 184.11px;" id="elvccf7oytad" class="animable"></path>
                        <path d="M97.48,184.24a3.17,3.17,0,1,1-3.16-3.3A3.24,3.24,0,0,1,97.48,184.24Z" style="fill: rgb(255, 255, 255); transform-origin: 94.3116px 184.11px;" id="elc6nwkj21wbo" class="animable"></path>
                        <rect x="253.08" y="68.28" width="192.3" height="191.66" style="fill: rgb(240, 240, 240); transform-origin: 349.23px 164.11px;" id="el8aoh4mjc5s4" class="animable"></rect>
                        <rect x="253.08" y="68.28" width="192.3" height="22.45" style="fill: rgb(224, 224, 224); transform-origin: 349.23px 79.505px;" id="elu57f0s9cqb" class="animable"></rect>
                        <path d="M269.46,79.28a4.17,4.17,0,1,1-4.17-4.35A4.27,4.27,0,0,1,269.46,79.28Z" style="fill: rgb(255, 255, 255); transform-origin: 265.292px 79.1px;" id="elvc6rxzoo1dk" class="animable"></path>
                        <path d="M285.13,76.34a4.17,4.17,0,1,1-6-.14A4.25,4.25,0,0,1,285.13,76.34Z" style="fill: rgb(255, 255, 255); transform-origin: 282.062px 79.1817px;" id="el8iezxsam19j" class="animable"></path>
                        <path d="M303.24,79.28a4.17,4.17,0,1,1-4.17-4.35A4.27,4.27,0,0,1,303.24,79.28Z" style="fill: rgb(255, 255, 255); transform-origin: 299.072px 79.1px;" id="elsyd1hk6tfqk" class="animable"></path>
                    </g>
                    <!-- <g id="freepik--Floor--inject-39" class="animable" style="transform-origin: 248.755px 453.13px;">
                        <path d="M403.84,453.13c0,.14-69.44.26-155.07.26s-155.1-.12-155.1-.26,69.43-.26,155.1-.26S403.84,453,403.84,453.13Z" style="fill: rgb(38, 50, 56); transform-origin: 248.755px 453.13px;" id="el8clecfd3lba" class="animable"></path>
                    </g> -->
                    <g id="freepik--Plant--inject-39" class="animable" style="transform-origin: 359.318px 295.667px;">
                        <path d="M336.18,330.71c-15.45-10.79-18.95-30.82-18.34-48.83.1-3-.23-6.18,1.2-8.81s4.77-4.44,7.46-3.18c2.23,1.05,3.2,3.65,4.45,5.8a17.56,17.56,0,0,0,7.05,6.73c1.91,1,4.28,1.6,6.17.56,2.6-1.43,2.9-5,2.88-8q0-8.37-.1-16.72a27.83,27.83,0,0,1,.9-8.88c.93-2.84,3-5.47,5.83-6.27s6.36.85,7,3.77a28.8,28.8,0,0,1,.09,3.72c.08,1.25.66,2.62,1.83,3s2.39-.49,3.29-1.37c3.08-3,5.18-6.91,7.13-10.77s3.86-7.83,6.66-11.12,6.67-5.9,11-6.15,8.84,2.41,9.92,6.61-1.37,8.49-4,11.9a66.87,66.87,0,0,1-13.89,13.25,5.44,5.44,0,0,0-2.33,2.49c-.65,2,1.24,4,3.21,4.63,2.23.74,4.65.51,7,.79s4.85,1.3,5.74,3.5c1.22,3.06-1.34,6.26-3.85,8.36a57.38,57.38,0,0,1-16.92,9.77c-2.2.8-4.51,1.51-6.29,3.05s-2.84,4.23-1.77,6.34,3.82,2.78,6.13,2.35,4.36-1.67,6.56-2.5c4.11-1.55,9.41-1.27,12,2.28a9.46,9.46,0,0,1,1,8.37,21.83,21.83,0,0,1-4.53,7.39A57.63,57.63,0,0,1,364,330c-9.53,3.3-18.36,4.2-27.83.73" style="fill: rgb(60, 79, 177); transform-origin: 359.318px 278.557px;" id="elk9bfqsxdqga" class="animable"></path>
                        <path d="M396.2,226.66s-.09.1-.29.28l-.89.79c-.78.7-1.93,1.72-3.38,3.07a111.61,111.61,0,0,0-11.42,12.33c-2.23,2.77-4.54,5.91-7,9.32s-5,7.09-7.52,11a135.66,135.66,0,0,0-7.37,12.78c-1.16,2.29-2.18,4.68-3.23,7.12L352,290.8a274.85,274.85,0,0,0-10.66,28.77,134,134,0,0,0-5,24.53,97.54,97.54,0,0,0-.28,16.89c.16,2,.31,3.53.45,4.57.06.5.1.9.14,1.19l0,.41a2.09,2.09,0,0,1-.09-.4c-.05-.29-.11-.68-.19-1.18-.18-1-.37-2.58-.55-4.58a92.93,92.93,0,0,1,.1-16.94,131.81,131.81,0,0,1,4.89-24.64,268.42,268.42,0,0,1,10.63-28.84l3.18-7.42c1.05-2.43,2.08-4.84,3.25-7.14a133.92,133.92,0,0,1,7.43-12.81c2.56-4,5.14-7.62,7.57-11s4.78-6.54,7-9.3a106.31,106.31,0,0,1,11.57-12.24c1.48-1.33,2.66-2.33,3.46-3l.93-.75A2.18,2.18,0,0,1,396.2,226.66Z" style="fill: rgb(38, 50, 56); transform-origin: 365.841px 296.91px;" id="eluaijqfan07p" class="animable"></path>
                        <path d="M358,276a6.19,6.19,0,0,1-.29-1.27c-.16-.83-.34-2-.55-3.52-.43-3-.87-7.11-1.34-11.66s-1-8.67-1.44-11.64c-.23-1.48-.43-2.67-.57-3.5a5.4,5.4,0,0,1-.17-1.3,5.53,5.53,0,0,1,.37,1.25c.22.82.47,2,.75,3.49.57,3,1.13,7.08,1.6,11.64s.87,8.56,1.18,11.67c.15,1.4.28,2.59.38,3.54A5.54,5.54,0,0,1,358,276Z" style="fill: rgb(38, 50, 56); transform-origin: 355.824px 259.555px;" id="el5ici7e0t2d2" class="animable"></path>
                        <path d="M396.48,268.82A8,8,0,0,1,395,269c-1,.09-2.42.21-4.18.41-3.52.38-8.36,1.08-13.67,2.08s-10.08,2.13-13.51,3c-1.71.44-3.09.84-4,1.11a7.3,7.3,0,0,1-1.5.36,8.71,8.71,0,0,1,1.44-.57c.94-.33,2.3-.79,4-1.28,3.41-1,8.18-2.19,13.51-3.21A136.16,136.16,0,0,1,390.74,269c1.77-.15,3.2-.21,4.2-.23A7.69,7.69,0,0,1,396.48,268.82Z" style="fill: rgb(38, 50, 56); transform-origin: 377.31px 272.356px;" id="el5ufzkypgqci" class="animable"></path>
                        <path d="M341.3,318.72a2.08,2.08,0,0,1-.26-.47l-.66-1.39c-.57-1.21-1.34-3-2.26-5.19-1.86-4.4-4.23-10.56-6.75-17.4s-4.84-13-6.6-17.45c-.86-2.16-1.57-3.93-2.1-5.25l-.56-1.43a1.93,1.93,0,0,1-.16-.52,2.08,2.08,0,0,1,.26.47l.66,1.39c.56,1.21,1.34,3,2.26,5.19,1.86,4.4,4.23,10.56,6.75,17.4s4.84,13,6.6,17.45c.86,2.16,1.57,3.93,2.09,5.25.23.57.42,1,.57,1.43A1.93,1.93,0,0,1,341.3,318.72Z" style="fill: rgb(38, 50, 56); transform-origin: 331.625px 294.17px;" id="elvh2blgn9tx" class="animable"></path>
                        <path d="M392.38,302.25a2.12,2.12,0,0,1-.51.21l-1.48.5-5.47,1.77c-4.62,1.5-11,3.64-18,6s-13.41,4.46-18.06,5.86c-2.32.71-4.21,1.25-5.52,1.61l-1.51.39a2.59,2.59,0,0,1-.54.11,2.12,2.12,0,0,1,.51-.21l1.48-.5,5.47-1.77c4.62-1.5,11-3.64,18-6s13.4-4.46,18.05-5.86c2.33-.71,4.21-1.25,5.53-1.61l1.51-.39A2.59,2.59,0,0,1,392.38,302.25Z" style="fill: rgb(38, 50, 56); transform-origin: 366.835px 310.475px;" id="elq9j8z37rx2" class="animable"></path>
                    </g>
                    <g id="freepik--Padlock--inject-39" class="animable" style="transform-origin: 354.572px 88.5349px;">
                        <path d="M371.54,59.68l-5.15,1.84-2.21-6.73c-4.06-12.41-17-19-28.89-14.81s-18.22,17.8-14.16,30.21l2.21,6.73-5.17,1.85a8.22,8.22,0,0,0-4.82,10.28l14.33,43.79a7.73,7.73,0,0,0,9.86,5.11l53.37-19.09a8.26,8.26,0,0,0,4.87-10.38L381.44,64.69A7.71,7.71,0,0,0,371.54,59.68Zm-40.68,7a13.19,13.19,0,0,1,7.76-16.55,12.36,12.36,0,0,1,15.83,8.11l2.2,6.73-23.59,8.44Zm30,38.86,3.66,11.18a.91.91,0,0,1-.57,1.12l-5.13,1.83a.82.82,0,0,1-1-.54L354.13,108a10,10,0,0,1-9-7,10.51,10.51,0,0,1,6.19-13.18,9.85,9.85,0,0,1,12.61,6.46A10.68,10.68,0,0,1,360.87,105.57Z" style="fill: rgb(60, 79, 177); transform-origin: 354.572px 88.5349px;" id="el2ge7asex0wf" class="animable"></path>
                        <path d="M366.16,61.4c0,.14-9.55,3.73-21.43,8S323.16,77.1,323.11,77s9.55-3.72,21.44-8S366.11,61.27,366.16,61.4Z" style="fill: rgb(38, 50, 56); transform-origin: 344.635px 69.1993px;" id="eljyngoxx3qwb" class="animable"></path>
                        <path d="M377.5,63.24a1.75,1.75,0,0,1,.11.27c.08.2.17.46.29.78.26.73.62,1.74,1.07,3l3.84,11.18c1.6,4.74,3.51,10.36,5.63,16.6,1,3.13,2.18,6.39,3.28,9.82a15,15,0,0,1,.75,5.49,7.37,7.37,0,0,1-.81,2.77,7.64,7.64,0,0,1-1.89,2.23,18,18,0,0,1-5.08,2.59l-5.15,1.85-9.75,3.49-16.51,5.88-11.15,3.92-3,1-.8.26a.85.85,0,0,1-.27.07s.08,0,.25-.12l.78-.31,3-1.13,11.09-4.08,16.48-6,9.73-3.52,5.15-1.86a17.13,17.13,0,0,0,4.93-2.51,7.11,7.11,0,0,0,1.76-2.07,6.58,6.58,0,0,0,.75-2.57,14.39,14.39,0,0,0-.72-5.29c-1.08-3.4-2.22-6.69-3.25-9.82-2.08-6.25-4-11.89-5.52-16.63s-2.8-8.55-3.68-11.23c-.42-1.31-.74-2.33-1-3.07l-.24-.8A.93.93,0,0,1,377.5,63.24Z" style="fill: rgb(38, 50, 56); transform-origin: 365.274px 98.84px;" id="elkg1r43ubhrp" class="animable"></path>
                        <path d="M349.34,49.45s-.53-.26-1.51-.66a13.32,13.32,0,0,0-4.37-.88A15,15,0,0,0,337,49.13a14.4,14.4,0,0,0-6.11,5.11,13.52,13.52,0,0,0-2.35,7.59,23.39,23.39,0,0,0,1,6.55c.52,1.82,1.06,3.27,1.42,4.28a11.17,11.17,0,0,1,.52,1.58,8.78,8.78,0,0,1-.71-1.51c-.41-1-1-2.42-1.58-4.25a22.74,22.74,0,0,1-1.15-6.65,13.71,13.71,0,0,1,2.4-7.88,14.63,14.63,0,0,1,6.35-5.26,14.88,14.88,0,0,1,6.65-1.14,12.59,12.59,0,0,1,4.43,1.05,8.26,8.26,0,0,1,1.08.6A1.49,1.49,0,0,1,349.34,49.45Z" style="fill: rgb(38, 50, 56); transform-origin: 338.69px 60.8821px;" id="el7dwqbgkk5qh" class="animable"></path>
                        <path d="M349.8,88.58a3.45,3.45,0,0,1,.5-.25,9.93,9.93,0,0,1,1.55-.55,11.09,11.09,0,0,1,2.59-.44,8.78,8.78,0,0,1,3.51.53c2.56.9,4.91,3.51,6.07,7a10.08,10.08,0,0,1,0,5.74A13,13,0,0,1,360.8,106l.06-.27c1.33,3.65,2.78,7.61,4.28,11.74l.09.25-.25.09-2.29.76-5,1.67-.25.08-.08-.25c-1.37-4.14-2.87-8-4-11.79l.22.17a10,10,0,0,1-5.36-2.11,12.1,12.1,0,0,1-3.35-4,9.14,9.14,0,0,1-1.06-4.5,10.86,10.86,0,0,1,4.19-8.26,6.36,6.36,0,0,1,1.73-1,19.27,19.27,0,0,0-1.64,1.09A10.63,10.63,0,0,0,345,94.06a9.46,9.46,0,0,0,.31,8.07,11.74,11.74,0,0,0,3.27,3.84,9.52,9.52,0,0,0,5.11,2l.17,0,.05.15c1.1,3.72,2.61,7.61,4,11.77l-.33-.16,5-1.67,2.28-.77-.16.34c-1.49-4.13-2.93-8.1-4.25-11.75l0-.15.12-.12a12.74,12.74,0,0,0,3.16-5.17,9.67,9.67,0,0,0,0-5.49c-1.09-3.36-3.34-5.91-5.78-6.81a8.59,8.59,0,0,0-3.39-.57,11.46,11.46,0,0,0-2.56.35C350.51,88.29,349.81,88.63,349.8,88.58Z" style="fill: rgb(38, 50, 56); transform-origin: 354.519px 103.824px;" id="el3f8ch9p8rjb" class="animable"></path>
                    </g>
                    <g id="freepik--Device--inject-39" class="animable" style="transform-origin: 269.58px 230.125px;">
                        <path d="M318.89,377.32,219,376.86A21.77,21.77,0,0,1,197.35,355l1.06-250.41a21.75,21.75,0,0,1,21.86-21.66l99.88.46a21.77,21.77,0,0,1,21.66,21.85l-1.06,250.4A21.77,21.77,0,0,1,318.89,377.32Z" style="fill: rgb(69, 90, 100); transform-origin: 269.58px 230.125px;" id="elvnwfsbjlrod" class="animable"></path>
                        <path d="M320,92,300.64,92a4.81,4.81,0,0,0-4.72,4.9l0,3.51a4.8,4.8,0,0,1-4.72,4.89l-37.74-.17a4.82,4.82,0,0,1-4.69-4.94l0-3.51a4.82,4.82,0,0,0-4.68-4.94l-6.81,0-16.95-.08A15.24,15.24,0,0,0,205,106.75l-1,244.42a15.23,15.23,0,0,0,15.16,15.3l99.68.46a15.24,15.24,0,0,0,15.31-15.17l1-244.42A15.25,15.25,0,0,0,320,92Z" style="fill: rgb(255, 255, 255); transform-origin: 269.575px 229.295px;" id="elyznpvp1rhk" class="animable"></path>
                        <path d="M306.59,334.32,232.47,334c-.77,0-1.39-.84-1.38-1.86l.08-19.39c0-1,.63-1.86,1.4-1.86l74.12.34a1.68,1.68,0,0,1,1.38,1.87L308,332.47C308,333.5,307.36,334.33,306.59,334.32Z" style="fill: rgb(60, 79, 177); transform-origin: 269.587px 322.605px;" id="elchnfinrt0z8" class="animable"></path><text transform="matrix(0.96, 0, 0, 1, 252.59, 324.95)" style="font-size:8.298959732055664px;fill:#e8e8e3;font-family:Montserrat-Regular, Montserrat">SING UP</text>
                        <g id="elipjjd5mhry">
                            <rect x="221.51" y="163.81" width="25.72" height="4.72" style="fill: rgb(60, 79, 177); transform-origin: 234.37px 166.17px; transform: rotate(0.26deg);" class="animable"></rect>
                        </g>
                        <g id="ellvi7rw6a7ks">
                            <rect x="221.51" y="163.81" width="25.72" height="4.72" style="opacity: 0.1; transform-origin: 234.37px 166.17px; transform: rotate(0.26deg);" class="animable"></rect>
                        </g>
                        <path d="M322.65,192.83a2.3,2.3,0,0,0,.59-.14,1.58,1.58,0,0,0,1-1.35c0-1.59,0-3.91,0-6.89,0-1.49,0-3.16,0-5,0-.45,0-.92,0-1.39a1.94,1.94,0,0,0-.28-1.31,1.5,1.5,0,0,0-1.19-.61h-1.56l-14.45,0-83.64-.31a1.33,1.33,0,0,0-1.1.55,1.91,1.91,0,0,0-.26,1.31c0,1,0,2,0,3q0,3,0,6c0,1,0,2,0,3a7.89,7.89,0,0,0,0,1.4,1.35,1.35,0,0,0,.78.9,1.56,1.56,0,0,0,.62.11h5.09l22.21.12,37.6.23,25.35.2,6.89.08,1.79,0c.41,0,.61,0,.61,0l-.61,0-1.79,0h-6.89l-25.35,0-37.6-.12-22.21-.09h-5.09a2,2,0,0,1-.82-.14,1.88,1.88,0,0,1-1.08-1.25,2.83,2.83,0,0,1-.06-.8v-.74c0-1,0-2,0-3q0-3,0-6c0-1,0-2,0-3a5.6,5.6,0,0,1,0-.8,1.7,1.7,0,0,1,.33-.81,1.84,1.84,0,0,1,1.52-.77l83.64.46,14.45.1,1.56,0a1.71,1.71,0,0,1,1.4.73,2.13,2.13,0,0,1,.32,1.47c0,.47,0,.94,0,1.39,0,1.82,0,3.49,0,5,0,3-.07,5.3-.09,6.9a1.62,1.62,0,0,1-1.05,1.39A1.2,1.2,0,0,1,322.65,192.83Z" style="fill: rgb(224, 224, 224); transform-origin: 272.814px 184.02px;" id="eltw32whvigop" class="animable"></path>
                        <g id="elt9q2s6zbvh">
                            <rect x="228.41" y="182.01" width="47.04" height="4.41" style="fill: rgb(60, 79, 177); transform-origin: 251.93px 184.215px; transform: rotate(0deg);" class="animable"></rect>
                        </g>
                        <g id="elu5x6vxsnbqk">
                            <rect x="228.41" y="182.01" width="47.04" height="4.41" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 251.93px 184.215px; transform: rotate(0deg);" class="animable"></rect>
                        </g>
                        <g id="eljvbzxk83jf">
                            <rect x="221.33" y="206.87" width="25.72" height="4.72" style="fill: rgb(60, 79, 177); transform-origin: 234.19px 209.23px; transform: rotate(0.26deg);" class="animable"></rect>
                        </g>
                        <g id="eljcj8b3cjmxk">
                            <rect x="221.33" y="206.87" width="25.72" height="4.72" style="opacity: 0.1; transform-origin: 234.19px 209.23px; transform: rotate(0.26deg);" class="animable"></rect>
                        </g>
                        <path d="M322,235.89a5.17,5.17,0,0,0,.6-.11,2.05,2.05,0,0,0,1.26-1.14,2.8,2.8,0,0,0,.18-1.27c0-.48,0-1,0-1.58,0-1.16,0-2.48,0-4v-6.35a2.15,2.15,0,0,0-.29-1.32,1.94,1.94,0,0,0-1.09-.85,6.13,6.13,0,0,0-1.51-.08l-14.39,0-83.35-.31a1.85,1.85,0,0,0-1.83,1.61c0,.95,0,2,0,3q0,3,0,6c0,1,0,2,0,3a5.74,5.74,0,0,0,.06,1.4,1.9,1.9,0,0,0,.73,1,2.08,2.08,0,0,0,1.24.32H225l2.89,0,22.13.11,37.47.23,25.26.2,6.87.08,1.79,0,.6,0-.6,0-1.79,0-6.87,0-25.26,0L250,235.79l-22.13-.08h-4.35a2.51,2.51,0,0,1-1.53-.41,2.4,2.4,0,0,1-.94-1.31,6.3,6.3,0,0,1-.08-1.54c0-1,0-2,0-3q0-3,0-6c0-1,0-2,0-3a2.37,2.37,0,0,1,2.35-2.07l83.35.46,14.39.11a6.19,6.19,0,0,1,1.6.11,2.21,2.21,0,0,1,1.23,1,2.41,2.41,0,0,1,.32,1.46c0,.47,0,.93,0,1.39,0,1.81,0,3.47,0,5s0,2.82,0,4c0,.57,0,1.1,0,1.59a2.79,2.79,0,0,1-.21,1.31,2.12,2.12,0,0,1-1.35,1.14A1.88,1.88,0,0,1,322,235.89Z" style="fill: rgb(224, 224, 224); transform-origin: 272.588px 227.168px;" id="elpoqluueaze" class="animable"></path>
                        <g id="elk116w5fkher">
                            <rect x="221.14" y="251.79" width="25.72" height="4.72" style="fill: rgb(60, 79, 177); transform-origin: 234px 254.15px; transform: rotate(0.26deg);" class="animable"></rect>
                        </g>
                        <g id="el011y6o910ylzg">
                            <rect x="221.14" y="251.79" width="25.72" height="4.72" style="opacity: 0.1; transform-origin: 234px 254.15px; transform: rotate(0.26deg);" class="animable"></rect>
                        </g>
                        <path d="M321.8,280.8a4.78,4.78,0,0,0,.6-.11,2.06,2.06,0,0,0,1.26-1.13,2.82,2.82,0,0,0,.18-1.27c0-.49,0-1,0-1.59,0-1.15,0-2.48,0-4v-6.35a2.15,2.15,0,0,0-.29-1.32,2,2,0,0,0-1.09-.84,6.11,6.11,0,0,0-1.51-.09l-14.39,0-83.35-.31a1.85,1.85,0,0,0-1.83,1.61c0,1,0,2,0,3,0,2,0,4,0,6,0,1,0,2,0,3a5.66,5.66,0,0,0,.06,1.39,1.83,1.83,0,0,0,.73,1,2,2,0,0,0,1.24.32h4.35l22.13.12,37.47.23,25.26.2,6.87.08,1.79,0c.4,0,.6,0,.6,0s-.2,0-.6,0l-1.79,0-6.87,0-25.26,0-37.47-.11-22.13-.09h-4.35a2.45,2.45,0,0,1-1.53-.41,2.4,2.4,0,0,1-.94-1.31,6.3,6.3,0,0,1-.08-1.54c0-1,0-2,0-3q0-3,0-6c0-1,0-2,0-3.05a2.36,2.36,0,0,1,2.34-2.07l83.35.46,14.39.11a6.19,6.19,0,0,1,1.6.11,2.21,2.21,0,0,1,1.23,1,2.41,2.41,0,0,1,.32,1.46c0,.47,0,.94,0,1.39,0,1.81,0,3.47,0,5s0,2.82,0,4c0,.57,0,1.1,0,1.59a2.74,2.74,0,0,1-.21,1.31,2.12,2.12,0,0,1-1.35,1.14A1.58,1.58,0,0,1,321.8,280.8Z" style="fill: rgb(224, 224, 224); transform-origin: 272.473px 271.988px;" id="elk0zvau4uoy" class="animable"></path>
                        <g id="ely83lw6a41nr">
                            <rect x="228.23" y="225.07" width="47.04" height="4.41" style="fill: rgb(60, 79, 177); transform-origin: 251.75px 227.275px; transform: rotate(0.26deg);" class="animable"></rect>
                        </g>
                        <g id="elf3qim2367rl">
                            <rect x="228.23" y="225.07" width="47.04" height="4.41" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 251.75px 227.275px; transform: rotate(0.26deg);" class="animable"></rect>
                        </g>
                        <path d="M232.51,272.64a2.06,2.06,0,1,1-2-2.21A2.12,2.12,0,0,1,232.51,272.64Z" style="fill: rgb(60, 79, 177); transform-origin: 230.454px 272.489px;" id="el2afst5gkrhm" class="animable"></path>
                        <path d="M238.88,272.67a2.06,2.06,0,1,1-4.11,0,2.06,2.06,0,1,1,4.11,0Z" style="fill: rgb(60, 79, 177); transform-origin: 236.825px 272.67px;" id="el81l6y9d67p7" class="animable"></path>
                        <path d="M245.26,272.7a2.06,2.06,0,1,1-2-2.21A2.13,2.13,0,0,1,245.26,272.7Z" style="fill: rgb(60, 79, 177); transform-origin: 243.204px 272.549px;" id="elwfky905ktdl" class="animable"></path>
                        <path d="M251.63,272.73a2.06,2.06,0,1,1-2-2.21A2.13,2.13,0,0,1,251.63,272.73Z" style="fill: rgb(60, 79, 177); transform-origin: 249.574px 272.579px;" id="el0os7sr0rv2dr" class="animable"></path>
                        <path d="M258,272.75a2.06,2.06,0,1,1-2-2.2A2.13,2.13,0,0,1,258,272.75Z" style="fill: rgb(60, 79, 177); transform-origin: 255.943px 272.609px;" id="eltqjo3417moq" class="animable"></path>
                        <path d="M264.38,272.78a2.06,2.06,0,1,1-2.05-2.2A2.13,2.13,0,0,1,264.38,272.78Z" style="fill: rgb(60, 79, 177); transform-origin: 262.323px 272.64px;" id="elg7xja0d26tu" class="animable"></path>
                        <path d="M270.75,272.81a2.06,2.06,0,1,1-4.11,0,2.06,2.06,0,1,1,4.11,0Z" style="fill: rgb(60, 79, 177); transform-origin: 268.695px 272.81px;" id="el7nxz9tgio7" class="animable"></path>
                        <path d="M277.12,272.84a2.06,2.06,0,1,1-2.05-2.2A2.13,2.13,0,0,1,277.12,272.84Z" style="fill: rgb(60, 79, 177); transform-origin: 275.063px 272.7px;" id="elfwv8f1zxpgc" class="animable"></path>
                        <path d="M283.49,272.87a2.06,2.06,0,1,1-2-2.2A2.13,2.13,0,0,1,283.49,272.87Z" style="fill: rgb(60, 79, 177); transform-origin: 281.433px 272.729px;" id="elm9i35db4vrt" class="animable"></path>
                        <g id="eliretr1znrz">
                            <g style="opacity: 0.2; transform-origin: 255.943px 272.721px;" class="animable">
                                <path d="M232.51,272.64a2.06,2.06,0,1,1-2-2.21A2.12,2.12,0,0,1,232.51,272.64Z" style="fill: rgb(255, 255, 255); transform-origin: 230.454px 272.489px;" id="elh4prqxv978i" class="animable"></path>
                                <path d="M238.88,272.67a2.06,2.06,0,1,1-4.11,0,2.06,2.06,0,1,1,4.11,0Z" style="fill: rgb(255, 255, 255); transform-origin: 236.825px 272.67px;" id="eljdqi6xnoabq" class="animable"></path>
                                <path d="M245.26,272.7a2.06,2.06,0,1,1-2-2.21A2.13,2.13,0,0,1,245.26,272.7Z" style="fill: rgb(255, 255, 255); transform-origin: 243.204px 272.549px;" id="ely43qr8ei4d" class="animable"></path>
                                <path d="M251.63,272.73a2.06,2.06,0,1,1-2-2.21A2.13,2.13,0,0,1,251.63,272.73Z" style="fill: rgb(255, 255, 255); transform-origin: 249.574px 272.579px;" id="elwwdaxvtu5r" class="animable"></path>
                                <path d="M258,272.75a2.06,2.06,0,1,1-2-2.2A2.13,2.13,0,0,1,258,272.75Z" style="fill: rgb(255, 255, 255); transform-origin: 255.943px 272.609px;" id="el6ndzrfl9l0m" class="animable"></path>
                                <path d="M264.38,272.78a2.06,2.06,0,1,1-2.05-2.2A2.13,2.13,0,0,1,264.38,272.78Z" style="fill: rgb(255, 255, 255); transform-origin: 262.323px 272.64px;" id="elupy8tmf93s9" class="animable"></path>
                                <path d="M270.75,272.81a2.06,2.06,0,1,1-4.11,0,2.06,2.06,0,1,1,4.11,0Z" style="fill: rgb(255, 255, 255); transform-origin: 268.695px 272.81px;" id="elzdripizet4" class="animable"></path>
                                <path d="M277.12,272.84a2.06,2.06,0,1,1-2.05-2.2A2.13,2.13,0,0,1,277.12,272.84Z" style="fill: rgb(255, 255, 255); transform-origin: 275.063px 272.7px;" id="el2iiky42uz5o" class="animable"></path>
                                <path d="M283.49,272.87a2.06,2.06,0,1,1-2-2.2A2.13,2.13,0,0,1,283.49,272.87Z" style="fill: rgb(255, 255, 255); transform-origin: 281.433px 272.729px;" id="elkkqkngu407" class="animable"></path>
                            </g>
                        </g>
                        <path d="M274.44,128.51a3.87,3.87,0,0,0,2.31-3.59,3.64,3.64,0,1,0-7.27,0,3.88,3.88,0,0,0,2.32,3.63c-5.6.84-5.35,6.92-5.35,6.92l13.24.06S280,129.34,274.44,128.51Z" style="fill: rgb(60, 79, 177); transform-origin: 273.071px 128.31px;" id="el2rvewdb5le4" class="animable"></path>
                        <g id="elbjl1my3hvpb">
                            <path d="M274.44,128.51a3.87,3.87,0,0,0,2.31-3.59,3.64,3.64,0,1,0-7.27,0,3.88,3.88,0,0,0,2.32,3.63c-5.6.84-5.35,6.92-5.35,6.92l13.24.06S280,129.34,274.44,128.51Z" style="opacity: 0.1; transform-origin: 273.071px 128.31px;" class="animable"></path>
                        </g>
                        <g id="ele95sj3tcse8">
                            <rect x="248.74" y="139.37" width="47.19" height="5.64" style="fill: rgb(60, 79, 177); transform-origin: 272.335px 142.19px; transform: rotate(0.26deg);" class="animable"></rect>
                        </g>
                        <g id="elkr5b97as5a">
                            <rect x="248.74" y="139.37" width="47.19" height="5.64" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 272.335px 142.19px; transform: rotate(0.26deg);" class="animable"></rect>
                        </g>
                    </g>
                    <g id="freepik--speech-bubble--inject-39" class="animable" style="transform-origin: 122.529px 197.96px;">
                        <path d="M122.47,168.68l-.47,0-1.36.1a15.43,15.43,0,0,0-2.19.29,13.53,13.53,0,0,0-1.39.27l-1.55.43a25.47,25.47,0,0,0-7.37,3.65,25.94,25.94,0,0,0-7.26,8.08,27.08,27.08,0,0,0-2.54,5.81,27.94,27.94,0,0,0-1.11,6.78,27.48,27.48,0,0,0,.06,3.62c0,.61.17,1.22.25,1.84a11.82,11.82,0,0,0,.35,1.85,26.39,26.39,0,0,0,15,18.33,23.76,23.76,0,0,0,8.59,1.93,23.19,23.19,0,0,0,9-1.29l.88-.33.12,0,.1.06,12.61,6.4-.37.32c-1.35-4.18-2.65-8.23-3.91-12.12l0-.15.11-.11a27,27,0,0,0,6.62-11,27.7,27.7,0,0,0,1-11.72,27.38,27.38,0,0,0-3.31-9.94,27,27,0,0,0-5.7-7,27.85,27.85,0,0,0-6.19-3.94,26.94,26.94,0,0,0-5.24-1.65l-2-.33-1.45-.11-.88-.06-.3,0a1.36,1.36,0,0,1,.3,0l.89,0,1.45.06,2,.29a26.5,26.5,0,0,1,5.31,1.59,27.79,27.79,0,0,1,6.3,3.93,27.07,27.07,0,0,1,5.82,7,27.45,27.45,0,0,1,3.41,10.07,28,28,0,0,1-.93,11.92,27.36,27.36,0,0,1-6.72,11.23l.06-.26c1.26,3.89,2.57,7.94,3.93,12.11l.19.61-.57-.29-12.61-6.39h.22l-.9.33a23.86,23.86,0,0,1-9.17,1.32,24.3,24.3,0,0,1-8.77-2A26.31,26.31,0,0,1,100.25,209a26.7,26.7,0,0,1-2.83-7.4,15.32,15.32,0,0,1-.35-1.89c-.08-.63-.21-1.25-.24-1.87a29.55,29.55,0,0,1,1.11-10.56,26.89,26.89,0,0,1,2.61-5.88,26.17,26.17,0,0,1,7.41-8.13,25.28,25.28,0,0,1,7.49-3.62l1.57-.4a13.89,13.89,0,0,1,1.4-.25,14.85,14.85,0,0,1,2.21-.24l1.37-.05A3.36,3.36,0,0,1,122.47,168.68Z" style="fill: rgb(60, 79, 177); transform-origin: 122.529px 197.96px;" id="elpcmhntadvgp" class="animable"></path>
                        <path d="M128.17,192h-1.85l-4-5.62v-3.69s-2.86-.18-2.52,4.65,0,3.6,0,3.6-6.07,0-6.57.55-.53,6.41-.6,9.68a3.54,3.54,0,0,0,2.51,3.56,2.48,2.48,0,0,0,.65.09c1.52,0,9.25-1.23,9.25-1.23h3.19Z" style="fill: rgb(60, 79, 177); transform-origin: 120.428px 193.755px;" id="eloxv35epvz1p" class="animable"></path>
                        <polygon points="133.46 191.01 132.32 203.65 129.16 203.65 129.16 191.27 133.46 191.01" style="fill: rgb(60, 79, 177); transform-origin: 131.31px 197.33px;" id="el4mng88gtfto" class="animable"></polygon>
                    </g>
                    <g id="freepik--Character--inject-39" class="animable" style="transform-origin: 194.06px 313.817px;">
                        <path d="M171.15,448.34v-8.55l-15.33-.11-.13,12.93.95.07c4.23.27,21.52.67,24.36-.21C184.16,451.49,171.15,448.34,171.15,448.34Z" style="fill: rgb(60, 79, 177); transform-origin: 168.592px 446.345px;" id="elrcfe1497cv" class="animable"></path>
                        <path d="M181.36,451.67c0,.14-5.74.26-12.81.26s-12.81-.12-12.81-.26,5.74-.26,12.81-.26S181.36,451.53,181.36,451.67Z" style="fill: rgb(38, 50, 56); transform-origin: 168.55px 451.67px;" id="elio2uh68q9y" class="animable"></path>
                        <path d="M171.42,450.09c-.13-.07,0-.52.31-1s.73-.68.83-.58-.11.48-.41.89S171.55,450.16,171.42,450.09Z" style="fill: rgb(38, 50, 56); transform-origin: 171.978px 449.292px;" id="elzblka3hnu1p" class="animable"></path>
                        <path d="M172.4,450.65c-.14,0-.07-.56.23-1.09s.7-.85.81-.77-.07.53-.35,1S172.53,450.7,172.4,450.65Z" style="fill: rgb(38, 50, 56); transform-origin: 172.902px 449.716px;" id="elhoj71ggwfgf" class="animable"></path>
                        <path d="M160.36,451.63c-.06,0-.29-.18-.62-.56a9.91,9.91,0,0,0-1.34-1.34,3.53,3.53,0,0,0-1.66-.73c-.47-.06-.77,0-.8-.06s.26-.27.81-.31a3.09,3.09,0,0,1,2,.68,5.64,5.64,0,0,1,1.32,1.55C160.3,451.3,160.42,451.59,160.36,451.63Z" style="fill: rgb(38, 50, 56); transform-origin: 158.157px 450.13px;" id="elraqi5aics1n" class="animable"></path>
                        <path d="M171.47,448.48c.07.12-.19.42-.63.58s-.83.1-.85,0,.29-.31.67-.45S171.39,448.36,171.47,448.48Z" style="fill: rgb(38, 50, 56); transform-origin: 170.735px 448.794px;" id="eldtwhrs8ucv7" class="animable"></path>
                        <path d="M171.23,447.65c0,.15-.4.27-.92.28s-.93-.11-.92-.25.42-.27.92-.28S171.21,447.51,171.23,447.65Z" style="fill: rgb(38, 50, 56); transform-origin: 170.31px 447.665px;" id="el491w9q9eodw" class="animable"></path>
                        <path d="M208.9,448.34v-8.55l-15.33-.11-.13,12.8.95.07c4.23.27,21.53.8,24.36-.08C221.91,451.49,208.9,448.34,208.9,448.34Z" style="fill: rgb(60, 79, 177); transform-origin: 206.342px 446.318px;" id="elpqvr0b5xxtf" class="animable"></path>
                        <path d="M219.11,451.69c0,.14-5.73.26-12.81.26s-12.8-.12-12.8-.26,5.73-.26,12.8-.26S219.11,451.55,219.11,451.69Z" style="fill: rgb(38, 50, 56); transform-origin: 206.305px 451.69px;" id="eloyjyntiol9t" class="animable"></path>
                        <path d="M209.17,450.09c-.12-.07,0-.52.31-1s.73-.68.83-.58-.11.48-.41.89S209.3,450.16,209.17,450.09Z" style="fill: rgb(38, 50, 56); transform-origin: 209.73px 449.292px;" id="eld2qhcwgnwah" class="animable"></path>
                        <path d="M210.15,450.65c-.13,0-.07-.56.24-1.09s.7-.85.81-.77-.08.53-.36,1S210.29,450.7,210.15,450.65Z" style="fill: rgb(38, 50, 56); transform-origin: 210.659px 449.716px;" id="elai7pkruierq" class="animable"></path>
                        <path d="M198.11,451.63c-.06,0-.28-.18-.62-.56a9.91,9.91,0,0,0-1.34-1.34,3.53,3.53,0,0,0-1.66-.73c-.46-.06-.77,0-.8-.06s.26-.27.81-.31a3.09,3.09,0,0,1,2,.68,5.47,5.47,0,0,1,1.32,1.55C198.05,451.3,198.17,451.59,198.11,451.63Z" style="fill: rgb(38, 50, 56); transform-origin: 195.907px 450.13px;" id="eln5180bqi1u" class="animable"></path>
                        <path d="M209.22,448.48c.07.12-.19.42-.63.58s-.83.1-.85,0,.29-.31.67-.45S209.14,448.36,209.22,448.48Z" style="fill: rgb(38, 50, 56); transform-origin: 208.485px 448.794px;" id="eljdtmb3vup5h" class="animable"></path>
                        <path d="M209,447.65c0,.15-.4.27-.92.28s-.92-.11-.91-.25.41-.27.91-.28S209,447.51,209,447.65Z" style="fill: rgb(38, 50, 56); transform-origin: 208.085px 447.665px;" id="eltaefg1608xo" class="animable"></path>
                        <path d="M265.38,194.44c-.4-.41-1.39-.21-1.39-.21a5.12,5.12,0,0,0,0-1.74c-.18-.56-1.44-.45-1.44-.45a5.81,5.81,0,0,1,0-1.42.51.51,0,0,0-.29-.51,4.62,4.62,0,0,0-1.88-.34c-.77-.55,2.35-4.92,3.51-6.32s.95-2.49-.08-2.49c-.71,0-4.35,4.2-5.47,5.61s-4.09,5.33-4.19,2.2-1.36-5.49-2.15-5.89-1.63.54-1.2,1.41a11.19,11.19,0,0,1,.7,3.08,7.36,7.36,0,0,1-.11,2.52,30.22,30.22,0,0,1-1.35,4.52l-.08,0s-21.82,20.93-23.4,22.42c-1.41,1.34-29.77-1.59-35.46-2.19a38.09,38.09,0,0,0-5.84-.4c-2.47.11-2.91.46-5.37.49a121.62,121.62,0,0,0-18.54,1.63,15.37,15.37,0,0,0-12.06,10.46c-5.73,17.9-18.71,60.27-21,84.07a101,101,0,0,0-4.68,9.67c-1.61,4.38-1.22,4.53-.68,4.63,1.46.27,3.12-7.59,3.74-5.69s-3.15,9.37-1.62,9.59c2,.28,3.59-8,3.78-8.66s1.18-.45,1,.17c-.29.88-3.1,10.21-1.14,10.51,1.08.16,1.2-1.81,1.2-1.81s2-8.93,2.91-8.75-.06,5.45-.52,7.21.18,2.65,1.12,2.22c.64-.3,2.17-5.65,2.59-7.39s1.47-6.56,2.88-3.77,3.55,4.41,4.43,4.45a1,1,0,0,0,.49-1.79,11.33,11.33,0,0,1-1.93-2.5,7.37,7.37,0,0,1-1-2.34,25.37,25.37,0,0,1-.7-5.06l-.16-1c2.24-11.09,8.69-43.64,18-64.43l3.82,7.86,1.66,5.82-10.18,25.13,43.42-.57-6.48-24.94,7.87-26h0c8.51.19,30.36.51,34-1.14,4.58-2,28.27-31.92,28.27-31.92h0a54.72,54.72,0,0,0,4.43-3.84S266.25,195.34,265.38,194.44Z" style="fill: rgb(255, 190, 157); transform-origin: 194.06px 256.04px;" id="el9ab1vycew6" class="animable"></path>
                        <path d="M151.39,266.39c1.26-4.3,7.73-25.56,7.73-25.56s3.18,17.33,2.34,19.42a37,37,0,0,1-2.73,5.16c-7.34,11.17-6.38,16.76-6.38,16.76l44.35-1.35c.1-6.2-3.57-20.62-4.33-22.92s1.77-9.83,1.77-9.83,5-5.09,4.82-7.71a42.38,42.38,0,0,0-.87-7l27,1-.85-18.3-38.78-3.88c-1.35,3.81-13.56,1.94-13.56,1.94-13.18.44-14,2.86-19.48,7.12s-14.55,40.82-14.55,40.82Z" style="fill: rgb(60, 79, 177); transform-origin: 181.48px 247.175px;" id="elgrrlx75mt6p" class="animable"></path>
                        <path d="M177.61,262.06a9.33,9.33,0,0,1-2.33.12c-1.45,0-3.44-.1-5.63-.32s-4.17-.53-5.58-.81a9.62,9.62,0,0,1-2.27-.58,12.5,12.5,0,0,1,2.33.22c1.42.18,3.39.43,5.57.65s4.16.37,5.59.47A12.34,12.34,0,0,1,177.61,262.06Z" style="fill: rgb(38, 50, 56); transform-origin: 169.705px 261.338px;" id="eltkuhp44yxxm" class="animable"></path>
                        <path d="M180.65,258.29a10.25,10.25,0,0,1-2.42.83A44.46,44.46,0,0,1,166,260.57a10.09,10.09,0,0,1-2.54-.24,17.09,17.09,0,0,1,2.54-.13c1.57-.05,3.73-.16,6.11-.44s4.5-.68,6-1A16.58,16.58,0,0,1,180.65,258.29Z" style="fill: rgb(38, 50, 56); transform-origin: 172.055px 259.435px;" id="ela56arsgfks8" class="animable"></path>
                        <path d="M195.57,241.47a10.41,10.41,0,0,1-.31,2.26c-.26,1.39-.66,3.29-1.17,5.37s-1,4-1.44,5.3a10,10,0,0,1-.78,2.15,10.18,10.18,0,0,1,.42-2.24c.38-1.56.81-3.36,1.29-5.33s.94-3.77,1.32-5.33A9.54,9.54,0,0,1,195.57,241.47Z" style="fill: rgb(38, 50, 56); transform-origin: 193.72px 249.01px;" id="eljkyhis0owbf" class="animable"></path>
                        <path d="M151.86,263.84a46.48,46.48,0,0,1-6.83-1.59,47.46,47.46,0,0,1-6.7-2.1,48.09,48.09,0,0,1,6.83,1.59A46.93,46.93,0,0,1,151.86,263.84Z" style="fill: rgb(38, 50, 56); transform-origin: 145.095px 261.995px;" id="elshy3gjws8b" class="animable"></path>
                        <path d="M198.57,233.14a3.36,3.36,0,0,1-1.14,0,11.85,11.85,0,0,1-3.05-.73,12.53,12.53,0,0,1-7.24-7.11,12.92,12.92,0,0,1-.89-5.63,8.75,8.75,0,0,1,1.37-4.46,4.63,4.63,0,0,1,2.53-1.87,3.06,3.06,0,0,1,.85-.11c.2,0,.3,0,.3,0s-.42,0-1.09.27a4.55,4.55,0,0,0-2.29,1.87c-1.36,2.14-1.74,6.05-.29,9.7a12.22,12.22,0,0,0,3.09,4.52,13.13,13.13,0,0,0,3.79,2.44A19.26,19.26,0,0,0,198.57,233.14Z" style="fill: rgb(38, 50, 56); transform-origin: 192.396px 223.209px;" id="elrjr4ditp77" class="animable"></path>
                        <path d="M221.88,234a83.32,83.32,0,0,1-.24-9.22,82.49,82.49,0,0,1,.28-9.21,83.06,83.06,0,0,1,.24,9.21A80,80,0,0,1,221.88,234Z" style="fill: rgb(38, 50, 56); transform-origin: 221.9px 224.785px;" id="elplzk8txr9qj" class="animable"></path>
                        <path d="M185.2,213.3c.11-2.23.34-4.75.34-4.75s5.52-.61,5.85-6.31,0-18.85,0-18.85l-10-5.12L170.29,187,172,215.5l10.18.65A2.94,2.94,0,0,0,185.2,213.3Z" style="fill: rgb(255, 190, 157); transform-origin: 180.913px 197.211px;" id="elccn6kpq24dg" class="animable"></path>
                        <path d="M186.19,197.73s0,.11-.09.24a.74.74,0,0,1-.63.28c-.64,0-1.26-.74-1.48-1.6a2.61,2.61,0,0,1,0-1.27,1.1,1.1,0,0,1,.6-.86.55.55,0,0,1,.42,0,.51.51,0,0,1,.23.23c.07.17,0,.28,0,.27s0-.1-.1-.2a.36.36,0,0,0-.47-.1.85.85,0,0,0-.41.71,2.56,2.56,0,0,0,0,1.13c.2.78.74,1.41,1.22,1.47a.69.69,0,0,0,.53-.15C186.13,197.8,186.17,197.72,186.19,197.73Z" style="fill: rgb(235, 153, 110); transform-origin: 185.051px 196.365px;" id="el5iu1zx0mz8" class="animable"></path>
                        <path d="M194.82,180.31c-.77-2.62-3.56-3.92-6.1-4.64-3.87-1.1-8.05-1.58-11.83-.19s-8.32,3.83-8.32,8c-2.23-.18-3.51,1.77-4.39,4.19a15.7,15.7,0,0,0-1,4.6h0c-.28,5.46-1.81,13-5.35,17-2,2.23-4.77,3.77-5.91,6.55-1,2.41-.48,5.27-1.41,7.71-.83,2.15-2.66,3.68-4,5.55a14.88,14.88,0,0,0-.95,14.39,18.22,18.22,0,0,0,10.89,9.4,25.47,25.47,0,0,0,14.35.14,24,24,0,0,0,9.62-4.77A16.06,16.06,0,0,0,186,239c.71-4.08-.43-8.23-1.28-12.29-2.66-12.83-1.9-13.5,1.46-25.41.08-.21.12-.43.18-.64s.09-.31.13-.47h0a7.54,7.54,0,0,0,.15-1.43,2.75,2.75,0,0,1-2.89-.62,3,3,0,0,1-.68-3,4.36,4.36,0,0,1,2.58-2.43c1.11-.46,2.3-.7,3.39-1.21,2.31-1.1,3.91-3.38,5-5.77A7.92,7.92,0,0,0,194.82,180.31Z" style="fill: rgb(38, 50, 56); transform-origin: 169.568px 214.299px;" id="ela9hmjcnpd35" class="animable"></path>
                        <path d="M186.59,198a4.89,4.89,0,0,1,.52,1c.3.63.7,1.52,1.14,2.55l.08.19-.21,0-1,.09c-.69,0-1.27.13-1.95.12a.36.36,0,0,1-.26-.23.45.45,0,0,1,0-.28,4,4,0,0,1,.09-.4l.18-.71a6.77,6.77,0,0,1,.42-1.38,6.75,6.75,0,0,1-.21,1.43l-.14.71c-.05.24-.14.61,0,.58.5,0,1.21-.11,1.87-.15l1-.09-.13.22c-.43-1-.79-1.94-1-2.59A3.9,3.9,0,0,1,186.59,198Z" style="fill: rgb(60, 79, 177); transform-origin: 186.609px 199.975px;" id="elzmtt9ebnhl" class="animable"></path>
                        <path d="M152.35,282.17l44.35-1.35L216,356.16l-3.55,86.42H189L191.87,358l-17.15-52.45,2.64,140.38-23.7.35-2.49-131.95c-.11-3.67-1.31-11.94-.86-15.58Z" style="fill: rgb(38, 50, 56); transform-origin: 183.105px 363.55px;" id="el3qn6cks8vhp" class="animable"></path>
                        <path d="M180.62,306.62a8.88,8.88,0,0,1-2.17-.13c-1.34-.16-3.17-.44-5.18-.84s-3.81-.86-5.11-1.23a8.25,8.25,0,0,1-2-.72c0-.15,3.26.63,7.26,1.44S180.64,306.47,180.62,306.62Z" style="fill: rgb(69, 90, 100); transform-origin: 173.39px 305.159px;" id="eltxzgczswtoq" class="animable"></path>
                        <path d="M212.21,437.84c0,.14-5.31.26-11.86.26s-11.87-.12-11.87-.26,5.31-.26,11.87-.26S212.21,437.69,212.21,437.84Z" style="fill: rgb(69, 90, 100); transform-origin: 200.345px 437.84px;" id="ele5a65zi7i" class="animable"></path>
                        <path d="M177.15,442.28c0,.15-5.16.26-11.52.26s-11.51-.11-11.51-.26,5.16-.26,11.51-.26S177.15,442.14,177.15,442.28Z" style="fill: rgb(69, 90, 100); transform-origin: 165.635px 442.28px;" id="eltr65u7slpq" class="animable"></path>
                        <path d="M174.09,441.92c-.14,0-.76-30.67-1.39-68.5s-1-68.52-.87-68.52.77,30.66,1.39,68.51S174.24,441.92,174.09,441.92Z" style="fill: rgb(69, 90, 100); transform-origin: 172.963px 373.41px;" id="eltayvk402nqe" class="animable"></path>
                        <path d="M209.06,437.84a2.56,2.56,0,0,1,0-.41l0-1.2c0-1.08.08-2.63.14-4.6.14-4,.34-9.81.59-16.93.54-14.32,1.3-34.06,2.13-55.85,0-.21,0-.41,0-.59v.07c-5.25-21-10-40.06-13.45-53.85l-4-16.31c-.46-1.91-.81-3.4-1.06-4.44-.12-.49-.2-.87-.27-1.16a1.73,1.73,0,0,1-.07-.4,2.21,2.21,0,0,1,.12.39c.08.28.18.66.32,1.14.27,1,.66,2.52,1.16,4.42,1,3.86,2.41,9.42,4.17,16.27,3.48,13.78,8.28,32.79,13.6,53.82v.07c0,.18,0,.39,0,.59-.89,21.79-1.7,41.52-2.29,55.84-.31,7.13-.57,12.9-.75,16.92-.1,2-.18,3.52-.23,4.6,0,.51-.06.91-.07,1.2A1.91,1.91,0,0,1,209.06,437.84Z" style="fill: rgb(69, 90, 100); transform-origin: 202.755px 360.005px;" id="elegyis254a59" class="animable"></path>
                        <path d="M201.41,356.5a26.79,26.79,0,0,1-5.18,1.15c-2.16.37-4,.63-4.83.67v-.2c.27.08.41.13.41.17s-.17,0-.45,0l-.6,0,.6-.18c.78-.23,2.62-.61,4.78-1A27,27,0,0,1,201.41,356.5Z" style="fill: rgb(69, 90, 100); transform-origin: 196.085px 357.41px;" id="elsxj2j2pkmk" class="animable"></path>
                        <path d="M201,359.37a25.8,25.8,0,0,1-4.67-.21,26.38,26.38,0,0,1-4.65-.51,29.61,29.61,0,0,1,9.32.72Z" style="fill: rgb(69, 90, 100); transform-origin: 196.34px 358.974px;" id="eliwvvpdqd3w" class="animable"></path>
                        <g id="elgqer09dxhjn">
                            <path d="M152.16,283.76a6.08,6.08,0,0,0,4.38,2.33,19.73,19.73,0,0,0,5.37-.1c11.45-1.27,23.58-2.44,34.79-5.17-14.51.81-29.84.54-44.35,1.35l-.15,1.24" style="opacity: 0.2; transform-origin: 174.43px 283.523px;" class="animable"></path>
                        </g>
                        <g id="eljzgbcdxmlco">
                            <g style="opacity: 0.2; transform-origin: 171.2px 320.08px;" class="animable">
                                <polygon points="167.11 304.21 175.29 335.95 174.72 305.55 167.11 304.21" id="el799v2jgjqe" class="animable" style="transform-origin: 171.2px 320.08px;"></polygon>
                            </g>
                        </g>
                    </g>
                    <defs>
                        <filter id="active" height="200%">
                            <feMorphology in="SourceAlpha" result="DILATED" operator="dilate" radius="2"></feMorphology>
                            <feFlood flood-color="#32DFEC" flood-opacity="1" result="PINK"></feFlood>
                            <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE"></feComposite>
                            <feMerge>
                                <feMergeNode in="OUTLINE"></feMergeNode>
                                <feMergeNode in="SourceGraphic"></feMergeNode>
                            </feMerge>
                        </filter>
                        <filter id="hover" height="200%">
                            <feMorphology in="SourceAlpha" result="DILATED" operator="dilate" radius="2"></feMorphology>
                            <feFlood flood-color="#ff0000" flood-opacity="0.5" result="PINK"></feFlood>
                            <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE"></feComposite>
                            <feMerge>
                                <feMergeNode in="OUTLINE"></feMergeNode>
                                <feMergeNode in="SourceGraphic"></feMergeNode>
                            </feMerge>
                            <feColorMatrix type="matrix" values="0   0   0   0   0                0   1   0   0   0                0   0   0   0   0                0   0   0   1   0 "></feColorMatrix>
                        </filter>
                    </defs>
                </svg>
            </div>
        </div>
    </div>


    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ url("/assets/backend") }}/bootstrap/js/popper.min.js"></script>
    <script src="{{ url("/assets/backend") }}/bootstrap/js/bootstrap.min.js"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ url("/assets/backend") }}/assets/js/authentication/form-1.js"></script>
    {!! session('pesan'); !!}

    <script>
        $(document).ready(function(){$("#myform");const i=$("#saya_siswa"),e=$(".siswa-field");e.hide(),i.on("click",function(){$(this).is(":checked")?(e.show(),e.find("input").attr("required",!0),e.find("select").attr("required",!0)):(e.hide(),e.find("input").attr("required",!1),e.find("select").attr("required",!1))})});
    </script>
    @if (old('saya_siswa') != null)
        <script>
           setTimeout(()=>{const s=$(".siswa-field");s.show(),$("#no_induk").val("{{ old('nis') }}"),$("select[name=kelas_id]").val("{{ old('kelas_id') }}")},300);
        </script>
    @endif

</body>


</html>