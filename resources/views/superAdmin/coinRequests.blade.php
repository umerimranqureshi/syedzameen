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
                    @isset($approvedCoins)
                    <a href="{{route('allCoinRequest')}}">
                        <button class="btn m-2" style="background-color: rgba(255, 60, 0, 0.938);color:white">click to see coin request</button>
                    </a>
                    @endisset

                    @isset($coinReq)
                    <a href="{{route('approvedCoinRequest')}}">
                        <button class="btn btn-success m-2">click to see approved coins</button>
                    </a>
                    @endisset

                </div>

                <div class="row">

                    <div class="col-12">


                        <div class="card">

                            <div class="card-body">
                                {{-- request that are not allows --}}
                                @isset($coinReq)
                                <table id="basic-datatable" class="table dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Request U/name</th>
                                            <th>Coins</th>
                                            <th>Date</th>
                                            <th>Allow Coins</th>
                                            <th>rupees</th>
                                            <th>coins rate</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                                @foreach ($coinReq as $key=> $req)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$req->user->name}}</td>
                                                        <td>{{$req->coins}}</td>
                                                        <td>{{$req->created_at->format('d/m/y')}}</td>
                                                        <td>
                                                            <a href="{{route('approveCoin',['user'=>$req->user_id,'coins'=>$req->coins,'id'=>$req->id])}}">
                                                                <i  style="font-size: 25px;color:red" class="mdi mdi-checkbox-marked-circle-outline"></i>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            {{$req->rupees}}
                                                        </td>
                                                        <td>
                                                            {{$req->freshe->coin_rates}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                    </tbody>
                                </table>
                                @endisset

                                {{-- request that are allowed --}}
                                @isset($approvedCoins)
                                <table id="basic-datatable" class="table dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Request U/name</th>
                                            <th>Coins</th>
                                            <th>Date</th>
                                            <th>Allow Coins</th>
                                            <th>rupees</th>
                                            <th>coins rate</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                                @foreach ($approvedCoins as $key=> $allowed)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$allowed->user->name}}</td>
                                                        <td>{{$allowed->coins}}</td>
                                                        <td>{{$allowed->created_at->format('d/m/y')}}</td>
                                                        <td>

                                                                <i  style="font-size: 25px;color:green" class="mdi mdi-check-circle"></i>

                                                        </td>
                                                        <td>
                                                            {{$allowed->rupees}}
                                                        </td>
                                                        <td>
                                                            {{$allowed->freshe->coin_rates}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                    </tbody>
                                </table>
                                @endisset
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
