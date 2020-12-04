@extends('layouts.manage')

@section('content')
    <h3 class="text-center">Add Category</h3>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body text-center">
                <form action="{{ route('manage.store.category') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Category Name">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </form>
            </div>
        </div>
    </div>
@endsection