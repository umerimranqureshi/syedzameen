@extends('adminPanel.layout')



@section('header')
<link href="{{asset('assetsAdminPanel/plugins/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet"
    type="text/css" />
<link href="{{asset('assetsAdminPanel/plugins/datatables/responsive.bootstrap4.css')}}" rel="stylesheet"
    type="text/css" />
<link href="{{asset('assetsAdminPanel/plugins/datatables/buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assetsAdminPanel/plugins/datatables/select.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endsection

@section('body')

<div class="main-content">

    <div class="page-content">

   
        <div class="container-fluid">
            @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
            @endif

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
            <div class="pull-right">
                <a  class="btn btn-light w-100 shadow-sm bg-gradient" type="submit"
            style="background-color: #ff7f00;height: 60px;" href="{{route('adminaddmanageadd')}}"> Add New AddImage</a>
            </div>

                <div class="col-12">


                    <div class="card">

                        <div class="card-body">


                            <table id="basic-datatable" class="table dt-responsive ">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($addbanner as $banner)

                                    <tr>
                                      
                                        <td>{{$banner->id}}</td>
                                       
                                        <td><img width="200" height="100" src="{{asset('mainimage/'.$banner->logo)}}" ></td>


                                        <td>

                                                <a onclick="return confirm('Are you sure you want to delete this item?')"
                                                href="{{route('admindeletebanner',['id'=>$banner->id])}}"
                                                style="color: red;font-size:18px" class="mdi mdi-delete-forever"></a>
                                    

                                        </td>

                                    </tr>
                                
@endforeach

                                </tbody>

                            </table>
                        </div>


                    </div>



                </div>




            </div>







        </div>
    </div>
</div>

<script>
$(document).ready(function () {

$("body").on("click","#deleteCity",function(e){

   if(!confirm("Do you really want to do this?")) {
      return false;
    }

   e.preventDefault();
   var id = $(this).data("id");
   // var id = $(this).attr('data-id');
   var token = $("meta[name='csrf-token']").attr("city");
   var url = e.target;

   $.ajax(
       {
          
        url: "admindeletecity/"+id,
         type: 'DELETE',
         data: {
           _token: token,
               id: id
       },
       success: function (response){

           $("#success").html(response.message)

           Swal.fire(
             'Remind!',
             ' deleted successfully!',
             'success'
           )
       }
    });
     return false;
  });
   

});
</script>

<script src={{asset("assetsAdminPanel/plugins/datatables/jquery.dataTables.min.js")}}></script>
<script src={{asset("assetsAdminPanel/plugins/datatables/dataTables.bootstrap4.js")}}></script>
<script src={{asset("assetsAdminPanel/plugins/datatables/dataTables.responsive.min.js")}}></script>
<script src={{asset("assetsAdminPanel/plugins/datatables/responsive.bootstrap4.min.js")}}></script>
<script src={{asset("assetsAdminPanel/plugins/datatables/dataTables.buttons.min.js")}}></script>
<script src={{asset("assetsAdminPanel/plugins/datatables/buttons.bootstrap4.min.js")}}></script>
<script src={{asset("assetsAdminPanel/plugins/datatables/buttons.html5.min.js")}}></script>
<script src={{asset("assetsAdminPanel/plugins/datatables/buttons.flash.min.js")}}></script>
<script src={{asset("assetsAdminPanel/plugins/datatables/buttons.print.min.js")}}></script>
<script src={{asset("assetsAdminPanel/plugins/datatables/dataTables.keyTable.min.js")}}></script>
<script src={{asset("assetsAdminPanel/plugins/datatables/dataTables.select.min.js")}}></script>
<script src={{asset("assetsAdminPanel/plugins/datatables/pdfmake.min.js")}}></script>
<script src={{asset("assetsAdminPanel/plugins/datatables/vfs_fonts.js")}}></script>
<script>
$("#basic-datatable").DataTable({




});
</script>








@endsection