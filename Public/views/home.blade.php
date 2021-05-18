@extends('layout')

@section('title', 'HomePage')

@section('content')

    @auth
        <h3>Hoşgeldin, {{ auth()->getName() }}</h3>
        <a href="http://localhost:8888/structure/logout">Logout</a>
    @endauth

    @guest
        <h3>Hoşgeldin, ziyaretçi</h3>
        <a href="http://localhost:8888/structure/login">Login</a>
        <a href="http://localhost:8888/structure/register">Register</a>
    @endguest

    <form action="" style="display: none" method="post">
        <ul>
            <li>
                <input type="text" value="@getData('username')" class="@hasError('username')" placeholder="Username" name="username">
                @getError('username')
            </li>
            <li>
                <input type="password" value="@getData('password')" class="@hasError('password')" placeholder="Password" name="password">
                @getError('password')
            </li>
            <li>
                <input type="password" value="@getData('password_again')" class="@hasError('password_again')" placeholder="Password Again" name="password_again">
                @getError('password_again')
            </li>
            <li>
                <button type="submit">Login</button>
            </li>
        </ul>
    </form>

    @auth
    <form action="" method="post">
        <textarea name="content" cols="30" rows="10" class="@hasError('content')"></textarea><br>
        @getError('content')
        <button type="submit">Send</button>
    </form>
    @endauth

    <ul>
        @foreach($posts as $post)
            <li>
                #{{ $post->id }} <br>
                {{ $post->content }} <br>
                Added by: {{ $post->user->name }} <br>
                Post Add Date: @timeAgo($post->created_at)
            </li>
        @endforeach
    </ul>
@endsection

