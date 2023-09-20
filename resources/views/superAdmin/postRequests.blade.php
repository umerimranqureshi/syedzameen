@extends('adminPanel.layout')




@section('header')
    <link href="{{ asset('assetsAdminPanel/plugins/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assetsAdminPanel/plugins/datatables/responsive.bootstrap4.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assetsAdminPanel/plugins/datatables/buttons.bootstrap4.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assetsAdminPanel/plugins/datatables/select.bootstrap4.css') }}" rel="stylesheet"
        type="text/css" />

@endsection

@section('body')

    <div class="main-content">

        <div class="page-content">


            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Datatables</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                    <li class="breadcrumb-item active">Datatables</li>
                                </ol>
                            </div>
                            

                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- @isset($approvePost)
                    <a href="{{route('allPostReq')}}">
                        <button class="btn m-2" style="background-color: rgba(255, 60, 0, 0.938);color:white">click to see Post requests</button>
                    </a>
                    @endisset

                    @isset($postReq)
                    <a href="{{route('allApprovedPost')}}">
                        <button class="btn btn-success m-2">click to see approved Proterties</button>
                    </a>    
                    @endisset --}}
                    
                </div>

                <div class="row">

                    <div class="col-12">


                        <div class="card">

                            <div class="card-body">
                                {{-- request that are not allows --}}


                               


                                
                               @isset($postReq)
                               <table id="basic-datatable" class="table dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Request U/name</th>
                                        <th>Property Title</th>
                                        <th>Boast category <i class="mdi mdi-fire" style="color: rgba(255, 0, 106, 0.747)"></i></th>
                                        <th>Allow Boaster</th>
                                        <th>Date</th>
                                        <th>Coins deducted</th>
                                        <th>Payments</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($postReq as $key=>$req)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$req->user->name}}</td>
                                                <td>{{$req->post->property_title}}</td>
                                                <td>{{$req->boast_cat}}</td>
                                                <td style="text-align: center">
                                                    {{-- <a href="{{route('allowBoaster',
                                                    ['post_id'=>$req->post_id,
                                                    'boaster_id'=>$req->id,
                                                    'boaster_cat'=>$req->boast_cat,
                                                    'coins'=>$req->coins,
                                                    'rupees'=>$req->rupees,
                                                    'user_id'=>$req->user_id,
                                                    ]
                                                    )}}">
                                                        
                                                    </a> --}}
                                                    <i class="mdi mdi-check-circle-outline" 
                                                        style="font-size: 25px;color:rgba(46, 44, 44, 0.856)"></i>
                                                </td>
                                                <td>
                                                    {{$req->created_at->format('d/m/y')}}
                                                </td>
                                                <td>{{$req->coins}}</td>
                                                <td>{{$req->rupees}}</td>
                                            </tr>
                                    @endforeach
                                       
                                </tbody>
                            </table>
                               @endisset
                               
                                
                                {{-- request that are allowed --}}
                             
                            </div>
                        </div>
                    </div>
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




        });

    </script>





@endsection
