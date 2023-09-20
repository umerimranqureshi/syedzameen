<?php

namespace App\Http\Controllers;

use App\Events\conversationMessageEvent;
use App\Events\inboxMessageEvent;
use App\Events\test;
use App\Events\UnreadMessageCountEvent;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use PHPUnit\Util\Json;
use stdClass;
use App\Events\ChatNotificationEvent;
use App\Events\notificationEvent;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ChatMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authUser = Auth::id();
        $chats = ChatMessage::with("chatOfUser")
            ->where("reciver_id", $authUser)
            ->where("reciver_status", "!=", "deleted")
            ->orderBy("created_at", "DESC")
            ->latest()
            ->get()
            ->unique('sender_id');

        $secChats = ChatMessage::with("chatOfUserReciver")
            ->where("sender_id", $authUser)
            ->where("sender_status", "!=", "deleted")
            ->orderBy("created_at", "DESC")
            ->latest()
            ->get()
            ->unique('reciver_id');


        $mergeChats = $chats->merge($secChats);

        foreach ($mergeChats as $okey => $oneChat) {

            foreach ($mergeChats as $skey => $secChat) {

                if ($oneChat->reciver_id == $secChat->sender_id &&  $oneChat->sender_id == $secChat->reciver_id) {

                    $oneDate = Carbon::parse($oneChat->created_at);
                    $secDate = Carbon::parse($secChat->created_at);

                    if ($oneDate->gt($secDate)) {
                        unset($mergeChats[$skey]);
                    } else if ($secDate->gt($oneDate)) {
                        unset($mergeChats[$okey]);
                    }
                }
            }
        }
        $chats = $mergeChats;


        //---------------------------------check for unread --------------------//
        $chats = json_encode($chats);
        $chats = json_decode($chats);

        $reciverUnreadMessages = ChatMessage::where("reciver_id", $authUser)
            ->where("reciver_status", 'unseen')
            ->latest()
            ->get()
            ->unique("sender_id");

        foreach ($chats as $chat) {

            foreach ($reciverUnreadMessages as $reciverUnreadMessage) {

                if ($chat->sender_id == $reciverUnreadMessage->sender_id) {
                    $chat->new_message = "new message";
                } else {
                    $chat->new_message = "";
                }
            }
        }


        //dd($chats);
        return view('adminPanel.message.inboxAll', compact("chats"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        if (is_array($req->message)) {
            $req->message = $req->message[0]    . "  " .
                $req->message[1];
        }

        $auth_user = Auth::id();

        $message = ChatMessage::create([
            "sender_id" => $auth_user,
            "reciver_id" => $req->reciver_id,
            "message" => $req->message,
        ]);

        //////check if current user had sms of a person to which he sending message//////
        $reply_message = ChatMessage::where("reciver_id", $auth_user)
            ->where("sender_id", $req->reciver_id)
            ->latest()
            ->first();

        if ($reply_message != null) {
            $reply_message->replied = "yes";
            $reply_message->save();
        }


        $this->makeMsgNumberingNotification($req->reciver_id);

        //////////////////////////making channel for reciver ---get conversation/////////////////////////
        $message = json_encode($message);
        $message = json_decode($message);
        $message->name = Auth::user()->name;
        $message->img_path = Auth::user()->img_path;
        event(new ChatNotificationEvent($message));
        //return "x";
        return response()->json($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //dd("");
        $obj = new stdClass();
        $obj->id = 1;
        $obj->message = "hello world";

        //        dd($obj);


        //  event(new inboxMessageEvent($obj));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $authUser = Auth::id();
        $makeDeleteStatuses = ChatMessage::orWhere(function ($q) use ($authUser, $id) {
            $q->where("sender_id", $authUser)
                ->where("reciver_id", $id);
        })->orWhere(function ($qu) use ($authUser, $id) {

            $qu->where("sender_id", $id)
                ->where("reciver_id", $authUser);
        })->get();
        foreach ($makeDeleteStatuses as $makeDeleteStatus) {

            if ($makeDeleteStatus->sender_id == $authUser) {
                $makeDeleteStatus->sender_status = "deleted";
                $makeDeleteStatus->save();
            } else if ($makeDeleteStatus->reciver_id == $authUser) {
                $makeDeleteStatus->reciver_status = "deleted";
                $makeDeleteStatus->save();
            }
        }
    }

    public function conversationView($friend_id)
    {
        $auth_user = Auth::id();
        $friend = User::find($friend_id);
        //-----------------------make sms seen by user-----------------------//

        $makeSmsSeen = ChatMessage::where("sender_id", $friend_id)
            ->where("reciver_id", $auth_user)
            ->where("reciver_status", "!=", "deleted")
            ->get();

        foreach ($makeSmsSeen as $sms) {
            $sms->reciver_status = "seen";
            $sms->save();
        }

        //-----------------------make sms seen by user end-----------------------//
        $current_user_sended_sms = ChatMessage::with("chatOfUser")
            ->where("sender_id", $auth_user)
            ->where("sender_status", "!=", "deleted")
            ->where("reciver_id", $friend_id)
            ->get();

        $friend_user_sended_sms = ChatMessage::with("chatOfUser")
            ->where("sender_id", $friend_id)
            ->where("reciver_id", $auth_user)
            ->where("reciver_status", "!=", "deleted")
            ->get();

        $conversations = $current_user_sended_sms->merge($friend_user_sended_sms)
            ->sortBy("created_at");


        $this->makeMsgNumberingNotification($auth_user);

        return [$conversations, $friend];
    }

    public function totalMessageCount()
    {

        $reciverUnreadMessage = ChatMessage::where("reciver_id", Auth::id())
            ->where("reciver_status", 'unseen')
            ->latest()
            ->get()
            ->unique("sender_id");
        //dd($reciverUnreadMessage);
        $totalUnreadMessage = count($reciverUnreadMessage);

        return $totalUnreadMessage;
    }




    public function inboxNewView()
    {
        return view("adminPanel.message.inboxAll");
    }

    public function makeMsgNumberingNotification($reciver_id)
    {
        //------------------------------notidification num -------------------------//
        $reciverUnreadMessages = ChatMessage::with('chatOfUser')
            ->where("reciver_id", $reciver_id)
            ->where("reciver_status", 'unseen')
            ->latest()
            ->get()
            ->unique("sender_id");

        $unreadMessageCount = count($reciverUnreadMessages);
        $obj = new stdClass();
        $obj->unreadMsg = $unreadMessageCount;
        $obj->reciver_id = $reciver_id;
        $obj->data = $reciverUnreadMessages;
        event(new notificationEvent($obj));
    }
}
