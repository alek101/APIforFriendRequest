@extends('layouts.primary')

@section('content')

    <a href="/messageBox">Messages</a>
    @if ($haveMessage)
        <a href="/messageBox"><h3>You are having new friend request!</h3></a>
    @endif
    @foreach ($listUsers as $user)
            <div>
                    <span>{{ $user->name }}</span>
                    <span>
                        @if ( $user->status=='send_request')
                        <a href='/storeRequest/{{ $user->id }}'>Send Request for Friendship</a>  
                        @else
                            {{ $user->status}}
                    @endif 
                </span>            
            </div>
    @endforeach


    {{ $listUsers->links() }}
@endsection