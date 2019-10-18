@extends('layouts.app')

@section('content')
<div class="row col-12">
    <div class="card col-12">
        <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Deposit</h6h>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('deposit.store') }}">
            @csrf

            @if (session('status'))
                <div class="col-6 alert alert-info alert-dismissible fade show mt-5">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                    </button>
                </div>
            @endif


            <div class="form-group col">
                <label>Isi Deposit</label>
                <input type="number" class="form-control @error('deposit') is-invalid @enderror" name="value" id="deposit" value="{{ old('deposit') }}" required placeholder="deposit">
            </div>

            <button class="btn btn-primary" type="submit">Isi Saldo</button>
            <button class="btn btn-secondary" type="reset">Reset</button>
        </form>
    </div>

    </div>
</div>
@endsection
