@extends('adminPanel.layout')



@section('header')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

@endsection


@section('body')



<div class="main-content">

    <div class="page-content">

        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Edit Post</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Syed Zameen</a></li>
                                <li class="breadcrumb-item active">Edit Post</li>
                            </ol>
                        </div>

                    </div>
                </div>


                <div class="container">
                    <div class="row">

                        @if (session()->has("msg"))
                        <h3 class="text-success">{{session()->get("msg")}}</h3>
                        @endif

                        <div class="col-12 ">

                            <div style="" class="card">

                                <div class="card-body">



                                    <div class="row">

                                        <div class="col-sm-6 col-md-4">

                                            @if(Auth::check())

                                            @if(Auth::user()->role==1)
                                           
                                            <form method="POST" class="form-group" action="{{url("edit/post/".$userPost->id)}}" enctype="multipart/form-data">

                                                @else
                                                <form method="POST" class="form-group" action="{{url("edit/post/".$userPost->id)}}" enctype="multipart/form-data">
                                                    @endif
                                                    @endif
                                                    @csrf
                                                    <h5 class="mt-2 mb-2">Purpose</h5>
                                                    <select class="form-control" name="purpose" id="">
                                                        <option {{$userPost->propertyCate->purpose=="sale"?"selected":""}} value="sale">For sale</option>
                                                        <option {{$userPost->propertyCate->purpose=="rent"?"selected":""}} value="rent">Rent</option>
                                                    </select>
                                                    <h5 class="mt-1 mb-1">Property type</h5>
                                                    <select class="form-control" name="property_type" id="property_type">

                                                        <option {{$userPost->propertyCate->property_type=="residential"?"selected":""}} value="residential">residential</option>
                                                        <option {{$userPost->propertyCate->property_type=="commercial"?"selected":""}} value="commercial">commercial</option>

                                                    </select>

                                                    <h5 class="mt-2 mb-2">property sub type</h5>

                                                    <select class="form-control" name="sub_type" id="sub_type">
                                                        <option {{$userPost->propertyCate->sub_type=="home"?"selected":""}} value="home">home</option>
                                                        <option {{$userPost->propertyCate->sub_type=="flat"?"selected":""}} value="flat">flat</option>
                                                        <option {{$userPost->propertyCate->sub_type=="upper_portion"?"selected":""}} value="upper_portion">upper portion
                                                        </option>
                                                        <option {{$userPost->propertyCate->sub_type=="lower_portion"?"selected":""}} value="lower_portion">lower portion
                                                        </option>

                                                        <option {{$userPost->propertyCate->sub_type=="residential_plot"?"selected":""}} value="residential_plot">
                                                            residential plot</option>
                                                        <option {{$userPost->propertyCate->sub_type=="commercial_plot"?"selected":""}} value="commercial_plot">
                                                            commercial plot</option>
                                                        <option {{$userPost->propertyCate->sub_type=="office"?"selected":""}} value="office">office</option>
                                                        <option {{$userPost->propertyCate->sub_type=="shop"?"selected":""}} value="shop">shop</option>
                                                        <option {{$userPost->propertyCate->sub_type=="building"?"selected":""}} value="building">building</option>

                                                    </select>
                                                    <h5 class="mt-2 mb-2">city</h5>

                                                    <select class="form-control" id="city">

                                                        @foreach ($cities as $city)

                                                        <option {{$userPost->cityAndArea->city==$city?"selected":""}} value="{{$city->city}}">{{$city->city}}</option>


                                                        @endforeach



                                                    </select>

                                                    <h5 class="mt-2 mb-2">location</h5>

                                                    <select id="location" class="form-control select222" name="city_area">




                                                    </select>




                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card">
                                                                <div class="card-body">

                                                                    <h5 class="card-title">Select image</h5>
                                                                    <p class="card-subtitle mb-4">Press Ctrl to select
                                                                        multiple
                                                                        images
                                                                        <br>note: In edit mode it will delete all old images
                                                                        and
                                                                        add new only when new pic uploaded
                                                                    </p>

                                                                    <input type="file" name="image[]" multiple class="dropify" data-height="300" />

                                                                    @if ($errors->hasBag('addPostError'))

                                                                    <p class="text-danger">
                                                                        {{$errors->addPostError->first('image')}}
                                                                    </p>
                                                                    @endif


                                                                </div> <!-- end card-body-->
                                                            </div> <!-- end card-->
                                                        </div> <!-- end col -->
                                                    </div>











                                        </div>



                                        <div class="col-sm-6 col-md-4">

                                            <div class="float-right form-group ">

                                                <h5 class="mt-2 mb-2">Property Title</h5>

                                                <input class="form-control" value="{{$userPost->property_title}}" name="property_title" type="text" id="set_lenght_title">
                                                <span id="title_info"></span>
                                                @if ($errors->hasBag('addPostError'))

                                                <p class="text-danger">
                                                    {{$errors->addPostError->first('property_title')}}
                                                </p>
                                                @endif




                                                <h5 class="mt-2 mb-2">Description</h5>
                                                {{-- <input class="form-control" name="description" type="text"> --}}
                                                <textarea class="form-control" name="description" id="" rows="4">{{$userPost->description}}</textarea>


                                                @if ($errors->hasBag('addPostError'))

                                                <p class="text-danger">
                                                    {{$errors->addPostError->first('description')}}
                                                </p>
                                                @endif




                                                <h5 class="mt-2 mb-2">Price</h5>
                                                <input id="price" class="form-control" value="{{$userPost->price}}" name="price" type="text">

                                                @if ($errors->hasBag('addPostError'))

                                                <p class="text-danger">
                                                    {{$errors->addPostError->first('price')}}
                                                </p>
                                                @endif





                                                <h5 class="mt-2 mb-2">Land area</h5>
                                                <div class="d-flex justify-content-center">


                                                    <input class="form-control" id="land_area" value="{{$userPost->land_area}}" name="land_area" type="text">

                                                    <h5 class="float-right mt-2 mb-2" style="padding-left:5px;padding-right:5px; font-size:14px;">unit:</h5>
                                                    <select class="form-control float-right" name="unit" id="">
                                                        <option selected value="marla">marla
                                                        </option>
                                                        <option value="kanal">kanal
                                                        </option>
                                                        <option value="square_feet">square
                                                            feet</option>
                                                        <option value="square_yards">square
                                                            yards</option>
                                                    </select>


                                                </div>
                                                @if ($errors->hasBag('addPostError'))

                                                <p class="text-danger">
                                                    {{$errors->addPostError->first('land_area')}}
                                                </p>
                                                @endif


                                                <h5 class="mt-2 mb-2" id="bed">Bedrooms</h5>
                                                <input class="form-control" value="{{$userPost->bedrooms}}" name="bedroom" class="bedroom" type="number" id="bedroominvisible">






                                                <h5 class="mt-2 mb-2" id="bath">Bathrooms</h5>
                                                <input class="form-control" value="{{$userPost->bathrooms}}" name="bathroom" type="number" id="bathroominvisible">




                                            </div>




                                        </div>





                                        <div class="col-sm-6 col-md-4">

                                            <div class="form-group">

                                                <h5 class="mt-2 mb-2">Youtube Video Link (optional)</h5>
                                                <input class="form-control" style="text-transform:none !important" value="{{$userPost->video_link}}" placeholder="" id="" name="video_link" type="text">
                                                <span id=""></span>


                                                <h5 class="mt-2 mb-2">Amenities (optional)</h5>
                                                <input class="form-control" placeholder="e.g garage,pool,lawn" id="amenities" value="{{$userPost->amenities}}" name="amenities" type="text">
                                                <span id=""></span>


                                                <h5 class="mt-2 mb-2">Address</h5>
                                                <input class="form-control" placeholder="house# , street# , area , city " id="address" name="address" value="{{$userPost->address}}" type="text">

                                                @if ($errors->hasBag('addPostError'))

                                                <p class="text-danger">


                                                    {{ $errors->addPostError->first('address')}}
                                                </p>

                                                @endif











                                                <h5 class="mt-2 mb-2">Contact person name</h5>
                                                <input class="form-control" value="{{$userPost->contact_person_name}}" id="contact_person_name" name="contact_person_name" type="text">


                                                @if ($errors->hasBag('addPostError'))

                                                <p class="text-danger">
                                                    {{$errors->addPostError->first('contact_person_name')}}
                                                </p>
                                                @endif






                                                <h5 class="mt-2 mb-2">Mobile number</h5>
                                                <input class="form-control" value="{{$userPost->mobile_number}}" placeholder="92xxxxxxxxxx" id="mobile_number" name="mobile_number" type="text">
                                                <span class=" bg-warning text-dark" id="error-mobile"></span>

                                                @if ($errors->hasBag('addPostError'))

                                                <p class="text-danger">
                                                    {{$errors->addPostError->first('mobile_number')}}
                                                </p>
                                                @endif





                                                <h5 class="mt-2 mb-2">Mobile number 2</h5>
                                                <input class="form-control" placeholder="92xxxxxxxxxx" id="mobile_number2" value="{{$userPost->mobile2_number}}" name="mobile_number2" type="text">
                                                <span class=" bg-warning text-dark" id="error-mobile2"></span>

                                                <h5 class="mt-2 mb-2">Email</h5>
                                                <input class="form-control" value="{{$userPost->email}}" name="email" type="text">

                                                @if ($errors->hasBag('addPostError'))

                                                <p class="text-danger">
                                                    {{$errors->addPostError->first('email')}}
                                                </p>
                                                @endif



                                            </div>

                                        </div>









                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mx-auto" style="width: 200px">
                                                <button class="btn btn-light w-100" type="submit">submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
















                                </div>

                            </div>













                        </div>










                    </div>
                </div>

















            </div>
            <!-- end page title -->




        </div>


    </div>


</div>

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

                    $oldArea = "{{$userPost->cityAndArea->area}}";

                    //  console.log($oldArea);

                    $("#location").html(function() {
                        $allOption = "";
                        for ($i = 0; $i < res.length; $i++) {
                            $allOption += "<option   " + ($oldArea === res[$i].area ? "selected" : "") + "      value='" + res[$i].id + "'> " + res[$i].area + " </option>";

                        }
                        // console.log($allOption);
                        return $allOption;
                    });




                }



            });

        }

        getAreaFromCity();


        $(".select222").select2();

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

        $("#land_area").on("keyup", function() {

            $land_area_value = $(this).val();
            $regex = "^[0-9*xX#.+]+$";


            if (!$land_area_value.match($regex)) {

                $newVal = $land_area_value.substr(0, $land_area_value.length - 1);
                //console.log($newVal);
                $(this).val($newVal);

            }

        });



        $("#contact_person_name").on("keyup", function() {

            $nameValue = $(this).val();
            $regex = "^[A-z]+$";

            if (!$nameValue.match($regex)) {

                $newVal = $nameValue.substr(0, $nameValue.length - 1);
                //console.log($newVal);
                $(this).val($newVal);

            }

        });


        $("#mobile_number").on("keyup", function() {

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



        $("#mobile_number2").on("keyup", function() {

            $nameValue = $(this).val();
            $regex = /^92[0-9]\d{9}$/;

            if ($nameValue.match($regex)) {
                $('#error-mobile2').text("");

            } else {
                $('#error-mobile2').text("phone number must be valid ");

            }

        });












    });

    $("#sub_type").on("change", function() {

        // var bedrooms=$("#noOfBedrooms").text();
        //  var bathrooms= $("#noOfBathrooms").text();
        var bedrooms = "{{$userPost->bedrooms}}";
        var bathrooms = "{{$userPost->bathrooms}}";


        if ($(this).val() == 'residential_plot' || $(this).val() == 'commercial_plot') {





            $("#bathroominvisible").val('');
            $("#bathroominvisible").hide();
            $("#bedroominvisible").val('');
            $("#bedroominvisible").hide();

            $("#bed").hide();
            $('#bath').hide();

        } else {


            $("#bathroominvisible").show();
            $("#bathroominvisible").val(bathrooms);

            $("#bedroominvisible").show();
            $("#bedroominvisible").val(bedrooms);
            $("#bed").show();
            $('#bath').show();
            console.log(bathrooms);
        }


    });
    $('#set_lenght_title').on('keyup', function() {
        $title = $(this).val();
        $regex = /^.{1,50}$/;

        if (!$title.match($regex)) {

            $newVal = $title.substr(0, $title.length - 1);
            //console.log($newVal);
            $(this).val($newVal);
            $('#title_info').show();
            $('#title_info').text('title must be 50 character');
            $('#title_info').addClass('text text-danger');
        } else {
            $('#title_info').hide();
        }

    });
</script>






@endsection