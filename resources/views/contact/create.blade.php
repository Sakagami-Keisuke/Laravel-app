@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2>
                    <div class="card-header">ダッシュボード/create</div>
                </h2>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <!-- エラー表示 ./resources/lang/ja/validation.php -->
                    @if ($errors->any())
                    <div class="alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>
                                {{ $error}}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('contact.store')}}">
                        @csrf
                        氏名
                        <input type="text" name="your_name" value="{{ old("your_name") }}">
                        <br>
                        件名
                        <input type="text" name="title" value="{{ old("title") }}">
                        <br>
                        メールアドレス
                        <input type="email" name="email" value="{{ old("email") }}">
                        <br>
                        ホームページ
                        <input type="url" name="url" value="{{ old("url") }}">
                        <br>
                        性別
                        <input type="radio" name="gender" value="0" value="{{ old("gender") }}">男性</input>
                        <input type="radio" name="gender" value="1" value="{{ old("gender") }}">女性</input>
                        <br>
                        年齢
                        <select name="age" value="{{ old("age") }}">
                            <option value="">選択してください</option>
                            <option value="1">~19歳</option>
                            <option value="2">20歳~29歳</option>
                            <option value="3">30歳~39歳</option>
                            <option value="4">40歳~49歳</option>
                            <option value="5">50歳~59歳</option>
                            <option value="6">60歳~</option>
                        </select>
                        <br>
                        お問い合わせ内容
                        <textarea name="contact" value="{{ old("contact") }}"></textarea>
                        <br>
                        <input type="checkbox" name="caution" value="1">注意事項に同意する
                        <br>
                        <input class="btn btn-info" type="submit" value="登録する">
                    </form>
                    <!-- <a href="{{ route('contact.index') }}">もどる</a> -->
                    <button type="button" onclick="window.location='{{ url("contact/index") }}'" class="btn btn-primary mt-2">
                        一覧へもどる
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection