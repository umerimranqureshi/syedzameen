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

                <div class="col-12">


                    <div class="card">

                        <div class="card-body">


                            <table id="basic-datatable" class="table dt-responsive wrap" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Content</th>

                                        <th>Tags</th>
                                        <th>Images</th>
                                        <th>Action</th>

                                    </tr>

                                </thead>


                                <tbody>

                                    @empty(!$blogs)


                                    @foreach ($blogs as $key => $blog)

                                    @php

                                    $number = $key+1 ;

                                    @endphp

                                    <tr>
                                        <td>{{ $number }}</td>
                                        <td>{{ $blog->title }}</td>
                                        <td>
                                         {!! html_entity_decode($blog->content) !!} 
                                        </td>

                                        <td>{{ $blog->tags }}</td>
                                        <td>

                                            @foreach ($blog->blogImages as $image)


                                            <img width="200" height="100"
                                                src="{{ $image->img_path != null ? asset('public/'.$image->img_path) : '' }}"
                                                alt="" srcset="">

                                            @endforeach

                                        </td>

                                        <td>
                                            <a href="{{ route("blogMainView",['id'=>$blog->id]) }}"
                                                style="color: green;font-size:18px"
                                                class="mdi mdi-circle-edit-outline"></a>


                                            <a onclick="return confirm('Are you sure you want to delete this item?')"
                                                href="{{route("deleteBlog",['id'=>$blog->id])}}"
                                                style="color: red;font-size:20px" class="mdi mdi-delete-forever"></a>



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
    //      console.log($dataForTable);
        $("#basic-datatable").DataTable({




        });

</script>





@endsection