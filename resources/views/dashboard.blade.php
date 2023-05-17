<form action="{{ route('clothes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="name">Name</label>
    <input type="text" name="name" required>

    <label for="type">Type</label>
    <input type="text" name="type" required>

    <label for="color">Color</label>
    <input type="text" name="color" required>

    <label for="size">Size</label>
    <input type="text" name="size" required>

    <label for="brand">Brand</label>
    <input type="text" name="brand" required>

    <label for="price">Price</label>
    <input type="number" name="price" required>

    <label for="description">Description</label>
    <textarea name="description"></textarea>

     <label for="image">Image:</label>
     <input type="file" name="image" id="image">
     
    <label for="category">Category</label>
        <select name="category" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="unisex">Unisex</option>
    </select>

    <button type="submit">Create Product</button>
</form>

<br>
<form action="{{ route('foods.store') }}" method="POST">
    @csrf

    <label for="name">Name</label>
    <input type="text" name="name" required>

    <label for="type">Type</label>
    <input type="text" name="type" required>


    <label for="size">Quantity</label>
    <input type="text" name="quantity" required>


    <label for="price">Price</label>
    <input type="number" name="price" required>

    <label for="description">Description</label>
    <textarea name="description"></textarea>

     <label for="image">Image:</label>
     <input type="file" name="image" id="image">


    <label for="category">Category</label>
        <select name="category" required>
        <option value="male">Local dish</option>
        <option value="female">Continental dish</option>
        <option value="unisex">International dish</option>
    </select>

    <button type="submit">Create Product</button>
</form>

<br>

<form action="{{ route('shoes.store') }}" method="POST">
    @csrf

    <label for="name">Name</label>
    <input type="text" name="name" required>

    <label for="type">Type</label>
    <input type="text" name="type" required>

    <label for="color">Color</label>
    <input type="text" name="color" required>

    <label for="size">Size</label>
    <input type="text" name="size" required>

    <label for="brand">Brand</label>
    <input type="text" name="brand" required>

    <label for="price">Price</label>
    <input type="number" name="price" required>

    <label for="description">Description</label>
    <textarea name="description"></textarea>

     <label for="image">Image:</label>
     <input type="file" name="image" id="image">

    <label for="category">Category</label>
        <select name="category" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="unisex">Unisex</option>
    </select>

    <button type="submit">Create Product</button>
</form>


