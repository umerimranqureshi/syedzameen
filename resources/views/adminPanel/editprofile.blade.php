@extends('adminPanel.layout')

@section('header')
    <style>
    .centered {
  position: absolute;
  top: 48%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 50px;

}

h4 {
border-bottom: 1px solid black;
padding-bottom: 5px;
color:blue;
}
    </style>
@endsection



@section('body')



<div class="main-content">

    <div class="page-content">

        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">

                        <h3 class="text-center text-success mb-2">{{Session::get('success')??''}}</h3>

                        <h4 class="mb-0 font-size-18" style="position:absolute; left:500px;">Edit Profile</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Syed Zameen</a></li>
                                <li class="breadcrumb-item active">Edit Profile</li>
                            </ol>
                        </div>

                    </div>
                </div>


                <div class="container" >


                    <div class="card-body">

                        <div class="row">

                            <div class=" offset-4 col-sm-6 col-md-4">
                                    
                                <form action="{{route('profilePhotoUpload')}}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="container mx-auto my-auto ">
                                        <div class="picture-container">
                                            <div class="picture">
                                                @if(auth()->user()->img_path)
                                                <img src="{{ asset(auth()->user()->img_path)}}"
                                                    class="picture-src" id="wizardPicturePreview" title="">
                                                @else
                                                <img src=""
                                                class="picture-src" id="wizardPicturePreview" title="">
                                                <div class="centered"><?php $name=Auth::user()->name;echo ucfirst($name[0]);?></div>
                                                @endif
                                                
                                                
                                                <input type="file" id="wizard-picture" class="" name="image"> 
                                                
                                            </div>
                                            @if (session('message'))
                                            <div class="alert alert-danger">
                                                {{ session('message') }}
                                            </div>
                                            @endif
                                            <h6 class="">Choose Picture</h6>

                                        </div>
                                        <div class="row justify-content-center">
            
                                            <button class="btn btn-light w-20 " type="submit">Save</button>
                                        </div>
                                    </div>

                                </form>

                                <form method="POST" class="form-group" action="{{route('editProfileSubmit')}}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-sm-6 col-md-12">

                                        <div class="form-group">

                                            <h5 class="mt-2 mb-2">Name</h5>
                                            <input class="form-control" name="new_user_name" type="text" id="new_name"
                                                value="{{$user->name}}">
                                            <span class="  bg-warning text-dark " id="error-name"></span>
                                            @error('new_user_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                            <h5 class="mt-2 mb-2">Email</h5>
                                            <input class="form-control" name="new_email" type="text" id="email"
                                                value="{{$user->email}}">
                                            <span class="  bg-warning text-dark" id="error-email"></span>
                                            @error('new_email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                                  
                                             @if($user->password==null)
                                             
                                             <h5 class="mt-2 mb-2">New Password</h5>
                                             <input class="form-control mt-3" id="new_password" name="new_password"
                                                type="password" placeholder="new password">
                                            <span class=" bg-warning text-dark" id="error-password"></span>


                                             
                                            @else

                                            @if(!Hash::check("@*!@#$@#!%^@-!@!+_@)#*$(!@@#!",Auth::user()->password))

                                            <h5 class="mt-2 mb-2">Passwords</h5>
                                            <input class="form-control" name="old_password" type="password"
                                                placeholder="old password">


                                            @endif

                                            @if (session('passNotMatch'))
                                            <div class="alert alert-danger">
                                                {{ session('passNotMatch') }}
                                            </div>
                                            @endif

                                            @error('old_password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                            <input class="form-control mt-3" id="new_password" name="new_password"
                                                type="password" placeholder="new password">
                                            <span class=" bg-warning text-dark" id="error-password"></span>

                                            @error('new_password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                            @endif


                                            <h5 class="mt-2 mb-2">Mobile number</h5>
                                            <input class="form-control" name="new_mobile_number" type="tel"
                                                value="{{$user->mobile_number}}" placeholder="" id="mobile_number">
                                            <span class=" bg-warning text-dark" id="error-mobile"></span>

                                            @if(session()->has('msg'))
                                            <div class="alert alert-danger">{{session()->get('msg')}}</div>
                                            @endif

                                            @error('new_mobile_number')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <button class="btn btn-light w-100" id="submit_button" type="submit">submit</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- </div>

                        </div> --}}


                    {{-- </div> --}}


                </div>
            </div>


        </div>
        <!-- end page title -->
    </div>


</div>


</div>

<!----------------------------new password modal------------------------------>
<div class="modal fade" id="newPasswordModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">



                <h5 class="modal-title">Enter your new password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="text-danger">{{Session::get('error')??''}}</h3>

                <form method="POST" class="form-group" action="{{route('newpassword')}}">
                   @csrf
                    <input class="form-control" name="password" placeholder="Password" type="text">


            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!----------------------------new password modal- end----------------------------->


<SCRIPT language=Javascript>
    $(document).ready(function(){

        @php  if(Session::has('newPassword') && Session::get('newPassword')==1){
        @endphp
        $('#newPasswordModal').modal();
        @php }
        @endphp

    });

    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;




        return true;
    }


    $('#new_name').on('input', function () {

        var input = $(this);
        var is_name = input.val();
        var pattern = /^[a-zA-Z]+$/;
        if (pattern.test(is_name)) {
            $('#error-name').text('');
        } else {
            $('#error-name').text('User name must in characters');
        }
    });

    $('#email').on('input', function () {

        var input = $(this);
        var is_name = input.val();
        var pattern = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
        if (pattern.test(is_name)) {
            $('#error-email').text('');
        } else {
            $('#error-email').text('email must be valid email e.g example.com');
        }
    });
    $('#new_password').on('input', function () {

        var input = $(this);
        var is_name = input.val();
        var pattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
        if (pattern.test(is_name)) {
            $('#error-password').text('');
        } else {
            $('#error-password').text('Minimum eight characters, at least one letter and one number');
        }
    });

    ////////////////////////////mobile-number-validation///////////////////////////


    $("document").ready(function () {

        $("#mobile_number").keyup(function () {

            checkPhoneField($(this).attr("id"));
        });

        $("#mobile_number").keyup(function (event) {

            if (event.key == "Backspace") {
                //console.log("backspace");
                checkPhoneField($(this).attr("id"));
            }

        });

        function checkPhoneField(elementID) {
            //console.log($("#" + elementID).val());
            $regex = /^92[0-9]\d{9}$/;
            if ($regex.test($("#" + elementID).val())) {
                //console.log($(`#${elementID}`).value, "match");
                $("#error-mobile").text("");
                $("#submit_button").prop("disabled", false);
            } else {
                //console.log($(`#${elementID}`).value, "not match");
                $("#error-mobile").text("Phone number not valid");

                $("#submit_button").prop("disabled", true);

            }

        }


    });


    ////////////////////////////mobile-number-validation end///////////////////////////

    $(document).ready(function () {
        // Prepare the preview for profile picture
        $("#wizard-picture").change(function () {
            readURL(this);
        });
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

</SCRIPT>


@endsection