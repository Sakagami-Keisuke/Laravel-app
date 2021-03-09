@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2>
                    <div class="card-header">ダッシュボード/index</div>
                </h2>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <br>
                    <!-- <a href="{{ route('contact.create') }}">新規登録</a> -->
                    <button type="button" onclick="window.location='{{ url("contact/create") }}'" class="btn btn-primary mt-2 mb-3">
                        新規作成
                    </button>
                    <!-- <a href="{{ route('home') }}">ホーム</a> -->
                    <button type="button" onclick="window.location='{{ url("home") }}'" class="btn btn-primary mt-2 mb-3 ml-2">
                        ホームへ
                    </button>

                    <!-- 検索フォーム name="search"必須 -->
                    <form class="d-flex" method="GET" action="{{ route('contact.index')}}">
                        <input name="search" class="form-control me-2 col-3 mb-2"  type="search" placeholder="検索フォーム" aria-label="Search">
                        <button class="btn btn-outline-success mb-2 ml-2" type="submit">検索</button>
                    </form>


                    <div>

                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID:</th>
                                <th scope="col">氏名:</th>
                                <th scope="col">件名:</th>
                                <th scope="col">email:</th>
                                <th scope="col">登録日時:</th>
                                <th scope="col">詳細:</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                            <tr>
                                <th>{{ $contact->id}}</th>
                                <td>{{ $contact->your_name}}</td>
                                <td>{{ $contact->title}}</td>
                                <td>{{ $contact->email}}</td>
                                <td>{{ $contact->created_at}}</td>
                                <td>
                                    <a href="{{ route('contact.show', ['id'=> $contact->id]) }}">詳細を見る</a>
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-5 mx-auto">
                            {{ $contacts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection