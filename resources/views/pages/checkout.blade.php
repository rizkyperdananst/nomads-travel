@extends('layouts.checkout')
@section('title', 'Checkout')

@section('content')
@push('prepend-style')
    <link rel="stylesheet" href="{{ url('frontend/libraries/gijgo/css/gijgo.min.css') }}">
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
                            <li class="breadcrumb-item" aria-current="page">Details</li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 ps-lg-0">
                    <div class="card card-details">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h1>Who is going ?</h1>
                        <p>Trip to {{ $transaction->travel_packages->title }}, {{ $transaction->travel_packages->location }}</p>
                        <div class="attendee">
                            <table class="table table-responsive-sm text-center">
                                <thead>
                                    <tr>
                                        <td>Picture</td>
                                        <td>Name</td>
                                        <td>Nationality</td>
                                        <td>Visa</td>
                                        <td>Passport</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transaction->details as $detail)
                                    <tr>
                                        <td>
                                            <img src="https://ui-avatars.com/api/?name{{ $detail->username }}" alt="" width="50" height="50" class="rounded-circle">
                                        </td>
                                        <td class="align-middle">
                                            {{ $detail->username }}
                                        </td>
                                        <td class="align-middle">
                                            {{ $detail->nationality }}
                                        </td>
                                        <td class="align-middle">
                                            {{ $detail->is_visa ? '30 Days' : 'N/A' }}
                                        </td>
                                        <td class="align-middle">
                                            {{ \Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'Inactive' }}
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ route('checkout.remove', $detail->id) }}">
                                                <img src="{{ url('frontend/images/remove.png') }}" width="30" alt="remove">
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No Visitor</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="member mt-5">
                            <h2>Add Member</h2>
                            <form action="{{ route('checkout.create', $transaction->id) }}" method="POST" class="form-inline">
                                @csrf
                                <div class="row mb-2">
                                    <div class="col-md-3">
                                        <input type="text" name="username" class="form-control mb-2 me-sm-2" placeholder="Username" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="nationality" class="form-control mb-2 me-sm-2" placeholder="Nationality" required>
                                    </div>
                                    <div class="col-md-2">
                                        <select name="is_visa" class="form-select mb-2 me-sm-2" required>
                                            <option selected hidden>VISA</option>
                                            <option value="1">30 Days</option>
                                            <option value="0">N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2 me-sm-2">
                                            <input type="text" name="doe_passport" class="form-control datepicker" placeholder="DOE Passport">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-add-now mb-2 px-4 float-end">Add Now</button>
                                    </div>
                                </div>
                            </form>
                            <h3 class="mt-2 mb-0">Note</h3>
                            <p class="disclaimer mb-0">
                                You are only able to invite member that has registered in Nomads.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Checkout Informations</h2>
                        <table class="trip-informations">
                            <tr>
                                <th width="50%">Members</th>
                                <td width="50%" class="text-right">{{ $transaction->details->count() }} person</td>
                            </tr>
                            <tr>
                                <th width="50%">Additional VISA</th>
                                <td width="50%" class="text-right">$ {{ $transaction->additional_visa }},00</td>
                            </tr>
                            <tr>
                                <th width="50%">Trip Price</th>
                                <td width="50%" class="text-right">$ {{ $transaction->travel_packages->price }},00 / person</td>
                            </tr>
                            <tr>
                                <th width="50%">Sub Total</th>
                                <td width="50%" class="text-right">$ {{ $transaction->transaction_total }},00</td>
                            </tr>
                            <tr>
                                <th width="50%">Total (+Unique)</th>
                                <td width="50%" class="text-right text-total">
                                    <span class="text-blue">$ {{ $transaction->transaction_total }},</span>
                                    <span class="text-orange">{{ mt_rand(0, 99) }}</span>
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <h2>Payment Instruction</h2>
                        <p class="payment-instructions">
                            Please complete your payment before to continue the wonderful trip
                        </p>
                        <div class="bank">
                            <div class="bank-item pb-3">
                                <img src="./frontend/images/bank-1.png" alt="bank" class="bank-image">
                                <div class="description">
                                    <h3>PT Nomads ID</h3>
                                    <p>0881 8829 8800 <br> Bank Central Asia</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="bank-item pb-3">
                                <img src="./frontend/images/bank-1.png" alt="bank" class="bank-image">
                                <div class="description">
                                    <h3>PT Nomads ID</h3>
                                    <p>0881 8752 8782 <br> Bank HSBC</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="join-container">
                        <a href="{{ route('checkout.success', $transaction->id) }}" class="btn d-block btn-join-now mt-3 py-2">
                            I Have Made Payment
                        </a>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('detail', $transaction->travel_packages->slug) }}" class="text-muted">
                            Cancel Booking
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@push('script')
    <script src="{{ url('frontend/libraries/gijgo/js/gijgo.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                uiLibrary: 'bootstrap4',
                icons: {
                    rightIcon: '<img src="{{ url('frontend/images/calendar.png') }}">'
                }
            });
        });
    </script>
@endpush
@endsection