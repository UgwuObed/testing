<form action="{{ route('foods.update', $food) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="name">Name</label>
    <input type="text" name="name" value="{{ $food->name }}" required>

    <label for="type">Type</label>
    <input type="text" name="type" value="{{ $food->type }}" required>

    <label for="quantity">Quantity</label>
    <input type="text" name="quantity" value="{{ $food->quantity }}" required>

    <label for="price">Price</label>
    <input type="number" name="price" value="{{ $food->price }}" required>

    <label for="description">Description</label>
    <textarea name="description">{{ $food->description }}</textarea>

    <label for="image">Image:</label>
    <input type="file" name="image" id="image">

    <!-- Add more fields for additional images if needed -->

    <label for="category">Category</label>
    <select name="category" required>
        <option value="local dish" {{ $food->category == 'local dish' ? 'selected' : '' }}>Local dish</option>
        <option value="continental dish" {{ $food->category == 'continental dish' ? 'selected' : '' }}>Continental dish</option>
        <option value="international dish" {{ $food->category == 'international dish' ? 'selected' : '' }}>International dish</option>
    </select>

    <button type="submit">Update Product</button>
</form>
