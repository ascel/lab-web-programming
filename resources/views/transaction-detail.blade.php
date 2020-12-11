@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="font-weight-bold" style="font-size: 20px">
            Detail Transaction
        </div>
        @foreach ($details as $i)
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <img class="img-fluid" src="/storage/{{ $i->item->imageUrl }}" alt="{{ $i->item->name }}">
                                </div>
                                <div class="col-md-7">
                                    <span class="font-weight-bold" style="font-size: 18px">{{ $i->item->name }}</span>
                                    <p class="mt-3" style="font-size: 12px">Quantity : {{ $i->qty }}</p>
                                    <p class="mt-2" style="font-size: 15px">Price : IDR {{ number_format($i->total_price, 0,'.', '.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection