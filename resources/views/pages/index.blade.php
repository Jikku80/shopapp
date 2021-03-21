@extends('layouts.app')
@section('content')
    @if(Auth::guest())
    <div class="jumbotron text-center">
        <h1><strong>{{$title}}</strong></h1>
        <p> Welcome to E-Shopping, Get everything You want with a click!!  </p>
        <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-primary btn-lg" href="/register" role="button">Register</a></p>
        <p> if u have a account Login and if you are new to the sire HURRY AND REGISTER NOW!!!</p>
    </div>
    @else
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="first-slide" src="https://i.pinimg.com/originals/f2/a2/e3/f2a2e35c3d5e5d0dffba60d765d62233.jpg" alt="First slide">
                <div class="container">
                    <div class="carousel-caption text-left">
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="second-slide" src="https://www.vividracing.com/images/bmw-s1000rr-199hp-bike.jpg" alt="Second slide">
                <div class="container">
                    <div class="carousel-caption">
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="third-slide" src="https://ducatistore.co.uk/img/ducati/2018-ducati-panigale-v4-1.jpg" alt="Third slide">
                <div class="container">
                    <div class="carousel-caption text-right">
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @forelse($products as $product)
                    <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top" alt="Card image cap" src="/storage/cover_images/{{$product->cover_image}}">
                        <div class="card-body">
                            <del>$ {{$product->price}}</del>
                            <span class="price text-muted float-right">$ {{$product->price}}</span>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{url('/products',$product->id)}}" class="btn btn-sm btn-outline-secondary">View Product</a>
                                    <a href="{{url('/checkout')}}" class="btn btn-sm btn-outline-secondary">Add To Cart <i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <h3>No Products</h3>
                @endforelse
            </div>
        </div>
    </div>

</main>
    @endif
@endsection
