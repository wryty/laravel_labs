<form action="{{ route('articles.like', $article) }}" method="post" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-success btn-sm">Like</button>
</form>