@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2><div class="card-header">ようこそ</div></h2>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <h3>You are logged in!</h3>
                    <br>
                    <!-- <a href="{{ route('contact.index') }}">一覧へ</a> -->
                    <button type="button" onclick="window.location='{{ url("contact/index") }}'" class="btn btn-primary mt-2">
                        一覧ページへ
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection