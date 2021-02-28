@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2><div class="card-header">ダッシュボード/show</div></h2>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <br>
                    {{ $contact->your_name}}<br>
                    {{ $contact->title}}<br>
                    {{ $contact->email}}<br>
                    {{ $contact->url}}<br>
                    {{ $age}}<br>
                    {{ $gender}}<br>
                    {{ $contact->created_at}}<br>
                    <form method="GET" action="{{ route('contact.edit', ['id'=>$contact->id]) }}">
                        @csrf
                        <input class="btn btn-info" type="submit" value="編集する">
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