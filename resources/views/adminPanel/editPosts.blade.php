@extends('adminPanel.layout')




@section('header')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


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



            @if(Auth::check())

            @if(Auth::user()->role==1)


            <form method="POST" class="form-group" action="/edit/adminupdatepost/{{$userPost->id}}"
                enctype="multipart/form-data">
                @else

                <form method="POST" class="form-group" action="/edit/post/{{$userPost->id}}"
                    enctype="multipart/form-data">

                    @endif
                    @endif

                    @csrf

                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">

                            <div class="col-12">

                                <div class="page-title-box d-flex align-items-center justify-content-between">

                                    <h4 class="mb-0 font-size-18">Edit Post </h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Syed Zameen</a>
                                            </li>
                                            <li class="breadcrumb-item active">Edit Post</li>
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

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label><input type="radio" name="purpose"
                                                                    {{ $userPost->propertyCate->purpose == 'sale' ? 'checked' : '' }}
                                                                    value="sale">For Sale </label>
                                                            <label><input type="radio" name="purpose"
                                                                    {{ $userPost->propertyCate->purpose == 'rent' ? 'checked' : '' }}
                                                                    value="rent">For Rent </label>
                                                        </div>
                                                    </div><br>



                                                    <h5 class="mt-1 mb-1">Property type:</h5>

                                                    <div>
                                                        <label><input type="radio" name="property_type"
                                                                class="property_type"
                                                                {{ $userPost->propertyCate->property_type == 'residential' ? 'checked' : '' }}
                                                                value="residential"> Residential</label>
                                                        <label><input type="radio" name="property_type"
                                                                class="property_type"
                                                                {{ $userPost->propertyCate->property_type == 'commercial' ? 'checked' : '' }}
                                                                value="commercial"> Commercial</label>

                                                    </div></br>

                                                    <div class="residential box">
                                                        <h5 class="mt-2 mb-2">Residential sub type:</h5>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'home' ? 'checked' : '' }}
                                                                        value="home">Homes </label>
                                                                <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'flat' ? 'checked' : '' }}
                                                                        value="flat">flat </label>

                                                                <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'upper_portion' ? 'checked' : '' }}
                                                                        value="upper_portion">upper portion </label>

                                                                <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'lower_portion' ? 'checked' : '' }}
                                                                        value="lower_portion">lower portion</label>

                                                                <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'residential_plot' ? 'checked' : '' }}
                                                                        value="residential_plot">residential
                                                                    plot</label>





                                                                    <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'guest_house' ? 'checked' : '' }}
                                                                        value="guest_house">Guest_house </label>

                                                                        <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'appartment' ? 'checked' : '' }}
                                                                        value="appartment">Appartment </label>

                                                                        <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'farm_house' ? 'checked' : '' }}
                                                                        value="farm_house">Farm_house </label>

                                                                        <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'room' ? 'checked' : '' }}
                                                                        value="room">Room </label>

                                                                        <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'penthouse' ? 'checked' : '' }}
                                                                        value="penthouse">Penthouse </label>

                                                                        <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'hotel_suite' ? 'checked' : '' }}
                                                                        value="hotel_suite">Hotel_suite </label>

                                                                        <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'basement' ? 'checked' : '' }}
                                                                        value="basement">Basement </label>

                                                                        <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'hostel' ? 'checked' : '' }}
                                                                        value="hostel">Hostel </label>

                                                                        <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'residential_plot_file' ? 'checked' : '' }}
                                                                        value="residential_plot_file">Residential_Plot_File </label>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="commercial box">
                                                        <h5 class="mt-2 mb-2">Commercial sub type:</h5>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'commercial_plot' ? 'checked' : '' }}
                                                                        value="commercial_plot">commercial plot </label>
                                                                <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'office' ? 'checked' : '' }}
                                                                        value="office">office </label>

                                                                <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'shop' ? 'checked' : '' }}
                                                                        value="shop">shop </label>

                                                                <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'building' ? 'checked' : '' }}
                                                                        value="building">building</label>


                                                                        <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'warehouse' ? 'checked' : '' }}
                                                                        value="warehouse">Warehouse</label>

                                                                        <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'factory' ? 'checked' : '' }}
                                                                        value="factory">Factory</label>

                                                                        <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'agriculture_land' ? 'checked' : '' }}
                                                                        value="agriculture_land">Agriculture_land</label>


                                                                        <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'industrial_land' ? 'checked' : '' }}
                                                                        value="industrial_land">Industrial_land</label>

                                                                        <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'farmhouse_plot' ? 'checked' : '' }}
                                                                        value="farmhouse_plot">Farmhouse_Plot</label>

                                                                        <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'gym' ? 'checked' : '' }}
                                                                        value="gym">Gym</label>

                                                                        <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'plaza' ? 'checked' : '' }}
                                                                        value="plaza">plaza</label>

                                                                        <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'land' ? 'checked' : '' }}
                                                                        value="land">land</label>

                                                                        <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'hall' ? 'checked' : '' }}
                                                                        value="hall">hall</label>
                                                                        <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'farmhouse_plot' ? 'checked' : '' }}
                                                                        value="farmhouse_plot">Farmhouse_plot</label>

                                                                        <label><input type="radio" name="sub_type"
                                                                        {{ $userPost->propertyCate->property_sub_type == 'Commercial_Plot_File' ? 'checked' : '' }}
                                                                        value="Commercial_Plot_File">Commercial_Plot_File</label>
                                                            </div>


                                                        </div>


                                                    </div></br>


                                                    <div class="box-body">


                                                        <!-- <h5 class="mt-2 mb-2">Sub_Type_Plots:</h5> -->

                                                        <!-- <div class="box-body">

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label><input type="radio" name="sub_type_plot"
                                                                            {{ $userPost->sub_type_plot == 'plots' ? 'checked' : '' }}
                                                                            value="plots">Plots</label>
                                                                    <label><input type="radio" name="sub_type_plot"
                                                                            {{ $userPost->sub_type_plot == 'plot_file' ? 'checked' : '' }}
                                                                            value="plot_file">Plot File </label>
                                                                    <label><input type="radio" name="sub_type_plot"
                                                                            {{ $userPost->sub_type_plot == 'industrial_land' ? 'checked' : '' }}
                                                                            value="industrial_land">industrial
                                                                        land</label>
                                                                    <label><input type="radio" name="sub_type_plot"
                                                                            {{ $userPost->sub_type_plot == 'commercial_land' ? 'checked' : '' }}
                                                                            value="commercial_land">agricultural land
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div><br> -->

                                                        <div class="box-body">


                                                            <!-- <h5 class="mt-2 mb-2">Sub_Type_type:</h5>

                                                            <div class="box-body">

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label><input type="radio" name="sub_type_type"
                                                                                {{ $userPost->sub_type_type == 'commercial' ? 'checked' : '' }}
                                                                                value="commercial">Commercial</label>
                                                                        <label><input type="radio" name="sub_type_type"
                                                                                {{ $userPost->sub_type_type == 'office' ? 'checked' : '' }}
                                                                                value="office">Office </label>

                                                                        <label><input type="radio" name="sub_type_type"
                                                                                {{ $userPost->sub_type_type == 'shop' ? 'checked' : '' }}
                                                                                value="shop">Shop</label>

                                                                        <label><input type="radio" name="sub_type_type"
                                                                                {{ $userPost->sub_type_type == 'building' ? 'checked' : '' }}
                                                                                value="building">Building </label>

                                                                        <label><input type="radio" name="sub_type_type"
                                                                                {{ $userPost->sub_type_type == 'factory' ? 'checked' : '' }}
                                                                                value="factory">Factory </label>

                                                                        <label><input type="radio" name="sub_type_type"
                                                                                {{ $userPost->sub_type_type == 'other' ? 'checked' : '' }}
                                                                                value="other">Other </label>
                                                                    </div>
                                                                </div>
                                                            </div><br> -->



                                                            <h5 class="mt-2 mb-2">city:</h5>

                                                            <input class="form-control" 
                                                                   value="{{$userPost->cityAndArea->city}}">
                                                                    <h5 class="mt-2 mb-2">Location:</h5>
                                                                    
                                                                    <input class="form-control" 
                                                                   value="{{$userPost->cityAndArea->area}}"
                                                                   >
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

                                                <ol class="breadcrumb rounded p-3 mt-4"
                                                    style="background-color: #2f77ad;">

                                                    <li class="breadcrumb-item active text-light" aria-current="page">
                                                        PROPERTY
                                                        TITLE AND DESCRIPTION</li>

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

                                                            <input class="form-control"
                                                                value="{{$userPost->property_title}}"
                                                                name="property_title" type="text" id="set_lenght_title"
                                                                required>

                                                            <span id="title_info"></span>


                                                            @if ($errors->hasBag('addPostError'))

                                                            <p class="text-danger">


                                                                {{ $errors->addPostError->first('property_title')}}
                                                            </p>

                                                            @endif
                                                            <h5 class="mt-2 mb-2">Description:</h5>

                                                            <textarea class="form-control" name="description"
                                                                value="{{ old('description', isset($posts) ? $posts->description : '') }}"
                                                                id="" rows="4">{{$userPost->description}}</textarea>

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

                                                <ol class="breadcrumb rounded p-3 mt-4"
                                                    style="background-color: #2f77ad;">

                                                    <li class="breadcrumb-item active text-light" aria-current="page">
                                                        PROPERTY
                                                        SPECS AND PRICE</li>

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

                                                                <input class="form-control" id="land_area"
                                                                    name="land_area" value="{{$userPost->land_area}}"
                                                                    type="text">

                                                                <h5 class="float-right mt-2 mb-2"
                                                                    style="padding-left:5px;padding-right:5px; font-size:14px;">
                                                                    unit:</h5>

                                                                <select class="form-control float-right" name="unit"
                                                                    id="">
                                                                    <option
                                                                        {{$userPost->propertyCate->land_area=="marla"?"selected":""}}
                                                                        value="marla" selected>Marla</option>
                                                                    <option
                                                                        {{$userPost->propertyCate->land_area=="Kanal"?"selected":""}}
                                                                        value="kanal">Kanal</option>
                                                                    <option
                                                                        {{$userPost->propertyCate->land_area=="squre_feet"?"selected":""}}
                                                                        value="square_feet">Square feet</option>
                                                                    <option
                                                                        {{$userPost->propertyCate->land_area=="square_yards"?"selected":""}}
                                                                        value="square_yards">Square yards</option>
                                                                </select>

                                                            </div>
                                                            @if ($errors->hasBag('addPostError'))

                                                            <p class="text-danger">


                                                                {{ $errors->addPostError->first('land_area')}}
                                                            </p>

                                                            @endif

                                                            <h5 class="mt-2 mb-2">Price: </h5>
                                                           
                                                            <input id="price" class="form-control" name="price"
                                                                value="{{$userPost->price}}" type="text">

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

                                                            <input class="form-control" name="bedroom" class="bedroom"
                                                                type="number" value="{{$userPost->bedrooms}}"
                                                                id="bedroominvisible">


                                                            <h5 class="mt-2 mb-2" id="bath">Bathrooms:</h5>

                                                            <input class="form-control" name="bathroom" type="number"
                                                                value="{{$userPost->bathrooms}}" id="bathroominvisible">

                                                            <h5 class="mt-2 mb-2">Property Features:</h5>
                                                            <div class="d-flex justify-content-center">
                                                                <input class="form-control" name="year"
                                                                    value="{{$userPost->year}}" id="" type="number">
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

@php
    $floaringArr = explode(',',$userPost->floaring);

   
@endphp
                                                                @php
                                                                     $floaring=collect($floaringArr)->filter( function ($item) {
                                                                        return $item=='tiles';
                                                                        })->count();
                                                                        
                                                                @endphp
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="floaring[]" value="tiles"  {{($floaring>0)? 'checked':''}} id="tiles">
                                                                    <label class="form-check-label" for="tiles">
                                                                        Tiles
                                                                    </label>
                                                                </div>

                                                            </div>
                                                            <div class="d-flex justify-content-left">
                                                                <div class="form-check">
                                                                @php
                                                                $floaring=collect($floaringArr)->filter( function ($item) {
                                                                        return $item=='marbles';
                                                                        })->count();
                                                                        
                                                                @endphp
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="floaring[]"  value="marbles" {{($floaring>0)? 'checked':''}}  id="marbles">
                                                                    <label class="form-check-label" for="marbles">
                                                                        Marbles
                                                                    </label>
                                                                </div>

                                                            </div>
                                                            <div class="d-flex justify-content-left">
                                                                <div class="form-check">
                                                                @php
                                                                $floaring=collect($floaringArr)->filter( function ($item) {
                                                                        return $item=='wooden';
                                                                        })->count();
                                                                @endphp
                                                                    <input class="form-check-input" type="checkbox"  name="floaring[]"
                                                                        value="wooden"  {{($floaring>0)? 'checked':''}} id="wooden">
                                                                    <label class="form-check-label" for="wooden">
                                                                        Wooden
                                                                    </label>
                                                                </div>

                                                            </div>
                                                            <div class="d-flex justify-content-left">
                                                                <div class="form-check">
                                                                @php
                                                                $floaring=collect($floaringArr)->filter( function ($item) {
                                                                        return $item=='chip';
                                                                        })->count();
                                                                @endphp
                                                                    <input class="form-check-input" type="checkbox" name="floaring[]"
                                                                        value="chip" {{($floaring>0)? 'checked':''}}   id="chip">
                                                                    <label class="form-check-label" for="chip">
                                                                        Chip
                                                                    </label>
                                                                </div>

                                                            </div>




                                                            <!--/////////Electricity backup portion start////////////////-->

                                                            <h5 class="mt-2 mb-2" id="electricity-backup">Electricity
                                                                Backup:
                                                            </h5>

  
        
                                                            <div class="d-flex justify-content-left">
                                                                <div class="form-check">

                                                                @php
    $ElectricityArr = explode(',',$userPost->electricitybackup);

@endphp
                                                                @php
                                                                $electricity=collect($ElectricityArr)->filter( function ($item) {
                                                                        return $item=='generator';
                                                                        })->count();
                                                                @endphp
                                                                    <input class="form-check-input" type="checkbox" name="electricity[]" value="generator" {{($electricity>0)? 'checked':''}}   id="generator">
                                                                    <label class="form-check-label" for="generator">
                                                                        Generator
                                                                    </label>
                                                                </div>

                                                            </div>
                                                            <div class="d-flex justify-content-left">
                                                                <div class="form-check">
                                                                @php
                                                                $electricity=collect($ElectricityArr)->filter( function ($item) {
                                                                        return $item=='ups';
                                                                        })->count();
                                                                @endphp
                                                                    <input class="form-check-input" type="checkbox" name="electricity[]" value="ups" {{($electricity>0)? 'checked':''}}   id="UPS">
                                                                    <label class="form-check-label" for="ups">
                                                                        UPS
                                                                    </label>
                                                                </div>

                                                            </div>
                                                            <div class="d-flex justify-content-left">
                                                                <div class="form-check">
                                                                @php
                                                                $electricity=collect($ElectricityArr)->filter( function ($item) {
                                                                        return $item=='solar';
                                                                        })->count();
                                                                @endphp
                                                                    <input class="form-check-input" name="electricity[]" type="checkbox"
                                                                    value="solar" {{($electricity>0)? 'checked':''}}    id="solar">
                                                                    <label class="form-check-label" for="solar">
                                                                        Solar
                                                                    </label>
                                                                </div>

                                                            </div>
                                                            <div class="d-flex justify-content-left">
                                                                <div class="form-check">
                                                                @php
                                                                $electricity=collect($ElectricityArr)->filter( function ($item) {
                                                                        return $item=='other';
                                                                        })->count();
                                                                @endphp
                                                                    <input class="form-check-input" type="checkbox"  name="electricity[]"  value="other" {{($electricity>0)? 'checked':''}} 
                                                                        id="other">
                                                                    <label class="form-check-label" for="other">
                                                                        Other
                                                                    </label>
                                                                </div>

                                                            </div>


                                                            <!--electricity backup portion end////////////////-->





                                                            <!--Broadband,internet access start///////////////-->

                                                            <h5 class="mt-4">Broadband,Internet Acess: </h5>
                                                            <select class="form-control float-right"
                                                                name="Internet-Aces" id="Internet-Acess">
                                                                <option value="yes" selected>yes</option>
                                                                <option value="no">no</option>

                                                            </select>
                                                            <!--Broadband,internet access end/////////////////-->



                                                            <h5 class="mt-4">Intercom:</h5>
                                                            <select class="form-control float-right" name="Intercom"
                                                                id="Intercom">
                                                                <option value="yes" selected>yes</option>
                                                                <option value="no">no</option>

                                                            </select>

                                                            <!--home section start//////////////////-->
                                                            <p class="mt-3 ">
                                                                <a class="btn " style="background-color: #2f77ad;"
                                                                    data-bs-toggle="collapse" href="#collapseExample"
                                                                    role="button" aria-expanded="false"
                                                                    aria-controls="collapseExample">
                                                                    HOME
                                                                </a>
                                                            </p>
 @php
    $amenitiesArr = explode(',',$userPost->amenities);
    

@endphp
       

                                               <div class="collapse" id="collapseExample">
                                                                <div class="form-check mt-3">
                                                                @php
                                                                $amenities=collect($amenitiesArr)->filter( function ($item) {
                                                                        return $item=='furnished';
                                                                        })->count();
                                                                @endphp
                                                                    <input class="form-check-input" type="checkbox"  name="amenities[]"
                                                                     value="furnished" {{($amenities>0)? 'checked':''}}    value="furnished" id="furnished">
                                                                    <label class="form-check-label fw-bold"
                                                                        for="furnished">Furnished
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                @php
                                                                $amenities=collect($amenitiesArr)->filter( function ($item) {
                                                                        return $item=='Maintaince-Staff';
                                                                        })->count();
                                                                @endphp
                                                                    <input class="form-check-input" type="checkbox"  name="amenities[]"
                                                                     {{($amenities>0)? 'checked':''}}     value="Maintaince-Staff" id="maintenance-staff">
                                                                    <label class="form-check-label fw-bolder"
                                                                        for="maintenance-staff">Maintenance Staff
                                                                    </label>
                                                                </div>


                                                                <div class="form-check">
                                                                @php
                                                                $amenities=collect($amenitiesArr)->filter( function ($item) {
                                                                        return $item=='Security-Staff';
                                                                        })->count();
                                                                @endphp
                                                                    <input class="form-check-input" type="checkbox"  name="amenities[]"
                                                                    {{($amenities>0)? 'checked':''}}  value="Security-Staff"      id="Security-Staff">
                                                                    <label class="form-check-label fw-bolder"
                                                                        for="Security-Staff">Security Staff
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">

                                                                @php
                                                                $amenities=collect($amenitiesArr)->filter( function ($item) {
                                                                        return $item=='Drawing-Room';
                                                                        })->count();
                                                                @endphp
                                                                    <input class="form-check-input" type="checkbox"  name="amenities[]"
                                                                   {{($amenities>0)? 'checked':''}}   value="Drawing-Room" id="Drawing-Room">
                                                                    <label class="form-check-label fw-bolder"
                                                                        for="Drawing-Room">Drawing Room
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                @php
                                                                $amenities=collect($amenitiesArr)->filter( function ($item) {
                                                                        return $item=='Dining-Room';
                                                                        })->count();
                                                                @endphp
                                                                    <input class="form-check-input" type="checkbox"  name="amenities[]"
                                                                     {{($amenities>0)? 'checked':''}}   value="Dining-Room" id="Dining-Room">
                                                                    <label class="form-check-label fw-bolder"
                                                                        for="Dining-Room">Dining Room
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                @php
                                                                $amenities=collect($amenitiesArr)->filter( function ($item) {
                                                                        return $item=='Prayer-Room';
                                                                        })->count();
                                                                @endphp
                                                                    <input class="form-check-input" type="checkbox"  name="amenities[]"
                                                                     {{($amenities>0)? 'checked':''}}    value="Prayer-Room" id="Prayer-Room">
                                                                    <label class="form-check-label fw-bolder"
                                                                        for="Prayer-Room">Prayer Room
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                @php
                                                                $amenities=collect($amenitiesArr)->filter( function ($item) {
                                                                        return $item=='Power-Room';
                                                                        })->count();
                                                                @endphp
                                                                    <input class="form-check-input" type="checkbox"  name="amenities[]"
                                                                    {{($amenities>0)? 'checked':''}}     value="Power-Room" id="Powder-Room">
                                                                    <label class="form-check-label fw-bolder"
                                                                        for="Powder-Room">Power Room
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                @php
                                                                $amenities=collect($amenitiesArr)->filter( function ($item) {
                                                                        return $item=='TV-lounge';
                                                                        })->count();
                                                                @endphp
                                                                    <input class="form-check-input" type="checkbox"  name="amenities[]"
                                                                    {{($amenities>0)? 'checked':''}}   value="TV-lounge" id="TV-lounge">
                                                                    <label class="form-check-label fw-bolder"
                                                                        for="TV-lounge">TV
                                                                        lounge
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                @php
                                                                $amenities=collect($amenitiesArr)->filter( function ($item) {
                                                                        return $item=='Sitting-room';
                                                                        })->count();
                                                                @endphp
                                                                    <input class="form-check-input" type="checkbox"  name="amenities[]"
                                                                    {{($amenities>0)? 'checked':''}}     value="Sitting-room" id="Sitting-room">
                                                                    <label class="form-check-label fw-bolder"
                                                                        for="Sitting-room">Sitting room
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                @php
                                                                $amenities=collect($amenitiesArr)->filter( function ($item) {
                                                                        return $item=='Near-to-schools';
                                                                        })->count();
                                                                @endphp
                                                                    <input class="form-check-input" type="checkbox"  name="amenities[]"
                                                                    {{($amenities>0)? 'checked':''}}     value="Near-to-schools" id="Near-to-schools">
                                                                    <label class="form-check-label fw-bolder"
                                                                        for="Near-to-schools">Near to schools
                                                                    </label>
                                                                </div>


                                                                <div class="form-check">
                                                                @php
                                                                $amenities=collect($amenitiesArr)->filter( function ($item) {
                                                                        return $item=='Near-to-hospitals';
                                                                        })->count();
                                                                @endphp
                                                                    <input class="form-check-input" type="checkbox"  name="amenities[]"
                                                                     {{($amenities>0)? 'checked':''}}
                                                                        value="Near-to-hospitals" id="Near-to-hospitals">
                                                                    <label class="form-check-label fw-bolder"
                                                                        for="Near-to-hospitals">Near to hospitals
                                                                    </label>
                                                                </div>


                                                                <div class="form-check">
                                                                @php
                                                                $amenities=collect($amenitiesArr)->filter( function ($item) {
                                                                        return $item=='other';
                                                                        })->count();
                                                                @endphp
                                                                    <input class="form-check-input" type="checkbox"  name="amenities[]"
                                                                    {{($amenities>0)? 'checked':''}}  value="other" id="other">
                                                                    <label class="form-check-label fw-bolder"
                                                                        for="other">Other
                                                                    </label>
                                                                </div>


                                                            </div>

                                                            <!--home section end////////////////////-->


                                                            <!--Plots  start///////////////-->
                                                            <p class="mt-3 ">
                                                                <a class="btn " style="background-color: #2f77ad;"
                                                                    data-bs-toggle="collapse" href="#collapseExample1"
                                                                    role="button" aria-expanded="false"
                                                                    aria-controls="collapseExample">
                                                                    PLOTS
                                                                </a>
                                                            </p>





                                                            <div class="collapse" id="collapseExample1">
                                                                <div class="form-check mt-3">
                                                                @php
                                                                $amenities=collect($amenitiesArr)->filter( function ($item) {
                                                                        return $item=='Possession';
                                                                        })->count();
                                                                @endphp
                                                                    <input class="form-check-input" type="checkbox"  name="amenities[]"
                                                                    {{($amenities>0)? 'checked':''}}    value="Possession" id="Possession">
                                                                    <label class="form-check-label fw-bold"
                                                                        for="Possession">Possession
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                @php
                                                                $amenities=collect($amenitiesArr)->filter( function ($item) {
                                                                        return $item=='Corner';
                                                                        })->count();
                                                                @endphp
                                                                    <input class="form-check-input" type="checkbox"  name="amenities[]"
                                                                    {{($amenities>0)? 'checked':''}}     value="Corner" id="Corner">
                                                                    <label class="form-check-label fw-bolder"
                                                                        for="Corner">Corner
                                                                    </label>
                                                                </div>


                                                                <div class="form-check">
                                                                @php
                                                                $amenities=collect($amenitiesArr)->filter( function ($item) {
                                                                        return $item=='Park-Facing';
                                                                        })->count();
                                                                @endphp
                                                                    <input class="form-check-input" type="checkbox"  name="amenities[]"
                                                                     {{($amenities>0)? 'checked':''}} value="Park-Facing"
                                                                        value="{{ old('park-facing', isset($posts) ? $posts->park-facing : '') }}"
                                                                        id="Park-Facing">
                                                                    <label class="form-check-label fw-bolder"
                                                                        for="Park-Facing">Park Facing
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                @php
                                                                $amenities=collect($amenitiesArr)->filter( function ($item) {
                                                                        return $item=='Desputed';
                                                                        })->count();
                                                                @endphp
                                                                    <input class="form-check-input" type="checkbox"  name="amenities[]"
                                                                  {{($amenities>0)? 'checked':''}}    value="Desputed" id="Desputed">
                                                                    <label class="form-check-label fw-bolder"
                                                                        for="Desputed">Disputed
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                @php
                                                                $amenities=collect($amenitiesArr)->filter( function ($item) {
                                                                        return $item=='File';
                                                                        })->count();
                                                                @endphp
                                                                    <input class="form-check-input" type="checkbox"  name="amenities[]"
                                                                    {{($amenities>0)? 'checked':''}}    value="File" id="File">
                                                                    <label class="form-check-label fw-bolder"
                                                                        for="File">File
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                @php
                                                                $amenities=collect($amenitiesArr)->filter( function ($item) {
                                                                        return $item=='Electricity';
                                                                        })->count();
                                                                @endphp
                                                                    <input class="form-check-input" type="checkbox"  name="amenities[]"
                                                                    {{($amenities>0)? 'checked':''}}   value="Electricity" id="Electricity">
                                                                    <label class="form-check-label fw-bolder"
                                                                        for="Electricity">Electricity
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                @php
                                                                $amenities=collect($amenitiesArr)->filter( function ($item) {
                                                                        return $item=='Severage';
                                                                        })->count();
                                                                @endphp
                                                                    <input class="form-check-input" type="checkbox"  name="amenities[]"
                                                                     {{($amenities>0)? 'checked':''}}   value="Severage" id="Severage">
                                                                    <label class="form-check-label fw-bolder"
                                                                        for="Severage">Severage
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                @php
                                                                $amenities=collect($amenitiesArr)->filter( function ($item) {
                                                                        return $item=='Water-Supply';
                                                                        })->count();
                                                                @endphp
                                                                    <input class="form-check-input" type="checkbox"  name="amenities[]"
                                                                     {{($amenities>0)? 'checked':''}}     value="Water-Supply" id="Water-Supply">
                                                                    <label class="form-check-label fw-bolder"
                                                                        for="Water-Supply">Water Supply
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                @php
                                                                $amenities=collect($amenitiesArr)->filter( function ($item) {
                                                                        return $item=='Sui-Gas';
                                                                        })->count();
                                                                @endphp
                                                                    <input class="form-check-input" type="checkbox"  name="amenities[]"
                                                                     {{($amenities>0)? 'checked':''}}  value="Sui-Gas" id="Sui-Gas">
                                                                    <label class="form-check-label fw-bolder" for="Sui-Gas>Sui Gas
              </label>
              </div>
             
              <div class=" form-check">
              @php
                                                                $amenities=collect($amenitiesArr)->filter( function ($item) {
                                                                        return $item=='other';
                                                                        })->count();
                                                                @endphp
                                                                        <input class="form-check-input" type="checkbox"  name="amenities[]"
                                                                         {{($amenities>0)? 'checked':''}}   value="other" id="other">
                                                                        <label class="form-check-label fw-bolder"
                                                                            for="other">Other
                                                                        </label>
                                                                </div>


                                                            </div>


                                                            <h5 class="mt-4">Parking spaces: </h5>
                                                            
                                                            <input class="form-control" id="parking-spaces"
                                                                name="parking-spaces" type="text">


                                                            <div class="row mt-2">


                                                                <div class="col-12">

                                                                <div class="card-body">

                                                    <h5 class="card-title">Select Main
                                                        image:
                                                    </h5>

                                                    <p class="card-subtitle mb-4">You Can
                                                        Select
                                                        Only One
                                                        images Main Image Compulsery
                                                    </p>

                                                    <input type="file" name="mainimage"
                                                        data-height="300" id="mainimage" />
                                                        <img width="100" height="80"
                                                                                src="{{asset('mainimage/'.$post->mainimage)}}"
                                                                                alt="" srcset="">

                                                </div> <!-- end card-body-->
                                            </div> <!-- end card-->
                                        </div> <!-- end col --><br>


                                                                </div>

                                                                    <div class="card">

                                                                        <div class="card-body">

                                                                            <h5 class="card-title">Select image:</h5>

                                                                            <p class="card-subtitle mb-4">Press Ctrl to
                                                                                select
                                                                                multiple
                                                                                images
                                                                            </p>
                                                                            <?php $post = '' ?>
                                                                            <input type="file" name="image[]" multiple
                                                                                class="dropify" data-height="300"
                                                                                id="image" onchange="loadfile(event)" />

                                                                            @foreach($postimgs as $postimgss)
                                                                            <img width="100" height="80"
                                                                                src="/{{$postimgss->img_path}}/{{$postimgss->img_name}}"
                                                                                alt="" srcset="">
                                                                            @endforeach



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

                                                        <ol class="breadcrumb rounded p-3 mt-4"
                                                            style="background-color: #2f77ad;">

                                                            <li class="breadcrumb-item active text-light"
                                                                aria-current="page">
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

                                                        <div class="card-body"
                                                            style="margin-left: 50px; margin-right: 50px;">


                                                            <div class="row">

                                                                <div class="col-sm-6 col-md-12 ">
                                                                    <div class="form-group">

                                                                        <h5 class="mt-2 mb-2">Youtube Video Link
                                                                            (optional)</h5>
                                                                        <input class="form-control"
                                                                            style="text-transform:lowercase;"
                                                                            placeholder="https://www.youtube.com/channel/UCZvWbwDZetQNCznvHZeZRjw"
                                                                            id="" name="video_link"
                                                                            value="{{ old('video_link', isset($posts) ? $posts->video_link : '') }}"
                                                                            type="text">


                                                                        <!-- cmnt -->
                                                                        <!-- <span id=""></span>

                         <h5 class="mt-2 mb-2">Amenities (optional)</h5>
                         
                         <input class="form-control" placeholder="e.g garage,pool,lawn"
                            
                         id="amenities" name="amenities" type="text"> -->

                                                                        <span id=""></span>


                                                                        <h5 class="mt-2 mb-2">Address</h5>

                                                                        <input class="form-control"
                                                                            placeholder="house# , street# , area , city "
                                                                            id="address" name="address"
                                                                            value="{{$userPost->address}}" type="text">
                                                                        <span id="address_info"></span>

                                                                        @if ($errors->hasBag('addPostError'))

                                                                        <p class="text-danger">


                                                                            {{ $errors->addPostError->first('address')}}
                                                                        </p>

                                                                        @endif

                                                                        <span id="address_info"></span>


                                                                        <!-- commnt -->

                                                                        <h5 class="mt-2 mb-2">Contact person name</h5>

                                                                        <input class="form-control"
                                                                            id="contact_person_name"
                                                                            name="contact_person_name"
                                                                            value="{{$userPost->contact_person_name}}"
                                                                            value="{{ old('contact_person_name', isset($posts) ? $posts->contact_person_name : '') }}"
                                                                            type="text">

                                                                        @if ($errors->hasBag('addPostError'))

                                                                        <p class="text-danger">


                                                                            {{ $errors->addPostError->first('contact_person_name')}}
                                                                        </p>

                                                                        @endif



                                                                        <h5 class="mt-2 mb-2">Mobile number</h5>

                                                                        <div class="input-group mb-3">
                                                                            <select
                                                                                style="border-style: solid; border-width: 1px;">
                                                                                <option
                                                                                    style="background-image:url(https://img.icons8.com/color/32/000000/pakistan.png);">
                                                                                    +92</option>
                                                                            </select>
                                                                            <input id="mobile_number"
                                                                                name="mobile_number"
                                                                                value=" {{ auth()->user()->mobile_number }}"
                                                                                value="{{$userPost->mobile_number}}"
                                                                                type="text" class="form-control"
                                                                                aria-label="Text input with dropdown button">
                                                                        </div>



                                                                        <span class=" bg-warning text-dark"
                                                                            id="error-mobile"></span>

                                                                        @if ($errors->hasBag('addPostError'))

                                                                        <p class="text-danger">


                                                                            {{ $errors->addPostError->first('mobile_number')}}
                                                                        </p>

                                                                        @endif

                                                                        <h5 class="mt-2 mb-2">Mobile number 2</h5>
                                                                        <div class="input-group mb-3">
                                                                            <select
                                                                                style="border-style: solid; border-width: 1px; z-index: 5;">
                                                                                <option
                                                                                    style="background-image:url(https://img.icons8.com/color/32/000000/pakistan.png);">
                                                                                    +92</option>
                                                                            </select>
                                                                            <input id="mobile_number"
                                                                                name="mobile2_number"
                                                                                value=" {{ auth()->user()->mobile2_number }}"
                                                                                value="{{$userPost->mobile2_number}}"
                                                                                type="text" class="form-control"
                                                                                aria-label="Text input with dropdown button">
                                                                        </div>
                                                                        <span class=" bg-warning text-dark"
                                                                            id="error-mobile2"></span>

                                                                        <h5 class="mt-2 mb-2">Email</h5>
                                                                        <input class="form-control" name="email"
                                                                            value=" {{ auth()->user()->email }}"
                                                                            value="{{$userPost->email}}"
                                                                            type="text"></input>
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

                                                            <button class="btn btn-light w-100 shadow-sm bg-gradient"
                                                                type="submit"
                                                                style="background-color: #ff7f00;height: 60px;">Update
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
                                        $i]
                                    .area + " </option>";

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

            /*

                $("#mobile_number").on("keydown", function () {

                    $nameValue = $(this).val();
                    $regex = /^92[0-9]\d{9}$/;

                    //console.log("s");
                    if ($regex.test($nameValue)) {
                        console.log("true");
                        $('#error-mobile').text("");


                    } else {
                        $('#error-mobile').text("phone number is not valid");

                    }

                }); 



                $("#mobile_number2").on("keyup", function () {

                    $nameValue = $(this).val();
                    $regex = /^92[0-9]\d{9}$/;

                    if ($nameValue.match($regex)) {
                        $('#error-mobile2').text("");

                    }
                    else {
                        $('#error-mobile2').text("phone number must be valid ");

                    }

                }); */


            //Enable bathrooms and bedrooms













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

            /*
                    $('#set_lenght_title').on('keydown', function () {
                        $title = $(this).val();
                        $regex = /^.{1,20}$/;

                        if (!$title.match($regex)) {

                            $newVal = $title.substr(0, $title.length - 1);
                            //console.log($newVal);
                            $(this).val($newVal);
                            $('#title_info').show();
                            $('#title_info').text('title must be 20 character');
                            $('#title_info').addClass('text text-danger');
                        } else {
                            $('#title_info').hide();
                        }

                    }); */


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
                    ")' class='btn btn-danger pull-left'>x</button> <img style='max-width:140px; height: auto' src='" +
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






        @endsection