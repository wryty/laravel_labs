@extends('layouts.main')

@section('content')
<a href="{{ route('articles.create') }}" class="btn btn-primary btn-sm float-right">Create article</a>
@foreach ($countries as $country)
    <div class="container">
        <p>Country: {{ $country->country }}</p>
        @foreach ($country->users as $user)
            <p>User: {{ $user->name }}</p>
            <div class="row">
                @foreach ($user->articles as $article)
                    @include('articles.article-card', ['article' => $article])
                @endforeach
            </div>

        @endforeach
    </div>
@endforeach
@endsection
