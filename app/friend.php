<?php

namespace App;

use App\Http\Resources\MessageResource;
use Illuminate\Database\Eloquent\Model;

class friend extends Model
{
    protected $fillable = ['user_id','friend_id'];

    public function user()
    {
        return $this->belongsTo(User::class, "friend_id");
    }
    public function lastConversationMessage($sender, $receiver)
    {
       
        $result =   message::where("user_from", $sender)->where("user_To", $receiver)->orWhere(function ($q) use ($sender,$receiver) {
            return $q->Where("user_from", $receiver)->where("user_To", $sender);
        })->latest()->first();
        return  new MessageResource($result);
    }
}