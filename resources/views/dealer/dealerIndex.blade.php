@extends('adminPanel.layout')




@section('header')
<link href="{{asset('assetsAdminPanel/plugins/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assetsAdminPanel/plugins/datatables/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assetsAdminPanel/plugins/datatables/buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assetsAdminPanel/plugins/datatables/select.bootstrap4.css')}}" rel="stylesheet" type="text/css" />

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

        <div class="col-12">


          <div class="card">

            <div class="card-body">


              <table id="basic-datatable" class="table dt-responsive ">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Plot Size</th>
                    <th>image</th>
                    <th>action</th>
                    

                  </tr>

                </thead>
                <tbody>


                  @empty(!$posts)


                  @foreach ($posts as $key=>$post)

                 

                  <tr>

                    <td>{{$post->id }} </td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->plot_size}}</td>
                     <td><img width="100" style="margin-bottom:9px" height="80" src="{{ asset('dealerimage/'.$post->image) }}" alt="" srcset="">
                     </td>
                    <td>
                      <a onclick="return confirm('Are you sure you want to delete this item?')" href="{{url('deleteDealerPost',['id'=>$post->id])}}" style="color: red;font-size:18px" class="mdi mdi-delete-forever"></a>


                      <a href="{{url('dealerEdit',['id'=>$post->id])}}" style="color: gray;font-size:18px">
                        <i class="fas fa-pen"></i></a>


                     

                    </td>
                
                  </tr>
                  @endforeach
                  @endempty

                </tbody>

              </table>
            </div>

          </div>

        </div>
      </div>

    </div>
  </div>
</div>

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