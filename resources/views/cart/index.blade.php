@extends('layout')
@section('title', 'Cart')
@section('content')
    <link href="css/cart.css" rel="stylesheet" type="text/css" media="all" />


<table id="cart" class="table table-hover table-condensed">
    <thead>
    <tr>
        <th style="width:50%">Product</th>
        <th style="width:10%">Price</th>
        <th style="width:8%">Quantity</th>
        <th style="width:22%" class="text-center">Subtotal</th>
        <th style="width:10%"></th>
    </tr>
    </thead>
    <tbody>

    <?php
        $total = 0
//        $discount = 0
    ?>

    @if(session('cart'))
        @foreach(session('cart') as $id => $data)

            <?php $total += $data['price'] * $data['quantity'] ?>

            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs">
                            <img src="{{$data['path']}}" width="100" height="100" class="img-responsive" alt="product"/></div>
                        <div class="col-sm-9">
                            <h4 class=" text-center">{{ $data['name'] }}</h4>
                        </div>
                    </div>
                </td>

{{--                                    {{ $discount = $data['price'] - ($data['price']*(10/100)) }}--}}

                    <td data-th="Price">{{ $data['price'] }}din</td>

                <td data-th="Quantity">

                    <label>
                        <input type="number" value="{{ $data['quantity']}}" class="form-control quantity" />
                    </label>

                </td>
                @if($data['quantity']>=5)
                <?php $discount = $data['quantity'] * $data['price']- ($data['quantity'] * $data['price'] * (10/100))  ?>
{{--                    {{$discount = $data['price'] - ($data['price']*(10/100))}}--}}
                {{--                    {{ $discount = $data['price'] - ($data['price']*(10/100)) }}--}}

                <td data-th="Subtotal" class="text-center">
                    <span class="text-black-100">{{ $discount }}din </span><br>
                    <span class="text-black-50">{{ $data['price'] * $data['quantity'] }}din</span></td>


                @endif
                @if($data['quantity']<5)
                    <td data-th="Subtotal" class="text-center">
                    <span class="text-black-100">
                        {{ $data['price'] * $data['quantity'] }}din</span></td>
                @endif
                    <td class="actions" data-th="">
                    <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"> Update<i class="fa fa-refresh"></i></button>
                    <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}">Delete<i class="fa fa-trash-o"></i></button>
                </td>

            </tr>


        @endforeach
    @endif

    </tbody>
    <tfoot>
    <tr class="visible-xs">
        <td class="text-center"><strong>Total {{ $total  }}</strong></td>
    </tr>
    <tr>
        <td><a href="{{ url('/shop') }}" class="btn btn-danger"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
        <td colspan="2" class="hidden-xs"></td>
        <td class="hidden-xs text-center"><strong>Total {{ $total }}din</strong></td>
        <td><a href="{{ url('/checkout') }}" class="btn btn-info"><i class="fa fa-angle-left"></i> Checkout</a></td>

    </tr>
{{--    popravi edit & delete   --}}
    </tfoot>

</table>
    <script type="text/javascript">

        $(".update-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ url('update-cart') }}',
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find('.quantity').val()},
                success: function (response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr('data-id')},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

    </script>


{{--@include('cart.script')--}}
@endsection
