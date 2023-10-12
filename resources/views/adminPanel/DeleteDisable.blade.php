@extends('adminPanel.layout')

@section('header')
<link href="{{asset('assetsAdminPanel/plugins/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet"
    type="text/css" />
<link href="{{asset('assetsAdminPanel/plugins/datatables/responsive.bootstrap4.css')}}" rel="stylesheet"
    type="text/css" />
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
                                        <th>Price</th>
                                        <th>Purpose</th>
                                        <th>Property Type</th>
                                        <th>Property Sub Type</th>
                                        <th>Contact P/Name</th>
                                        <th>City</th>
                                        <th>Location</th>
                                        <th>Location</th>
                                        <th style="width:7%">Action</th>
                                        <th>Mobile No</th>
                                        <th>Image</th>
                                        <th>views</th>
                                        
                                       



                                    </tr>

                                </thead>


                                <tbody>

                                    @empty(!$allPost)


                                    @foreach ($allPost as $key=>$post)

                                    @php
                                    $number =$key+1 ;
                                    $width=4;
                                    $reNewId = str_pad((int)$number, $width, "0", STR_PAD_LEFT);
                                    @endphp

                                    <tr>
                                        <td>{{ $reNewId }} 
                                            @if($post->user->role==1)
                                            <i class="fas fa-star"style="color:blue"></i>
                                            @endif
                                        </td>
                                        <td>{{$post->property_title}}</td>
                                        <td>{{$post->price}}</td>
                                        <td>{{$post->propertyCate->purpose}}</td>
                                        <td>{{$post->propertyCate->property_type}}</td>
                                        <td>{{$post->propertyCate->property_sub_type}}</td>
                                        <td>{{$post->contact_person_name}}</td>
                                         @if ($post->cityAndArea)
                                             <td>{{$post->cityAndArea->city}}</td>
                                                @else
                                             <td>N/A</td>
                                             @endif                                        
                                      <td>{{ $post->manual_location }}</td>
                                         @if ($post->cityAndArea)
                                        <td>{{$post->cityAndArea->area}} </td>
                                              @else
                                             <td>N/A</td>
                                             @endif
                                        <td style="width:7%"><a href="{{route('adminDisable',['id'=>$post->id])}}"
                                                style="color:{{($post->disable==1)?'grey':'green'}};font-size:18px"
                                                title="{{($post->disable==1)?'enable':'disbale'}}"
                                                ><i class="fas fa-ban"></i></a>

                                            <a onclick="return confirm('Are you sure you want to delete this item?')"
                                                href="{{route('adminDelete',['id'=>$post->id])}}"
                                                style="color: red;font-size:18px" class="mdi mdi-delete-forever"></a>


                                                <a  href="{{route('editadminPostView',['id'=>$post->id])}}"
                                                style="color: gray;font-size:18px" > 
                                                <i class="fas fa-pen"></i></a>
                                            
                                                <a  href="{{route('singlePage',['title'=>str_replace(' ', '-', $post->property_title),'id'=>$post->id])}}"
                                                style="color: gray;font-size:18px" > 
                                                <i class="btn btn-block btn-primary">Detail</i></a>
                                            
                                        </td>
                                        <td>{{$post->mobile_number}}</td>
                                          
                                            
                                       <td><img width="200" height="100" src="{{asset('mainimage/'.$post->mainimage)}}" ></td>

                                        <td><i class="fas fa-eye"></i>{{$post->postViews->count()}}</td>
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