@extends('layouts.app')

@section('content')

    <div class="container justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-white text-center">
                <img style="width: 500px; object-fit: cover; object-position: center;" src="/storage/{{ $item->imageUrl }}" alt="{{ $item->name }}">
            </div>
            <div class="col-md-4 justify-content-center" style="background-color: lightgrey">
                <div class="container p-3">
                    <div class="row">
                        <div class="col font-weight-bold">
                            {{ $item->name }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            Price : IDR. 
                            <span class="font-weight-bold" style="color: orange">
                                {{ number_format($item->price, 0,'.', '.') }}
                            </span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            Description : {{ $item->description }}
                        </div>
                    </div>
                </div>
                <div class="container">
                    <label for="quantity">Quantity : </label>
                    <input class="text-body btn btn-outline-primary bg bg-white" type="number" id="quantity" name="quantity" min="1" max="100" value="1">
                </div>
                <div class="container mt-2">
                    <a href="#" class="btn btn-success">Add To Cart</a>
                </div>
            </div>
        </div>
    </div>
    
@endsection