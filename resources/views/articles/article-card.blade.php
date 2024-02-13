<div class="col-md-4 mb-4">
    <div class="card">
        <div class="card-header">
            {{ $article->title }}
        </div>
        <div class="card-body">
            {{ $article->description }}
        </div>
        <div class="card-footer">
            Views: {{ $article->views }}
            <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary btn-sm float-right">Read more</a>

            @include('articles.approve-button', ['article' => $article])
        </div>
    </div>
</div>
