@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>
                            <div class="card-body">
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="container mt-3">
        <div class="row justify-content-center">
            @foreach ($items as $item)
                <div class="col-md-3">
                    <div class="card">
                        <a href="/item/{{ $item->id }}" class="card-header text-success">{{ $item->name }}</a>
                        <div class="card-body">
                            <img src="{{ $item->imageUrl }}" alt="{{ $item->imageUrl }}" class="img-fluid">
                            <div class="container mt-3">
                                <div id="numbers">{{ "IDR " . number_format($item->price, 0,'.', '.') }}</div>
                                <a href="/item/{{ $item->id }}" class="btn btn-success">Product Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="pagination justify-content-center mt-3">
        {{ $items }}
    </div>
@endsection
