
<h1>Create new Product</h1>
<form method="POST" action="/product-add">
    @csrf

    <p>
    <label for="name">Name</label>
    <input type="text" name="name" id="name"><br>
    </p>
    @error('name')
    <p>{{$message}}</p>
    @enderror
    <p>
    <label for="description">description</label>
    <input type="text" name="description" id="description"><br>
    </p>
    @error('description')
    <p>{{$message}}</p>
    @enderror
    <p>
    <label for="path">Path</label>
    <input type="text" name="Path" id="Path"><br>
    </p>
    @error('Path')
    <p>{{$message}}</p>
    @enderror
    <p>
    <label for="price">Price</label>
    <input type="number" name="price" id="price"><br>
    </p>
    @error('price')
    <p>{{$message}}</p>
    @enderror
    <input type="submit">
</form>

