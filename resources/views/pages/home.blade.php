@extends('layouts.app')
@section('title', 'NOMADS')
    
@section('content')
<!-- Header -->
<header class="text-center">
    <h1>Explore The Beautiful World <br> As Easy One Click</h1>
    <p class="mt-3">You will see beuatiful <br> moment your never see before</p>
    <a href="#" class="btn btn-get-started px-4 mt-4">Get Started</a>
</header>
<!-- Header -->

<!-- Main -->
<main>
    <div class="container">
        <section class="section-stats row justify-content-center" id="stats">
            <div class="col-3 col-md-2 stats-detail">
                <h2>20K</h2>
                <p>Members</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>12</h2>
                <p>Countries</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>3K</h2>
                <p>Hotel</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>72</h2>
                <p>Patners</p>
            </div>
        </section>
    </div>

    <section class="section-populer" id="populer">
        <div class="container">
            <div class="row">
                <div class="col text-center section-populer-heading">
                    <h2>Wisata Populer</h2>
                    <p>Something that you never try
                        <br>
                        before in this world
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-populer-content" id="populer-content">
        <div class="container">
            <div class="section-populer-travel row justify-content-center">
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card-travel text-center d-flex flex-column" style="background-image: url(./frontend/images/populer-1.jpg);">
                        <div class="travel-country">INDONESIA</div>
                        <div class="travel-location">DERATA, BALI</div>
                        <div class="travel-button mt-auto">
                            <a href="details.html" class="btn btn-travel-details px-4">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card-travel text-center d-flex flex-column" style="background-image: url(./frontend/images/populer-2.jpg);">
                        <div class="travel-country">INDONESIA</div>
                        <div class="travel-location">BROMO, MALANG</div>
                        <div class="travel-button mt-auto">
                            <a href="details.html" class="btn btn-travel-details px-4">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card-travel text-center d-flex flex-column" style="background-image: url(./frontend/images/populer-3.jpg);">
                        <div class="travel-country">INDONESIA</div>
                        <div class="travel-location">NUSA PENIDA</div>
                        <div class="travel-button mt-auto">
                            <a href="details.html" class="btn btn-travel-details px-4">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card-travel text-center d-flex flex-column" style="background-image: url(./frontend/images/populer-4.jpg);">
                        <div class="travel-country">MIDDLE EAST</div>
                        <div class="travel-location">DUBAI</div>
                        <div class="travel-button mt-auto">
                            <a href="details.html" class="btn btn-travel-details px-4">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-networks" id="networks">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>Our Networks</h2>
                    <p>Companies are trusted us <br> more than just a trip</p>
                </div>
                <div class="col-md-8">
                    <img src="./frontend/images/logo-partner.png" alt="Patner" class="img-partner">
                </div>
            </div>
        </div>
    </section>

    <section class="section-testimonial-heading" id="testimonial-heading">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2>They Are Loving Us</h2>
                    <p>Moments were giving them <br> the best experience</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-testimonial-content" id="testimonial-content">
        <div class="container">
            <div class="section-popular-travel row justify-content-center">
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img src="./frontend/images/testimonial-1.jpg" alt="User" class="mb-4 rounded-circle">
                            <h3 class="mb-4">Rizky Perdana Nst</h3>
                            <p class="testimonial">
                                "It was glorius and I could not stop to say wohooo for every single moment Dankeeee"
                            </p>
                        </div>
                        <hr>
                        <p class="trip-to mt-2">
                            Trip to Ubud
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img src="./frontend/images/testimonial-1.jpg" alt="User" class="mb-4 rounded-circle">
                            <h3 class="mb-4">Rizky Perdana Nst</h3>
                            <p class="testimonial">
                                "It was glorius and I could not stop to say wohooo for every single moment Dankeeee"
                            </p>
                        </div>
                        <hr>
                        <p class="trip-to mt-2">
                            Trip to Ubud
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img src="./frontend/images/testimonial-1.jpg" alt="User" class="mb-4 rounded-circle">
                            <h3 class="mb-4">Rizky Perdana Nst</h3>
                            <p class="testimonial">
                                "It was glorius and I could not stop to say wohooo for every single moment Dankeeee"
                            </p>
                        </div>
                        <hr>
                        <p class="trip-to mt-2">
                            Trip to Ubud
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">
                        I Need Help
                    </a>      
                    <a href="#" class="btn btn-get-started px-4 mt-4 mx-1">
                        Get Started
                    </a>      
                </div>
            </div>
        </div>
    </section>

</main>
<!-- Main -->
@endsection