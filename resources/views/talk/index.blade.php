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
        <h1>
           {{ $user->name }}の会話一覧
        </h1>
        
        <p>{{ $talks }}</p>
        
        <div class="body">
            
            @foreach($talks as $talk)
            <div class="talk">
                <h2>
                    {{ $talk->body }}
                </h2>
            </div>
            
            @endforeach
        </div>
        
        <div class="text">
            <form action="/talks/{{ $user }}" method="POST">
                @csrf
                <div class="content">
                    <h2>テキストを入力</h2>
                    <input type="text" name="talk[]" placeholder="会話を入力してください">
                </div>
                <div class="who">
                    
                </div>
            </form>
        </div>
        
        
        
        {{--<!--<div class="body">これは無し-->
        <!--    urlパラメータが取得できているかの検査-->
        <!--    <p>{{ $users }}</p>-->
            
        <!--    @foreach($talks as $talk)-->
            <!--@if($talk->from_user_id==8 || $talk->to_user_id==8)-->
            <!--<div class="talk">-->
            <!--    <h2>-->
            <!--        {{ $talk->body }}-->
            <!--    </h2>-->
            <!--</div>-->
            <!--@endif-->
            <!--@endforeach-->
        <!--</div>-->--}}
    </body>
    
</html>
@endsection