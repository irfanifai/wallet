@extends('layouts.app')

@section('content')
<div class="row col-12">
    <div class="card col-12">
        <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Transfer</h6h>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('confirm.transfer') }}">
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
                <label>Masukkan alamat email</label>
                <input type="text" class="form-control" name="sender" required placeholder="email">
            </div>

            <button class="btn btn-primary" type="submit">Next</button>
            <button class="btn btn-secondary" type="reset">Reset</button>
        </form>
    </div>

    </div>
</div>
@endsection
