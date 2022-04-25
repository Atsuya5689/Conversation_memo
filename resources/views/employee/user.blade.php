@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">


    </head>
    <body>
        <h1>社員の一覧のページ</h1>
        <div class='users'>
            @foreach ($users as $user)
            <div class='user'>
                <h2 class='title'>          
                    <a href="/talks">{{ $user->name }}</a>
                    <a href="/users/{{ $talk->user->id }}">{{ $user->name }}</a>
                    <a href="/users/{{ $user->id }}">プロフィール</a>
                </h2>
            </div>
            
                <form action="/users/{{ $user->id }}" id="form_{{ $user->id }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">delete</button>
                </form>
            @endforeach
        </div>
        
        [<a href='/users/create'>新規登録</a>]
    </body>
</html>
@endsection