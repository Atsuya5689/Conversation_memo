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
        

        
        <div class="body">
            <!--{{ $searchedTalks }}-->
            @foreach($searchedTalks as $talk)
            <div class="talk">
                <h7>
                    {{ $talk->body }}
                </h7>
            </div>
            
            @endforeach
        </div>
        
        <div class="text">
            
            <form class="search" action="/talks/{{ $user->id }}" method="GET">
                <p><input type="text" name="keyword" value="{{ $keyword }}" placeholder="検索ワードを入力"></p>
                {{--<select name="talk">
                            @foreach($talks as $talk)
                                <option value="{{ $talk->id}}">{{ $talk->created_at }}</option>
                            @endforeach
                </select>--}}
                <select name="date">
                    <option vaule="" selected="selected"></option>
                    @foreach($searchedTalks as $talk)
                    <option name="date" id="date" value="{{ $talk->id }}" placeholder="日付を指定できます">{{ $talk->created_at }}</option>
                    @endforeach
                </select>
              
                
                <p><input type="submit" value="検索"></p>
            </form>
            
            <form action="/talks/{{ $user->id }}" method="POST">
                @csrf
                
                <div class="who">
                    <h2>誰がしゃべっていますか？</h2>
                        {{--<select name="talk[from_user_id]">
                            @foreach($users as $user)
                                <option value="{{ $user->id}}">{{ $user->name }}</option>
                            @endforeach
                        </select>--}}
                        <p>相手の言葉<input type="radio" name="talk[from_user_id]" value="{{ $user->id }}" checked></p>
                        <p>自分の言葉<input type="radio" name="talk[from_user_id]" value="{{ $myId->id }}" checked></p>          
                        {{--<h2>聞き手</h2>
                        <select name="talk[to_user_id]">
                            @foreach($users as $user)
                                <option value="{{ $user->id}}">{{ $user->name }}</option>
                            @endforeach
                        </select>--}}
                </div>
                
                <div class="content">
                    <h2>テキストを入力</h2>
                    <!--<input type="text" name="talk[body]" placeholder="会話を入力してください">-->
                    <textarea name="talk[body]" placeholder="会話を入力してください"> </textarea>
                </div>
                
                <input type="submit" value="保存"/>
                    
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