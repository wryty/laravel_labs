<li>
    <strong>{{ $comment->author }}</strong>
    <p>{{ $comment->text }}</p>
    <small>{{ $comment->created_at->format('d.m.Y H:i') }}</small>

    <form action="{{ route('comment.reply', ['productId' => $product->id, 'parentId' => $comment->id]) }}" method="post">
        @csrf
        <textarea name="text" rows="4" cols="50"></textarea>
        <button type="submit">Ответить</button>
    </form>

    @if($comment->replies->count() > 0)
        <ul>
            @foreach($comment->replies as $reply)
                @include('partials.comment', ['comment' => $reply])
            @endforeach
        </ul>
    @endif
</li>
