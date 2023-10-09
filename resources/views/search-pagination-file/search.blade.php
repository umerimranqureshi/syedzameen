<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<form id="main-search-form" method="GET" action="{{route('property.search')}}" class="adbanced-form-two amenities-list border-top-1-gray" style="padding: 100px 10px;">
    <input name="search" value="search" type="hidden">
    @if ($errors->hasBag('addPostError'))
        <p class="text-danger">
            {{ $errors->addPostError->first('purpose')}}
        </p>
    @endif
    <div class="row bg-light">
        <div class="form-group col-lg-3 col-md-12 col-12 pt-15">
            <div class="select-wrapper position-relative">
                <select id="city" name="city" class="select form-control select2">
                    @foreach ($cities as $citi)
                    <option value="{{$citi->city}}">{{$citi->city}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group col-lg-3 col-md-12 col-12 pt-15">
            <div class="select-wrapper position-relative">
               <select id="location" name="area" class="select form-control select2 ">
                    {{-- <option value="null">Select Location</option> --}}
                    @foreach ($location as $locations)
                        <option value="{{$locations->area}}">{{$locations->area}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group col-lg-2 col-md-12 col-12 pt-15">
            <div class="btn-group btn-group-toggle position-relative propBtns" data-toggle="buttons" style="gap: 15px; width:100%;">
                <label id="sale" class="btn btn-secondary" onclick="changecolor(id)" style="width: 100%; margin: 0px;">
                <input type="radio" name="purpose" class="property_type margin hg" value="sale" required /><span id="sale_span" style="position: relative"> Sale</span>
                </label>
                <label id="rent" class="btn btn-secondary" onclick="changecolor(id)"  style="width: 100%; margin: 0px;">
                <input type="radio" name="purpose" class="property_type" value="rent" /><span id="rent_span" style="position: relative">Rent</span>
                </label>
            </div>
        </div>
        <div class="form-group col-lg-4 col-md-12 col-12 pt-15">
            <div class="d-flex">
                <div class="form-group  col-md-6 px-lg-1 col-sm-12  col-sm-11">
                    <div class="select-wrapper position-relative">
                        @php
                            if(isset($old_property_sub_type)){
                            $OPT=$old_property_sub_type;
                            }
                        @endphp

                        <select name="sub_type" value="sub_type" id="mySelect" class="select form-control " onchange="mainInfox();">

                            <option value="not_commercial">Commercial</option>

                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset value="commercial_plot" name="sub_type">Commercial plot</option>

                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset value="commercial_plot_file" name="sub_type">Commercial plot file</option>
                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset value="office" name="sub_type">Office</option>
                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset value="shop" name="sub_type">Shop</option>
                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset value="warehouse" name="sub_type">Warehouse</option>
                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset value="factory" name="sub_type">Factory</option>
                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset value="agriculture_land" name="sub_type">Agriculture land</option>
                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset value="industrial_land" name="sub_type">Industrial land</option>
                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset value="farmhouse_plot" name="sub_type">Farmhouse plot</option>
                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset value="gym" name="sub_type">Gym</option>
                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset value="plaza" name="sub_type">Plaza</option>
                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset value="land" name="sub_type">Land</option>
                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset value="hall" name="sub_type">Hall</option>
                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset value="farmhouse_plot" name="sub_type">Farmhouse plot</option>

                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset value="building" name="sub_type">Building</option>

                        </select>                  
                    </div>
                </div>
                <div class="form-group  col-md-6 px-lg-1  col-sm-12  col-sm-11">
                    <div class="select-wrapper position-relative">

                        @php

                        if(isset($old_property_sub_type)){
                        $OPT=$old_property_sub_type;
                        }
                        @endphp

                        <select name="sub_typee" value="sub_typee" id="Select" class="select form-control " onchange="mainInfo();">

                            <option value="not_residential">Residential</option>

                            <option @isset($OPT) {$OPT=="sub_typee" ?"selected":''} @endisset value="home" name="sub_typee">Home</option>

                            <option @isset($OPT) {$OPT=="sub_typee" ?"selected":''} @endisset value="guest_house" name="sub_typee">Guest house</option>
                            <option @isset($OPT) {$OPT=="sub_typee" ?"selected":''} @endisset value="appartment" name="sub_typee">Appartment</option>

                            <option @isset($OPT) {$OPT=="sub_typee" ?"selected":''} @endisset value="farm_house" name="sub_typee">Farm house</option>
                            <option @isset($OPT) {$OPT=="sub_typee" ?"selected":''} @endisset value="penthouse" name="sub_typee">Penthouse</option>

                            <option @isset($OPT) {$OPT=="sub_typee" ?"selected":''} @endisset value="hotel_suite" name="sub_typee">Hotel suite</option>
                            <option @isset($OPT) {$OPT=="sub_typee" ?"selected":''} @endisset value="basement" name="sub_typee">Basement</option>

                            <option @isset($OPT) {$OPT=="sub_typee" ?"selected":''} @endisset value="hostel" name="sub_typee">Hostel</option>
                            <option @isset($OPT) {$OPT=="sub_typee" ?"selected":''} @endisset value="flat" name="sub_typee">Flat</option>

                            <option @isset($OPT) {$OPT=="sub_typee" ?"selected":''} @endisset value="upper_portion" name="sub_typee">Upper portion</option>
                            <option @isset($OPT) {$OPT=="sub_typee" ?"selected":''} @endisset value="lower_portion">Lower portion</option>

                            <option @isset($OPT) {$OPT=="sub_typee" ?"selected":''} @endisset value="residential_plot" name="sub_typee">Residential plot</option>
                            <option @isset($OPT) {$OPT=="sub_typee" ?"selected":''} @endisset value="residential_plot_file" name="sub_typee">Residential plot file</option>

                        </select>                    
                    </div>

                </div>
            </div>

        </div>


        <div class="form-group col-lg-3 col-md-12 col-12 pt-15">
            <div class="select-wrapper position-relative">
                <select name="beds" class="select form-control has-val">
                    <option @isset($old_beds) {{$old_beds=="null"?"selected":''}}@endisset value="null">
                        Beds</option>
                    <option @isset($old_beds){{$old_beds=="1"?"selected":''}}@endisset value="1">One
                    </option>
                    <option @isset($old_beds) {{$old_beds=="2"?"selected":''}}@endisset value="2">Two
                    </option>
                    <option @isset($old_beds){{$old_beds=="3"?"selected":''}}@endisset value="3">Three
                    </option>
                    <option @isset($old_beds){{$old_beds=="4"?"selected":''}}@endisset value="4">Four
                    </option>
                </select>
            </div>
        </div>

        <div class="form-group mb-0 pb-15 col-lg-3 col-md-12 col-12">
            <div class="price_range">
                <div class="price-filter">
                    <span><input id="filter_sqft" type="text" name="area" value="{{$old_area ?? "0;1000"}}" />
                        <input type="" class="select form-control has-val" placehoder="0 to Any" style="display: none">
                        <input type="text" name="area" min="0" max="9999" pattern="\d{4}" maxlength="4" placeholder="" class="select form-control has-val" style="position: relative">
                    </span>

                </div>
            </div>
        </div>


        <div class="form-group mb-0 pb-15 col-lg-3 col-md-12 col-12">
            <div class="price_range">
                <div class="price-filter">
                    <span class="price-slider">
                        <input class="filter_price" type="text" name="price" value="{{$old_price ?? "0;90000000"}}" />
                        <input type="" class="select form-control has-val" placehoder="" style="display: none">
                        <input type="text" min="0" name="price" max="10000000" pattern="\d{8}" maxlength="4" placeholder="" class="select form-control has-val" style="position: relative">

                    </span>
                </div>
            </div>
        </div>

      <div class="form-group mb-0 pb-15 col-lg-3 col-md-12 col-12">

    <button class="p-5  search" style="margin-top: 13px;background-color: orange; width:100%;" type="submit">Search!</button>
</div>


    </div>
</form>

<script>
    function changecolor(id) {

        if (id == "sale") {
            document.getElementById("sale").style.border = "5px solid green";
            document.getElementById("sale_span").style.top = "-3px";
            document.getElementById("rent").style.border = "3px solid orange";
            document.getElementById("rent_span").style.top = "0";
        }
        if (id == "rent") {
            document.getElementById("rent").style.border = "5px solid green";
            document.getElementById("rent_span").style.top = "-3px";
            document.getElementById("sale").style.border = "3px solid orange";
            document.getElementById("sale_span").style.top = "0";
        }

    }
</script>

<script>
    function mainInfo() {
        document.getElementById("mySelect").value = "not_commercial"
    }

    function mainInfox() {
        document.getElementById("Select").value = "not_residential"
    }
</script>

<script>
    $('.select2').select2();
</script>
<script>
    $(document).ready(function() {

        $('.commercial').hide()
        $('.residential').hide()
        $('.property_type').click(function() {
            var inputValue = $(this).attr("value");
            var targetBox = $("." + inputValue);
            if (inputValue == "commercial") {

                $(".res").not(targetBox).hide();
                $(".com").not(targetBox).show();


                var xyz = document.getElementById("ress").style.fontSize = "12px";
                var xyz = document.getElementById("com").style.fontSize = "16px";
            } else {
                $(".res").not(targetBox).show();
                $(".com").not(targetBox).hide();
                var xyz = document.getElementById("ress").style.fontSize = "16px";
                var xyz = document.getElementById("com").style.fontSize = "12px";


            }

            $(targetBox).show();
        });
    });
</script>

<script>
    $("#city").change(function() {

        //console.log("s");

        $city = $("#city option:selected").val();

        getAreaFromCity($city);

    });

    function getAreaFromCity(city = "city") {
        $.ajax({
            url: `{{url('areas')}}/${city}`,
            success: function(res) {
                //console.log(res);
                $("#location").html(function() {
                    $allOption = "";
                    for ($i = 0; $i < res.length; $i++) {
                        $allOption += "<option value='" + res[$i].id + "'> " + res[$i].area +
                            " </option>";
                    }

                    return $allOption;
                });
            }

        });

    }
    getAreaFromCity();
</script>