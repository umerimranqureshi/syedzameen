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
                        <h4 class="mb-0 font-size-18">Post Add</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Syed Zameen</a></li>
                                <li class="breadcrumb-item active">Post Add</li>
                            </ol>
                        </div>

                    </div>
                </div>


                <div class="container">
                    <div class="row">

                        @if (session()->has("success"))

                        <h3 class="text-success">{{session()->get("success")}}</h3>

                        @endif
                        <div class="col-12 ">

                            <div style="" class="card">

                                <div class="card-body">



                                    <div class="row">

                                        <div class="col-sm-6 col-md-4">


                                            <form method="POST" class="form-group" action="{{route('addAdminPost')}}" enctype="multipart/form-data">
                                                @csrf
                                                <h5 class="mt-2 mb-2">Purpose</h5>
                                                <select class="form-control" name="purpose" id="adminaddcity">
                                                    <option value="sale">For sale</option>
                                                    <option value="rent">Rent</option>
                                                </select>
                                                <h5 class="mt-1 mb-1">Property type</h5>
                                                <select class="form-control" name="property_type" id="property_type">

                                                    <option value="residential">residential</option>
                                                    <option value="commercial">commercial</option>

                                                </select>

                                                <h5 class="mt-2 mb-2">property sub type</h5>

                                                <select class="form-control" name="sub_type" id="sub_type">
                                                    <option value="home">home</option>
                                                    <option value="flat">flat</option>
                                                    <option value="upper_portion">upper portion</option>
                                                    <option value="lower_portion">lower portion</option>

                                                    <option value="residential_plot">residential plot</option>
                                                    <option value="commercial_plot">commercial plot</option>
                                                    <option value="office">office</option>
                                                    <option value="shop">shop</option>
                                                    <option value="building">building</option>


                                                </select>
                                                <h5 class="mt-2 mb-2">city</h5>
                                                <select class="form-control" id="city">

                                                    @foreach ($cities as $city)

                                                    <option value="{{$city->city}}">{{$city->city}}</option>

                                                    @endforeach


                                                </select>

                                                <h5 class="mt-2 mb-2">location</h5>
                                                <select id="location" class="form-control select22" name="city_area">


                                                </select>




                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-body">



                                                                <h5 class="card-title">Select image</h5>
                                                                <p class="card-subtitle mb-4">Press Ctrl to select
                                                                    multiple
                                                                    images</p>

                                                                <input type="file" name="image[]" multiple class="dropify" data-height="300" />

                                                            </div> <!-- end card-body-->
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col -->
                                                </div>











                                        </div>

                                        <div class="col-sm-6 col-md-4">

                                            <div class="float-right form-group ">

                                                <h5 class="mt-2 mb-2">Property Title</h5>
                                                <input class="form-control" name="property_title" type="text" id="set_lenght_title">
                                                <span id="title_info"></span>



                                                @if ($errors->hasBag('addPostError'))

                                                <p class="text-danger">


                                                    {{ $errors->addPostError->first('property_title')}}
                                                </p>

                                                @endif


                                                <h5 class="mt-2 mb-2">Description</h5>
                                                {{-- <input class="form-control" name="description" type="text"> --}}
                                                <textarea class="form-control" name="description" id="" rows="4"></textarea>

                                                @if ($errors->hasBag('addPostError'))

                                                <p class="text-danger">


                                                    {{ $errors->addPostError->first('description')}}
                                                </p>

                                                @endif







                                                <h5 class="mt-2 mb-2">Price</h5>
                                                <input id="price" class="form-control" name="price" type="text">
                                                <p id="money-format"></p>
                                                @if ($errors->hasBag('addPostError'))

                                                <p class="text-danger">


                                                    {{ $errors->addPostError->first('price')}}
                                                </p>

                                                @endif









                                                <h5 class="mt-2 mb-2">Land area</h5>
                                                <div class="d-flex justify-content-center">


                                                    <input class="form-control" id="land_area" name="land_area" type="text">

                                                    <h5 class="float-right mt-2 mb-2" style="padding-left:5px;padding-right:5px; font-size:14px;">unit:</h5>
                                                    <select class="form-control float-right" name="unit" id="">
                                                        <option value="marla" selected>marla</option>
                                                        <option value="kanal">kanal</option>
                                                        <option value="square_feet">square feet</option>
                                                        <option value="square_yards">square yards</option>
                                                    </select>







                                                </div>

                                                @if ($errors->hasBag('addPostError'))

                                                <p class="text-danger">


                                                    {{ $errors->addPostError->first('land_area')}}
                                                </p>

                                                @endif





                                                <h5 class="mt-2 mb-2" id="bed">Bedrooms</h5>
                                                <input class="form-control" name="bedroom" class="bedroom" type="number" id="bedroominvisible">


                                                <h5 class="mt-2 mb-2" id="bath">Bathrooms</h5>
                                                <input class="form-control" name="bathroom" type="number" id="bathroominvisible">




                                            </div>




                                        </div>





                                        <div class="col-sm-6 col-md-4">

                                            <div class="form-group">

                                                <h5 class="mt-2 mb-2">Address</h5>
                                                <input class="form-control" placeholder="house# , street# , area , city " id="address" name="address" type="text">




                                                <h5 class="mt-2 mb-2">Contact person name</h5>
                                                <input class="form-control" id="contact_person_name" name="contact_person_name" type="text">

                                                @if ($errors->hasBag('addPostError'))

                                                <p class="text-danger">


                                                    {{ $errors->addPostError->first('contact_person_name')}}
                                                </p>

                                                @endif





                                                <h5 class="mt-2 mb-2">Mobile number</h5>
                                                <input class="form-control" placeholder="+92xxxxxxxxxx" id="mobile_number" name="mobile_number" type="text" value="+92">
                                                <span class=" bg-warning text-dark" id="error-mobile"></span>
                                                @if ($errors->hasBag('addPostError'))
                                                    <p class="text-danger">
                                                        {{ $errors->addPostError->first('mobile_number')}}
                                                    </p>
                                                @endif

                                                <script>
                                                    $(document).ready(function() {
                                                        $("#mobile_number").on("input", function() { // Use "input" event for better handling of pasted text
                                                            var inputValue = $(this).val();
                                                            var regex = /^\+92\d{9}$/; // Regex for +92 followed by 9 digits

                                                            if (regex.test(inputValue)) {
                                                                $('#error-mobile').text("");
                                                            } else {
                                                                $('#error-mobile').text("Phone number is not valid");
                                                            }
                                                        });
                                                    });
                                                </script>





                                                <h5 class="mt-2 mb-2">Mobile number 2</h5>
                                                <input class="form-control" alt="Please write down Just No without 300 " placeholder="92xxxxxxxxxx" id="mobile_number2" name="mobile_number2" type="text">
                                                <span class=" bg-warning text-dark" id="error-mobile2"></span>

                                                <h5 class="mt-2 mb-2">Email</h5>
                                                <input class="form-control" name="email" type="text">

                                                @if ($errors->hasBag('addPostError'))

                                                <p class="text-danger">


                                                    {{ $errors->addPostError->first('email')}}
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






<script src="{{asset('js/app.js')}}"></script>

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
                url: `{{url('areas/')}}/${city}`,
                success: function(res) {

                    $("#location").html(function() {
                        $allOption = "";
                        for ($i = 0; $i < res.length; $i++) {
                            $allOption += "<option value='" + res[$i].id + "'> " + res[$i].area + " </option>";

                        }
                        // console.log();
                        return $allOption;
                    });




                }



            });

        }

        getAreaFromCity();

        $(".select22").select2();

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

    $('#set_lenght_title').on('keydown', function() {
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



    Echo.private('user.{{ Auth::id() }}')
        .listen('inboxMessageEvent', (e) => {
            console.log(e);

        });
</script>







@endsection