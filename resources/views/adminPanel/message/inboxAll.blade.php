@extends('adminPanel.layout')

@section('header')

<link href="{{ asset('assetsAdminPanel/css/inbox.css') }}" rel="stylesheet" type="text/css" />

@endsection



@section("body")

<div class="main-content">

    <div class="page-content">

        <main class="content mt-0">
            <div class="container p-0">

                <h1 class="h3 mb-3">Messages</h1>

                <div class="card">
                    <div style="height: 40rem;" class="row g-0">
                        <div id="chatListMainDiv" class="col-12 col-lg-5 col-xl-3 border-right">

                            <div class="px-4 d-none d-md-block">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <input type="text" id="searchChatByName" class="form-control my-3"
                                            placeholder="Search...">
                                    </div>
                                </div>
                            </div>
                            <div id="sideInboxBar" class="sideInboxBar">

                                @foreach ($chats as $chat)

                                @php
                                $friend_id=$chat->sender_id==Auth::id()? $chat->reciver_id: $chat->sender_id;
                                $img=isset($chat->chat_of_user)? asset($chat->chat_of_user->img_path):asset(
                                $chat->chat_of_user_reciver->img_path);

                                @endphp

                                <div href="javascript:void(0)" data-user-id="{{$friend_id}}"
                                    class="list-group-item list-group-item-action border-0 userChatMessage">
                                    <div class="badge bg-success float-right users_inbox_notification"
                                        data-user-id="{{$friend_id}}"></div>
                                    <div data-user-id="{{$friend_id}}" class="d-flex align-items-start sidebar-info">

                                        <img src="{{$img}}" onerror="imgError(this);" class="rounded-circle mr-1" alt=""
                                            width="40" height="40">
                                        <div class="flex-grow-1 ml-3 nameDiv">
                                            {{$chat->chat_of_user->name ?? $chat->chat_of_user_reciver->name }}
                                            <div data-user-id="{{$friend_id}}" class="small inboxLatestNoti">

                                                {!! $chat->message !!}

                                            </div>
                                        </div>

                                        @if($chat->sender_id==Auth::id())
                                        <i data-user-id="{{$friend_id}}" class="mdi mdi-reply reply-icon"></i>
                                        @endif

                                    </div>
                                </div>

                                @endforeach

                            </div>
                            <!--------------------------------Conversation starts----------------------------------------->
                            <hr class="d-block d-lg-none mt-1 mb-0">
                        </div>
                        <div class="col-12 col-lg-7 col-xl-9">
                            <div class="py-2 px-4 border-bottom d-none d-lg-block">
                                <div class="d-flex align-items-center py-1">
                                    <div class="position-relative">
                                        <img src="{{asset('profilePic.png')}}" onerror="imgError(this);"
                                            class="rounded-circle mr-1" id="userChatHeadPhoto" width="40" height="40">
                                    </div>
                                    <div class="flex-grow-1 pl-3">
                                        <strong id="userChatHeadName"></strong>
                                        <div class="text-muted small"><em></em></div>
                                    </div>
                                    <div>

                                        <div class="btn-group dropleft">
                                            <button type="button"
                                                class="btn btn-light border btn-lg px-3 dropdown-toggle"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-more-horizontal feather-lg">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="19" cy="12" r="1"></circle>
                                                    <circle cx="5" cy="12" r="1"></circle>
                                                    <circle cx="5" cy="12" r="1"></circle>
                                                </svg>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                    <a id="delete_chat" onclick="deleteChat($(this).data('user-id'))"
                                                        class="dropdown-item" href="javascript:void(0)">Delete
                                                        Chat</a>

                                                </div>





                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative">
                                <div id="conversationBox" style="height:32rem ;" data-sender-id="0"
                                    class="chat-messages p-4">


                                    <div class="d-flex justify-content-center">
                                        <h1>Open Any Chat</h1>
                                    </div>


                                </div>
                            </div>
                            <form id="send_message_form" class="form-group">
                                <div class="flex-grow-0 py-3 px-4 border-top">
                                    <div class="input-group">

                                        <input type="text" class="form-control" name="message"
                                            placeholder="Type your message">
                                        <input name="reciver_id" id="reciver_id_input" value="" type="hidden">
                                        <button type="submit" class="btn btn-primary">Send</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>
</div>



<script src="{{asset('helper.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('jsComman/comman.js')}}"></script>

<script>
    $(document).on("click", ".userChatMessage", function () {

        $user_id = $(this).data("user-id");
        $("#conversationBox").attr("data-sender-id", $user_id);
        $formReciverID = $("#reciver_id_input").val($user_id);

        $("#delete_chat").attr("data-user-id",$user_id);

        $notificationElement = $(".users_inbox_notification");
        if ($notificationElement.data("user-id") == $user_id) {
            $(".users_inbox_notification[data-user-id~='" + $user_id + "']").html("");
        }

        $.ajax({

            url: "{{url('/conversation/')}}/" + $user_id,
            async: false,
            success: function (res) {
                $freindProfile = res[1];

                $profileImg = $freindProfile.img_path == null ? "" : $freindProfile.img_path;
                $("#userChatHeadPhoto").attr("src", publicUrl + $profileImg);
                $("#userChatHeadName").text($freindProfile.name);


                $conversation = res[0];
                $("#conversationBox").html("");

                $html = "";

                //-------------------sorting function for array----------------//
                $sortedArray = Object.values($conversation);
                $sortedArray = $sortedArray.sort(function (a, b) {
                    if (new Date(a.created_at) > new Date(b.created_at)) return 1;
                    if (new Date(a.created_at) < new Date(b.created_at)) return -1;
                    return 0;
                });

                $.each($sortedArray, function ($i, $chat) {

                    if ($chat.sender_id == AuthUser) {

                        console.log($chat.sender_id, AuthUser);
                        $html += `<div class="chat-message-right pb-4">
                                        <div>
                                            <img onerror="imgError(this);" src="${publicUrl + $chat.chat_of_user.img_path}"
                                                class="rounded-circle mr-1"  width="40" height="40">
                                            <div class="text-muted small text-nowrap mt-2">${dateParse($chat.created_at).time}</div>
                                            <div class="text-muted small text-nowrap mt-2">${dateParse($chat.created_at).date}</div>
                                        </div>
                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                            <div class="font-weight-bold mb-1">You</div>
                                                    ${$chat.message}
                                        </div>
                                    </div>`;
                    }

                    else {
                        $html +=
                            `<div class="chat-message-left pb-4">
                                        <div>
                                            <img  onerror="imgError(this);" src="${publicUrl + $chat.chat_of_user.img_path}"
                                                class="rounded-circle mr-1"  width="40" height="40">
                                            <div class="text-muted small text-nowrap mt-2">${dateParse($chat.created_at).time}</div>
                                            <div class="text-muted small text-nowrap mt-2">${dateParse($chat.created_at).date}</div>
                                        </div>
                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                            <div class="font-weight-bold mb-1">${$chat.chat_of_user.name}</div>
                                            ${$chat.message}
                                        </div>
                        </div>`;

                    }

                });/////foreach end

                $("#conversationBox").html($html);

                $("#conversationBox").animate({ scrollTop: $('#conversationBox').prop("scrollHeight") }, 1000);


            },

        });

    });

    //---------------------------------submit new message-----------------------------//

    $(document).on("submit","#send_message_form",function (e) {
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




    function appendInDiv($res) {
        $box = $("#conversationBox");
        $html = "";
        $html += `<div class="chat-message-right pb-4">
                                        <div>
                                            <img onerror="imgError(this);" src="${publicUrl + $res.img_path}"
                                                class="rounded-circle mr-1"  width="40" height="40">
                                            <div class="text-muted small text-nowrap mt-2">${dateParse($res.created_at).time}</div>
                                            <div class="text-muted small text-nowrap mt-2">${dateParse($res.created_at).date}</div>
                                        </div>
                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                            <div class="font-weight-bold mb-1">You</div>
                                                    ${$res.message}
                                        </div>
                    </div>`;
        $box.append($html);

         $(".users_inbox_notification[data-user-id='"+$res.reciver_id+"']").html("");



         $replyClass=$(".reply-icon[data-user-id~='"+$res.reciver_id+"']");

         if(!$replyClass.length){
            console.log("if x");


            $info=$(".sidebar-info[data-user-id='"+$res.reciver_id+"']");

            $info.append(`<i  data-user-id="${$res.reciver_id}" class='mdi mdi-reply reply-icon'></i>`);

            console.log($info);

         }

         $(".inboxLatestNoti[data-user-id='"+$res.reciver_id+"']").html($res.message);



    }


    $(document).ready(function () {
        $("#searchChatByName").on("keyup", function () {
            //console.log($(this).val());
            var value = $(this).val().toLowerCase();
            $("#chatListMainDiv a").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    function deleteChat($id){
        $route="{{url('inbox')}}";
        $confirm=confirm("are you sure");

        if($confirm){
        deletee($route,$id);

        if($("#conversationBox").data("sender-id") == $id){

            $("#conversationBox").html("");
            $("#userChatHeadPhoto").attr("src", "");
            //$("#userChatHeadPhoto").attr("onerror", "imgError(this);");
            $("#userChatHeadName").text("");

        }

        $(".userChatMessage").each(function(){

            if($(this).data("user-id")==$id){
                $(this).remove();
            }

        });
    }

}




</script>



@endsection