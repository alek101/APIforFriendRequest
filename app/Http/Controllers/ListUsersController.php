<?php

namespace App\Http\Controllers;

use App\Http\Resources\HelperResource;
use Illuminate\Http\Request;
use App\User;

class ListUsersController extends Controller
{
    public function index()
    {
        $listUsers=User::select('id','name')
        ->paginate(5)
        ->onEachSide(2);
        foreach($listUsers as $user)
        {
            $status=HelperResource::checkStatus($user->id);
            $user->status=$status;
        }
        $haveMesssage=HelperResource::checkIfIhaveMessages();

        return view('list',['listUsers'=>$listUsers,'haveMessage'=>$haveMesssage]);
    }
}
