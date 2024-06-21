@extends('layouts.success')
@section('title', 'Checkout Failed')

@section('content')
<main>
    <section class="section-success d-flex align-items-center">
        <div class="col text-center">
            <img src="{{ url('frontend/images/success-checkout.png') }}" alt="Success Checkout Image">
            <h1>Opps! Failed</h1>
            <p>
                Your transaction is failed <br> please try again
            </p>
            <a href="{{ route('home') }}" class="btn btn-home-page mt-3 px-5">
                Home Page
            </a>
        </div>
    </section>
</main>
@endsection