@extends('layout')
@section('title', 'Shop')
@section('content')
<div id="page" class="container">
{{--    <a href="{{ url('add-to-cart/') }}">Cart</a>--}}
    @foreach($productadd as $item)
    <div class="cloumn5">
        <div class="title text-center">
            <h2>{{$item->name}}</h2>
        </div>
        <img src="{{$item->path}}" width="270" height="320" alt="" />
        <p class="text-center bg-white">Price: {{$item->price}}din</p>
        <a href="{{ url('add-to-cart/'. $item->id) }}" class="button m-auto w-100 text-center ">Put in Cart</a>
{{--        <a href="{{'manclothes'}}" class="button">Wishlist</a>--}}
    </div>
    @endforeach()

</div>

@endsection
