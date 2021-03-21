@extends('layouts.app')

@section('content')
    <h1><strong>{{$title}}</strong></h1>
    <li class="list-group-item">
        <form class="container-fluid justify-content-start">
            <a class="btn btn-outline-success me-2" type="button" href="/checkout">E-check</a>
            <a class="btn btn-outline-success me-2" href = "/checkout" type="button">Credit Card</a>
            <a class="btn btn-outline-success me-2" type="button" href="/checkout">Vendors</a>
        </form>
    </li>
    <hr>
    <ul>
        <h1><strong>E-check</strong></h1>
        <p>An eCheck is an electronic version of a paper check that provides different payment processing times and less waste. With an eCheck, money is electronically transferred from the payers checking account and directly deposited to the sellers account, after passing through the ACH network. </p>
        <br></br>
        <h1><strong>Credit Card</strong></h1>
        <p>Explore all of Chase credit card offers for personal use and business. Find the best rewards cards, travel cards, and more. Apply today and start earning rewards and cash back.</p>
        <br>/<br>
        <h1><strong>Payment Vendors</strong></h1>
        <p>If you are currently processing electronic payments or you are looking into doing so in the future, one of the most important things to keep in mind is finding the best payment vendors and service providers to help you process those payments. According to the Payment Card Industry, a payment application is any hardware or software that processes, transmits or stores card data electronically. A few examples of payment applications are card swipe terminals, eCommerce/webstores, and online bill pay portals. </p>
    </ul>
    <br></br>
@endsection
