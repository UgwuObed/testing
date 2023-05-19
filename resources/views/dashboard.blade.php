<br><br><br>
<h1> Add Clothes products</h1>
<br><br><br>
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
<br><br>
<ul>
        <li><a href="{{ route('clothes.index') }}">View Clothes Products</a></li>
    </ul>
<br>
<br>
<h1> Add Food products</h1>
<br>
<br>
<form action="{{ route('foods.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="name">Name</label>
    <input type="text" name="name" required>

    <label for="type">Type</label>
    <input type="text" name="type" required>

    <label for="quantity">Quantity</label>
    <input type="text" name="quantity" required>

    <label for="price">Price</label>
    <input type="number" name="price" required>

    <label for="description">Description</label>
    <textarea name="description"></textarea>

    <label for="image">Image:</label>
    <input type="file" name="image" id="image">

    <label for="image2">Image 2:</label>
    <input type="file" name="image2" id="image2">

    <label for="image3">Image 3:</label>
    <input type="file" name="image3" id="image3">

    <label for="category">Category</label>
    <select name="category" required>
        <option value="local dish">Local dish</option>
        <option value="continental dish">Continental dish</option>
        <option value="international dish">International dish</option>
    </select>

    <button type="submit">Create Product</button>
</form>


<br><br><br>
<ul>
        <li><a href="{{ route('foods.index') }}">View Food Products</a></li>
    </ul>
<br><br><br><br><br><br>
<br><br><br>
<h1> Add Shoes products</h1>
<br><br><br>
<form action="{{ route('shoes.store') }}" method="POST"  enctype="multipart/form-data">
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
<br><br><br>
<ul>
        <li><a href="{{ route('shoes.index') }}">View Shoe Products</a></li>
    </ul>
    <br><br><br><br>


