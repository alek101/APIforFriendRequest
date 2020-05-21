<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Friend_requests;
use App\Friend;
use App\Http\Resources\HelperResource;

class ListFriendRequestsController extends Controller
{
    public function index()
    {
        $list=Friend_requests::where('receiver',auth()->user()->id)
        ->where('active',true)
        ->join('users','users.id','=','friend_requests.sender')
        ->get();
        return view('messageBox',['list'=>$list]);
    }

    public function storeRequest($id)
    {
        $myId=auth()->user()->id;
        if(!HelperResource::checkIfFriend($id))
        {
            $newReq=new Friend_requests;
            $newReq->sender=$myId;
            $newReq->receiver=$id;
            $newReq->active=true;
            $newReq->save();
        }
        
        return back();
    }

    public function acceptFriendship($id)
    {
        $myId=auth()->user()->id;
        if(!HelperResource::checkIfFriend($id))
        {
            HelperResource::terminateFriendRequest($id);
            $newReq=new Friend;
            $newReq->user1=$myId;
            $newReq->user2=$id;
            $newReq->save();
            
        }
        
        return back();
    }

    public function rejectFriendship($id)
    {
        HelperResource::terminateFriendRequest($id);
        return back();
    }

}
