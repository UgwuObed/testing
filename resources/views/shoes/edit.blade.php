<form action="{{ route('shoes.update', $shoes->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="name">Name</label>
    <input type="text" name="name" value="{{ $shoes->name }}" required>

    <label for="type">Type</label>
    <input type="text" name="type" value="{{ $shoes->type }}" required>

    <label for="color">Color</label>
    <input type="text" name="color" value="{{ $shoes->color }}" required>

    <label for="size">Size</label>
    <input type="text" name="size" value="{{ $shoes->size }}" required>

    <label for="brand">Brand</label>
    <input type="text" name="brand" value="{{ $shoes->brand }}" required>

    <label for="price">Price</label>
    <input type="number" name="price" value="{{ $shoes->price }}" required>

    <label for="description">Description</label>
    <textarea name="description">{{ $shoes->description }}</textarea>

    <label for="image">Image:</label>
    <input type="file" name="image" id="image">

    <label for="category">Category</label>
    <select name="category" required>
        <option value="male" {{ $shoes->category == 'male' ? 'selected' : '' }}>Male</option>
        <option value="female" {{ $shoes->category == 'female' ? 'selected' : '' }}>Female</option>
        <option value="unisex" {{ $shoes->category == 'unisex' ? 'selected' : '' }}>Unisex</option>
    </select>

    <button type="submit">Update Product</button>
</form>
