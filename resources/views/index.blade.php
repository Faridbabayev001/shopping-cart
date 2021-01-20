@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach($products as $product)
            <div class="col-12 col-sm-8 col-md-6 col-lg-3 mt-3">
                <div class="card">
                    <img class="card-img" src="{{$product->image}}" alt="Vans">
                    <div class="card-body">
                        <h4 class="card-title">{{$product->name ?? ''}}</h4>
                        <div class="buy d-flex justify-content-between align-items-center">
                            <div class="price text-success"><h5 class="mt-4">{{$product->price ?? ''}} AZN</h5></div>
                            <a href="#" class="btn btn-danger mt-3"> Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
