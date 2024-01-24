<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<form id="home-page-main-search-form" method="GET" action="{{ route('property.search') }}" >
    <div class="row">
        <div class="col-12 text-center">
            <h3 style="color: #fff">Search properties for sale in Pakistan</h3>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-0"></div>
        <div class="form-group pt-15  col-lg-6 col-md-6 col-sm-12 ">
            <div class="btn-group btn-group-toggle position-relative propBtns" data-toggle="buttons"
                style="gap: 15px; width:100%;">
                <label id="sale" class="searchable btn btn-secondary" style="width: 100%; margin: 0px;">
                    <input type="radio" name="purpose" class="property_type margin hg" value="sale" required checked /><span
                        id="sale_span" style="position: relative; top:-3px;"> Sale</span>
                </label>
                <label id="rent" class="searchable btn btn-secondary" style="width: 100%; margin: 0px;">
                    <input type="radio" name="purpose" class="property_type" value="rent" /><span id="rent_span"
                        style="position: relative; top:-3px;">Rent</span>
                </label>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-0"></div>

    </div>
    <div class="bg-black adbanced-form-two amenities-list border-top-1-gray" style="border: 0px;">
        <input name="search" value="search" type="hidden">
        @if ($errors->hasBag('addPostError'))
            <p class="text-danger">
                {{ $errors->addPostError->first('purpose') }}
            </p>
        @endif
        
        <div class="row">
        
            <div class="form-group pt-15 col-lg-4 col-md-6 col-sm-12 ">
                <div class="select-wrapper position-relative">
                    <i class="fa fa-search position-absolute" style="    z-index: 9999999;
                    right: 10px;
                    top: 32%;"></i>

                    <select id="city" name="city" class="select form-control select2">
                        <option value="" hidden selected disabled>--City--</option>
                        @foreach ($cities as $citi)
                            <option value="{{ $citi->city }}">{{ $citi->city }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- {{dd($location)}} --}}

            <div class="form-group pt-15  col-lg-4 col-md-6 col-sm-12 ">
                <div class="select-wrapper position-relative">
                    <i class="fa fa-search position-absolute" style="    z-index: 9999999;
                    right: 10px;
                    top: 32%;"></i>
                    <select id="location" name="city_area" class="select form-control select2 ">
                        <option value="" hidden selected disabled>--Location--</option>
                        @foreach ($location as $locations)
                            <option value="{{ $locations->area }}">{{ $locations->area }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="form-group col-lg-3 col-md-6 col-sm-12">
                <button class="p-5  search" style="margin-top: 13px; width:100%; color:white;"
                    type="submit">Search</button>
            </div>
            <div class="form-group pt-15  col-lg-1 col-md-6 col-sm-12 ">
                {{-- <a class="btn" style="border: 1px solid; background:lightgreen; " data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    more
                </a> --}}
                <a class="btn select-wrapper position-relative h-100 " type="button" data-toggle="collapse"  data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="background-color: #fff; border-radius:10px; padding:20px;"></a>
            </div>
        </div>
        <div class="collapse" id="collapseExample">
            <div class="row ">
                <div class="form-group pt-15   col-lg-4 col-md-6 col-sm-12">
                    <div class="select-wrapper position-relative">
                        @php
                            if (isset($old_property_sub_type)) {
                                $OPT = $old_property_sub_type;
                            }
                        @endphp
        
                        <select name="sub_type" value="sub_type" id="mySelect" class="select form-control "
                            onchange="mainInfox();">
        
                            <option value="not_commercial">Commercial</option>
        
                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset
                                value="commercial_plot" name="sub_type">Commercial plot</option>
        
                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset
                                value="commercial_plot_file" name="sub_type">Commercial plot file</option>
                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset
                                value="office" name="sub_type">Office</option>
                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset
                                value="shop" name="sub_type">Shop</option>
                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset
                                value="warehouse" name="sub_type">Warehouse</option>
                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset
                                value="factory" name="sub_type">Factory</option>
                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset
                                value="agriculture_land" name="sub_type">Agriculture land</option>
                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset
                                value="industrial_land" name="sub_type">Industrial land</option>
                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset
                                value="farmhouse_plot" name="sub_type">Farmhouse plot</option>
                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset
                                value="gym" name="sub_type">Gym</option>
                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset
                                value="plaza" name="sub_type">Plaza</option>
                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset
                                value="land" name="sub_type">Land</option>
                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset
                                value="hall" name="sub_type">Hall</option>
                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset
                                value="farmhouse_plot" name="sub_type">Farmhouse plot</option>
        
                            <option @isset($OPT) {$OPT=="sub_type" ?"selected":''} @endisset
                                value="building" name="sub_type">Building</option>
        
                        </select>
                    </div>
                </div>
                <div class="form-group pt-15  col-lg-4 col-md-6 col-sm-12">
                    <div class="select-wrapper position-relative">
        
                        @php
        
                            if (isset($old_property_sub_type)) {
                                $OPT = $old_property_sub_type;
                            }
                        @endphp
        
                        <select name="sub_typee" value="sub_typee" id="Select" class="select form-control "
                            onchange="mainInfo();">
        
                            <option value="not_residential">Residential</option>
        
                            <option @isset($OPT) {$OPT=="sub_typee" ?"selected":''} @endisset
                                value="home" name="sub_typee">Home</option>
        
                            <option @isset($OPT) {$OPT=="sub_typee" ?"selected":''} @endisset
                                value="guest_house" name="sub_typee">Guest house</option>
                            <option @isset($OPT) {$OPT=="sub_typee" ?"selected":''} @endisset
                                value="appartment" name="sub_typee">Appartment</option>
        
                            <option @isset($OPT) {$OPT=="sub_typee" ?"selected":''} @endisset
                                value="farm_house" name="sub_typee">Farm house</option>
                            <option @isset($OPT) {$OPT=="sub_typee" ?"selected":''} @endisset
                                value="penthouse" name="sub_typee">Penthouse</option>
        
                            <option @isset($OPT) {$OPT=="sub_typee" ?"selected":''} @endisset
                                value="hotel_suite" name="sub_typee">Hotel suite</option>
                            <option @isset($OPT) {$OPT=="sub_typee" ?"selected":''} @endisset
                                value="basement" name="sub_typee">Basement</option>
        
                            <option @isset($OPT) {$OPT=="sub_typee" ?"selected":''} @endisset
                                value="hostel" name="sub_typee">Hostel</option>
                            <option @isset($OPT) {$OPT=="sub_typee" ?"selected":''} @endisset
                                value="flat" name="sub_typee">Flat</option>
        
                            <option @isset($OPT) {$OPT=="sub_typee" ?"selected":''} @endisset
                                value="upper_portion" name="sub_typee">Upper portion</option>
                            <option @isset($OPT) {$OPT=="sub_typee" ?"selected":''} @endisset
                                value="lower_portion">Lower portion</option>
        
                            <option @isset($OPT) {$OPT=="sub_typee" ?"selected":''} @endisset
                                value="residential_plot" name="sub_typee">Residential plot</option>
                            <option @isset($OPT) {$OPT=="sub_typee" ?"selected":''} @endisset
                                value="residential_plot_file" name="sub_typee">Residential plot file</option>
        
                        </select>
                    </div>
        
                </div>
                <div class="form-group pt-15  col-lg-4 col-md-6 col-sm-12 ">
                    <div class="select-wrapper position-relative">
                        <select name="beds" class="select form-control has-val">
                            <option @isset($old_beds) {{ $old_beds == 'null' ? 'selected' : '' }}@endisset
                                value="null">
                                Beds</option>
                            <option @isset($old_beds){{ $old_beds == '1' ? 'selected' : '' }}@endisset
                                value="1">One
                            </option>
                            <option @isset($old_beds) {{ $old_beds == '2' ? 'selected' : '' }}@endisset
                                value="2">Two
                            </option>
                            <option @isset($old_beds){{ $old_beds == '3' ? 'selected' : '' }}@endisset
                                value="3">Three
                            </option>
                            <option @isset($old_beds){{ $old_beds == '4' ? 'selected' : '' }}@endisset
                                value="4">Four
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group mb-0 pb-15 col-lg-6 col-md-12 col-12">
                    <div class="price_range">
                        <div class="price-filter">
                            <span><input id="filter_sqft" type="text" name="area"
                                    value="{{ $old_area ?? '0;1000' }}" />
                                <input type="" class="select form-control has-val" placehoder="0 to Any"
                                    style="display: none">
                                <div class="d-flex">
                                    <div class="w-50"><input type="number" name="min_area" min="0" max="9999"
                                            pattern="\d{4}" maxlength="4" placeholder=""
                                            class="select form-control has-val" style="position: relative"></div>
                                    <div class="w-50"><input type="number" name="max_area" min="0" max="9999"
                                            pattern="\d{4}" maxlength="4" placeholder=""
                                            class="select form-control has-val" style="position: relative"></div>
                                </div>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-0 pb-15 col-lg-6 col-md-12 col-12">
                    <div class="price_range">
                        <div class="price-filter">
                            <span class="price-slider">
                                <input class="filter_price" type="text" name="price"
                                    value="{{ $old_price ?? '0;90000000' }}" />
                                <input type="" class="select form-control has-val" placehoder=""
                                    style="display: none">
                                <div class="d-flex">
                                    <div class="w-50"><input type="number" min="0" name="min_price"
                                            max="10000000" pattern="\d{8}" maxlength="4" placeholder=""
                                            class="select form-control has-val" style="position: relative"></div>
                                    <div class="w-50"><input type="number" min="0" name="max_price"
                                            max="10000000" pattern="\d{8}" maxlength="4" placeholder=""
                                            class="select form-control has-val" style="position: relative"></div>
                                </div>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

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
            url: `{{ url('areas') }}/${city}`,
            success: function(res) {
                //console.log(res);
                $("#location").html(function() {
                    $allOption = "<option value="" hidden selected disabled>--Location--</option>";
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
