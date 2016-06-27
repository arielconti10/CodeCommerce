<h1>List of categories</h1>

<ul>
    @foreach ($categories as $category)
        <li>{{$category->name}}</li>
    @endforeach
</ul>