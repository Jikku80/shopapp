@extends('layouts.app')

@section('content')
    <hr>
    <a href="/products" class="btn btn-outline-success me-2">Back</a>
    @if(Auth::user()->id != $product->user_id)
        <a href="/checkout" class="btn btn-outline-success me-2, 'float-right">Buy</a>
    @endif
    <hr>
    <h1>{{$product->title}}</h1>
   <img style="width:100%" src="/storage/cover_images/{{$product->cover_image}}">
   <br><br>
   <h3>Rs.{{$product->price}}</h3>
   <hr>
   <div>
        {{$product->body}}
    </div>
    <hr>
    <small>Written on {{$product->created_at}} by {{$product->user->name}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $product->user_id)
            <a href="/products/{{$product->id}}/edit" class="btn btn-outline-success me-2">Edit</a>
            {!!Form::open(['action' => ['App\Http\Controllers\ProductsController@destroy', $product->id], 'method' => 'POST', 'class' => 'float-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger' ])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection
