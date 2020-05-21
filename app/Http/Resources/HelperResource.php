<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;
use App\Friend;
use App\Friend_requests;

class HelperResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public static function checkIfFriend($checkID)
    {
        $myID=auth()->user()->id;
        $check1=Friend::where('user1',$myID)
        ->where('user2',$checkID)
        ->count();
        $check2=Friend::where('user2',$myID)
        ->where('user1',$checkID)
        ->count();
        if($check1==1 or $check2==1) return true;
        return false;
    }

    public static function checkIfRequestIsSend($checkID)
    {
        $myID=auth()->user()->id;
        if(HelperResource::checkIfFriend($checkID)) return false;
        return (Friend_requests::where('sender',$myID)
        ->where('receiver',$checkID)
        ->count()==1)? true:false;
    }

    public static function checkStatus($id)
    {
        if(auth()->user()->id==$id) return 'self';
        if(HelperResource::checkIfFriend($id)) return 'friend';
        if(HelperResource::checkIfRequestIsSend($id)) return 'pending';
        return 'send_request';
    }

    public static function checkIfIhaveMessages()
    {
        return (Friend_requests::where('receiver',auth()->user()->id)
        ->where('active',true)
        ->count()>0)? true:false;
    }

    public static function terminateFriendRequest($id)
    {
        $myID=auth()->user()->id;
        $entry=Friend_requests::where('sender',$id)
        ->where('receiver',$myID)
        ->first();
        $entry->active=false;
        $entry->save();
    }
}
