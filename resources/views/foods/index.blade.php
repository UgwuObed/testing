
    <h1>Food Products</h1>

    @foreach ($foods as $food)
        <div>
            <h3>{{ $food->name }}</h3>
            <p>Type: {{ $food->type }}</p>
            <p>Quantity: {{ $food->quantity }}</p>
            <p>Price: {{ $food->price }}</p>
            <p>Description: {{ $food->description }}</p>
            <p>Category: {{ $food->category }}</p>
            <img src="{{ asset('images/' . $food->image_url) }}" alt="Food Image" width="200">
        </div>
        <hr>
    

    <!-- Link to edit form -->
<a href="{{ route('foods.edit', $food) }}">Edit</a>

<!-- Delete form -->
<form action="{{ route('foods.destroy', $food) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this food item?')">
    @csrf
    @method('DELETE')

    <button type="submit">Delete</button>
</form>
@endforeach