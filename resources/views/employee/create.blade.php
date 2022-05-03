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
        <h1>社員の登録のページ</h1>
        
        <!--登録のためのフォーム-->
        <form action="/users" method="POST">
            @csrf <!--安全性を担保するもの-->
            <div class="title">
                <h2>名前</h2>
                <input type="text" name="user[name]" placeholder="名前"/>
            </div>
            <div class="email">
                <h2>メールアドレス</h2>
                <input type="text" name="user[email]" placeholder="メールアドレス"/>
            </div>
            <div class="password">
                <h2>パスワード</h2>
                <input type="text" name="user[password]" placeholder="パスワード"/>
            </div>
            <div class="company_id">
                <h2>カンパニーID</h2>
                <input type="text" name="user[company_id]" placeholder="カンパニーID(半角数字)"/>
                <select name="user[company_id]">
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach    
                </select>
            </div>
            <div class="gender">
                <h2>性別</h2>
                <input type="text" name="user[gender]" placeholder="性別"/>
            </div>
            <div class="age">
                <h2>年齢</h2>
                <input type="integer" name="user[age]" placeholder="年齢(半角数字)"/>
            </div>
            <input type="submit" value="保存"/>
        </form>
        
        <div class="back">[<a href="/users">back</a>]</div>
    </body>
</html>
@endsection