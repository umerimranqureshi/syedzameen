@extends('adminPanel.layout')


@section('body')

<div class="main-content">

    <div class="page-content">
  
        <div class="container-fluid">

            @if($allReqToAgents->count()>0)

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Your requests to agents</h4>
                            <p class="card-subtitle mb-4"> </p>
                                
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>name</th>
                                            <th>email</th>
                                            <th>Mobile No</th>
                                            <th>Address</th>
                                            <th>property_title</th>
                                            <th>Discription</th>
                                            <th>your message</th>
                                            <th>Identity</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        @foreach ($allReqToAgents as $key=>$agent)
                                        
                                        <tr>
                                            @php
                                          
                                            $number =$key+1 ;
                                            $width=4;
                                            $reNewId = str_pad((int)$number, $width, "0", STR_PAD_LEFT);
                                            @endphp
                                        <th scope="row">{{$reNewId}}</th>
                                        <td>{{$agent->post->contact_person_name}}</td>
                                        <td>{{$agent->post->email}}</td>
                                        <td>{{$agent->post->mobile_number}}</td>
                                        <td>{{$agent->post->address}}</td>
                                        <td>{{$agent->post->property_title}}</td>
                                        <td>{{$agent->post->description}}</td>
                                        <td>{{$agent->message}}</td>
                                        <td>
                                         
                                        
                                       
                                        <div class="img-circle-logo">
                                            @if($agent->post->user->img_path==null)
                                            <img class="img-rounded" src="{{asset('profilepic.png')}}" alt="">
                                            @else
                                            <img class="img-rounded" src="{{asset('/'.$agent->post->user->img_path)}}" alt="">    
                                            @endif
                                            </div>
                                       
                                        </td>
                                        
                                        </tr>
                                        @endforeach
                                      
                                       
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- end card-body-->
                    </div>
                    <!-- end card -->

                </div>
                <!-- end col -->


                
                <!-- end col -->
            </div>

            @else 

            <h5 class="text-success text-center">you are not requested to any agent yet</h5>

            @endif
        </div>

    </div>

</div>

@endsection

