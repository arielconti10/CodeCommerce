<h1>List of products</h1>

<ul>
    @foreach ($products as $product)
    <li>{{$product->name}}</li>
    @endforeach
</ul>