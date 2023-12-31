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
        <div class="col">
          <p class="text text-danger" style="text-align: center"> @if(session('e-message'))
            {{session('e-message')}}
            @endif </p>
          <p class="text text-success" style="text-align: center"> @if(session('message'))
            {{session('message')}}
            @endif </p>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table id="basic-datatable" class="table dt-responsive">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Purpose</th>
                    <th>Property Type</th>
                    <th>Property Sub Type</th>
                    <th>Contact P/Name</th>
                    <th>Boast Post</th>
                    <th>Location</th>
                    <th>Action</th>
                    <th>Mobile No</th>
                    <th>Image</th>
                    <th>views</th>
                    <th>Sold</th>
                  </tr>
                </thead>
                <tbody>
                
                @empty(!$userAllPost)
                
                
                @foreach ($userAllPost as $key => $post)
                
                @php
                $number =$key+1 ;
                $width=4;
                $reNewId = str_pad((int)$number, $width, "0", STR_PAD_LEFT);
                @endphp
                <tr>
                  <td>{{ $reNewId }}</td>
                  <td>{{ $post->property_title }}</td>
                  <td>{{ $post->price }}</td>
                  <td>{{ $post->purpose }}</td>
                  <td>{{ $post->property_type }}</td>
                  <td>{{ $post->property_sub_type }}</td>
                  <td>{{ $post->contact_person_name }}</td>
                  <td> @if($post->post_boaster=='superhot')
                    <table>
                      <tr>
                        <th>{{$post->post_boaster}}</th>
                      </tr>
                      <tr style="text-align: center">
                        <td><i class="mdi mdi-checkbox-marked-circle"
                                                                    style="color:rgba(255, 0, 0, 0.788);
                                                                    font-size:25px"></i></td>
                      </tr>
                    </table>
                    @endif
                    
                    @if($post->post_boaster=='hot')
                    <table style="text-align: center">
                      <tr>
                        <th>{{$post->post_boaster}}</th>
                      </tr>
                      <tr style="text-align: center">
                        <td><i class="mdi mdi-checkbox-marked-circle"
                                                                    style="color: rgba(224, 47, 165, 0.829);
                                                                    font-size:25px"></i></td>
                      </tr>
                    </table>
                    @endif
                    
                    
                    @if($post->post_boaster=='normal')
                    @if(!is_null($rates))
                    <table>
                      <tr>
                        <td><a href="{{route('boastPost',['post_id'=>$post->id,'cat'=>'hot']) }}" title="Make it Hot"> <i class="mdi mdi-fire p-2" style="color: rgb(255, 0, 234);font-size:25px"></i> </a></td>
                        <td><a href="{{route('boastPost',['post_id'=>$post->id,'cat'=>'superhot']) }}" title="Make it Super Hot"> <i class="mdi mdi-fire p-2" style="color: red;font-size:25px"></i> </a></td>
                      </tr>
                    </table>
                    @else
                    Pricing is not set yet
                    @endif
                    @endif </td>
                  <td>{{ $post->address }} </td>
                  <td><a href="{{ url('edit/post/' . $post->id) }}"
                                                            style="color: green;font-size:18px"
                                                            class="mdi mdi-circle-edit-outline"></a> <a onclick="return confirm('Are you sure you want to delete this item?')"
                                                            href="{{ url('delete/post/' . $post->id) }}"
                                                            style="color: red;font-size:18px"
                                                            class="mdi mdi-delete-forever"></a></td>
                  <td>{{ $post->mobile_number }}</td>
                  <td><img width="200" height="100"
                                                            src="{{ $post->img != null ? asset('propertyImages/' . $post->img) : asset('houseLog.jpg') }}"
                                                            alt="" srcset=""></td>
                  <td><i class="fas fa-eye"></i>{{ $post->postViews->count() }}</td>
                  <td><a class="btn btn-info"
                                                            style="text-decoration:none;color:rgb(247, 223, 223)"
                                                            href="{{ route('sold', ['id' => $post->id]) }}"> {{ $post->sold == 0 ? 'yes' : 'not sale yet' }}</a></td>
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
        //$dataForTable={!!  json_encode($userAllPost) !!};
        //      console.log($dataForTable);
        $("#basic-datatable").DataTable({




        });

    </script> 
@endsection 