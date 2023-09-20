@extends('adminPanel.layout')




@section('body')
<div class="main-content">

    <div class="page-content">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Inbox</h4>
                    {{-- <h4 class="mb-0 font-size-18 text-success">{{ Session::get('msg') ?? '' }}</h4> --}}

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Syed Zameen</a></li>
                            <li class="breadcrumb-item active">Message Box</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="container-fluid">
                                <div class="row d-flex justify-content-center">


                                    <div style="background-color: whitesmoke" class="col-6">


                                        <table class="w-100">

                                            <tr>
                                                <th class="pr-2 pl-2 text-center">#</th>
                                                <th class="pr-2 pl-2 text-center">Name</th>
                                                <th class="pr-2 pl-2 text-center">message</th>
                                                <th class="pr-2 pl-2 text-center"></th>
                                                <th class="pr-2 pl-2 text-center"></th>
                                                <th class="pr-2 pl-2 text-center"></th>

                                            </tr>

                                            <tbody id="tbody">
                                                @php $i=0 @endphp
                                                @foreach ($chats as $chat)


                                                <tr>

                                                    <td class="pr-2 pl-2 text-center">{{++$i}}</td>
                                                    <td class="pr-2 pl-2 text-center">
                                                        <a href="{{url('/conversation')."/$chat->sender_id"}}">
                                                            {{$chat->chatOfUser->name}}
                                                        </a>
                                                    </td>
                                                    <td class="pr-2 pl-2 text-center">
                                                        <a href="{{url('/conversation')."/$chat->sender_id"}}">
                                                            {{$chat->message}}
                                                        </a>
                                                    </td>
                                                    <td class="pr-2 pl-2 text-center"><i style="font-size: 20px"
                                                            class="mdi mdi-delete-empty"></i></td>
                                                    <td class="pr-2 pl-2 text-center">
                                                        <i style="font-size: 20px"
                                                            class="{{$chat->replied=="yes"?"mdi mdi-reply":"mdi mdi-message-text-outline"}}">
                                                        </i>

                                                    </td>

                                                    @if($chat->reciver_status=="unseen")
                                                    <td><span class="badge badge-danger">new message</span></td>
                                                    @endif
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
        </div>









    </div>

    <script src="{{ asset('js/app.js') }}"></script>


    <script>
        Echo.private('user.{{ Auth::id() }}')
        .listen('inboxMessageEvent', (e) => {
        console.log(e);

    });


    </script>




    @endsection