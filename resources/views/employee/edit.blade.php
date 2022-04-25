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
        <h1>社員の編集のページ</h1>
        
        <!--登録のためのフォーム-->
        <form action="/users/{{ $user->id }}" method="POST">
            @csrf <!--安全性を担保するもの-->
            @method('PUT')<!--編集処理を実行するときはPUT-->
            <div class="title">
                <h2>名前</h2>
                <input type="text" name="user[name]" value="{{ $user->name }}"/>
            </div>
            <div class="email">
                <h2>メールアドレス</h2>
                <input type="text" name="user[email]" value="{{ $user->email }}"/>
            </div>
            <div class="password">
                <h2>パスワード</h2>
                <input type="text" name="user[password]" value="{{ $user->password }}"/>
            </div>
            <div class="company_id">
                <h2>グループID</h2>
                <input type="text" name="user[company_id]" value="{{ $user->company_id }}"/>
            </div>
            <div class="gender">
                <h2>性別</h2>
                <input type="text" name="user[gender]" value="{{ $user->gender }}"/>
            </div>
            <div class="age">
                <h2>年齢</h2>
                <input type="integer" name="user[age]" value="{{ $user->age }}"/>
            </div>
            <input type="submit" value="保存"/>
        </form>
        
        <div class="back">[<a href="/users">back</a>]</div>
    </body>
</html>
@endsection