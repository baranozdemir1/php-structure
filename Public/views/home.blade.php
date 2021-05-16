@extends('layout')

@section('title', 'HomePage')

@section('content')
    <form action="" method="post">
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
@endsection

