@extends('adminPanel.layout')




@section('header')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


<style type="text/css">
    label+label {
        margin-left: 20px;
    }
</style>
@endsection

@section('body')



<div class="container">
    <div class="main-content">

        <div class="page-content">


            <form method="POST" class="form-group" action="{{route('userpostadd')}}" enctype="multipart/form-data">



                @csrf

                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">

                        <div class="col-12">

                            <div class="page-title-box d-flex align-items-center justify-content-between">

                                <h4 class="mb-0 font-size-18">Post Add</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Syed Zameen</a></li>
                                        <li class="breadcrumb-item active">Post Add</li>
                                    </ol>

                                </div>

                            </div>
                        </div>

                        <!--*******************
nav 1 start
*********************-->
                        <div class="conainer">

                            @if(session('msg'))
                            <div class="alert alert-success">{{session('msg')}}</div>
                            @endif


                            <div class="row">


                                <nav aria-label="breadcrumb">

                                    <ol class="breadcrumb rounded p-3 mt-4" style="background-color: #2f77ad;">

                                        <li class="breadcrumb-item active text-light" aria-current="page">PURPOSE,
                                            PROPERTY TYPE AND LOCATION</li>

                                    </ol>

                                </nav>

                                <!--*******************
nav 1 end 
******************-->


                                <!--*****************
body 1 start
******************** -->

                                <div class="col-12 ">



                                    <div class="card-body" style="margin-left: 50px; margin-right: 50px;">

                                        <div class="row">

                                            <div class="col-sm-6 col-md-12">


                                                <h5 class="mt-2 mb-2">Purpose:</h5>

                                                <div class="box-body">

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label><input type="radio" name="purpose" value="sale">For
                                                                Sale </label>
                                                            <label><input type="radio" name="purpose" value="rent">For
                                                                Rent </label>
                                                        </div>
                                                    </div>
                                                </div><br>


                                                <div class="box-body">


                                                    <h5 class="mt-2 mb-2">Property Type:</h5>

                                                    <div>
                                                        <label><input type="radio" name="property_type" class="property_type" value="residential">
                                                            Residential</label>
                                                        <label><input type="radio" name="property_type" class="property_type" value="commercial">
                                                            Commercial</label>

                                                    </div></br>

                                                    <div class="residential box">
                                                        <h5 class="mt-2 mb-2">Residential sub type:</h5>
                                                        <div class="row md">
                                                            <div class="col-md-12">
                                                                <label><input type="radio" name="sub_type" value="home">House </label>

                                                                <label><input type="radio" name="sub_type" value="guest_house">Guest House </label>
                                                                <label><input type="radio" name="sub_type" value="appartment">Appartment </label>
                                                                <label><input type="radio" name="sub_type" value="farm_house">Farm House </label>
                                                                <label><input type="radio" name="sub_type" value="room">Room </label>
                                                                <label><input type="radio" name="sub_type" value="penthouse">Penthouse </label>
                                                                <label><input type="radio" name="sub_type" value="hotel_suite">Hotel Suite </label>
                                                                <label><input type="radio" name="sub_type" value="basement">Basement </label>
                                                                <label><input type="radio" name="sub_type" value="hostel">Hostel</label>
                                                                <label><input type="radio" name="sub_type" value="flat">flat </label>

                                                                <label><input type="radio" name="sub_type" value="upper_portion">upper portion </label>

                                                                <label><input type="radio" name="sub_type" value="lower_portion">lower portion</label>

                                                                <label><input type="radio" name="sub_type" value="residential_plot">Residential
                                                                    plot</label>
                                                                <label><input type="radio" name="sub_type" value="residential_plot_file">Residential
                                                                    Plot File</label>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="commercial box">
                                                        <h5 class="mt-2 mb-2">Commercial sub type:</h5>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label><input type="radio" name="sub_type" value="commercial_plot">Commercial plot </label>
                                                                <label><input type="radio" name="sub_type" value="commercial_plot_file">Commercial Plot File</label>
                                                                <label><input type="radio" name="sub_type" value="office">Office </label>
                                                                <label><input type="radio" name="sub_type" value="shop">Shop </label>
                                                                <label><input type="radio" name="sub_type" value="warehouse">Warehouse </label>
                                                                <label><input type="radio" name="sub_type" value="factory">Factory</label>
                                                                <label><input type="radio" name="sub_type" value="agriculture_land">Agricultural Land </label>
                                                                <label><input type="radio" name="sub_type" value="industrial_land">Industrial Land </label>
                                                                <label><input type="radio" name="sub_type" value="farmhouse_plot">Farmhouse Plot </label>
                                                                <label><input type="radio" name="sub_type" value="gym">Gym</label>
                                                                <label><input type="radio" name="sub_type" value="plaza">Plaza </label>
                                                                <label><input type="radio" name="sub_type" value="land">Land</label>
                                                                <label><input type="radio" name="sub_type" value="hall">Hall </label>
                                                                <label><input type="radio" name="sub_type" value="farmhouse_plot">Farmhouse Plot </label>
                                                                <label><input type="radio" name="sub_type" value="building">building</label>
                                                            </div>


                                                        </div>


                                                    </div></br>

                                                    <div class="box-body">


                                                        <!-- <h5 class="mt-2 mb-2">Sub_Type_Plots:</h5> -->

                                                        <!-- <div class="box-body">

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label><input type="radio" name="sub_type_plot"
                                                                            value="plots">Plots</label>
                                                                    <label><input type="radio" name="sub_type_plot"
                                                                            value="plot_file">Plot File </label>
                                                                    <label><input type="radio" name="sub_type_plot"
                                                                            value="industrial_land">industrial
                                                                        land</label>
                                                                    <label><input type="radio" name="sub_type_plot"
                                                                            value="commercial_land">agricultural land
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div><br> -->

                                                        <div class="box-body">


                                                            <!-- <h5 class="mt-2 mb-2">Sub_Type_type:</h5> -->

                                                            <!-- <div class="box-body">

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label><input type="radio" name="sub_type_type"
                                                                                value="commercial">Commercial</label>
                                                                        <label><input type="radio" name="sub_type_type"
                                                                                value="office">Office </label>

                                                                        <label><input type="radio" name="sub_type_type"
                                                                                value="shop">Shop</label>

                                                                        <label><input type="radio" name="sub_type_type"
                                                                                value="building">Building </label>

                                                                        <label><input type="radio" name="sub_type_type"
                                                                                value="factory">Factory </label>

                                                                        <label><input type="radio" name="sub_type_type"
                                                                                value="other">Other </label>
                                                                    </div>
                                                                </div>
                                                            </div><br> -->


                                                            <h5 class="mt-2 mb-2">city:</h5>

                                                            <select class="form-control select2" id="city">

                                                                @foreach ($cities as $city)

                                                                <option value="{{$city->city}}" onchange="handChangeColor(this.city.id)">
                                                                    {{$city->city}}
                                                                </option>

                                                                @endforeach

                                                            </select>

                                                            <h5 class="mt-2 mb-2">location:</h5>

                                                            <select id="location" class="form-control select2" name="city_area">

                                                            </select>
                                                            <h5 class="mt-2 mb-2">location:</h5>
                                                                <input  type="text" class="form-control" name="manual_location" id="manual_location">

                                                        </div>

                                                    </div>

                                                </div>



                                            </div>

                                        </div>
                                    </div>
                                    <!-- ****************
body 1 end
******************** -->

                                    <!--*******************
nav 2 start
*****************-->
                                    <div class="container">
                                        <div class="row">
                                            <nav aria-label="breadcrumb">

                                                <ol class="breadcrumb rounded p-3 mt-4" style="background-color: #2f77ad;">

                                                    <li class="breadcrumb-item active text-light" aria-current="page">
                                                        PROPERTY TITLE AND DESCRIPTION</li>

                                                </ol>

                                            </nav>

                                            <!--*******************
nav 2 end 
******************-->

                                            <!--*****************
body 2 start
***************** -->
                                            <div class="col-12">



                                                <div class="card-body" style="margin-left: 50px; margin-right: 50px;">

                                                    <div class="col-sm-6 col-md-12">

                                                        <div class="float-right form-group ">

                                                            <h5 class="mt-2 mb-2">Property Title:</h5>

                                                            <input class="form-control" value="{{ old('property_title', isset($posts) ? $posts->property_title : '') }}" name="property_title" type="text" id="set_lenght_title" required>

                                                            <span id="title_info"></span>


                                                            @if ($errors->hasBag('addPostError'))

                                                            <p class="text-danger">


                                                                {{ $errors->addPostError->first('property_title')}}
                                                            </p>

                                                            @endif
                                                            <h5 class="mt-2 mb-2">Description:</h5>

                                                            <textarea class="form-control" name="description" value="{{ old('description', isset($posts) ? $posts->description : '') }}" id="" rows="4"></textarea>

                                                            @if ($errors->hasBag('addPostError'))

                                                            <p class="text-danger">


                                                                {{ $errors->addPostError->first('description')}}
                                                            </p>

                                                            @endif


                                                        </div>

                                                    </div>

                                                </div>



                                            </div>

                                        </div>

                                    </div>
                                    <!-- ****************
body 2 end
******************** -->


                                    <!--*******************
nav 3 start
*********************-->
                                    <div class="container">
                                        <div class="row">
                                            <nav aria-label="breadcrumb">

                                                <ol class="breadcrumb rounded p-3 mt-4" style="background-color: #2f77ad;">

                                                    <li class="breadcrumb-item active text-light" aria-current="page">
                                                        PROPERTY SPECS AND PRICE</li>

                                                </ol>

                                            </nav>

                                            <!--*******************
nav 3 end 
******************-->

                                            <!--*****************
body 3 start
********************* -->
                                            <div class="col-12">

                                                <div class="card-body" style="margin-left: 50px; margin-right: 50px;">

                                                    <div class="col-sm-6 col-md-12">

                                                        <div class="float-right form-group ">

                                                            <h5 class="mt-2 mb-2">Land area:</h5>

                                                            <div class="d-flex justify-content-center">

                                                                <input class="form-control" id="land_area" name="land_area" value="{{ old('land_area', isset($posts) ? $posts->land_area : '') }}" type="text">

                                                                <h5 class="float-right mt-2 mb-2" style="padding-left:5px;padding-right:5px; font-size:14px;">
                                                                    unit:</h5>

                                                                <select class="form-control float-right" name="unit" id="">
                                                                    <option value="marla" selected>Marla</option>
                                                                    <option value="kanal">Kanal</option>
                                                                    <option value="square_feet">Square feet</option>
                                                                    <option value="square_yards">Square yards</option>
                                                                </select>

                                                            </div>
                                                            @if ($errors->hasBag('addPostError'))

                                                            <p class="text-danger">


                                                                {{ $errors->addPostError->first('land_area')}}
                                                            </p>

                                                            @endif

                                                            <h5 class="mt-2 mb-2">Price:</h5>

                                                            <input id="price" class="form-control" name="price" value="{{ old('price', isset($posts) ? $posts->price : '') }}" type="text">

                                                            <p id="money-format"></p>

                                                            <style type="text/css">
                                                                #money-format {
                                                                    font-size: 15px;
                                                                    color: #F00 !important;
                                                                    letter-spacing: 3px;
                                                                    text-transform: uppercase;
                                                                }
                                                            </style>
                                                            @if ($errors->hasBag('addPostError'))

                                                            <p class="text-danger">

                                                                {{ $errors->addPostError->first('price')}}
                                                            </p>

                                                            @endif


                                                            <h5 class="mt-2 mb-2" id="bed">Bedrooms:</h5>

                                                            <input class="form-control" name="bedroom" class="bedroom" type="number" value="{{ old('bedroom', isset($posts) ? $posts->bedroom : '') }}" id="bedroominvisible">

                                                            @if ($errors->hasBag('addPostError'))

                                                            <p class="text-danger">

                                                                {{ $errors->addPostError->first('bedroom')}}
                                                            </p>

                                                            @endif
                                                            <h5 class="mt-2 mb-2" id="bath">Bathrooms:</h5>

                                                            <input class="form-control" name="bathroom" type="number" value="{{ old('bathroom', isset($posts) ? $posts->bathroom : '') }}" id="bathroominvisible">
                                                            @if ($errors->hasBag('addPostError'))

                                                            <p class="text-danger">

                                                                {{ $errors->addPostError->first('bathroom')}}
                                                            </p>

                                                            @endif
                                                            <h5 class="mt-2 mb-2">Property Features:</h5>
                                                            <div class="d-flex justify-content-center">
                                                                <input class="form-control" placeholder="Enter Year " name="year" value="{{ old('year', isset($posts) ? $posts->year : '') }}" id="" type="number">


                                                                <!-- <select class="form-control " name="year" id="">
<option value="">Built in year</option>
<option value="2015">2015</option>
<option value="2016">2016</option>
<option value="2017">2017</option>
<option value="2018">2018</option>
<option value="2019">2019</option>
<option value="2020">2020</option>
<option value="2021">2021</option>
</select> -->
                                                            </div>

                                                            <h5 class="mt-2 mb-2" id="floaring">Floaring:</h5>
                                                            <div class="d-flex justify-content-left">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="tiles" name="floaring[]" id="tiles">
                                                                    <label class="form-check-label" for="tiles">
                                                                        Tiles
                                                                    </label>
                                                                </div>

                                                            </div>
                                                            <div class="d-flex justify-content-left">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="marbles" name="floaring[]" id="marbles">
                                                                    <label class="form-check-label" for="marbles">
                                                                        Marbles
                                                                    </label>
                                                                </div>

                                                            </div>
                                                            <div class="d-flex justify-content-left">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="wooden" name="floaring[]" id="wooden">
                                                                    <label class="form-check-label" for="wooden">
                                                                        Wooden
                                                                    </label>
                                                                </div>

                                                            </div>
                                                            <div class="d-flex justify-content-left">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="chip" name="floaring[]" id="chip">
                                                                    <label class="form-check-label" for="chip">
                                                                        Chip
                                                                    </label>
                                                                </div>

                                                            </div>

                                                            @if ($errors->hasBag('addPostError'))

                                                            <p class="text-danger">

                                                                {{ $errors->addPostError->first('floaring')}}
                                                            </p>

                                                            @endif




                                                            <!--/////////Electricity backup portion start////////////////-->

                                                            <h5 class="mt-2 mb-2" id="electricity-backup">Electricity
                                                                Backup:</h5>
                                                            <div class="d-flex justify-content-left">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="generator" name="electricity[]" id="generator">
                                                                    <label class="form-check-label" for="generator">
                                                                        Generator
                                                                    </label>
                                                                </div>

                                                            </div>
                                                            <div class="d-flex justify-content-left">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="ups" name="electricity[]" id="UPS">
                                                                    <label class="form-check-label" for="UPS">
                                                                        UPS
                                                                    </label>
                                                                </div>

                                                            </div>
                                                            <div class="d-flex justify-content-left">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="solar" name="electricity[]" id="solar">
                                                                    <label class="form-check-label" for="solar">
                                                                        Solar
                                                                    </label>
                                                                </div>

                                                            </div>
                                                            <div class="d-flex justify-content-left">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="other" name="electricity[]" id="other">
                                                                    <label class="form-check-label" for="other">
                                                                        Other
                                                                    </label>
                                                                </div>

                                                            </div>

                                                            @if ($errors->hasBag('addPostError'))

                                                            <p class="text-danger">

                                                                {{ $errors->addPostError->first('electricity')}}
                                                            </p>

                                                            @endif


                                                            <!--electricity backup portion end////////////////-->





                                                            <!--Broadband,internet access start///////////////-->

                                                            <h5 class="mt-4">Broadband,Internet Acess: </h5>
                                                            <select class="form-control float-right" name="Internet-Aces" id="Internet-Acess">
                                                                <option value="yes" selected>yes</option>
                                                                <option value="no">no</option>

                                                            </select>
                                                            <!--Broadband,internet access end/////////////////-->



                                                            <h5 class="mt-4">Intercom:</h5>
                                                            <select class="form-control float-right" name="Intercom" id="Intercom">
                                                                <option value="yes" selected>yes</option>
                                                                <option value="no">no</option>

                                                            </select>

                                                            <p class="mt-3 ">
                                                                <a class="btn " style="background-color: #2f77ad;" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                    HOME
                                                                </a>
                                                            </p>

                                                            <div class="collapse" id="collapseExample">
                                                                <div class="form-check mt-3">
                                                                    <input class="form-check-input" type="checkbox" value="furnished" name="amenities[]" id="furnished">
                                                                    <label class="form-check-label fw-bold" for="furnished">Furnished
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="Maintaince-Staff" name="amenities[]" id="maintenance-staff">
                                                                    <label class="form-check-label fw-bolder" for="maintenance-staff">Maintenance Staff
                                                                    </label>
                                                                </div>


                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="Security-Staff" name="amenities[]" id="Security-Staff">
                                                                    <label class="form-check-label fw-bolder" for="Security-Staff">Security Staff
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="Drawing-Room" name="amenities[]" id="Drawing-Room">
                                                                    <label class="form-check-label fw-bolder" for="Drawing-Room">Drawing Room
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="Dining-Room" name="amenities[]" id="Dining-Room">
                                                                    <label class="form-check-label fw-bolder" for="Dining-Room">Dining Room
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="Prayer-Room" name="amenities[]" id="Prayer-Room">
                                                                    <label class="form-check-label fw-bolder" for="Prayer-Room">Prayer Room
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="Power-Room" name="amenities[]" id="Powder-Room">
                                                                    <label class="form-check-label fw-bolder" for="Powder-Room">Power Room
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="TV-lounge" name="amenities[]" id="TV-lounge">
                                                                    <label class="form-check-label fw-bolder" for="TV-lounge">TV lounge
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="Sitting-room" name="amenities[]" id="Sitting-room">
                                                                    <label class="form-check-label fw-bolder" for="Sitting-room">Sitting room
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="Near-to-schools" name="amenities[]" id="Near-to-schools">
                                                                    <label class="form-check-label fw-bolder" for="Near-to-schools">Near to schools
                                                                    </label>
                                                                </div>


                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="Near-to-hospitals" name="amenities[]" id="Near-to-hospitals">
                                                                    <label class="form-check-label fw-bolder" for="Near-to-hospitals">Near to hospitals
                                                                    </label>
                                                                </div>


                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="other" name="amenities[]" id="other">
                                                                    <label class="form-check-label fw-bolder" for="other">Other
                                                                    </label>
                                                                </div>


                                                            </div>

                                                            <!--home section end////////////////////-->




                                                            <!--Plots  start///////////////-->
                                                            <p class="mt-3 ">
                                                                <a class="btn " style="background-color: #2f77ad;" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                    PLOTS
                                                                </a>
                                                            </p>





                                                            <div class="collapse" id="collapseExample1">
                                                                <div class="form-check mt-3">
                                                                    <input class="form-check-input" type="checkbox" value="Possession" name="amenities[]" id="Possession">
                                                                    <label class="form-check-label fw-bold" for="Possession">Possession
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="Corner" name="amenities[]" id="Corner">
                                                                    <label class="form-check-label fw-bolder" for="Corner">Corner
                                                                    </label>
                                                                </div>


                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="Park-Facing" name="amenities[]" value="{{ old('park-facing', isset($posts) ? $posts->park-facing : '') }}" id="Park-Facing">
                                                                    <label class="form-check-label fw-bolder" for="Park-Facing">Park Facing
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="Desputed" name="amenities[]" id="Desputed">
                                                                    <label class="form-check-label fw-bolder" for="Desputed">Desputed
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="File" name="amenities[]" id="File">
                                                                    <label class="form-check-label fw-bolder" for="File">File
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="Electricity" name="amenities[]" id="Electricity">
                                                                    <label class="form-check-label fw-bolder" for="Electricity">Electricity
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="Severage" name="amenities[]" id="Severage">
                                                                    <label class="form-check-label fw-bolder" for="Severage">Severage
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="Water-Supply" name="amenities[]" id="Water-Supply">
                                                                    <label class="form-check-label fw-bolder" for="Water-Supply">Water Supply
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="Sui-Gas" name="amenities[]" id="Sui-Gas">
                                                                    <label class="form-check-label fw-bolder" for="Sui-Gas>Sui Gas
              </label>
              </div>
             
              <div class=" form-check">
                                                                        <input class="form-check-input" type="checkbox" value="other" name="amenities[]" id="other">
                                                                        <label class="form-check-label fw-bolder" for="other">Other
                                                                        </label>
                                                                </div>


                                                            </div>


                                                            <h5 class="mt-4">Parking spaces: </h5>
                                                            <input class="form-control" id="parking-spaces" name="parking-spaces" type="text">

                                                            <div class="row mt-2">


                                                                <div class="col-12">

                                                                    <div class="card">

                                                                        <div class="card-body">

                                                                            <h5 class="card-title">Select Main image:
                                                                            </h5>

                                                                            <p class="card-subtitle mb-4">You Can
                                                                                Select
                                                                                Only One
                                                                                images Main Image compulsery
                                                                            </p>

                                                                            <input type="file" name="mainimage" data-height="300" id="mainimage" />

                                                                        </div> <!-- end card-body-->
                                                                    </div> <!-- end card-->
                                                                </div> <!-- end col --><br>



                                                            </div>

                                                            @if ($errors->hasBag('addPostError'))

                                                            <p class="text-danger">

                                                                {{ $errors->addPostError->first('mainimage')}}
                                                            </p>

                                                            @endif



                                                        </div>

                                                        <div class="row mt-2">


                                                            <div class="col-12">

                                                                <div class="card">

                                                                    <div class="card-body">

                                                                        <h5 class="card-title">Select image:</h5>

                                                                        <p class="card-subtitle mb-4">Press Ctrl to
                                                                            select
                                                                            multiple
                                                                            images you can only upload 30 Images
                                                                        </p>

                                                                        <input type="file" name="image[]" multiple class="dropify" data-height="300" id="image" onchange="loadfile(event)" />





                                                                    </div> <!-- end card-body-->
                                                                </div> <!-- end card-->
                                                            </div> <!-- end col --><br>

                                                            <div class="row mt-4" id="output">

                                                            </div>

                                                        </div>

                                                    </div>



                                                </div>

                                            </div>

                                        </div>
                                        <!-- ****************
body 3 end
******************** -->





                                        <!--*******************
nav 4 start
*********************-->

                                        <div class="container">
                                            <div class="row">
                                                <nav aria-label="breadcrumb">

                                                    <ol class="breadcrumb rounded p-3 mt-4" style="background-color: #2f77ad;">

                                                        <li class="breadcrumb-item active text-light" aria-current="page">
                                                            CONTACT DETAILS</li>

                                                    </ol>

                                                </nav>

                                                <!--*******************
nav 4 end 
******************-->


                                                <!--*****************
body 4 start
********************* -->

                                                <div class="col-12 ">

                                                    <div class="card-body" style="margin-left: 50px; margin-right: 50px;">


                                                        <div class="row">

                                                            <div class="col-sm-6 col-md-12 ">
                                                                <div class="form-group">

                                                                    <h5 class="mt-2 mb-2">Youtube Video Link (optional)
                                                                    </h5>
                                                                    <input class="form-control" style="text-transform:lowercase;" placeholder="https://www.youtube.com/channel/UCZvWbwDZetQNCznvHZeZRjw" id="" name="video_link" value="{{ old('video_link', isset($posts) ? $posts->video_link : '') }}" type="text">


                                                                    <!-- cmnt -->
                                                                    <!-- <span id=""></span>

     <h5 class="mt-2 mb-2">Amenities (optional)</h5>
     
     <input class="form-control" placeholder="e.g garage,pool,lawn"
        
     id="amenities" name="amenities" type="text"> -->

                                                                    <span id=""></span>


                                                                    <h5 class="mt-2 mb-2">Address</h5>

                                                                    <input class="form-control" placeholder="house# , street# , area , city " id="address" name="address" value="{{ old('address', isset($posts) ? $posts->address : '') }}" type="text">
                                                                    <span id="address_info"></span>


                                                                    <!-- <span id="address_info"></span> -->


                                                                    <!-- commnt -->

                                                                    <h5 class="mt-2 mb-2">Contact person name</h5>

                                                                    <input class="form-control" id="contact_person_name" name="contact_person_name" value=" {{ auth()->user()->name}}" value="{{ old('contact_person_name', isset($posts) ? $posts->contact_person_name : '') }}" type="text">

                                                                    @if ($errors->hasBag('addPostError'))

                                                                    <p class="text-danger">


                                                                        {{ $errors->addPostError->first('contact_person_name')}}
                                                                    </p>

                                                                    @endif





                                                                    <h5 class="mt-2 mb-2">Mobile number</h5>

                                                                    <div class="form-group validate-input w-100 position-relative">

                                                                        <input id="mobile_number" name="mobile_number" value=" {{ auth()->user()->mobile_number }}" value="{{ old('mobile_number', isset($posts) ? $posts->mobile_number : '') }}" type="text" class="form-control" aria-label="Text input with dropdown button">


                                                                        <span class="data-placeholder" data-placeholder="92**********"></span>
                                                                        <label id="error_mobile"></label>
                                                                        @if($errors->register->has('mobile_number'))

                                                                        <span style="font-size: 15px" class="text text-danger" id="server_error">{{$errors->register->first('mobile_number')}}</span>


                                                                        @endif
                                                                        @if(session('msg'))
                                                                        <span style="font-size: 15px" class="text text-danger" id="server_error">{{session('msg')}}</span>
                                                                        @endif


                                                                    </div>

                                                                    <span class=" bg-warning text-dark" id="error-mobile"></span>



                                                                    <!-- <h5 class="mt-2 mb-2">Mobile number</h5>

                                                                    <div class="input-group mb-3">
                                                                        <select style="border-style: solid; border-width: 1px;">
                                                                            <option style="background-image:url(https://img.icons8.com/color/32/000000/pakistan.png);">
                                                                                +92</option>
                                                                        </select>
                                                                        <input id="mobile_number" name="mobile_number" value=" {{ auth()->user()->mobile_number }}" value="{{ old('mobile_number', isset($posts) ? $posts->mobile_number : '') }}" type="text" class="form-control" aria-label="Text input with dropdown button">
                                                                    </div> -->









                                                                    <h5 class="mt-2 mb-2">Mobile number 2</h5>

                                                                    <div class="form-group validate-input w-100 position-relative">

                                                                        <input id="mobile2_number" name="mobile2_number"   type="text" class="form-control" aria-label="Text input with dropdown button">


                                                                        <span class="data-placeholder" data-placeholder="92**********"></span>
                                                                        <label id="error2_mobile"></label>
                                                                        @if($errors->register->has('mobile2_number'))

                                                                        <span style="font-size: 15px" class="text text-danger" id="server2_error">{{$errors->register->first('mobile2_number')}}</span>


                                                                        @endif
                                                                        @if(session('msg'))
                                                                        <span style="font-size: 15px" class="text text-danger" id="server2_error">{{session('msg')}}</span>
                                                                        @endif


                                                                    </div>

                                                                    <span class=" bg-warning text-dark" id="error2-mobile"></span>



                                                                    <!-- <h5 class="mt-2 mb-2">Mobile number 2</h5>
                                                                    <div class="input-group mb-3">
                                                                        <select style="border-style: solid; border-width: 1px; z-index: 5;">
                                                                            <option style="background-image:url(https://img.icons8.com/color/32/000000/pakistan.png);">
                                                                                +92</option>
                                                                        </select>
                                                                        <input id="mobile_number" name="mobile2_number" value=" {{ auth()->user()->mobile2_number }}" value="{{ old('mobile2_number', isset($posts) ? $posts->mobile2_number : '') }}" type="text" class="form-control" aria-label="Text input with dropdown button">
                                                                    </div>
                                                                    <span class=" bg-warning text-dark" id="error-mobile2"></span>
                                                                    @if ($errors->hasBag('addPostError'))

                                                                    <p class="text-danger">


                                                                        {{ $errors->addPostError->first('mobile2_number')}}
                                                                    </p>

                                                                    @endif -->

                                                                    <h5 class="mt-2 mb-2">Email</h5>
                                                                    <input class="form-control" name="email" value=" {{ auth()->user()->email }}" value="{{ old('email', isset($posts) ? $posts->email : '') }}" type="text"></input>
                                                                    @if ($errors->hasBag('addPostError'))

                                                                    <p class="text-danger">


                                                                        {{ $errors->addPostError->first('email')}}
                                                                    </p>

                                                                    @endif
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>



                                            </div>

                                        </div>
                                        <!-- ****************
body 4 end
******************** -->


                                        <div class="container">

                                            <div class="row">

                                                <div class="col-12 mb-4">

                                                    <div class="mx-auto" style="width: 200px">

                                                        <button class="btn btn-light w-100 shadow-sm bg-gradient" type="submit" style="background-color: #ff7f00;height: 60px;">Submit
                                                            Property</button>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---container fluid ending--->
            </form>
            </form>
        </div>

        <!-- page title end -->
        <!----------------------------------------Javascript starts---------------------------------------->

        <script src="{{asset('jsComman/comman.js')}}"></script>

        <script>
            $("document").ready(function() {

                checkPropertyType($("#property_type").val());

                $("#property_type").on("change", function() {
                    //console.log(this.id);
                    $property_type_value = $(this).val();

                    checkPropertyType($property_type_value);

                });

                function checkPropertyType($value) {




                    if ($value == "residential") {

                        $("#sub_type option[value='home']").prop("selected", true);

                        $("#sub_type option[value='shop']").hide();
                        $("#sub_type option[value='office']").hide();
                        $("#sub_type option[value='building']").hide();
                        $("#sub_type option[value='commercial_plot']").hide();
                        // $("#sub_type option[value='commercial_plot']").hide();

                        $("#sub_type option[value='home']").show();
                        $("#sub_type option[value='flat']").show();
                        $("#sub_type option[value='upper_portion']").show();
                        $("#sub_type option[value='lower_portion']").show();
                        $("#sub_type option[value='residential_plot']").show();


                    } else if ($value == "commercial") {
                        $("#sub_type option[value='shop']").prop("selected", true);

                        $("#sub_type option[value='shop']").show();
                        $("#sub_type option[value='office']").show();
                        $("#sub_type option[value='building']").show();
                        $("#sub_type option[value='commercial_plot']").show();

                        $("#sub_type option[value='home']").hide();
                        $("#sub_type option[value='flat']").hide();
                        $("#sub_type option[value='upper_portion']").hide();
                        $("#sub_type option[value='lower_portion']").hide();
                        $("#sub_type option[value='residential_plot']").hide();






                    }

                }

                //////////////////////////////end of hiding sub_property///////////////////////////////

                $("#city").change(function() {

                    //console.log("s");

                    $city = $("#city option:selected").val();

                    getAreaFromCity($city);




                });



                function getAreaFromCity(city = "lahore") {

                    $.ajax({
                        url: `{{url('areas')}}/${city}`,
                        success: function(res) {
                            //console.log(res);
                            $("#location").html(function() {
                                $allOption = "";
                                for ($i = 0; $i < res.length; $i++) {
                                    $allOption += "<option value='" + res[$i].id + "'> " + res[
                                        $i].area + " </option>";

                                }

                                return $allOption;
                            });




                        }



                    });

                }

                getAreaFromCity();



                /////////////////////////////////////////  form validation start  //////////////////////////////////


                $("#price").on("keyup", function() {

                    $priceValue = $(this).val();
                    $regex = "^[0-9]+$";


                    if (!$priceValue.match($regex)) {

                        $newVal = $priceValue.substr(0, $priceValue.length - 1);
                        //console.log($newVal);
                        $(this).val($newVal);

                    }

                });

                $("#land_area").on("keydown", function() {

                    $land_area_value = $(this).val();
                    $regex = "^[0-9*xX#.+]+$";


                    if (!$land_area_value.match($regex)) {

                        $newVal = $land_area_value.substr(0, $land_area_value.length - 1);
                        //console.log($newVal);
                        $(this).val($newVal);

                    }

                });



                $("#contact_person_name").on("keydown", function() {

                    $nameValue = $(this).val();
                    $regex = /^[a-zA-Z\s]{0,20}$/;

                    if (!$nameValue.match($regex)) {

                        $newVal = $nameValue.substr(0, $nameValue.length - 1);
                        //console.log($newVal);
                        $(this).val($newVal);

                    }

                });


                $("#sub_type").on("change", function() {
                    //console.log(this.id);
                    if ($(this).val() == 'residential_plot' || $(this).val() == 'commercial_plot') {
                        $("#bathroominvisible").hide();
                        $("#bedroominvisible").hide();
                        $("#bed").hide();
                        $('#bath').hide();

                    } else {
                        $("#bathroominvisible").show();
                        $("#bedroominvisible").show();
                        $("#bed").show();
                        $('#bath').show();
                    }



                });

                $("#price").keyup(function() {

                    $price = $(this).val();
                    $money_format = 0;

                    if ($price >= 1000 && $price < 100000) {
                        console.log("k");
                        $value = ($price / 1000); ///k
                        console.log($value);
                        $money_format = $value;
                        $("#money-format").text($money_format + "K");
                    } else if ($price >= 100000 && $price < 10000000) {
                        console.log("lac");
                        $value = ($price / 100000); //lac
                        $money_format = $value;
                        $("#money-format").text($money_format + "lac");
                    } else if ($price >= 10000000) {
                        console.log("crore");
                        $value = ($price / 10000000); //crore
                        $money_format = $value;
                        $("#money-format").text($money_format + "Crore");
                    }

                });


                $("#address").on("keydown", function() {


                    $address = $(this).val();
                    $regex = /^.{1,35}$/;

                    if (!$address.match($regex)) {

                        $newVal = $address.substr(0, $address.length - 1);

                        $(this).val($newVal);
                        $('#address_info').show();
                        $('#address_info').text('address must be 35 character');
                        $('#address_info').addClass('text text-danger');
                    } else {


                        $('#address_info').hide();
                    }

                });


                $(".select22").select2();


            });

            const handChangeColor = (id) => {

                var x = document.getElementById(id);
                x.addEventListener("click", function() {
                    document.getElementById(id).style.color = "blue";
                });
            }
        </script>


        </script>

        <script>
            function loadfile(event) {

                var z = document.getElementById('image').files.length;
                // var x = picArray.length ;

                // va?r output = document.getElementById('output');

                // picArray.push(output);
                // window.alert(x);

                for (let i = 0; i <= z; i++) {
                    // const element = array[index];

                    var imgsdiv = `<div class="col-md-2">
                                        <img src='${URL.createObjectURL(event.target.files[i])}
                                        </div>`;



                    $('#output').append("<div class='col-md-2 currentimgdiv" + i +
                        "'> <button type='button' onclick='removeitem(" + i +
                        ")' class='btn btn-danger pull-left'>x</button> <img style='width:140px; height:140px' src='" +
                        URL.createObjectURL(event.target.files[i]) + "'></div>");

                    // output.innerHTML += '<img src="' + URL.createObjectURL(event.target.files[index]) + '" alt="image" width="100px">'
                    // output.src = picArray[index];


                }
            }


            function removeitem(id) {

                var fileList = [];

                var fileInput = document.getElementById('image');

                array = [fileInput];

                alert(fileInput);

                $('.currentimgdiv' + id).remove();
                //alert(id);
            }
        </script>

        <script>
            $(document).ready(function() {
                $('.commercial').hide()
                $('.residential').hide()
                $('.property_type').click(function() {

                    var inputValue = $(this).attr("value");
                    var targetBox = $("." + inputValue);

                    $(".box").not(targetBox).hide();

                    $(targetBox).show();
                });
            });
        </script>


        <script>
            $('.select2').select2();
        </script>




        <script>
            $("document").ready(function() {

                $("#mobile_number").keyup(function() {
                    $value = this.value;
                    checkPhoneField($(this).attr("id"));
                });

                $("#mobile_number").keyup(function(event) {
                    //		console.log("back");
                    if (event.key === "Backspace") {
                        // console.log("backspace");
                        checkPhoneField($(this).attr("id"));
                        // console.log(this.value);
                    }

                });

                $("#mobile_number").on("input", function() {
                    $("#server_error").hide();
                    if (!$(this).val()) {

                        $("#error_mobile").hide();
                    } else {
                        $("#error_mobile").show();
                    }

                });


                function checkPhoneField(elementID) {
                    //console.log($("#" + elementID).val());
                    $regex = /^92[0-9]\d{9}$/;
                    if ($regex.test($("#" + elementID).val())) {
                        //console.log($(`#${elementID}`).value, "match");
                        $("#error_mobile").text("Right Format");
                        $("#error_mobile").delay(1000).fadeOut("slow");
                        $("#error_mobile").removeClass("text text-danger");
                        $("#error_mobile").addClass("text text-success");
                    } else {
                        //console.log($(`#${elementID}`).value, "not match");

                        $("#error_mobile").text("type valid mobile number add 92");
                        $("#error_mobile").addClass("text text-danger");

                    }

                }


            });
        </script>

<script>
            $("document").ready(function() {

                $("#mobile2_number").keyup(function() {
                    $value = this.value;
                    checkPhoneField($(this).attr("id"));
                });

                $("#mobile2_number").keyup(function(event) {
                    //		console.log("back");
                    if (event.key === "Backspace") {
                        // console.log("backspace");
                        checkPhoneField($(this).attr("id"));
                        // console.log(this.value);
                    }

                });

                $("#mobile2_number").on("input", function() {
                    $("#server2_error").hide();
                    if (!$(this).val()) {

                        $("#error2_mobile").hide();
                    } else {
                        $("#error2_mobile").show();
                    }

                });


                function checkPhoneField(elementID) {
                    //console.log($("#" + elementID).val());
                    $regex = /^92[0-9]\d{9}$/;
                    if ($regex.test($("#" + elementID).val())) {
                        //console.log($(`#${elementID}`).value, "match");
                        $("#error2_mobile").text("Right Format");
                        $("#error2_mobile").delay(1000).fadeOut("slow");
                        $("#error2_mobile").removeClass("text text-danger");
                        $("#error2_mobile").addClass("text text-success");
                    } else {
                        //console.log($(`#${elementID}`).value, "not match");

                        $("#error2_mobile").text("type valid mobile number add +92");
                        $("#error2_mobile").addClass("text text-danger");

                    }

                }


            });
        </script>


        @endsection