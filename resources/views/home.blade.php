@extends('layouts.app')
@extends('layout')
@section('title', 'Welcome')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header"></div> --}}

                <div class="card-body m-4" align="center">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>@endif
                    @guest
                        @include('auth.login')
                    @else
                            <p>You are logged in!</p>

                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
