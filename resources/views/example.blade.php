<h1>Example page</h1>

<h2>List of categories</h2>

<ul>
    @foreach ($categories as $category)
        <li>{{$category->name}}</li>
    @endforeach
</ul>