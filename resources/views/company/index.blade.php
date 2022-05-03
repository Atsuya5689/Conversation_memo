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
        <h1>会社名の一覧のページ</h1>
        
        <div class="search">
            <form action="/" method="GET">
                <p><input type="text" name="keyword" value="{{ $keyword }}"></p>
                <p><input type="submit" value="検索"></p>
            </form>
            
            @if($searchedCompany->count())
                @foreach ($searchedCompany as $company)
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
            
            @else
            <p>見つかりませんでした。</p>
            @endif
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
    
        [<a href='/companies/create'>新規登録</a>]
    </body>
    
</html>
@endsection