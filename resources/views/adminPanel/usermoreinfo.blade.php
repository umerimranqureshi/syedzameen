@extends('adminPanel.layout')





@section('body')



<div class="main-content">

    <div class="page-content">

        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Make sure to varify your phone number for post ads</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Syed Zameen</a></li>
                                <li class="breadcrumb-item active">Become a seller</li>
                            </ol>
                        </div>

                    </div>
                </div>


                <div class="container">
                    <div class="row">


                        <div class="col-12 ">

                            <div style="" class="card">

                                <div class="card-body">



                                    <div class="row">

                                        <div class="col-sm-6 col-md-4">

                                            {{-- <form action="{{route('profilePhotoUpload')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="container mx-auto my-auto ">
                                                    <div class="picture-container">
                                                        <div class="picture">

                                                            <img src="{{(auth()->user()->img_path) ? asset(auth()->user()->img_path) : ''}}"
                                                             class="picture-src" id="wizardPicturePreview" title="">


                                                            <input type="file" id="wizard-picture" class="" name="image">
                                                        </div>
                                                         <h6 class="">Choose Picture</h6>

                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <button class="btn btn-light w-20 " type="submit">upload</button>
                                                    </div>
                                                </div>

                                               </form> --}}

                                            <form method="POST" class="form-group" action="{{route('submitMoreInfo')}}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-sm-6 col-md-12">

                                                    <div class="form-group">

                                                        <h5 class="mt-2 mb-2">Address</h5>
                                                        <input class="form-control" name="address" type="text"
                                                        id="address" placeholder="your current address">



                                                        <span class="  bg-warning text-dark " id="error-address"></span>
                                                           @error('address')
                                                         <div class="alert alert-danger">{{ $message }}</div>
                                                             @enderror

                                                        <h5 class="mt-2 mb-2">CNIC</h5>
                                                        <input class="form-control" name="cnic" type="text"
                                                        id="cnic"
                                                        placeholder="12345-1234567-1"

                                                    >
                                                        <span class="  bg-warning text-dark" id="error-cnic"></span>
                                                        @error('cnic')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror 









                                                    </div>

                                                </div>



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


<SCRIPT language=Javascript>

    $('#address').on('input',function () {

                   var input=$(this);
               var is_name=input.val();
                var pattern = /^[a-zA-Z0-9,.!? ]*$/;
               if(pattern.test(is_name)){
                   $('#error-address').text('');
               }else{
                   $('#error-address').text('address must be valid');
               }
     });
     $('#cnic').on('input',function () {

                   var input=$(this);
               var is_name=input.val();
                var pattern = /^[0-9+]{5}-[0-9+]{7}-[0-9]{1}$/;
               if(pattern.test(is_name)){
                   $('#error-cnic').text('');
               }else{
                   $('#error-cnic').text('CNIC must be valid');
               }
     });


</SCRIPT>








@endsection