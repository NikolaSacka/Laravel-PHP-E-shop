@extends('layout')
@section('title', 'Shop')
@section('content')
    <div class="container">
        <h1>Product successfully added!!</h1>
        <p>
            <a href="/product-add/create">Add product</a><br>
            <a href="/product-add/numOfId/edit">Edit product</a><br>
            Continue to <a href="../shop">Shop</a>
        </p>
    </div>

@endsection
