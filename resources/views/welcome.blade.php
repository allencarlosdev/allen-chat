<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/main.css">
    <title>Allen-chat</title>
</head>
<body>
    <div class="btn">
        @if (Route::has('login'))       
                @auth
                    <a class="btn-a" href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a class="btn-a" href="{{ route('login') }}">Log in</a>

                    @if (Route::has('register'))
                        <a class="btn-a" href="{{ route('register') }}">Register</a>
                    @endif
                @endauth      
        @endif
    </div>
    <main>
        <div class="users-list">
            <h2 class="users-list__h2">Choose who to chat with!</h2>
            <div  class="users-list__list">
                <h4 class="users-list__h4">Click on the user to chat</h3>
                    @foreach ($users as $user)     
                        <div>
                            @if (Route::has('login'))
                                @auth
                                @if (Auth::user()->id == $user->id)                  
                                @else
                                    <a class="users-list__a" rel="noopener noreferrer" target="_blank" href="{{ route('chat.with', ['user' => $user->id]) }}">{{$user->name}}</a>
                                @endif
                            @else
                                <a class="users-list__a" rel="noopener noreferrer" target="_blank" href="{{ route('login') }}">{{$user->name}}</a>
                                @endauth
                            @endif
                        </div>
                    @endforeach
            </div>
        </div>
        <div class="image-chat">
            <img class="image-chat__svg" src="{{asset('../img/chat.svg')}}" alt="">
        </div>
    </main>
</body>
</html>
