@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    Contact Index Welcome!
                    <br>
                    <!-- <a href="{{ route('contact.create') }}">新規登録</a> -->
                    <button type="button" onclick="window.location='{{ url("contact/create") }}'" class="btn btn-primary mt-2">
                        新規作成
                    </button>
                    <br>
                    <!-- <a href="{{ route('home') }}">ホーム</a> -->
                    <button type="button" onclick="window.location='{{ url("home") }}'" class="btn btn-primary mt-2">
                        ホームへ
                    </button>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID:</th>
                                <th scope="col">氏名:</th>
                                <th scope="col">件名:</th>
                                <th scope="col">email:</th>
                                <th scope="col">登録日時:</th>
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
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection