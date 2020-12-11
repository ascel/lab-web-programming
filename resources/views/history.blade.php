@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-success">
                        Transaction History
                    </div>
                </div>
            </div>
        </div>
        @foreach ($transactions as $transaction)
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <a href="/history/{{ $transaction->id }}" class="card-body bg-white text-dark">
                            {{ $transaction->created_at }}
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection