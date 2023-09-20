@extends('adminPanel.layout')




@section('header')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


<style type="text/css">
    label+label {
        margin-left: 20px;
    }
</style>
@endsection

@section('body')



<div class="container">
    <div class="main-content">

        <div class="page-content">


            <form method="POST" class="form-group" action="{{url('dealerAddSociety')}}" enctype="multipart/form-data">



                @csrf

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

                        <!--*******************
nav 1 start
*********************-->
                        <div class="conainer">

                            @if(session('msg'))
                            <div class="alert alert-success">{{session('msg')}}</div>
                            @endif



                                    <div class="container">
                                        <div class="row">
                                            <nav aria-label="breadcrumb">

                                                <ol class="breadcrumb rounded p-3 mt-4" style="background-color: #fd9834;">

                                                    <li class="breadcrumb-item active text-light" aria-current="page">
                                                        PROPERTY TITLE AND PlOT SIZE</li>

                                                </ol>

                                            </nav>


                                            <div class="col-12">



                                                <div class="card-body" style="margin-left: 50px; margin-right: 50px;">

                                                    <div class="col-sm-6 col-md-12">

                                                        <div class="float-right form-group ">

                                                            <h5 class="mt-2 mb-2">Title:</h5>

                                                            <input class="form-control" value="" name="title" type="text" id="set_lenght_title" required>
                                                              @error('title')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                             @enderror
                                                            <span id="title_info"></span>
                                                            <h5 class="mt-2 mb-2">Plot Size:</h5>

                                                            <input class="form-control" name="plot_size" value="" id="" rows="4">
                                                            {{-- <textarea class="form-control" name="description" value="{{ old('description', isset($posts) ? $posts->description : '') }}" id="" rows="4"></textarea> --}}
                                                                <span id="title_info"></span>
                                                        <h5 class="mt-2 mb-2">Image:</h5>
                                                        <input  type="file" name="image" accept="image/*"  id="inputImage">
                                                              @error('image')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                             @enderror
                                                        </div>

                                                    </div>

                                                </div>



                                            </div>
                                            <div class="container">

                                                <div class="row">
    
                                                    <div class="col-12 mb-4">
    
                                                        <div class="mx-auto" style="width: 200px">
    
                                                            <button class="btn btn-light w-100 shadow-sm bg-gradient" type="submit" style="background-color: #ff7f00;height: 60px;">Submit
                                                                </button>
    
    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

            </form>
        </div>

        @endsection