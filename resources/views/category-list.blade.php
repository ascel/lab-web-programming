@extends('layouts.manage')

@section('content')
    <h3 class="text-center">Category</h3>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($categories as $category)
                <div class="card">
                    <div class="card-body text-center" style="padding: 10px">{{ $category->name }}</div>
                </div>
            @endforeach
        </div>
    </div>
@endsection