@extends('layouts.manage')

@section('content')
    <h3 class="text-center">
        Add Product
    </h3>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body text-center">
                <form action="{{ route('manage.store.item') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Product Name">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="" disabled selected>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="description" class="form-control" placeholder="Product Description">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" id="price" class="form-control" placeholder="Product Price">
                    </div>
                    <div class="form-group">
                        <label for="image">Choose file</label>
                        <div>
                            <input type="file" name="image" id="image">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
            </div>
        </div>
    </div>
@endsection