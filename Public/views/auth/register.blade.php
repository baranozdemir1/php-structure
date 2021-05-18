@extends('layout')

@section('content')

    <h2>Register</h2>

    <form action="" method="post">
        <input type="text" class="@hasError('username')" name="username" placeholder="Username"> <br>
        @getError('username')
        <input type="password" class="@hasError('password')" name="password" placeholder="Password"> <br>
        @getError('password')
        <button type="submit">Register</button>
    </form>

@endsection