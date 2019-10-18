@extends('layouts.app')

@section('content')
<!-- Content Row -->
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Saldo Saat Ini</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ number_format($amount, 2,',','.') }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-credit-card fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<h1 class="h3 mb-0 text-gray-800 mb-4">Recent Transactions</h1>
<div class="row text-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-md">
                    <tr>
                        <th>#</th>
                        <th>Type</th>
                        <th>Jumlah</th>
                        <th>Saldo Sebelumnya</th>
                        <th>Saldo Akhir</th>
                    </tr>

                    @foreach($history as $history)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($history->type == "I")
                                <p>Deposit</p>
                            @else
                                <p>Transfer</p>
                            @endif
                        </td>
                        <td>Rp. {{ number_format($history->amount, 2,',','.') }} </td>
                        <td>Rp. {{ number_format($history->total_before, 2,',','.') }} </td>
                        <td>Rp. {{ number_format($history->total_after, 2,',','.') }} </td>       
                    </tr>
                    @endforeach


                </table>
            </div>
        </div>
    </div>
</div>

@endsection
