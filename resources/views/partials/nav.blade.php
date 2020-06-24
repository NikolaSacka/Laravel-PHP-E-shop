{{-- <style>
    a{
        {{-- color: beige;
    }

</style> --}}

<div id="wrapper">
    <div id="header-wrapper">
        <div id="header" class="container">
            <div id="logo">
                <h1><a href="/">LeftWear</a></h1>
                <p>Design and make your own brand!</p>
            </div>
            <div id="social">
                <ul class="contact">
                    <li><a href="#" class="icon icon-twitter"><span>Twitter</span></a></li>
                    <li><a href="#" class="icon icon-facebook"><span>Facebook</span></a></li>
                    {{--                    <li><a href="#" class="icon icon-dribbble"><span>Pinterest</span></a></li>--}}
                    <li><a href="#" class="icon icon-youtube"><span>YouTube</span></a></li>
                    <li><a href="#" class="icon icon-instagram"><span>Instagram</span></a></li>
                    <ul>
                        <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">


                                <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="dropdown-item text-white" href="#">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

{{--                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
                                            <a class="dropdown-item text-white" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
{{--                                        </div>--}}
                                    </li><br>
                                @endguest

                            <!-- Cart  -->
                                <a href="{{ url('cart') }}" class="btn btn-primary btn-block">View cart</a>
                                <?php $total = 0 ?>
                                @foreach((array) session('cart') as $id => $data)
                                    <?php $total += $data['price'] * $data['quantity'] ?>
                                @endforeach

                                <div class="col-lg-6 col-sm-6 col-6 total-section text-right dropdown">
                                    <p>Total:<span class="text-white">{{ $total }}din</span></p>
                                </div>

{{--                                @if(session('cart'))--}}
{{--                                    @foreach(session('cart') as $id => $data)--}}
{{--                                        <div class="row cart-detail">--}}
{{--                                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">--}}
{{--                                                --}}{{--<img src="{{ $data['path'] }}" />--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">--}}
{{--                                                <p>{{ $data['name'] }}</p>--}}
{{--                                                <span class="price text-info">${{ $data['price'] }}</span> <span class="count"> Quantity:{{ $data['quantity'] }}</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                @endif--}}


                    </ul>
                </ul>
        </div>
    </div>
        <div id="menu" class="container">
            <ul>
                <li><a href="/" accesskey="1" title="">Homepage</a></li>
                <li><a href="design" accesskey="1" title="">Design</a></li>
                <li><a href="shop" accesskey="2" title="">Shop</a></li>
                <li><a href="about" accesskey="3" title="">About Template</a></li>
                <li><a href="login" accesskey="5" title="">Login</a></li>
            </ul>

        </div>
    </div>
</div>
