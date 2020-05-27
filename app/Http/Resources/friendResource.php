<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class friendResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
         "friend_id"=>$this->user->id,
         "friend_name"=>$this->user->name,
         "friend_email"=>$this->user->email,
         "lastMessage"=> $this->lastConversationMessage($this->user_id,$this->friend_id),


        ];
    }
}
