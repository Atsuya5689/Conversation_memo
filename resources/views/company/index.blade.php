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
        <link rel="stylesheet" type="text/css" href="{{asset('css/company_index.css')}}">

    </head>
    <body>
        <div class="contents">
            <h2 class="app-name">Personal Conversation</h2>
            
            <h1 class="title">グループ一覧</h1>
        
            <div class="search">
                <div class="search-box">
                    <form action="/" method="GET" >
                        <p><input class="search-input" type="text" name="keyword" value="{{ $keyword }}">
                        <input type="submit" value="検索"></p>
                    </form>
                </div>
                
                <div class="create">
                    [<a href='/companies/create'>新規登録</a>]
                </div>
                
                @if($searchedCompany->count())
                    @foreach ($searchedCompany as $company)
                    <div class='company'>
                        <!--<p class='title'>{{ $company->name}}</p>-->
                        <a href="/companies/{{ $company->id }}">{{ $company->name }}</a>
                    </div>
                    
                    <div class="delete-button">
                        <form action="/companies/{{ $company->id }}" id="form_{{ $company->id }}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="delete" type="submit">削除</button> 
                        </form>
                    </div>
                    
                @endforeach
                
                @else
                <p>見つかりませんでした。</p>
                @endif
            </div>
        </div>
        
        
        {{--
        <table border="1">
                <tr>
                    <th>company name</th>
                </tr>
                @foreach ($a as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                </tr>
                @endforeach
            </table>
        --}}
        
        {{--<div class='companies'>
            @foreach ($companies as $company)
            <div class='company'>
                <!--<p class='title'>{{ $company->name}}</p>-->
                <a href="/companies/{{ $company->id }}">{{ $company->name }}</a>
            </div>
            
            <form action="/companies/{{ $company->id }}" id="form_{{ $company->id }}" method="post" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">delete</button> 
            </form>
            @endforeach
        </div>--}}
        
         <footer>
            <div class="footer-title">
            <h5>personal conversation</h5>
            </div>
        </footer>
       
    </body>
    
   
    
</html>
@endsection