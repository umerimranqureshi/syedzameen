@extends('layout')

@section('header')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>

<script>
   
   window.onload = function() {

     var cvt = $('.convrt2 b').contents();
     debugger

    var sites = {!!json_encode($allRCP->toArray()) !!};
 
    var dtt= sites.data

            for (let index = 0; index < dtt.length; index++) {

                var val = Math.abs(dtt[index].price)

                if (val >= 10000000) {
                    val = (val / 10000000).toFixed(2) + ' Crore';
                } else if (val >= 100000) {
                    val = (val / 100000).toFixed(2) + ' Lakh';
                }
                debugger
                cvt[index].data = val;

            }

                }
    </script>


@endsection

@section('body')

<section>

    <div style="margin-top:-20%">

        @include('search-pagination-file.search')

    </div>

    @forelse($allRCP as $posts)
    @if($loop->iteration == 1)
    <div class="card" style="margin-top:-90px">
        @else
        <div class="card mt-4">
            @endif
            <div class="container">
                <div class="row g-0 ">
                    <div class="col-sm-5">


                        <a class="color-secondary mb-5" href="ad/{{ str_replace(' ', '-', $posts->property_title) }}/{{$posts->id}}">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

                                <img src="/mainimage/{{$posts->mainimage }}" alt="image" style="height:300px;width:450px">

                            </div>
                        </a>

                    </div>
                    <div class="col-sm-7">
                        <a class="color-secondary mb-5" href="ad/{{ str_replace(' ', '-', $posts->property_title) }}/{{$posts->id}}">

                            <div class="card-body p-2">

                                <span class="text-success convrt2"> <b>Price </b> </span>
                                <p class="card-text"><span class="font-weight-bold text-success">Property Title</span>
                                    {{$posts->property_title}}
                                </p>
                                <p class="card-text"><span class="font-weight-bold text-success">City</span>
                                    {{$posts->cityAndArea->city}}
                                </p>

                                 <p class="card-text"><span class="font-weight-bold text-success">location</span>
                                    {{$posts->cityAndArea->area}}
                                </p>
                                <p class="card-text"><span class="font-weight-bold text-success">location</span>
                                    {{$posts->manual_location}}
                                </p><br>
                                <p class="card-text">{{$posts->land_area}}<span class="font-weight-bold text-success"> Marla
                                    </span> {{$posts->bedrooms}}<span class="font-weight-bold text-success"> BedRooms
                                    </span>
                                    {{$posts->bathrooms}}<span class="font-weight-bold text-success"> Bathrooms
                                    </span>
                                </p>
                                <a class="card-text font-weight-bold">{{$posts->propertyCate->purpose}}</a>

                                <div>
                        </a>
                        <!-- Button trigger modal  for call 1-->

                        <button type="button" class="btn btn-success m-2" data-toggle="modal" data-target="#callModal1" data-id="{{$posts->id}}" onclick="callmodule(this.id, {{$posts}})" class="toggle-class">
                            Call
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="callModal1" tabindex="-1" aria-labelledby="callModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="callModalLabel1">Syed Zameen</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="card-text"><span class="font-weight-bold text-success"></span>

                                        </p> Contact Person Name
                                        <div id="person-name"></div>
                                        Mobile Number
                                        <div id="ph-num"></div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Button trigger modal  for email 1-->


                        <button type="button" class="btn btn-success m-2 " data-toggle="modal" data-target="#emailModal1" data-id="{{$posts->id}}" onclick='emailmodule(this.id, {{$posts}} )' class="toggle-class">
                            Email
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="emailModal1" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="emailModalLabel1">Syed Zameen</h5>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Contact Person Name
                                        <div id="email_person-name"></div>
                                        Email
                                        <div id="pr-ema"></div>


                                        <!-- The button used to copy the text -->


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    @empty

    <div class="container" style="  width: 500px; margin-left: 600px;">
        <h4> No Search Result Found</h4>
    </div>

    @endforelse
    <!--left card image end
             ---------------------------------->


    </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

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

                //$("#sub_type option[value='home']").prop("selected", true);

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
                //$("#sub_type option[value='shop']").prop("selected", true);

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

        $(".page-length").click(function() {

            console.log($(this).text());
            $("#main-search-form").append("<input  name='page'   value=" + $(this).text() +
                "  type='text'  >");

            $("#main-search-form").submit();

        });


        $("#pre-page").click(function() {

            $current_page = "{{$allRCP->currentPage()}}";
            $previous_page = $current_page - 1;
            console.log($current_page, $previous_page);
            $("#main-search-form").append("<input  name='page'   value=" + $previous_page +
                "  type='text'  >");

            $("#main-search-form").submit();

        });


        $("#next-page").click(function() {

            $current_page = "{{$allRCP->currentPage()}}";
            $current_page = parseInt($current_page);
            $next_page = $current_page + 1;
            console.log($current_page, $next_page);
            $("#main-search-form").append("<input  name='page'   value=" + $next_page + "  type='text'  >");

            $("#main-search-form").submit();

        });

        $(document).on('click', '.fav-heart', function(e) {
            e.preventDefault();


            var data = $(this).attr('href');

            var self = this;
            // Save the reference
            $.ajax({
                method: 'get',
                url: data,
                data: data,
                async: true,

                success: () => {
                    // console.log(data);
                    // $(self).data('disabled','disabled');


                    console.log("success");

                },
                complete: (data) => {
                    if (data.responseJSON.message == "remove") {
                        self.classList.remove("bg-danger");
                        console.log("class removes");
                    } else if ((data.responseJSON.message == "success")) {
                        self.classList.add("bg-danger");
                        console.log("class add");
                    } else {
                        console.log("no classs applied");
                    }


                }

            });

        });


        $("#subscribe-input").on("input", function() {
            // Print entered value in a div box

            if (!$(this).val()) {

                $('#subscribe-message').text('email required');
                $('#subscribe-message').css('color', 'red');

            } else {
                $('#subscribe-message').text('');
            }

        });


        $(document).on('click', '#btn-subscribe', function(e) {
            e.preventDefault();
            if ($('#subscribe-input').val() == '') {
                $('#subscribe-message').text('email required');
                $('#subscribe-message').css('color', 'red');
            } else {


                $('#subscribe-hide').hide();
                $('#subscribe-message').text('Thanks for subscribing us');
                $('#subscribe-message').addClass('color-primary');

            }
        });


    });
</script>

<script>
    function myFunction() {

        /* Get the text field */
        var copyText = document.getElementById("myInput");

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);

        /* Alert the copied text */
        alert("Copied the email: " + copyText.value);
    }
</script>



<script>
    $(function() {
        $('.toggle-class').change(function() {
            alert("shdhhd");
            var status = $(this).prop('checked') == true ? 1 : 0;
            var user_id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/changeStatus',
                data: {
                    'status': status,
                    'user_id': user_id
                },
                success: function(data) {
                    console.log(data.success)
                }
            });
        })
    })
</script>


<script>
    const callmodule = (id, {
        mobile_number,
        contact_person_name
    }) => {

        document.getElementById('person-name').innerHTML = '<b><p' + contact_person_name + '">' + contact_person_name + '</p></b>';
        document.getElementById('ph-num').innerHTML = '<a href="tel:' + mobile_number + '">' + mobile_number + '</a>';

    }

    const emailmodule = (id, {
        email,
        contact_person_name
    }) => {
        //  const emaill = ema.emai

        document.getElementById('email_person-name').innerHTML = '<b><p' + contact_person_name + '">' + contact_person_name + '</p></b>';

        document.getElementById('pr-ema').innerHTML = `<a href="mailto:'${email}'">${email}</a>`;

    }
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

@endsection