<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
<h1>Edit new Product</h1>
<form method="POST" action="/product-add/{{$productadd->id}}">
    @csrf
    @method('PUT')
    <p>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{$productadd->name}}"><br>
    </p>
    @error('name')
    <p>{{$message}}</p>
    @enderror

    <p>
        <label for="description">description</label>
        <input type="text" name="description" id="description" value="{{$productadd->description}}"><br>
    </p>
    @error('description')
    <p>{{$message}}</p>
    @enderror
    <p>
        <label for="path">Path</label>
        <input type="text" name="path" id="path" value="{{$productadd->path}}"><br>
    </p>
    @error('path')
    <p>{{$message}}</p>
    @enderror
    <p>
        <label for="price">Price</label>
        <input type="number" name="price" id="price" value="{{$productadd->price}}"><br>
    </p>
    @error('price')
    <p>{{$message}}</p>
    @enderror
{{--    Update<input type="submit">--}}
    <button type="submit">Update</button>
</form>

</body>
</html>
