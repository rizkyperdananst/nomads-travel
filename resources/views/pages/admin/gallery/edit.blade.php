@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Galleri</h1>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('gallery.update', $g->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="travel_package_id" class="form-label">Paket Travel</label>
                                <select name="travel_package_id" id="travel_package_id" class="form-select @error('travel_package_id') is-invalid @enderror">
                                    <option selected hidden>Pilih Paket Travel</option>
                                    @foreach ($travel_packages as $tp)
                                        @if ($g->travel_package_id == $tp->id)
                                            <option value="{{ $tp->id }}" selected>{{ $tp->title }}</option>
                                        @else
                                            <option value="{{ $tp->id }}">{{ $tp->title }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('travel_package_id')
                                    <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
                                @error('image')
                                    <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary float-end">Ubah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection