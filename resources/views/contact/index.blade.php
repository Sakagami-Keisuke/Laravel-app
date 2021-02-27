@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    Contact　Index Welcome!
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection