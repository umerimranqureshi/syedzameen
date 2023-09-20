@inject('helper', 'App\Http\Controllers\helper')

<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8" />
    <title> Syed-Zameen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->

    <meta name="csrf-token" content="{{csrf_token()}}">

    <!-- App css -->
    <!--<link href="{{asset('/assetsAdminPanel/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="{{ asset('assetsAdminPanel/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assetsAdminPanel/css/theme.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assetsAdminPanel/css/mycustom.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assetsAdminPanel/css/custom.css') }}">
    <script src="{{ asset('assetsAdminPanel/js/jquery.min.js') }}"></script>
    <link rel="shortcut icon" type="image/png" href="{{asset('tabIcon.png')}}">

    @yield('header')
    <style>
    #preloader {
        width: 100%;
        height: 100vh;
        position: fixed;
        z-index: 99999;
        background: #181716c4;
        top: 0px;
        left: 0px;
    }

    .loader-img {

        position: absolute;
        position: absolute;
        top: 37%;
        left: 47%;
        margin: -20px -50px;
    }

    .loader-img img {
        width: 140px;
        height: 100px;
    }

    #loader {
        width: 100px;
        height: 40px;
        position: absolute;
        top: 50%;
        left: 50%;
        margin: -20px -50px;

    }

    #loader div {
        width: 20px;
        height: 20px;
        background: rgb(230, 186, 105);
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

    .circle-name-profile {
        font-size: 20px;
        border: 1px solid gray;
        color: blue;
    }
    
     a:hover {
  background-color: black;
}
    </style>

</head>

<body>
    <div id="preloader">
        <div class="loader-img">
            <img src="{{asset('logo-3.png')}}" alt="">
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
    <!-- Begin page -->
    <div id="layout-wrapper">
        <div class="header-border"></div>
        <header id="page-topbar">



            <div class="navbar-header bg-light">

                <div class="d-flex align-items-center">
                    <img class="brand-logo" src="{{ asset('admin_panel-logo.png') }}" alt="">

                    <!--<button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect"-->
                    <!--    id="vertical-menu-btn">-->
                    <!--    <i class="fa fa-fw fa-bars"></i>-->
                    <!--</button>-->

                    @if(Auth::user()->role=='3')
                    <div class="dropdown d-none d-sm-inline-block">
                        <button type="button" class="btn header-item waves-effect" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-coin" style="font-size: 20px;color:orange"></i> Coins
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu">

                            <!-- item-->
                            @if(Auth::user()->Account)
                            <a href="javascript:void(0);" class="dropdown-item notify-item">

                                <i class="mdi mdi-coin" style="color: orange"></i> {{Auth::user()->Account->coins}}
                            </a>
                            <a href="{{route('CoinBuy')}}" class="dropdown-item notify-item">

                                Buy More Coins
                            </a>
                            @else
                            <a href="{{route('CoinBuy')}}" class="dropdown-item notify-item">

                                Buy Coins
                            </a>
                            @endif

                        </div>
                    </div>
                    @endif
                </div>

                @if ($helper->checkPhoneVerification() == 0)
                <div>

                    <a href="{{ route('verificationView') }}">
                        <p class="text text-info">please verify your phone number , to continue your add posting
                        </p>

                    </a>

                </div>
                @endif
                <div class="d-flex align-items-center">

                    {{--  <div class="dropdown d-none d-sm-inline-block ml-2">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                            aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..."
                                            aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>




                    </div> --}}

                    {{-- <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img class="" src="assets/images/flags/us.jpg" alt="Header Language" height="16">
                            <span class="d-none d-sm-inline-block ml-1">English</span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="assets/images/flags/spain.jpg" alt="user-image" class="mr-1" height="12">
                                <span class="align-middle">Spanish</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="assets/images/flags/germany.jpg" alt="user-image" class="mr-1" height="12">
                                <span class="align-middle">German</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="assets/images/flags/italy.jpg" alt="user-image" class="mr-1" height="12">
                                <span class="align-middle">Italian</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="assets/images/flags/russia.jpg" alt="user-image" class="mr-1" height="12">
                                <span class="align-middle">Russian</span>
                            </a>
                        </div>
                    </div> --}}





                    {{-- <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" style="padding-right:17px ">
                            <i class="mdi mdi-bell"></i>
                            <span class="badge badge-danger badge-pill" style="left: 26px">1</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0"> Notifications </h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#!" class="small"> View All</a>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 230px;">



                                <a href="#" class="text-reset notification-item">
                                    <div class="media">
                                        <img src="" class="mr-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1">Samuel Coverdale</h6>
                                            <p class="font-size-12 mb-1">You have new follower on Instagram</p>
                                            <p class="font-size-12 mb-0 text-muted"><i
                                                    class="mdi mdi-clock-outline"></i> 2 min ago</p>
                                        </div>
                                    </div>
                                </a>



                            </div>


                            <div class="p-2 border-top">
                                <a class="btn btn-sm btn-light btn-block text-center" href="javascript:void(0)">
                                    <i class="mdi mdi-arrow-down-circle mr-1"></i> Load More..
                                </a>
                            </div>
                        </div>
                    </div> --}}

                    <div class="dropdown d-inline-block ml-2">
                        <button class="btn header-item  dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            @if (auth()->user()->img_path)
                            <img class="rounded-circle header-profile-user" src="{{ asset(auth()->user()->img_path) }}"
                                alt="Header Avatar" style="width: 50px;height:50px">
                            @else
                            <div class="rounded-circle header-profile-user circle-name-profile" alt="Header Avatar"
                                style="width: 40px;height:40px">
                                <?php $name=Auth::user()->name;echo ucfirst($name[0]);?>
                            </div>
                            @endif
                            <span class="d-none d-sm-inline-block ml-1">{{ auth()->user()->name }}</span>

                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">
                            <a class="dropdown-item d-flex align-items-center justify-content-between fw-bolder"
                                href="{{ route('home') }}">
                                <span>Home</span>
                                <span>
                                    <span class="badge badge-pill badge-info"></span>
                                </span>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between fw-bolder"
                                href="{{ route('editProfile') }}">
                                <span>Profile</span>
                                <span>
                                    <span class="badge badge-pill badge-warning">1</span>
                                </span>
                            </a>
                            {{-- <a class="dropdown-item d-flex align-items-center justify-content-between fw-bolder"
                                href="javascript:void(0)">
                                Settings
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between fw-bolder"
                                href="javascript:void(0)">
                                <span>Lock Account</span>
                            </a> --}}
                            <a class="dropdown-item d-flex align-items-center justify-content-between fw-bolder"
                                href="{{ route('logout') }}">
                                <span>Log Out</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <!--===============topbar menu start================-->
            <div>
                <nav class="navbar navbar-expand-lg navbar-light bg-secondary"
                    style="z-index: 999;position: fixed;right: 0; left: -159px;">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown"
                            style="margin-left:10%">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link  text-light fw-bolder " aria-current="page"
                                        href="{{ url('dashbored') }}">Dashboard</a>
                                </li>

                                @if(Auth::check())
                                @if(Auth::user()->role==1)
                                <li class="nav-item">
                                    <a class="nav-link text-light fw-bolder"
                                        href="{{ route('adminDeleteDisable') }}">Listings</a>
                                </li>
                                @endif
                                @endif
                                @if(Auth::check())
                                @if(Auth::user()->role==2)
                                <li class="nav-item">
                                    <a class="nav-link text-light fw-bolder"
                                        href="{{route('userviewpost')}}">Listings</a>
                                </li>
                                @endif
                                @endif

                                @if(Auth::check())
                                @if(Auth::user()->role==3)
                                <li class="nav-item">
                                    <a class="nav-link text-light fw-bolder"
                                        href="{{ route('sellerview') }}">Listings</a>
                                </li>
                                @endif
                                @endif

                                @if(Auth::check())
                                @if(Auth::user()->type==1)
                                <li class="nav-item">
                                    <a class="nav-link text-light fw-bolder"
                                        href="{{ url('dealerDetails') }}">Listings</a>
                                </li>
                                @endif
                                @endif

                                @if(Auth::check())
                                @if(Auth::user()->type==1)
                                <li class="nav-item">
                                    <a class="nav-link text-light fw-bolder" href="{{ url('dealerAddSocietycreate') }}">Dealer Admin
                                        Post</a>
                                </li>
                                @endif
                                @endif
                                
                                 @if(Auth::check())
                                @if(Auth::user()->type==1)
                                <li class="nav-item">
                                    <a class="nav-link text-light fw-bolder" href="{{ url('getAllDealerSociety') }}">All Dealer
                                    </a>
                                </li>
                                @endif
                                @endif

                                @if(Auth::check())
                                @if(Auth::user()->role==1)
                                <li class="nav-item">
                                    <a class="nav-link text-light fw-bolder" href="{{ route('adminPost') }}">Admin
                                        Post</a>
                                </li>
                                @endif
                                @endif

                                @if(Auth::check())
                                @if(Auth::user()->role==1)
                                <li class="nav-item">
                                    <a class="nav-link text-light fw-bolder" href="{{route('adminaddcity')}}">Add
                                        City</a>


                                </li>
                                @endif
                                @endif

                                

                                @if(Auth::check())
                                @if(Auth::user()->role==1)
                                <li class="nav-item">
                                    <a class="nav-link text-light fw-bolder" href="{{route('admincityview')}}">View
                                        City</a>


                                </li>
                                @endif
                                @endif

                                @if(Auth::check())
                                @if(Auth::user()->role==1)
                                <li class="nav-item">
                                    <a class="nav-link text-light fw-bolder" href="{{route('adminagencyindex')}}">Add
                                        Agency</a>


                                </li>
                                @endif
                                @endif

                                @if(Auth::check())
                                @if(Auth::user()->role==1)
                                <li class="nav-item">
                                    <a class="nav-link text-light fw-bolder" href="{{route('admincategoryview')}}">View
                                        Category</a>


                                </li>
                                @endif
                                @endif

                                @if(Auth::check())
                                @if(Auth::user()->role==2)
                                <li class="nav-item">
                                    <a class="nav-link text-light fw-bolder" href="{{ route('useraddpost') }}">Add
                                        Post</a>
                                </li>
                                @endif
                                @endif

                                @if(Auth::check())
                                @if(Auth::user()->role==3)
                                <li class="nav-item">
                                    <a class="nav-link text-light fw-bolder" href="{{route('postadd')}}">Add Post</a>

                                </li>
                                @endif
                                @endif

                                @if(Auth::check())
                                @if(Auth::user()->role==1)
                                <li class="nav-item">
                                    <a class="nav-link text-light fw-bolder" href="{{route('freshesRatesView')}}">Fresh
                                        Rates</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link text-light fw-bolder" href="{{route('allCoinRequest')}}">Coin
                                        Request</a>
                                </li>
                                @endif
                                @endif
                                @if(Auth::check())
                                @if(Auth::user()->role==3 || Auth::user()->role==2)
                                <li class="nav-item">
                                    <a class="nav-link text-light fw-bolder"
                                        href="{{route('allCoinRequest')}}">Coins</a>
                                </li>
                                @endif
                                @endif

                                @if(Auth::check())
                                @if(Auth::user()->role==1)
                                <li class="nav-item">
                                    <a class="nav-link text-light fw-bolder" href="{{route('allPostReq')}}">Boaster
                                        Request</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light fw-bolder"
                                        href="{{ route('showFavPost') }}">Favourites</a>
                                </li>



                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-light fw-bolder" href="#"
                                        id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="">
                                        Blogs
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a class="dropdown-item fw-bolder" href="{{route('blogAdminView')}}">create
                                                Blog</a></li>
                                        <li><a class="dropdown-item fw-bolder" href="{{route('blogAll')}}">All Blog</a>
                                        </li>
                                          <li><a class="dropdown-item fw-bolder" href="{{route('adminaddmanageindex')}}">Manage Add</a>
                                        </li>

                                    </ul>
                                </li>



                                <li class="nav-item">
                                    <a class="nav-link text-light fw-bolder" href="/">Boost Post</a>
                                </li>

                                @endif
                                @endif
                                @if(Auth::check())
                                @if(Auth::user()->role==1)    
                                <li class="nav-item">
                                    <a class="nav-link text-light fw-bolder"
                                        href="{{route('requestToAgenst')}}">All requests
                                            to
                                            agents</a>
                                </li>
                               
                                <li class="nav-item">
                                    <a class="nav-link text-light fw-bolder"
                                        href="{{route('showClientRequest')}}">Client
                                            requests</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link text-light fw-bolder"
                                        href="">
                                            request an agent</a>
                                </li>
                                
                                @endif
                                @endif

                                @if(Auth::check())
                                @if(Auth::user()->role==1)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-light fw-bolder " href="#"
                                        id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="">
                                        Message Center
                                        <span class="badge bg-danger" id="messageTotal"></span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a class="dropdown-item fw-bolder "
                                                href="{{route('inbox.index')}}">Inbox</a></li>
                                        @endif
                                        @endif

                                        @if(Auth::check())
                                        @if(Auth::user()->role==2 || Auth::user()->role==3)
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle text-light fw-bolder " href="#"
                                                id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                                                aria-expanded="">
                                                Help Line
                                                <span class="badge bg-danger" id="messageTotal"></span>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <li><a class="dropdown-item fw-bolder "
                                                        href="{{route('inbox.index')}}">Inbox</a></li>
                                                @endif
                                                @endif



                                            </ul>
                                        </li>
                                    </ul>

                        </div>
                    </div>
                </nav>

            </div>



            <!--============================topbar menu end=============================-->

        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <div class="navbar-brand-box p-1">
                    <a href="#" class="logo">
                        <img style="height: 100%;width:100%; margin-top:20px" src="{{ asset('admin_panel-logo.png') }}"
                            alt="">
                        <span>

                        </span>
                    </a>
                </div>



                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Property Management</li>

                        <li>
                            <a href="{{ url('dashbored') }}" class="waves-effect"><i
                                    class="mdi mdi-home-analytics"></i><span
                                    class="badge badge-pill badge-primary float-right"></span><span>Dashboard</span></a>
                        </li>

                        @if (Auth::user()->role == 3 && $helper->checkPhoneVerification() == 1)

                        <li>

                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                    class="mdi mdi-table-merge-cells"></i><span>Posts</span></a>
                            <ul class="sub-menu" aria-expanded="false">

                                <li><a href="{{ url('post/add') }}" class="waves-effect"><i
                                            class="feather-upload-cloud"></i><span
                                            class="badge badge-pill badge-primary float-right"></span><span>Post New
                                            Add</span></a></li>
                                <li>
                                    <a href="{{ url('all/post') }}" class="waves-effect"><i
                                            class="mdi mdi-table-edit"></i><span
                                            class="badge badge-pill badge-primary float-right"></span><span>All
                                            Post</span></a>
                                </li>



                            </ul>

                        </li>


                        <li>
                            <a href="{{ route('PricingView') }}" class="waves-effect"><i
                                    class="fas fa-dollar-sign"></i><span
                                    class="badge badge-pill badge-primary float-right"></span><span>Pricing
                                </span></a>
                        </li>




                        <li>
                            <a href="{{ route('agency') }}" class="waves-effect"><i class="mdi mdi-table-edit"></i><span
                                    class="badge badge-pill badge-primary float-right"></span><span>Add/Edit
                                    Agency</span></a>
                        </li>

                        <li>
                            <a href="" class="waves-effect"><i class="mdi mdi-table-edit"></i><span
                                    class="badge badge-pill badge-primary float-right"></span><span>All requests to
                                    agents
                                </span></a>
                        </li>

                        <li>
                            <a href="" class="waves-effect"><i class="mdi mdi-table-edit"></i><span
                                    class="badge badge-pill badge-primary float-right"></span><span>Client requests
                                </span></a>
                        </li>

                        @endif

                        @if (Auth::user()->role == 3 || Auth::user()->role == 2 || Auth::user()->role == 1)

                        <li>
                            <a href="{{ route('showFavPost') }}" class="waves-effect"><i class="mdi mdi-heart"></i><span
                                    class="badge badge-pill badge-primary float-right"></span><span>Favourites</span></a>
                        </li>
                        @endif


                        @if (Auth::user()->role == 1)
                        <li>
                            <a href="{{ route('adminPost') }}" class="waves-effect"><i
                                    class="mdi mdi-table-edit"></i><span
                                    class="badge badge-pill badge-primary float-right"></span><span>admin post
                                </span></a>
                        </li>

                        {{-- <li>
                            <a href="{{ route('blogAdminView') }}" class="waves-effect"><i
                            class="mdi mdi-table-edit"></i><span
                            class="badge badge-pill badge-primary float-right"></span><span>Write Blog !
                        </span></a>


                        </li> --}}

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                    class="mdi mdi-table-merge-cells"></i><span>Blogs</span></a>
                            <ul class="sub-menu" aria-expanded="false">

                                <li><a href="{{route('blogAdminView')}}"><span> Create Blog</span></a></li>

                                <li><a href="{{route('blogAll')}}">All Blog</a></li>

                            </ul>
                        </li>



                        @endif

                        @if (Auth::user()->role == 1)
                        <li>
                            <a href="{{ route('adminDeleteDisable') }}" class="waves-effect"><i
                                    class="mdi mdi-table-edit"></i><span
                                    class="badge badge-pill badge-primary float-right"></span><span>Delete/Disable
                                    post
                                </span></a>
                        </li>
                        <li>
                            <a href="{{route('freshesRatesView')}}" class="waves-effect"><i
                                    class="mdi mdi-fire"></i><span
                                    class="badge badge-pill badge-primary float-right"></span><span>Fresh Rates
                                </span></a>
                        </li>
                        <li>
                            <a href="{{route('allCoinRequest')}}" class="waves-effect"><i class="mdi mdi-coin"></i><span
                                    class="badge badge-pill badge-primary float-right"></span><span>Coin Request
                                </span></a>
                        </li>
                        <li>
                            <a href="{{route('allPostReq')}}" class="waves-effect"><i
                                    class="mdi mdi-arrow-up-bold-circle"></i><span
                                    class="badge badge-pill badge-primary float-right"></span><span>Boaster Request
                                </span></a>
                        </li>
                        @endif

                        @if (Auth::user()->role == 2)
                        <li>
                            <a href="{{ route('userMoreInfo') }}" class="waves-effect"><i
                                    class="mdi mdi-table-edit"></i><span
                                    class="badge badge-pill badge-primary float-right"></span><span>become a seller
                                </span></a>
                        </li>
                        @endif




                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                    class="mdi mdi-table-merge-cells"></i><span>Message Center</span>
                                <span class="badge badge-danger" id="messageTotal"></span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">

                                <li><a href="{{route('inbox.index')}}"><span>Inbox</span></a></li>

                                <!-- <li><a href="#">Sent Messages</a></li> -->

                            </ul>
                        </li>

                        @if(Auth::user()->role==1)
                        <li class="nav-item">
                            <a class="nav-link text-light fw-bolder" href="">Add City</a>

                        </li>
                        @endif



                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        @yield('body')
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Overlay-->
    <div class="menu-overlay"></div>


    <!-- jQuery  -->

    <!--<script src="{{ asset('assetsAdminPanel/js/bootstrap.bundle.min.js') }}"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assetsAdminPanel/js/metismenu.min.js') }}"></script>
    <script src="{{ asset('assetsAdminPanel/js/waves.js') }}"></script>
    <script src="{{ asset('assetsAdminPanel/js/simplebar.min.js') }}"></script>




    <!-- Chart Custom Js-->
    <script src="{{ asset('assetsAdminPanel/pages/knob-chart-demo.js') }}"></script>



    <!-- Custom Js -->
    <script src="{{ asset('assetsAdminPanel/pages/dashboard-demo.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assetsAdminPanel/js/theme.js') }}"></script>
    @yield('javascript')



</body>



</html>
<script src="{{ asset('js/app.js') }}"></script>
<script language=Javascript>
var publicUrl = "{{asset('')}}";

var AuthUser = "{{Auth::id()}}";

AuthUser = parseInt(AuthUser);






$(document).ready(function() {

    $.ajax({

        url: "{{url('/ajax/total/message/count')}}",

        success: function(res) {

            $("#messageTotal").text(res);
        },

    });
});



$(document).ready(function() {

    window.Echo.private('notificationNum.{{Auth::id()}}')
        .listen('notificationEvent', (e) => {
            console.log(e, "ss");
            $("#messageTotal").text(e.notification.unreadMsg);


            $newChat = true;

            $(".userChatMessage").each(function() {

                $friend_id = $(this).data("user-id");

                var currentDomElement = $(this);

                $.each(e.notification.data, function($i, $noti) {


                    if ($friend_id == $noti.sender_id) {
                        console.log($noti.message);
                        currentDomElement.remove();
                        $html = "";
                        $html += ` <div href="javascript:void(0)" data-user-id="${$friend_id}"
                                                                class="list-group-item list-group-item-action border-0 userChatMessage">
                                                                <div class="badge bg-success float-right users_inbox_notification"
                                                                    data-user-id="${$friend_id}">new message</div>
                                                                <div data-user-id="${$friend_id}" class="d-flex align-items-start sidebar-info">

                                                                    <img src="${publicUrl + $noti.chat_of_user.img_path}" onerror="imgError(this);" class="rounded-circle mr-1"
                                                                        alt="" width="40" height="40">
                                                                    <div class="flex-grow-1 ml-3 nameDiv">
                                                                        ${$noti.chat_of_user.name}
                                                                        <div data-user-id="${$friend_id}" class="small inboxLatestNoti">
                                                                            ${$noti.message}</div>
                                                                    </div>
                                                                </div>
                                        </div>`;

                        $("#sideInboxBar").prepend($html);

                        $newChat = false;
                    }
                }); //notiEachEnd
            }); //userMessageClass

            $.each(e.notification.data, function($i, $noti) {
                if ($newChat == true) {
                    console.log("new true");
                    $html = "";
                    $html += ` <div href="javascript:void(0)" data-user-id="${$noti.sender_id}"
                                                                class="list-group-item list-group-item-action border-0 userChatMessage">
                                                                <div class="badge bg-success float-right users_inbox_notification"
                                                                    data-user-id="${$noti.sender_id}">new message</div>
                                                                <div data-user-id="${$noti.sender_id}" class="d-flex align-items-start sidebar-info">

                                                                    <img src="${publicUrl + $noti.chat_of_user.img_path}" onerror="imgError(this);" class="rounded-circle mr-1"
                                                                        alt="" width="40" height="40">
                                                                    <div class="flex-grow-1 ml-3 nameDiv">
                                                                        ${$noti.chat_of_user.name}
                                                                        <div data-user-id="${$noti.sender_id}" class="small inboxLatestNoti">
                                                                            ${$noti.message}</div>
                                                                    </div>
                                                                </div>
                                        </div>`;
                    $("#sideInboxBar").prepend($html);
                    console.log("else");
                }
            }); //eachEnd

        });



});

$(document).ready(function() {


    window.Echo.private('notification.{{Auth::id()}}')
        .listen('ChatNotificationEvent', (e) => {
            $box = $("#conversationBox");
            $chat = e.data;
            $html = "";
            if ($box.data("sender-id") == $chat.sender_id) {
                $html +=
                    `<div class="chat-message-left pb-4">
                                        <div>
                                            <img src="${publicUrl + $chat.img_path}"
                                                class="rounded-circle mr-1"  width="40" height="40">
                                            <div class="text-muted small text-nowrap mt-2">${dateParse($chat.created_at).time}</div>
                                            <div class="text-muted small text-nowrap mt-2">${dateParse($chat.created_at).date}</div>
                                        </div>
                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                            <div class="font-weight-bold mb-1">${$chat.name}</div>
                                            ${$chat.message}
                                        </div>
                        </div>`;

                $box.append($html);
            }


        });

});



//profileimage code
$(window).on('load', function() {
    $('#preloader').show();
});

$(document).ready(() => {

    $('#preloader').delay(100).fadeOut('slow');
    setTimeout(function() {
        $('#preloader').remove();
    }, 500);
});
</script>