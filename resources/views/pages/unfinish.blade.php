@extends('layouts.success')
@section('title', 'Checkout Unfinish')

@section('content')
<main>
    <section class="section-success d-flex align-items-center">
        <div class="col text-center">
            <img src="{{ url('frontend/images/success-checkout.png') }}" alt="Success Checkout Image">
            <h1>Opps! Unfinish</h1>
            <p>
                Your transaction is unfinish <br> please try again
            </p>
            <a href="{{ route('home') }}" class="btn btn-home-page mt-3 px-5">
                Home Page
            </a>
        </div>
    </section>
</main>
@endsection