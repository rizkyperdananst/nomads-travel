@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Paket Travel</h1>
    </div>

    {{-- <div class="row mb-2">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div> --}}

    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('travel-package.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}" placeholder="Title">
                                @error('title')
                                    <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" id="location" value="{{ old('location') }}" placeholder="Location">
                                @error('location')
                                    <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="about" class="form-label">About</label>
                                <textarea name="about" class="form-control @error('about') is-invalid @enderror" id="about" cols="30" rows="5" placeholder="About"></textarea>
                                @error('about')
                                    <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="featured_event" class="form-label">Featured Event</label>
                                <input type="text" name="featured_event" class="form-control @error('featured_event') is-invalid @enderror" id="featured_event" value="{{ old('featured_event') }}" placeholder="Featured Event">
                                @error('featured_event')
                                    <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="language" class="form-label">Language</label>
                                <input type="text" name="language" class="form-control @error('language') is-invalid @enderror" id="language" value="{{ old('language') }}" placeholder="Language">
                                @error('language')
                                    <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="foods" class="form-label">Foods</label>
                                <input type="text" name="foods" class="form-control @error('foods') is-invalid @enderror" id="foods" value="{{ old('foods') }}" placeholder="Foods">
                                @error('foods')
                                    <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="departure_date" class="form-label">Departure Date</label>
                                <input type="date" name="departure_date" class="form-control @error('departure_date') is-invalid @enderror" id="departure_date" value="{{ old('departure_date') }}" placeholder="Departure Date">
                                @error('departure_date')
                                    <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="duration" class="form-label">Duration</label>
                                <input type="text" name="duration" class="form-control @error('duration') is-invalid @enderror" id="duration" value="{{ old('duration') }}" placeholder="Duration">
                                @error('duration')
                                    <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="type" class="form-label">Type</label>
                                <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" id="type" value="{{ old('type') }}" placeholder="Type">
                                @error('type')
                                    <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" id="price" value="{{ old('price') }}" placeholder="Price">
                                @error('price')
                                    <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary float-end">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection