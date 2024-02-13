<form action="{{ url('/catalog') }}" method="get">
    <select name="search_field">
        <option value="name">Name</option>
        <option value="price">Price</option>
        <option value="quantity">Quantity</option>
    </select>
    <input type="text" name="search_value" placeholder="Search">
    <button type="submit">Search</button>
</form>
