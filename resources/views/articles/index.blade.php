@extends('layouts.app')

@section('content')
@include('articles.search-form')
    <div class="container">
        <div class="row">
            @foreach ($articles as $article)
                @include('articles.article-card', ['article' => $article])
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $articles->links() }}
        </div>
    </div>
@endsection
