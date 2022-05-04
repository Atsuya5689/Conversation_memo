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
        <link rel="stylesheet" type="text/css" href="{{asset('css/talk_index.css')}}">
        {{--laravelではcssを読み込むときにassetを使い、{{}}で囲むように書くことが推奨されている。--}}
       
        
    </head>
    <body>
        
        <div class="back">
            <a href="/companies/{{ $user->company_id }}">戻る</a>
        </div>
        
        <div class="contents">
            
            <h1 class="title">
                {{ $user->name }}との会話
            </h1>
            
    
            <div class="messages" >
                <div id="scroll-inner">
                    <!--{{ $searchedTalks }}-->
                    @foreach($searchedTalks as $talk)
                        @if($talk->from_user_id === $myId->id)
                            <div class="talk-right">
                                    {{ $talk->body }}
                            </div>
                        @else
                            <div class="talk">
                                    {{ $talk->body }}
                            </div>
                        @endif
                    @endforeach
                    {{--<div class='paginate'>
                        {{ $searchedTalks->links() }}
                    </div>--}}
                </div>
            </div>
        
          
            
            <form class="search" action="/talks/{{ $user->id }}" method="GET">
                
                {{--<select name="talk">
                        @foreach($talks as $talk)
                            <option value="{{ $talk->id}}">{{ $talk->created_at }}</option>
                        @endforeach
                </select>--}}
                <div class="date" id="date">
                    <h5>日付/キーワード検索</h5>
                    <select name="date">
                        <option vaule="" selected="selected"></option>
                        @foreach($searchedTalks as $talk)
                        <option name="date" id="date" value="{{ $talk->id }}" placeholder="日付を指定できます">{{ $talk->created_at }}</option>
                        @endforeach
                    </select>
                </div>
                
                <p class="search-box"><input type="text" name="keyword" value="{{ $keyword }}" placeholder="検索ワードを入力">
                <input type="submit" value="検索"></p>
            </form>
            
            <div class="text">
            
                <form action="/talks/{{ $user->id }}" method="POST">
                    @csrf
                
                    <div class="who">
                        <h2>slect speaker</h2>
                            {{--<select name="talk[from_user_id]">
                                @foreach($users as $user)
                                    <option value="{{ $user->id}}">{{ $user->name }}</option>
                                @endforeach
                            </select>--}}
                            <p>相手<input type="radio" name="talk[from_user_id]" value="{{ $user->id }}" checked>
                            &nbsp;&nbsp;<!--空白のコード！！！！！！！！！！！！！！！！！！！！！！！！！！！！！-->
                            自分<input type="radio" name="talk[from_user_id]" value="{{ $myId->id }}" checked></p>          
                            {{--<h2>聞き手</h2>
                            <select name="talk[to_user_id]">
                                @foreach($users as $user)
                                    <option value="{{ $user->id}}">{{ $user->name }}</option>
                                @endforeach
                            </select>--}}
                    </div>
                
                    <div class="content">
                        <!--<h2>テキストを入力</h2>-->
                        <!--<input type="text" name="talk[body]" placeholder="会話を入力してください">-->
                        <input class="write-box" name="talk[body]" placeholder="会話を入力してください"> </input>
                        <div class="content-submit">
                            <input  type="submit" value="保存"/>
                        </div>
                    </div>
                    
                </form>
            </div>
            
        </div>
        
        <footer>
            <div class="footer-title">
            <h5>Personal Conversation</h5>
            </div>
        </footer>
    <div is="script" type="text/javascript" src="{{asset('/js/talk_index.js')}}"></div>    
    </body>
    
</html>
@endsection