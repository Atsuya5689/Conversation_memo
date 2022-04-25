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
        <h1>会社の登録のページ</h1>
        
        <!--登録のためのフォーム-->
        <form action="/companies" method="POST">
            @csrf <!--安全性を担保するもの-->
            <div class="title">
                <h2>会社の名前</h2>
                <input type="text" name="company[name]" placeholder="会社の名前"/>
            </div>
            <input type="submit" value="保存"/>
        </form>
        
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>
@endsection