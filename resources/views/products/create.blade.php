@extends ('layouts.app')

@section('content')
    <h1>Create Products</h1>
    {!! Form::open(['action' => 'App\Http\Controllers\ProductsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Body'])}}
        </div>
        <div class="form-group">
            {{Form::label('price', 'Price')}}
            {{Form::number('price', '', ['class' => 'form-control', 'placeholder' => 'Price'])}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::submit('Submit',['class' =>'btn btn-primary'])}}
    {!! Form::close() !!}
<hr>
<a href="/products" class="btn btn-outline-success me-2">Back</a>
@endsection
