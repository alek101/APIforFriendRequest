@extends('layouts.primary')

@section('content')
    <a href="/list">List of users</a>

@if (count($list)==0)
    <h3>There is no new requests for friendship.</h3>
@else
    @foreach ($list as $user)
        <div>
            <span>{{ $user->name }}</span>
            <span><a href='/acceptFriendship/{{ $user['id'] }}'>Accept Request for Friendship</a> </span>
            <span><a href='/rejectFriendship/{{ $user['id'] }}'>Reject Request for Friendship</a> </span>
        </div>
    @endforeach
@endif
 
<div>{{ $list->links() }}</div>


@endsection