@extends('adminPanel.layout')


@section('header')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


@endsection



@section('body')



<div class="main-content">

    <div class="page-content">

        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Syed Zameen</a></li>

                            </ol>
                        </div>

                    </div>
                </div>


                <div class="container">

                @if(session('success'))
                                <div class="alert alert-success">{{session('success')}}</div>
                                @endif

                    <div class="row">


                        <div class="col-12 ">

                            <div style="" class="card">

                                <div class="card-body">



                                    <div class="row">
                                  
                                        <div class="col-sm-6 col-md-4">

                                            <form  method="POST" action="/admin/edit/city/{{$cities->id}}">
                                                @csrf
                                                <!-- @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif -->
                                                      
                                                <!-- @if (Session::has('success'))
                                                <div class="alert alert-success text-center">
                                                    <a href="#" class="close" data-dismiss="alert"
                                                        aria-label="close">×</a>
                                                    <p>{{ Session::get('success') }}</p>
                                                </div>
                                                @endif -->
                                                <table class="table table-bordered" id="dynamicAddRemove">
                                                    <tr>
                                                        <th>City</th>
                                                        <th>Location</th>
                                                     
                                                    </tr>
                                                    <tr>

                                                    <td><input type="text" name="city"   value="{{$cities->city}}"
                                                                placeholder="Enter title" class="form-control" /></td>

                                                        <td><input type="text" name="moreFields[]" value="{{$cities->area}}"
                                                                placeholder="Enter title" class="form-control" /></td>
                                                      
                                                    </tr>
                                                </table>
                                                <button type="submit" class="btn btn-success">Update City</button>
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

<script type="text/javascript">
var i = 0;
$("#add-btn").click(function() {
    $("#dynamicAddRemove").append('<tr><td><input type="text" name="moreFields[]" placeholder="Enter location" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'
    );
});
$(document).on('click', '.remove-tr', function() {
    $(this).parents('tr').remove();
});
</script>




<SCRIPT language=Javascript>
$('#address').on('input', function() {

    var input = $(this);
    var is_name = input.val();
    var pattern = /^[a-zA-Z0-9,.!? ]*$/;
    if (pattern.test(is_name)) {
        $('#error-city').text('');
    } else {
        $('#error-address').text('address must be valid');
    }
});
</SCRIPT>

@endsection