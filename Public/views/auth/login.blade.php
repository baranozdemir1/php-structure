@extends('layout')

@section('content')

    <h2>Login</h2>

    <form action="" method="post">
        <input type="text" class="@hasError('username')" value="@getData('username')" name="username" placeholder="Username"> <br>
        @getError('username')
        <input type="password" class="@hasError('password')" name="password" placeholder="Password"> <br>
        @getError('password')
        <button type="submit">Login</button>
    </form>

@endsection