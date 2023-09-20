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


            <form method="POST" class="form-group" action="/category/edit/{{$property->id}}">

                @csrf

                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">

                        <div class="col-12">

                            <div class="page-title-box d-flex align-items-center justify-content-between">

                                <h4 class="mb-0 font-size-18">Edit Property Category </h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Syed Zameen</a></li>
                                        <li class="breadcrumb-item active">Edit Category</li>
                                    </ol>

                                </div>

                            </div>
                        </div>

                        <div class="col-12 ">

                            <div class="card-body" style="margin-left: 50px; margin-right: 50px;">


                                <div class="row">

                                    <div class="col-sm-6 col-md-12 ">
                                        <div class="form-group">

                                            <h5 class="mt-2 mb-2">Purpose</h5>
                                            <input class="form-control" placeholder="" id="" name="purpose"
                                                value="{{$property->purpose}}" type="text"><br>

                                            <h5 class="mt-2 mb-2">Property Type</h5>
                                            <input class="form-control" placeholder="" id="" name="property_type"
                                                value="{{$property->property_type}}" type="text"><br>

                                            <h5 class="mt-2 mb-2">Property Sub Type</h5>
                                            <input class="form-control" placeholder="" id="" name="property_sub_type"
                                                value="{{$property->property_sub_type}}" type="text"><br>


                                            <button class="btn btn-light w-100 shadow-sm bg-gradient" type="submit"
                                                style="background-color: #ff7f00;height: 60px;">Update Property
                                                Category</button>


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

    </div>