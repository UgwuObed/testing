<form action="{{ route('clothes.update', $clothes) }}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <label for="name">Name</label>
    <input type="text" name="name" value="{{ $clothes->name }}" required>

    <label for="type">Type</label>
    <input type="text" name="type" value="{{ $clothes->type }}" required>

    <label for="color">Color</label>
    <input type="text" name="color" value="{{ $clothes->color }}" required>

    <label for="size">Size</label>
    <input type="text" name="size" value="{{ $clothes->size }}" required>

    <label for="brand">Brand</label>
    <input type="text" name="brand" value="{{ $clothes->brand }}" required>

    <label for="price">Price</label>
    <input type="number" name="price" value="{{ $clothes->price }}" required>

    <label for="description">Description</label>
    <textarea name="description">{{ $clothes->description }}</textarea>

    <label for="image">Image:</label>
    <input type="file" name="image" id="image">
     
    <label for="category">Category</label>
    <select name="category" required>
        <option value="male" {{ $clothes->category === 'male' ? 'selected' : '' }}>Male</option>
        <option value="female" {{ $clothes->category === 'female' ? 'selected' : '' }}>Female</option>
        <option value="unisex" {{ $clothes->category === 'unisex' ? 'selected' : '' }}>Unisex</option>
    </select>

    <button type="submit">Update Product</button>
</form>
