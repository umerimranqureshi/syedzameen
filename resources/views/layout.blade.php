<!DOCTYPE html>
<html lang="en">


<head>
    <!--===== Meta Tag =====-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Syed-Zameen">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="business, property, directory, listing, real estate, Real estate, realtor, developer, apartment, broker, real estate agency, map, company, agent, rent house,property,house,makaan,makan,ghar,home,plots ">
    <meta name="author" content="root">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--CSs Links
 ==================================================================-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/mainCustom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/frontpage.css') }}">
    {{-- <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}"> --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <script src="https://use.fontawesome.com/429cd5e81f.js"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/layerslider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/flaticon/flaticon.css') }}">
    <!--====================================================
 Typography links
 Import Google Fonts
 ======================================================-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&amp;display=swap" rel="stylesheet">


    <script src="{{ asset('assetsAdminPanel/js/jquery.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />



    @yield('header')


    <!-- Title -->
    <title>Syed-Zameen</title>

    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('tabIcon2.png') }}">
    {{-- <link rel="icon" href="{{asset('logo-3.png')}}"> --}}
</head>

<style>
    .ChangeDropdownHover:hover {
        background-color: none !important;
    }

    /* #loader {

        width: 100%;

        background: rgba(136, 134, 133, 0.719) url('logo-3.png') no-repeat center center;

        display: flex;
        justify-content: center;

    } */
    #preloader {
        width: 100%;
        height: 100vh;
        position: fixed;
        z-index: 99999;
        background: #181716ce;
        top: 0px;
        left: 0px;
    }

    .loader-img {
        width: 140px;
        height: 100px;
        position: absolute;
        top: 27%;
        left: 48%;
        margin: -20px -50px;
    }

    #loader {
        width: 100px;
        height: 40px;
        position: absolute;
        top: 50%;
        left: 49%;
        margin: -20px -50px;

    }

    #loader div {
        width: 20px;
        height: 20px;
        background: rgb(105, 174, 230);
        border-radius: 50%;
        position: absolute;
    }

    #d1 {
        animation: animate 2s linear infinite;
    }

    #d2 {
        animation: animate 2s linear infinite -.4s;
    }

    #d3 {
        animation: animate 2s linear infinite -.8s;
    }

    #d4 {
        animation: animate 2s linear infinite -1.2s;
    }

    #d5 {
        animation: animate 2s linear infinite -1.6s;
    }

    #d6 {
        animation: animate 2s linear infinite -2s;
    }

    @-webkit-keyframes animate {
        0% {
            left: 100px;
            top: 0
        }

        80% {
            left: 0;
            top: 0;
        }

        85% {
            left: 0;
            top: -20px;
            width: 20px;
            height: 20px;
        }

        90% {
            width: 40px;
            height: 15px;
        }

        95% {
            left: 100px;
            top: -20px;
            width: 20px;
            height: 20px;
        }

        100% {
            left: 100px;
            top: 0;
        }
    }


    .navbar {

        background-color: transparent;
        padding: 10px;
        /* position: fixed; */
        width: 100%;
        transition: background-color 0.3s ease-in-out;
    }

    .nav-link {
        color: #fff !important;
    }

    .navbar-scrolled {
        background-color: #000;
    }

    .navbar-scrolled>.nav-link {
        color: #2f77ad !important;

    }
    .navbar-scrolled .nav-link {
    color: #fff !important;
}

    @media(max-width:992px) {
        .navbar-link-mobile-screen {

            display: block;
        }
    }

    @media(min-width:992px) {
        .navbar-link-mobile-screen {

            display: none;
        }
    }
    /* .navbar-dark {
        background-color: #00000026;
    } */
    #header{
        z-index: 999;
    }
</style>

<body>

    <div id="preloader">
        <div class="loader-img">
            <img src="{{ asset('logo-3.png') }}" alt="">
        </div>
        <div id="loader">

            <div id="d1"></div>
            <div id="d2"></div>
            <div id="d3"></div>
            <div id="d4"></div>
            <div id="d5"></div>
            <div id="d6"></div>

        </div>
    </div>



    <!-- Start Back to top
=========================================================================-->
    <div id="scroll" style="display: none;"><i class="fa fa-angle-up"></i></div>
    <!-- End Back to top
=========================================================================-->
    <!-- Header Start
=========================================================================-->
    <header class="nav-on-top">
        <div class="top-header bg-secondary" style="line-height: 50px; height:50px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-5">
                        <ul class="list-style-1 icon-primary color-white d-flex">

                            {{-- <div> --}}


                            <li class="d-flex align-items-center justify-content-center"><i class="fa fa-envelope"></i>
                                <a href="mailto:support@syedzameen.com" class="color-white">info@syedzameen.com</a>
                            </li>
                            {{-- <li><i class="fa fa-phone"></i> +(92)322-8447174 </li> --}}
                            <li class="d-flex align-items-center "><a href="tel:+923328447174"><i
                                        class="fa fa-phone"></i> </a> <a href="tel:+923328447174"
                                    class="color-white">+(92)332-8447174</a></li>



                            {{-- </div> --}}


                        </ul>
                    </div>
                    {{-- logo of side  --}}
                    {{-- <div class="col-md-12 col-lg-3"> --}}
                    {{-- <a class="navbar-brand logo-2" href="{{ url('/') }}">
                            <img src="{{ asset('/index-logo.png') }}" alt="logo">
                        </a> --}}

                    <div class="col-md-12 col-lg-7">
                        <ul class="social-media-1 social-media-1-n d-flex color-white-a float-right"
                            style="line-height: 50px; height:50px;">

                            @if (Auth::check())
                                <li>
                                    <div class="dropdown" id="top-nav">
                                        <button class="btn btn-secondary dropdown-toggle ChangeDropdownHover"
                                            type="button" id="dropdownMenuButton"
                                            onmouseover="this.style.color='#2f77ad'"
                                            onmouseout="this.style.color='white'" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            {{ Auth::user()->name }} <i class="fa fa-caret-down"
                                                aria-hidden="true"></i>
                                        </button>
                                        <div style="background: #fff; z-index:99999999" class="dropdown-menu"
                                            aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('dashbored') }}">Dashbored</a>
                                            {{-- <a class="dropdown-item" href="#">Another action</a> --}}
                                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                                        </div>
                                    </div>
                                </li>
                            @else
                                {{-- <div> --}}
                                <li class="d-flex justify-content-right
                                    "><a
                                        href="{{ url('login') }}" style=" background-color:#2f77ad "><i
                                            class="position-relative add-property "
                                            style="font-weight: 20px; font-style:initial; color:#fff;">Add
                                            Property</i></a>
                                </li>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class=" color-gray-light mt-md-30">
                                        <div class="widget-content hover-white-primary">
                                            <ul class="quick-links d-flex">
                                                <li><a href="https://apps.apple.com/pk/app/syed-zameen/id1610750346"><i class="fab fa-apple" aria-hidden="true"></i>
                                                </a>
                                                    </li>
                                        
                                                    {{-- <li><a
                                                        href="https://play.google.com/store/apps/details?id=com.technolyte.syedzameen&hl=en&gl=US"><img
                                                            src="{{ asset('png-transparent-iphone-google-play-android.jpg') }}"
                                                            style="    width: 138px;height: 36px;    border-radius: 4px;}"></a>
                                                </li>
                                                 --}}
                                                <li><a href="https://play.google.com/store/apps/details?id=com.technolyte.syedzameen&hl=en&gl=US">
                                                    {{-- <i class="fa-brands fa-google-play"></i> --}}
                                                    <i class="fab fa-google-play" ></i>
                                                </a>
                                                </li>
                                                <li><a href="https://www.facebook.com/syedzameen07"><i class="fab fa-facebook"></i></a></li>
                                                <li><a href="https://www.instagram.com/syedzameenpk/"><i class="fab fa-instagram"></i></a></li>
                                                {{-- <li><a href="https://apps.apple.com/pk/app/syed-zameen/id1610750346"><img
                                                            src="{{ asset('5a902db97f96951c82922874-png.jpg') }}"
                                                            style=" width: 138px;height: 36px;
                                        border-radius: 4px;"></i></a>
                                                </li> --}}
                                               
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                {{-- </div> --}}
                            @endif

                            {{-- <li><a href="{{url('auth/facebook')}}"><i class="fa fa-facebook"></i></a></li>
                            --}}


                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar" id="navbar">
            <div id="header" class="nav-header header-seven navbar-dark" style="width:100%">
                <div class="container">
                    <nav class="navbar navbar-expand-lg  px-0">
                        {{-- Project Logo  --}}
                        <div class="col-md-3 col-lg-4 col-8">
                            <a class="navbar-brand logo-2" href="{{ url('/') }}">
                                <img src="{{ asset('/index-logo3.png') }}" alt="logo">
                            </a>
                            <a class="navbar-brand d-none d-block-md" href="#">
                                <img src="{{ asset('index-logo3.png') }}" style="width:100px" alt="logo">
                            </a>
                            {{-- <li class="nav-item"><a class="nav-link"
                                    href="{{ route('showAgencies') }}" style="font-weight: bold" >Agencies</a></li> --}}
                        </div>

                        <button class="toggle-btn" data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span style="font-size: 30px;color:rgb(226, 145, 65)"><i class="fa fa-bars"
                                    aria-hidden="true"></i></span>
                            <span></span>
                            <span></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">

                                {{-- <div class="d-flex"> --}}


                                <li class="nav-item dropdown mega-menu">
                                    <a class="nav-link dropdown-toggle" href="{{ route('home') }}" role="button"
                                        aria-haspopup="true" aria-expanded="false"
                                        style="font-weight: bold;  ">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        style="font-weight: bold; ">Rent</a>
                                    <ul class="dropdown-menu shadow">
                                        <li><a class="dropdown-item"
                                                href="{{ route('rentResidential') }}">Residential</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('rentCommercial') }}">Commercial</a>
                                        </li>
                                    </ul>
                                </li>


                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"style="font-weight: bold; ">Buy</a>
                                    <ul class="dropdown-menu shadow">
                                        {{-- <div> --}}
                                        {{-- <li><a class="dropdown-item"
                                                        href="{{ route('saleResidentail') }}">Homes</a></li> --}}

                                        <li><a class="dropdown-item" href="{{ route('plotResidentail') }}">Plots</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('buyCommercial') }}">Commercial</a>
                                        </li>
                                    </ul>

                                </li>

                                <li class="nav-item  ">
                                    <a class="nav-link" href="{{ route('mainBlogView') }}"
                                        style="font-weight: bold;  ">Blog</a>

                                </li>
                                <li class="nav-item  ">
                                    <a class="nav-link" href="{{ route('showAgencies') }}"
                                        style="font-weight: bold;  ">Agencies</a>

                                </li>
                                <li class="nav-item  ">
                                    <a class="nav-link" href="{{ route('contactUs') }}"
                                        style="font-weight: bold;  ">Contact</a>

                                </li>
                                {{-- </div> --}}
                                <li class="nav-item navbar-link-mobile-screen">
                                    @if (Auth::check())
                                        <div class="dropdown ">
                                            <button
                                                style="p
                                                    ing:0;color:black !important;border:none; background-color:transparent !important"
                                                class="btn btn-secondary dropdown-toggle ChangeDropdownHover"
                                                type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                {{ Auth::user()->name }}
                                                <i class="fa fa-caret-down" aria-hidden="true"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item"
                                                    href="{{ route('dashbored') }}">Dashbored</a>
                                                {{-- <a class="dropdown-item" href="#">Another action</a> --}}
                                                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                                            </div>
                                        </div>
                                    @else
                                        <a class="nav-link" href="{{ url('login') }}">Login</a>
                                    @endif
                                </li>
                            </ul>
                            @if (Auth::check())

                                @if (Auth::user()->role == 2)
                                    <ul class="ml-auto">
                                        <li><a class="btn btn-secondery position-relative mr-auto"
                                                href="{{ route('verificationView') }}">Become a seller</a>
                                        </li>
                                    </ul>
                                @endif

                            @endif
                        </div>


                        {{-- <div class="d-flex" style="list-style-type: none; ">
                                        <li class="nav-item"><a class="nav-link "
                                            href="{{ route('mainBlogView') }}" style="font-weight: bold; color:#2f77ad;"onmouseover="this.style.color='#fff';" onmouseout="this.style.color='#2f77ad';">Blog</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="{{ route('showAgencies') }}" style="font-weight: bold; color:#2f77ad;"onmouseover="this.style.color='#fff';" onmouseout="this.style.color='#2f77ad'" >Agencies</a></li>
                                     <li class="nav-item"><a class="nav-link"
                                            href="{{ url('contactus') }}" style="font-weight: bold; color:#2f77ad;" onmouseover="this.style.color='#fff';" onmouseout="this.style.color='#2f77ad';">Contact</a>
                                    </li>

                                </div> --}}



                        {{--   <li class="nav-item"><a class="nav-link" href="{{route('contactUs')}}">Contact
                                    &
                                    Services</a></li>
                                    --}}


                        {{-- </ul> --}}



                        {{-- </div> --}}
                    </nav>
                </div>

            </div>
        </div>
    </header>
    <!-- Header End ---->




    @yield('body')




    <!---    Footer Start
=========================================================================-->
    <footer class="bg-secondary pb-10" style="margin-top: -34px; padding-top: 54px; font-size:14px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-6">
                    <div class="footer-logo px-15"><a href="#"><img src="{{ asset('index-logo3.png') }}"
                                alt="Footer Logo"></a>
                    </div>
                </div>
                <div class="col-sm-8 col-md-8 col-lg-6">
                    <ul class="social-media-2 border-white large color-white-a float-right">
                        <li class="mr-20 color-white mt-50"><strong>Follow Us:</strong></li>
                        <li><a href="https://www.facebook.com/syedzameen07"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/SyedZameenPK"><i class="fa fa-twitter"></i></a></li>
                        {{-- <li><a href="#"><i class="fa fa-behance"></i></a></li> --}}
                        <li><a href="https://www.instagram.com/syedzameenpk/"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="https://www.linkedin.com/in/syed-zameenpk-5b4a1b208/"><i
                                    class="fa fa-linkedin"></i></a></li>
                        <li><a href="https://www.youtube.com/@syedrealestate612"><i class="fa fa-youtube"></i></a>
                        </li>

                </div>
                <hr class="border-bottom-1 w-100 my-10">
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="footer-widget color-gray-light mt-sm-30">
                        <h6 class="color-white line-bottom  mb-10">Have Any Question?</h6>
                        <div class=" color-primary">
                            <ul class="">
                                <li>
                                    Call
                                    <a href="tel:+923328447174" class="color-white">+(92)332-8447174</a>
                                </li>
                                <li>
                                    Email
                                    <a href="mailto:support@syedzameen.com"
                                        class="color-white">Support@syedzameen.com</a>
                                </li>
                                <li>
                                    Address
                                    <a href="https://maps.google.com/?q=28F+1st+Floor+commercial+Area+DHA,+Phase+1+Lahore"
                                        class="color-white">28F 1st Floor commercial Area DHA, Phase 1 Lahore</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="footer-widget color-gray-light mt-sm-30">
                        <h6 class="color-white line-bottom  mb-10">Company</h6>
                        <div class=" hover-white-primary">
                            <ul class="quick-links">
                                <!--<li><a href="#">About Us</a></li>-->
                                <li><a href="{{ url('about-us') }}">About Us</a></li>
                                <li><a href="{{ url('contactus') }}">Contact Us</a></li>
                                {{-- <li><a href="#">Jobs</a></li> --}}
                                <li>Jobs</li>
                                <li>Help & Support</li>
                                <li>Advertise on Zameen</li>
                                <li></li>
                                <li><a href="{{ url('term-and-condition') }}">Terms and Conditions</a></li>
                                {{-- <li><a href="#">Help & Support</a></li> --}}
                                {{-- <li><a href="#">Advertise On Zameen</a></li> --}}
                                {{-- <li><a href="#">Terms Of Use</a></li> --}}
                                {{-- <li><a href="{{route('contactUs')}}">Contact</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="footer-widget color-gray-light mt-md-30">
                        <h6 class="color-white line-bottom  mb-10">Quick Links</h6>
                        <div class=" hover-white-primary">
                            <ul class="quick-links">
                                <li><a href="{{ url('rent/commercial') }}">For Rent</a></li>
                                <li><a href="{{ url('sale/residential') }}">For Sale</a></li>
                                <li><a href="{{ url('commercial') }}">Commercial</a></li>
                                <li><a href="{{ route('showAgencies') }}">Agencies</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="footer-widget color-gray-light mt-md-30">
                        <h6 class="color-white line-bottom mb-10">Download Applicaton</h6>
                        <div class="widget-content hover-white-primary">
                            <ul class="quick-links">
                                <li><a href="https://apps.apple.com/pk/app/syed-zameen/id1610750346"><img
                                            src="{{ asset('5a902db97f96951c82922874-png.jpg') }}"
                                            style=" width: 200px;height: 53px;"></i></a></li>
                                <li><a
                                        href="https://play.google.com/store/apps/details?id=com.technolyte.syedzameen&hl=en&gl=US"><img
                                            src="{{ asset('png-transparent-iphone-google-play-android.jpg') }}"
                                            style="    width: 200px;height: 53px;"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="copyright bg-secondary color-white">
        <div class="container">
            <div class="row">
                <hr class="border-bottom-1 w-100 m-0">
                <div class="col-md-12 col-lg-12">
                    <div class="text-center d-flex justify-content-center" style="font-size:12px;">
                        Copyright &nbsp;<a href="http://directoptimize.com" target="_blank"> directoptimize.com </a>&nbsp; © 2023. All Rights Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
    <!-- jquery Links
==================================================================-->
    <script src="{{ asset('assets/js/jquery-v3.4.1.js') }}"></script>
    <script src="{{ asset('assets/js/greensock.js') }}"></script>
    <script src="{{ asset('assets/js/layerslider.transitions.js') }}"></script>
    <script src="{{ asset('assets/js/layerslider.kreaturamedia.jquery.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/tmpl.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dependClass-0.1.js') }}"></script>
    <script src="{{ asset('assets/js/draggable-0.1.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slider.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#slider').layerSlider({
                sliderVersion: '6.0.0',
                type: 'fullsize',
                responsiveUnder: 0,
                maxRatio: 1,
                hideUnder: 0,
                hideOver: 100000,
                pauseOnHover: 'disabled',
                skin: 'outline',
                showBarTimer: false,
                showCircleTimer: false,
                sliderFadeInDuration: 800,
                tnContainerWidth: '100%',
                tnWidth: 170,
                tnHeight: 100,
                skinsPath: '{{ asset('assets/images/slider/skins/') }}',
                height: 600,
                width: 1000
            });
        });
    </script>
    <script>
        $(window).on('load', function() {


            $('#preloader').show();

        });

        $(document).ready(() => {
            $('#preloader').delay(100).fadeOut('slow');
            setTimeout(function() {
                $('#preloader').remove();
            }, 500);
        });



        // $(document).ready(()=>{
        //     $('div#loading').removeAttr('id');
        // });

        document.onkeydown = function(e) {
            if (e.keyCode == 123) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                return false;
            }

            if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                return false;
            }
        }
    </script>

    <script>
        function getAreaFromCity(city = "lahore") {

            $.ajax({
                url: `{{ url('areas/') }}/${city}`,
                success: function(res) {

                    $("#location").html(function() {
                        $allOption = " <option hidden selected></option>";
                        for ($i = 0; $i < res.length; $i++) {
                            $allOption += "<option value='" + res[$i].id + "'> " + res[$i].area +
                                " </option>";

                        }
                        // console.log();
                        return $allOption;
                    });




                }



            });

        }


        $(document).ready(function() {
            getAreaFromCity();
        });

        window.addEventListener("scroll", function() {
            const navbar = document.getElementById("navbar");
            const scrolled = window.scrollY > 0;
            if (scrolled) {
                navbar.classList.add("navbar-scrolled");
            } else {
                navbar.classList.remove("navbar-scrolled");
            }
        });
    </script>
</body>


</html>
