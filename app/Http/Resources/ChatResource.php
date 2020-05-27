<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
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

            "user_from"=>$this->user_from,
            "user_To"=>$this->user_To,
            "text"=>$this->body,
            "created_at"=>$this->created_at->diffForHumans(),
            "read_at"=>$this->status(),


        ];
    }
}
