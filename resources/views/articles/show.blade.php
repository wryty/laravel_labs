@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                {{ $article->title }}
            </div>
            <div class="card-body">
                {{ $article->content }}
            </div>
            <div class="card-footer">
                Views: {{ $article->views }}
                <span class="float-right">
                    Approved: {{ $article->approved ? 'Yes' : 'No' }}
                </span>
            </div>
            @foreach ($article->likes as $user)
                <p>{{$user->email}} - Like</p>
            @endforeach
        </div>
    </div>
@endsection
