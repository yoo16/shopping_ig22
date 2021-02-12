@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="h2">Cart</h2>

        <form action="{{ route('cart.updates') }}" method="post">
            @csrf
            @include ('cart.components.index_nav')
            @include ('cart.components.index_item_list')
        </form>

        @include ('cart.components.index_control')
    </div>
@endsection
