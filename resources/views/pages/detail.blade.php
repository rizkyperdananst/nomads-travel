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
                        <h1>{{ $travel_package->title }}</h1>
                        <p>{{ $travel_package->location }}</p>
                        @if ($travel_package->galleries->count())
                        <div class="gallery">
                            <div class="xzoom-container">
                                <img src="{{ url('storage/galleries/', $travel_package->galleries->first()->image) }}" alt="" class="xzoom" id="xzoom-default" xoriginal="{{ url('storage/galleries/', $travel_package->galleries->first()->image) }}">
                            </div>
                            <div class="xzoom-thumbs">
                                @foreach ($travel_package->galleries as $gallery)
                                <a href="{{ url('storage/galleries/', $gallery->image) }}">
                                    <img src="{{ url('storage/galleries/', $gallery->image) }}" alt="" class="xzoom-gallery" width="128" xpreview="{{ url('storage/galleries/', $gallery->image) }}">
                                </a>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <h2>Tentang Wisata</h2>
                        <p>{!! $travel_package->about !!}</p>
                        <div class="features row">
                            <div class="col-md-4">
                                <img src="" alt="Featured" class="features-image">
                                <div class="description border-end">
                                    <h3>Featured Event</h3>
                                    <p>{{ $travel_package->featured_event }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="" alt="Language" class="features-image">
                                <div class="description border-end">
                                    <h3>Language</h3>
                                    <p>{{ $travel_package->language }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="" alt="Foods" class="features-image">
                                <div class="description border-end">
                                    <h3>Foods</h3>
                                    <p>{{ $travel_package->foods }}</p>
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
                                <td width="50%" class="text-right">{{ \Carbon\Carbon::parse($travel_package->date_start)->format('j F, Y ')}}</td>
                            </tr>
                            <tr>
                                <th width="50%">Duration</th>
                                <td width="50%" class="text-right">{{ $travel_package->duration }}</td>
                            </tr>
                            <tr>
                                <th width="50%">Type</th>
                                <td width="50%" class="text-right">{{ $travel_package->type }}</td>
                            </tr>
                            <tr>
                                <th width="50%">Price</th>
                                <td width="50%" class="text-right">${{ $travel_package->price }},00 / person</td>
                            </tr>
                        </table>
                    </div>
                    <div class="join-container">
                        @auth
                        <form action="" method="POST">
                            @csrf
                            <button class="btn d-block btn-join-now mt-3 py-2"  type="submit" >
                                Join Now
                            </button>
                        </form>
                        @endauth
                        
                        @guest
                            <a href="{{ route('login') }}" class="btn d-block btn-join-now mt-3 py-2">
                                Login or Register to Join
                            </a>
                        @endguest
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