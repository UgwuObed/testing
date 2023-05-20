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
        <!-- Link to edit form -->
<a href="{{ route('clothes.edit', $cloth) }}">Edit</a>

<!-- Delete form -->
<form action="{{ route('clothes.destroy', $cloth) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?')">
    @csrf
    @method('DELETE')

    <button type="submit">Delete</button>
</form>
@endforeach