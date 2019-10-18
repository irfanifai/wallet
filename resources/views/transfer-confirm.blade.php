@extends('layouts.app')

@section('content')
<div class="row col-12">
    <div class="card col-12">
        <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Transfer</h6h>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('transfer.store') }}">
            @csrf
            <input type="hidden" name="sender_id" value="{{ $sender->id }}">

            @if (session('status'))
                <div class="col-6 alert alert-info alert-dismissible fade show mt-5">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                    </button>
                </div>
            @endif

            <p>Alamat Tujuan Pemilik Account: {{ $sender->name }} </p>
            <p>Saldo yang Tersedia: {{ number_format($balance->amount, 2,',','.') }} </p>
            <div class="form-group col">
                <label>Masukkan jumlah transfer</label>
                <input type="number" class="form-control @error('transfer') is-invalid @enderror" name="value" id="transfer" value="{{ old('transfer') }}" required placeholder="jumlah transfer">
            </div>

            <button class="btn btn-primary" type="submit">Next</button>
            <button class="btn btn-secondary" type="reset">Reset</button>
        </form>
    </div>

    </div>
</div>
@endsection
