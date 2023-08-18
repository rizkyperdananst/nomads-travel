@extends('layouts.app')
@section('title', 'Detail Travel')
    
@section('content')
@push('prepend-style')
    <link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css') }}">
@endpush

<main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col p-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Paket Travel</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 ps-lg-0">
                    <div class="card card-details">
                        <h1>Nusa Peninda</h1>
                        <p>Republic of Indonesia Raya</p>
                        <div class="gallery">
                            <div class="xzoom-container">
                                <img src="./frontend/images/populer-3.jpg" alt="" class="xzoom" id="xzoom-default" xoriginal="./frontend/images/populer-3.jpg">
                            </div>
                            <div class="xzoom-thumbs">
                                <a href="./frontend/images/populer-3.jpg">
                                    <img src="./frontend/images/populer-3.jpg" alt="" class="xzoom-gallery" width="128" xpreview="./frontend/images/populer-3.jpg">
                                </a>
                                <a href="./frontend/images/populer-3.jpg">
                                    <img src="./frontend/images/populer-3.jpg" alt="" class="xzoom-gallery" width="128" xpreview="./frontend/images/populer-3.jpg">
                                </a>
                                <a href="./frontend/images/populer-3.jpg">
                                    <img src="./frontend/images/populer-3.jpg" alt="" class="xzoom-gallery" width="128" xpreview="./frontend/images/populer-3.jpg">
                                </a>
                                <a href="./frontend/images/populer-3.jpg">
                                    <img src="./frontend/images/populer-3.jpg" alt="" class="xzoom-gallery" width="128" xpreview="./frontend/images/populer-3.jpg">
                                </a>
                                <a href="./frontend/images/populer-3.jpg">
                                    <img src="./frontend/images/populer-3.jpg" alt="" class="xzoom-gallery" width="128" xpreview="./frontend/images/populer-3.jpg">
                                </a>
                            </div>
                        </div>
                        <h2>Tentang Wisata</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti explicabo nihil ipsam suscipit eum tenetur magnam vitae repellat aperiam, accusamus nostrum sunt laborum doloremque odio quod. Dolorum itaque fugit iure quas! Magni, consequatur nihil ut optio ratione omnis non quae odio doloribus blanditiis facere dolor incidunt quidem architecto? Facilis quis commodi molestiae atque ea possimus ducimus! Aspernatur repudiandae expedita incidunt nobis. Ipsum nam quis veniam autem nesciunt consequatur quidem necessitatibus?</p>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus odio aperiam praesentium dolorem consectetur temporibus, doloremque incidunt eum aspernatur qui. Minima assumenda quas sequi accusamus molestias, quasi excepturi aperiam inventore ex adipisci dolorum, repudiandae similique, sint officiis aliquid quibusdam consequuntur.</p>
                        <div class="features row">
                            <div class="col-md-4">
                                <img src="" alt="Featured" class="features-image">
                                <div class="description border-end">
                                    <h3>Featured Event</h3>
                                    <p>Tari Kecak</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="" alt="Language" class="features-image">
                                <div class="description border-end">
                                    <h3>Language</h3>
                                    <p>Bahasa Indonesia</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="" alt="Foods" class="features-image">
                                <div class="description border-end">
                                    <h3>Foods</h3>
                                    <p>Local Foods</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Members are going</h2>
                        <div class="members my-2">
                            <img src="./frontend/images/populer-3.jpg" alt="User" class="member-image me-1 rounded-circle">
                            <img src="./frontend/images/populer-1.jpg" alt="User" class="member-image me-1 rounded-circle">
                            <img src="./frontend/images/populer-2.jpg" alt="User" class="member-image me-1 rounded-circle">
                            <img src="./frontend/images/populer-4.jpg" alt="User" class="member-image me-1 rounded-circle">
                        </div>
                        <hr>
                        <h2>Trip Informations</h2>
                        <table class="trip-informations">
                            <tr>
                                <th width="50%">Date of Departure</th>
                                <td width="50%" class="text-right">22 Aug, 2019</td>
                            </tr>
                            <tr>
                                <th width="50%">Duration</th>
                                <td width="50%" class="text-right">4D 3N</td>
                            </tr>
                            <tr>
                                <th width="50%">Type</th>
                                <td width="50%" class="text-right">Open Trip</td>
                            </tr>
                            <tr>
                                <th width="50%">Price</th>
                                <td width="50%" class="text-right">$80,00 / person</td>
                            </tr>
                        </table>
                    </div>
                    <div class="join-container">
                        <a href="{{ route('checkout') }}" class="btn d-block btn-join-now mt-3 py-2">
                            Join Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@push('script')
<script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.xzoom, .xzoom-gallery').xzoom({
            zoomWidth: 500,
            title: false,
            tint: '#333',
            Xoffset: 15
        });
    });
</script>
@endpush
@endsection