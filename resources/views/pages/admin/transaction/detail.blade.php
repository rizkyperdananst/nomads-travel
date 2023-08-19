@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Transaksi {{ $transaction->users->name }}</h1>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <table class="table table-hover table-bordered table-responsive">
                        <tr>
                            <th>ID</th>
                            <td>{{ $transaction->id }}</td>
                        </tr>
                        <tr>
                            <th>Paket Travel</th>
                            <td>{{ $transaction->travel_packages->title }}</td>
                        </tr>
                        <tr>
                            <th>Pembeli</th>
                            <td>{{ $transaction->users->name }}</td>
                        </tr>
                        <tr>
                            <th>Additional Visa</th>
                            <td>${{ $transaction->additional_visa }}</td>
                        </tr>
                        <tr>
                            <th>Total Transaksi</th>
                            <td>${{ $transaction->transaction_total }}</td>
                        </tr>
                        <tr>
                            <th>Status Transaksi</th>
                            <td>{{ $transaction->transaction_status }}</td>
                        </tr>
                        <tr>
                            <th>Pembelian</th>
                            <td>
                                <table class="table table-boredered">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Nationality</th>
                                        <th>VISA</th>
                                        <th>DOE Passport</th>
                                    </tr>
                                    @forelse ($transaction->details as $detail)
                                        <tr>
                                            <td>{{ $detail->id }}</td>
                                            <td>{{ $detail->username }}</td>
                                            <td>{{ $detail->nationality }}</td>
                                            <td>{{ $detail->is_visa ? '30 Days' : 'N/A' }}</td>
                                            <td>{{ $detail->doe_passport }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Data Detail Transaksi Kosong</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection