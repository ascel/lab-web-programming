@extends('layouts.manage')

@section('content')
    <h3 class="text-center">Category</h3>
    @foreach ($categories as $category)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body justify-content-center text-center" style="padding: 10px">
                        <a href="/manage/categorylist/{{ $category->id }}" class="text-center">{{ $category->name }}</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @if ($products != NULL)
        <h3 class="text text-center mt-3">
            Product
        </h3>
        <div class="row justify-content-center bg-light font-weight-bold">
            <div class="col-md-1">
                <div class="card">
                    <div class="card-body text-center">
                        Product ID
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-body text-center">
                        Product Image
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-body text-center">
                        Product Name
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-body text-center">
                        Product Price
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-body text-center">
                        Product Description
                    </div>
                </div>
            </div>
        </div>
        @foreach ($products as $item)
            <div class="row justify-content-center mt-3">
                <div class="col-md-1">
                    <div class="card">
                        <div class="card-body text-center">
                            {{ $item->id }}
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-body text-center">
                            <img style="height: 200px; object-fit: cover; object-position: center;" src="/storage/{{ $item->imageUrl }}" alt="{{ $item->name }}" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-body text-center">
                            {{ $item->name }}
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-body text-center">
                            {{ "IDR " . number_format($item->price, 0,'.', '.') }}
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-body text-center">
                            {{ $item->description }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach   
    @endif
@endsection