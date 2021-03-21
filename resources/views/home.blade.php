@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/products/create" class="btn btn-primary">Add Product</a>
                    <hr>
                    <h3>Your Products</h3>
                    @if(count($products) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($products as $product)
                            <tr>
                                <th>{{$product->title}}</th>
                                <th><a href="/products/{{$product->id}}/edit" class="btn btn-outline-success me-2">Edit</a>
                                {!!Form::open(['action' => ['App\Http\Controllers\ProductsController@destroy', $product->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger' ])}}
                                {!!Form::close()!!}
                                </th>
                                <th></th>
                                <th></th>
                            </tr>
                            @endforeach
                        </table>
                        @else
                        <p> You have not added any Prducts. To add products click Add Product.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
