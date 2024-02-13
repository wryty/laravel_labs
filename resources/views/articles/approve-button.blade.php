<form action="{{ route('articles.approve', $article) }}" method="post" style="display: inline;">
    @csrf
    @method('POST')
    <button type="submit" class="btn btn-{{ $article->approved ? 'danger' : 'success' }} btn-sm float-left">
        {{ $article->approved ? 'Disapprove' : 'Approve' }}
    </button>
</form>