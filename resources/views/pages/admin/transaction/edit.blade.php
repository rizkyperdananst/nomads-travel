@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Transaksi</h1>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('transaction.update', $transaction->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="transaction_status" class="form-label">Status Transaksi</label>
                                <select name="transaction_status" id="transaction_status" class="form-select @error('transaction_status') is-invalid @enderror">
                                    <option selected hidden>Pilih Status Transaksi</option>
                                    @foreach ($transactionStatus as $ts)
                                        @if ($transaction->transaction_status == $ts)
                                            <option value="{{ $ts }}" selected>{{ $ts }}</option>
                                        @else
                                            <option value="{{ $ts }}">{{ $ts }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('transaction_status')
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