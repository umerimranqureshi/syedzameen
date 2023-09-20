@extends('adminPanel.layout')


@section('body')

<div class="main-content">

    <div class="page-content">
  
        <div class="container-fluid">

       

            <div class="row">
                <div class="col-xl-10">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Clients</h4>
                            <p class="card-subtitle mb-4"> </p>
                                
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>name</th>
                                            <th>email</th>
                                            <th>Mobile No</th>
                                            <th>Message</th>
                                            <th>Address</th>
                                            <th>Identity</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        <?php $number=0;?>
                                        @foreach ($reqClient as $clientsReq)
                                       
                                        @foreach ($clientsReq->requestOfClients as $key=>$client)
                                       

                                        {{-- has many relation returns collection  --}}
                                        <tr>
                                            @php
                                           
                                            $number =$number+1 ;
                                            $width=4;
                                            $reNewId = str_pad((int)$number, $width, "0", STR_PAD_LEFT);
                                            @endphp
                                            <th scope="row">{{$reNewId}}</th>
                                            <td>{{$client->user->name}}</td>
                                            <td>{{$client->user->email}}</td>
                                            <td>{{$client->user->mobile_number}}</td>
                                            <td>{{$client->message}}</td>
                                            <td>{{$client->user->address}}</td>
                                            <td>
                                             
                                            
                                           
                                            <div class="img-circle-logo">
                                                @if($client->user->img_path==null)
                                                <img class="img-rounded" src="{{asset('profilepic.png')}}" alt="">
                                                @else
                                                <img class="img-rounded" src="{{asset('/'.$client->user->img_path)}}" alt="">    
                                                @endif
                                                </div>
                                           
                                            </td>
                                            </tr>
                                          
                                        @endforeach
                                       
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

         
        </div>

    </div>

</div>

@endsection

