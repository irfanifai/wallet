@extends('layouts.app')

@section('content')
<h1 class="h3 mb-0 text-gray-800 mb-4">History</h1>
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
