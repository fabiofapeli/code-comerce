<h1>Categories</h1>
<ul>
    @foreach($categories as $category)
        <li>{{$category->id}} - {{$category->name}}</li>
    @endforeach
</ul>
