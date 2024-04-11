@extends('layouts.main')

@section('content')
    <div>
        <h2>{{ $product->name }}</h2>
        <p>{{ $product->description }}</p>
        <p>Цена: ${{ $product->price }}</p>
        <p>Количество: {{ $product->quantity }}</p>
    </div>

    <div>
        <h3>Комментарии</h3>
        <ul>
            @foreach($comments as $comment)
                @include('partials.comment', ['comment' => $comment])
            @endforeach
        </ul>
    </div>

    <div>
        <form action="{{ route('comment.add', ['productId' => $product->id]) }}" method="post">
            @csrf
            <textarea name="text" rows="4" cols="50"></textarea>
            <button type="submit">Добавить комментарий</button>
        </form>
    </div>
@endsection
