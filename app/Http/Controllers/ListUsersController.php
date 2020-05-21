<?php

namespace App\Http\Controllers;

use App\Http\Resources\HelperResource;
use Illuminate\Http\Request;
use App\User;

class ListUsersController extends Controller
{
    public function index()
    {
        $listUsers=User::select('id','name')->get();
        $newList=[];
        foreach($listUsers as $user)
        {
            $temp=['id'=>$user->id, 'name'=>$user->name, 'status'=>HelperResource::checkStatus($user->id)];
            array_push($newList,$temp);
        }
        $haveMesssage=HelperResource::checkIfIhaveMessages();

        return view('list',['listUsers'=>$newList,'haveMessage'=>$haveMesssage]);
    }
}
