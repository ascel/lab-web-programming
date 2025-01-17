@extends('layouts.manage')

@section('content')
    <h3 class="text-center">Add Category</h3>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body text-center">
                <form action="{{ route('manage.store.category') }}" method="post" autocomplete="off" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Category Name" required>
                        @error('name')
                            <div class="mt-2 text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </form>
            </div>
        </div>
    </div>
@endsection