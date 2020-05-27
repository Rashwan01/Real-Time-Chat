<?php

namespace App;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    protected $fillable = ['user_from','body', 'user_To'];

    protected $casts = [
        'read_at' => 'datetime',
    ];
    public function newConversation(Request $request){

        friend::create([
        "user_id"=>Auth()->id(),
        "body"=>$request->body

        ]);

    
    }
    public function status()
    {
        $q = $this->where("id", $this->id)->first()->read_at;
        return $q?[$q->diffForHumans(),"read"]:"unread";
    }
    public function fetchConversation($sender,$receiver){
        $result =   $this->where("user_from", $sender)->where("user_To", $receiver)->orWhere(function ($q) use ($sender, $receiver) {
            return $q->Where("user_from", $receiver)->where("user_To", $sender);
        })->oldest()->get();
        return  $result;
    }

}
