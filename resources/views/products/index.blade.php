@extends('layouts.app')
@section('content')
    <h1 class="list-group-item"><strong>Bikes</strong></h1>
    @if(count($products) > 0)
        @foreach($products as $product)
            <div class="well">
                <div class="row">
                    <div class="col-md-04 col-sm-4">
                        <img style="width:100%" src="/storage/cover_images/{{$product->cover_image}}">
                    </div>
                    <div class="col-md-08 col-sm-8">
                        <h2><a href="/products/{{$product->id}}">{{$product->title}}</a></h2>
                        <h3>{{$product->body}}</h3>
                        <h3>Rs.{{$product->price}}</h3>
                        <small>Written on{{$product->created_at}} by {{$product->user->name}}</small>
                        <hr>
{{--                        @if(Auth::user()->id != $product->user_id)
                            <a href="/checkout" class="btn btn-outline-success me-2">Add to Cart</a>
                            <a href="/checkout" class="btn btn-outline-success me-2">Buy</a>
                        @endif
                        --}}
                    </div>
                </div>
            </div>
            <hr>
        @endforeach
        <hr>
        {{$products->links()}}
    @else
        <p>No products found</p>
    @endif
@endsection
