<h1>Clothes Products</h1>

@foreach ($clothes as $cloth)
    <div>
        <h3>{{ $cloth->name }}</h3>
        <p>Type: {{ $cloth->type }}</p>
        <p>Color: {{ $cloth->color }}</p>
        <p>Size: {{ $cloth->size }}</p>
        <p>Brand: {{ $cloth->brand }}</p>
        <p>Price: {{ $cloth->price }}</p>
        <p>Description: {{ $cloth->description }}</p>
        <p>Category: {{ $cloth->category }}</p>
        <img src="{{ asset('images/' . $cloth->image_url) }}" alt="cloth Image" width="200">
    </div>
    <hr>
@endforeach