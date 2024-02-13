<div class="container mt-4">
    <form action="{{ route('articles.search') }}" method="get" class="mb-4">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Search by title">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>

        <div class="mt-2">
            <label for="criteria">Search Criteria:</label>
            <select name="criteria" id="criteria" class="form-control">
                <option value="views">Views</option>
                <option value="approved">Approved</option>
                <option value="disapproved">Disapproved</option>
                <option value="">Title</option>
            </select>
        </div>
    </form>
</div>