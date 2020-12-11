@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        Shopping Cart
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            @foreach ($cart as $i)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <img class="img-fluid" src="/storage/{{ $i->item->imageUrl }}" alt="{{ $i->item->name }}">
                                </div>
                                <div class="col-md-7">
                                    <span class="font-weight-bold" style="font-size: 18px">{{ $i->item->name }}</span>
                                    <p class="mt-2" style="font-size: 15px">Product Price : IDR {{ number_format($i->total_price, 0,'.', '.') }}</p>
                                    <p class="mt-2" style="font-size: 12px">Quantity : {{ $i->qty }}</p>
                                    <div class="mt-4">
                                        <form action="/cart/{{ $i->id }}/delete" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                            <a href="/item/add-to-cart/{{ $i->item->id }}" class="btn btn-success ml-1">Edit</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if(App\CartDetail::exists())
            <div class="mt-3">
                <a href="{{ route('checkout') }}" class="btn btn-danger">Checkout</a>
            </div>
        @endif
    </div>
@endsection