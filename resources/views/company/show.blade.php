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
        <link rel="stylesheet" type="text/css" href="{{asset('css/company_show.css')}}">
        

    </head>
    <body>
        
        <div class=back>
            <a href="/">戻る</a>
        </div>
        
        <h1 class="name">
            {{ $company->name }}
        </h1>
     
        <div class="content">
            <div class="content-user">
                
                <div class="search-box">
                    <form action="/companies/{{ $company->id }}" method="GET">
                        <p><input type="text" name="keyword" value="{{ $keyword }}">
                        <input type="submit" value="検索"></p>
                    </form>
                </div>
                
                <div class="create">
                    [<a href='/users/{{ $company->id }}/create'>新規登録</a>]
                </div>
                
                @if($searchedUsers->count())
                    @foreach ($searchedUsers as $user)
                        <div class='user'>
                            <!--<h2 class='title'>-->
                                <a href="/talks/{{ $user->id }}">{{ $user->name }}</a>
                                <a href="/users/{{ $user->id }}">プロフィール</a>
                            <!--</h2>-->
                        </div>
                    
                        <form action="/users/{{ $user->id }}" id="form_{{ $user->id }}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit">delete</button>
                        </form>
                    @endforeach 
                @else
                    <p>メンバーを登録してください。</p>
                @endif
        
            </div>
            
        </div>
        
        
    </body>
    
    <footer>
        <div class="footer-title">
        <h5>Personal Conversation</h5>
        </div>
    </footer>
    
</html>
@endsection



{{--<div class="content_user">
            @foreach ($users as $user)
            <div class='user'>
                <h2 class='title'>
                    <a href="/talks/{{ $user->id }}">{{ $user->name }}</a>
                    <a href="/users/{{ $user->id }}">プロフィール</a>
                </h2>
            </div>
            
                <form action="/users/{{ $user->id }}" id="form_{{ $user->id }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">delete</button>
                </form>
            @endforeach    
        
            </div>--}}