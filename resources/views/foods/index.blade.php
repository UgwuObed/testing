
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
    @endforeach
