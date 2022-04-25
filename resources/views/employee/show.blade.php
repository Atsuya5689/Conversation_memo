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
        <h1 class="name">
            {{ $user->name }}
        </h1>
        
        <div class="content">
            <div class="content_user">
                <h3>グループ名</h3>
                <p>{{ $user->company_id}}</p>
                <h3>性別</h3>
                <p>{{ $user->gender }}</p>
                <h3>年齢</h3>
                <p>{{ $user->age }}</p>
                
                <p class="edit">
                    [<a href="/users/{{ $user->id }}/edit">編集</a>]
                </p>
                

            </div>
        </div>
        
        <div class=footer>
            <a href="/companies/{{ $company->id }}">戻る</a>
        </div>
    </body>
</html>
@endsection