<?php

namespace App\Http\Controllers;

use App\User;
use App\friend;
use App\message;
use Illuminate\Http\Request;
use App\Http\Resources\friendListResource;
use App\Http\Requests\newConversationRequest;

class FriendController extends Controller
{
    public function addFriend(newConversationRequest $request,User $user){
       
        friend::create([
            "user_id"=>$request->AuthUser,
            "friend_id" => $user->byEmail($request->email)->id,
        ]);
        message::create([
            "user_from"=> $request->AuthUser,
            "user_To"=> $user->byEmail($request->email)->id,
            "body"=>$request->body
        ]);
        return response()->json("success");
    }
    public function searchWithEmail(Request $request,User $user){
      
        return $user->byEmail($request->email);
    
      
    }
    public function friendList(Request $request){
        return new friendListResource(User::where("id", $request->AuthUser)->get()->first());
    }
}
