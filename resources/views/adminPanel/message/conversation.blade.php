@extends('adminPanel.layout')




@section('body')
<div class="main-content">

    <div class="page-content">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Conversation</h4>
                    {{-- <h4 class="mb-0 font-size-18 text-success">{{ Session::get('msg') ?? '' }}</h4> --}}

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Syed Zameen</a></li>
                            <li class="breadcrumb-item">Message Box</li>
                            <li class="breadcrumb-item active">conversation</li>
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
                                    <div class="col-6 p-0">
                                        <h5 class="text-uppercase text-center border border-full">{{$friend_name->name}}
                                        </h5>
                                    </div>
                                </div>

                                <div class="row d-flex justify-content-center">

                                    <!---------------------------chat box-------------------------->
                                    <div id="chat_box" style="background-color: whitesmoke ; height:200px"
                                        class="col-6 border border-box overflow-auto">

                                        @foreach ($chats as $chat)

                                        @if($chat->sender_id!=Auth::id())
                                        <div class="float-left w-100">


                                            <p class="text-left mb-0">{{$chat->chatOfUser->name}} : {{$chat->message}}
                                            </p>
                                            <p class="text-left mb-0">{{$chat->created_at}}</p>

                                        </div>
                                        @endif


                                        @if($chat->sender_id==Auth::id())

                                        <div class="float-right w-100">

                                            <p class="text-right mb-0">{{$chat->chatOfUser->name}} : {{$chat->message}}
                                            </p>
                                            <p class="text-right mb-0">{{$chat->created_at}}</p>

                                        </div>
                                        @endif

                                        @endforeach






                                    </div>



                                </div>

                                <div class="row d-flex justify-content-center mt-2">
                                    <div style="background-color: whitesmoke" class="col-6 border-box p-0">
                                        <form id="send_message_form">
                                            <textarea class="w-100" name="message" id="" cols="20" rows="3"></textarea>
                                            <input name="reciver_id" value="{{$friend_id}}" type="hidden">
                                            <button class="btn btn-secondary" type="submit">Send</button>
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

    <script src="{{ asset('js/app.js') }}"></script>

    <script>

        $("#send_message_form").submit(function (e) {
            e.preventDefault();

            $.ajax({
                async: false,
                url: "{{url('inbox')}}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: $(this).serialize(),
                method: "POST",
                success: function (res) {
                    console.log(res);
                    appendInDiv(res);
                }

            });

            $(this).trigger("reset");

        });

        function appendInDiv(res) {

            $box = $("#chat_box");

            $html = "";

            $html += '<div class="float-right w-100">';

            $html += `<p class="text-right mb-0">${res.name} : ${res.message}</p>`;
            $html += `<p class="text-right mb-0">${res.created_at}</p>`;

            $html += `</div>`;

            $box.append($html);

        }


    </script>




    @endsection