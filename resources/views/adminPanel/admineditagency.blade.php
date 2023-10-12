@extends('adminPanel.layout')




@section('header')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>




@endsection

@section('body')



<div class="container">
    @if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
    @endif

    <div class="main-content">

        <div class="page-content">

            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">

                    <div class="col-12">

                        <div class="page-title-box d-flex align-items-center justify-content-between">

                            <h4 class="mb-0 font-size-18">Add Agency </h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Syed Zameen</a></li>
                                    <li class="breadcrumb-item active">Add Agency</li>
                                </ol>


                            </div>


                        </div>
                    </div>
                    @if(session('msg'))
                    <div class="alert alert-success">{{session('msg')}}</div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" class="form-group" action="/admin/edit/agency/{{$agency->id}}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-12 ">

                            <div class="card-body" style="margin-left: 50px; margin-right: 50px;">


                                <div class="row">

                                    <div class="col-sm-6 col-md-12 ">
                                        <div class="form-group">

                                            <h5 class="mt-2 mb-2">name</h5>
                                            <input class="form-control" placeholder="" id=""   value="{{$agency->name}}" name="name"
                                                type="text"><br>
                                            @if ($errors->hasBag('addPostError'))

                                            <p class="text-danger">


                                                {{ $errors->addPostError->first('purpose')}}
                                            </p>

                                            @endif

                                            <h5 class="mt-2 mb-2">Url </h5>
                                            <input class="form-control" placeholder="" id=""  value="{{$agency->url}}"  name="url" type="text"><br>

                                            <h5 class="mt-2 mb-2">logo</h5>
                                            <input type="file" class="form-control" placeholder="" id="" name="image"
                                                type="text"><br>
                                                <img width="200" height="100" src="{{asset('image/'. $agency->image)}}" ><br>


                                            <br><button class="btn btn-light w-100 shadow-sm bg-gradient" type="submit"
                                                style="background-color: #ff7f00;height: 60px;">Update Agency
                                            </button>


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!---container fluid ending--->


    </div>