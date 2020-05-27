<?php

namespace App\Http\Controllers;

use App\User;
use App\message;
use App\Events\newMessage;
use Illuminate\Http\Request;
use App\Http\Resources\ChatResource;

class MessageController extends Controller
{
    public function index(Request $request, message $message)
    {

        $friendIndo = User::where("id", $request->friend_id)->first();
        return response()->json(["friend_info" => $friendIndo, "messages" => ChatResource::collection($message->fetchConversation($request->AuthUser, $request->friend_id))]);
    }
    public function store(Request $request)
    {

       $message =  message::create([
            "user_from" => $request->user_from,
            "user_To"=> $request->user_to,
            "body" => $request->message

        ]);
        broadcast(new newMessage($message));
        return response()->json(['status'=>'stored',"message"=> new ChatResource($message)]);
    }
}
