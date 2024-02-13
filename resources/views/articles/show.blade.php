@extends('layouts.app')

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
        </div>
    </div>
@endsection
