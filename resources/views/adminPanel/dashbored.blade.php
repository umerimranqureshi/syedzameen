@extends('adminPanel.layout')



@section('body')
 

<div class="main-content">
    <div class="page-content bg-light">
        <div class="container-fluid">

            <h5 class="card-title" style="font-size: 20px;">Dashboard</h5>
            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4">
                                <span class="badge bg-primary" style="margin-left:82%">All time</span>
                                <h5 class="card-title mb-0">All Post</h5>
                            </div>
                            <div class="row d-flex align-items-center mb-4">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                              @if(Auth::check())
                                              @if(Auth::user()->role==3 || Auth::user()->role==2) 
                                        30 of {{(!empty($post))?$post->count():'no post yet' }} 
                                        @else
                                          {{(!empty($post))?$post->count():'no post yet' }}
                                        @endif
                                        @endif
                                    </h2>
                                </div>
                                <div class="col-4 text-right">
                                    {{-- <span class="text-muted">12.5% <i
                                            class="mdi mdi-arrow-up text-success"></i></span> --}}
                                </div>
                            </div>

                            <div class="progress shadow-sm" style="height: 5px;">
                                <div class="progress-bar bg-success" role="progressbar"
                                    style="width:  {{(!empty($post))?$post->count():'' }}%;">
                                </div>
                            </div>
                        </div>
                        <!--end card body-->
                    </div><!-- end card-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4">
                                <span class="badge bg-primary" style="margin-left:82%">All time</span>
                                <h5 class="card-title mb-0">Daily Visits</h5>
                                <h2 class="d-flex align-items-center mb-0">
                                {{!empty($postViews)?$postViews->count():''}}
                                     </h2>
                            </div>
                            <div class="row d-flex align-items-center mb-4">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                     
                                    </h2>
                                </div>
                                <div class="col-4 text-right">
                                    {{-- <span class="text-muted">18.71% <i
                                            class="mdi mdi-arrow-down text-danger"></i></span> --}}
                                </div>
                            </div>

                            <div class="progress shadow-sm" style="height: 5px;">
                                <div class="progress-bar bg-danger" role="progressbar"
                                    style="width: {{!empty($postViews)?$postViews->count():''}}%;">
                                </div>
                            </div>
                        </div>
                        <!--end card body-->
                    </div><!-- end card-->
                </div> <!-- end col-->


                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4">
                                <span class="badge bg-primary" style="margin-left:82%">All time</span>
                                <h5 class="card-title mb-0">Sold Post</h5>
                            </div>
                            <div class="row d-flex align-items-center mb-4">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        {{$soldPost->count()}} of {{$post->count()}}
                                    </h2>
                                </div>
                                <div class="col-4 text-right">

                                </div>
                            </div>

                            <div class="progress shadow-sm" style="height: 5px;">
                                <div class="progress-bar bg-warning" role="progressbar"
                                    style="width:  {{$soldPost->count()}}%;">
                                </div>
                            </div>
                        </div>

                    </div>

                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4">
                                <span class="badge bg-primary" style="margin-left:82%">Account</span>
                                <h5 class="card-title mb-0">Your Coins</h5>
                            </div>
                            <div class="row d-flex align-items-center mb-4">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        <i class="mdi mdi-coin " style="color: rgb(255, 174, 0)"></i>
                                          @if(Auth::check())
                                              @if(Auth::user()->role==3 || Auth::user()->role==2) 
                                        {{Auth::user()->Account->coins ?? ""}} 500
                                        @endif
                                        @endif
                                    </h2>
                                </div>
                                <div class="col-4 text-right">

                                </div>
                            </div>

                            <div class="progress shadow-sm" style="height: 5px;">
                                {{-- <div class="progress-bar bg-info" role="progressbar" style="width: 57%;"></div> --}}
                            </div>
                        </div>
                        <!--end card body-->
                    </div><!-- end card-->
                </div> <!-- end col-->
            </div>
            <div class="row">
                <div class="col">

                    <div class="card mt-3">
                        <div class="card-body">
                            <h4 class="card-title">Favourites</h4>
                            <p class="card-subtitle mb-3 text-secondary fw-bolder">Recent Data</p>

                            <div class="text-center">
                                <div><i style="font-size: 100px;color:#7a08c2" class="mdi mdi-heart"></i></div>
                                <h5 class="text-muted mt-3"></h5>


                                <p class="text-muted w-75 mx-auto sp-line-2">See how many likes your post have or how
                                    many you like..

                                </p>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <p class="text-muted font-15 mb-1 text-truncate">my favorite</p>
                                        <h4><i class="fas fa-arrow-up text-success mr-1"></i>
                                            {{$favPost->count()}}
                                        </h4>

                                    </div>
                                    <div class="col-6">
                                        <p class="text-muted font-15 mb-1 text-truncate">Likes</p>
                                        <h4><i class="fas fa-arrow-up text-success mr-1"></i>{{$likes->count()}}</h4>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col">
                    <div class="">
                        <div class="row">
                            <!--hot -->
                            <div class="col">
                                <div class="card mt-3">
                                    <div class="card-body" style="height: 375px;">
                                        <div class="card-title" style="font-weight: bold">
                                            Hot Post
                                        </div>

                                        <div class="text-center">
                                            <div><i style="font-size: 100px;color:rgb(255, 0, 234)"
                                                    class="mdi mdi-fire"></i></div>
                                            <h5 class="text-muted mt-3"></h5>


                                            <p class="text-muted w-75 mx-auto sp-line-2">See how many likes your post
                                                have or how many you like..

                                            </p>

                                            <div class="row mt-3">
                                                <div class="col-6">
                                                    <p class="text-muted font-15 mb-1 text-truncate">Hot Post</p>
                                                    <h4><i class="fas fa-arrow-up text-success mr-1"></i>
                                                        {{$hotPost->count()}}
                                                    </h4>

                                                </div>
                                                <div class="col-6">
                                                    <p class="text-muted font-15 mb-1 text-truncate">Sold</p>
                                                    <h4><i
                                                            class="fas fa-arrow-up text-success mr-1"></i>{{$soldHot->count()}}
                                                    </h4>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--superhot-->
                            <div class="col">

                                <div class="card mt-3">
                                    <div class="card-body"  style="height: 375px">
                                        <div class="card-title" style="font-weight: bold">
                                            Super hot
                                        </div>
                                        <div class="text-center">
                                            <div><i style="font-size: 100px;color:red" class="mdi mdi-fire"></i></div>
                                            <h5 class="text-muted mt-3"></h5>


                                            <p class="text-muted w-75 mx-auto sp-line-2">See how many likes your post
                                                have or how many you like..

                                            </p>

                                            <div class="row mt-3">
                                                <div class="col-6">
                                                    <p class="text-muted font-15 mb-1 text-truncate">Super Hot</p>
                                                    <h4><i class="fas fa-arrow-up text-success mr-1"></i>
                                                        {{$superHot->count()}}
                                                    </h4>

                                                </div>
                                                <div class="col-6">
                                                    <p class="text-muted font-15 mb-1 text-truncate">Sold</p>
                                                    <h4><i
                                                            class="fas fa-arrow-down text-danger mr-1"></i>{{$soldSuperHot->count()}}
                                                    </h4>
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
            <!-- end row-->

<div class="row">
    <div class="col-lg-6 col-xl-6 mt-3 ">
        <div class="card" style="overflow:auto; white-space:nowrap;">
            <div class="card-body">

                <h4 class="card-title">Top 5 Posts</h4>
                <p class="card-subtitle mb-4 font-size-18">Your latest six posts listed here
                </p>

                <div class="table-responsive">
                    <table class="table table-centered table table-striped table-nowrap">
                        <thead>
                            <tr>
                                <th>Property Title</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Location</th>
                                <th>Create Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latestfivePost as $post)
                            <tr>
                                <td class="table-user">
                                    <img src="{{($post->postImagesOne)?asset($post->postImagesOne):asset('houseLog.jpg')}}" alt="table-user" class="mr-2 avatar-xs rounded-circle">
                                    <a href="javascript:void(0);" class="text-body font-weight-semibold">{{$post->property_title}}</a>
                                </td>
                                <td>
                                    {{$post->mobile_number}}
                                </td>
                                <td>
                                    {{$post->email}}
                                </td>
                                <td>
                                    {{$post->address}}
                                </td>
                                <td>
                                    {{$post->created_at->diffForHumans()}}
                                </td>
                            </tr>
                            @endforeach





                        </tbody>
                    </table>
                </div>

            </div>
            <!--end card body-->

        </div>
        <!--end card-->
    </div>



    <div class="col-lg-6 col-xl-6 mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Expiry</h4>
                <p class="card-subtitle mb-4">
                    All Boast Posts with their Expiry dates
                </p>

                <table id="basic-datatable" class="table dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>Property Title</th>
                            <th>boaster</th>
                            <th>Bosting date</th>
                            <th>Expiry</th>

                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($boasted as $post)
                            <tr>
                                <td class="table-user">
                                    <img src="{{($post->postImagesOne)?asset($post->postImagesOne):asset('houseLog.jpg')}}" alt="table-user" class="mr-2 avatar-xs rounded-circle">
                                    <a href="javascript:void(0);" class="text-body font-weight-semibold">{{$post->property_title}}</a>
                                </td>
                                <td>
                                    {{$post->post_boaster}}
                                </td>
                                <td>
                                    {{$post->created_at->diffForHumans()}}
                                </td>
                                <td>
                                    <?php
                                        $dt = strtotime($post->updated_at);
                                        echo date("Y-m-d", strtotime("+1 month", $dt));
                                     ?>
                                </td>
                            </tr>
                            @endforeach

                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->


        </div>


    </div>


</div>





</div>



<script src={{ asset('assetsAdminPanel/plugins/datatables/jquery.dataTables.min.js') }}></script>
<script src={{ asset('assetsAdminPanel/plugins/datatables/dataTables.bootstrap4.js') }}></script>
<script src={{ asset('assetsAdminPanel/plugins/datatables/dataTables.responsive.min.js') }}></script>
<script src={{ asset('assetsAdminPanel/plugins/datatables/responsive.bootstrap4.min.js') }}></script>
<script src={{ asset('assetsAdminPanel/plugins/datatables/dataTables.buttons.min.js') }}></script>
<script src={{ asset('assetsAdminPanel/plugins/datatables/buttons.bootstrap4.min.js') }}></script>
<script src={{ asset('assetsAdminPanel/plugins/datatables/buttons.html5.min.js') }}></script>
<script src={{ asset('assetsAdminPanel/plugins/datatables/buttons.flash.min.js') }}></script>
<script src={{ asset('assetsAdminPanel/plugins/datatables/buttons.print.min.js') }}></script>
<script src={{ asset('assetsAdminPanel/plugins/datatables/dataTables.keyTable.min.js') }}></script>
<script src={{ asset('assetsAdminPanel/plugins/datatables/dataTables.select.min.js') }}></script>
<script src={{ asset('assetsAdminPanel/plugins/datatables/pdfmake.min.js') }}></script>
<script src={{ asset('assetsAdminPanel/plugins/datatables/vfs_fonts.js') }}></script>


<script>


$("#basic-datatable").DataTable({

    "lengthMenu": [[3], [3]]


});

    $("document").ready(function(){


                //console.log("{{session()->has('msg')}}");

                if("{{session()->has('msg')}}"){

                        $(".modal").modal("show");
                        $("#modal-body").text("{{session()->get('msg')}}");
                    }


                });




</script>


@endsection