
<h1>Shoes Products</h1>

@foreach ($shoes as $shoe)
    <div>
        <h3>{{ $shoe->name }}</h3>
        <p>Type: {{ $shoe->type }}</p>
        <p>Color: {{ $shoe->color }}</p>
        <p>Size: {{ $shoe->size }}</p>
        <p>Brand: {{ $shoe->brand }}</p>
        <p>Price: {{ $shoe->price }}</p>
        <p>Description: {{ $shoe->description }}</p>
        <p>Category: {{ $shoe->category }}</p>
        <img src="{{ asset('images/' . $shoe->image_url) }}" alt="shoe Image" width="200">
    </div>
    <hr>
            <!-- Link to edit form -->
<a href="{{ route('shoes.edit', $shoe) }}">Edit</a>

<!-- Delete form -->
<form action="{{ route('shoes.destroy', $shoe) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?')">
    @csrf
    @method('DELETE')

    <button type="submit">Delete</button>
</form>
@endforeach
