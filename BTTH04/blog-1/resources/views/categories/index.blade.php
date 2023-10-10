@foreach($categories as $category)
    <p>{{ $category->name . " " . $category->description}}</p>
@endforeach
