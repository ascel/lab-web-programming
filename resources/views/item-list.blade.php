@extends('layouts.manage')

@section('content')
    <h3 class="text text-center ">
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
                    Product Category
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
        <div class="col-md-1">
            <div class="card">
                <div class="card-body text-center">
                    Action
                </div>
            </div>
        </div>
    </div>
    @foreach ($items as $item)
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
                        {{ $item->category->name }}
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
            <div class="col-md-1">
                <div class="card">
                    <div class="card-body text-center">
                        <form action="/manage/itemlist/{{ $item->id }}/delete" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach   
@endsection
