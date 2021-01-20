@extends('layouts.app')

@section('content')
    <div class="row">
        @for($i=0; $i <10; $i++)
            <div class="col-12 col-sm-8 col-md-6 col-lg-3 mt-3">
                <div class="card">
                    <img class="card-img" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png" alt="Vans">
                    <div class="card-body">
                        <h4 class="card-title">Vans Sk8-Hi MTE Shoes</h4>
                        <div class="buy d-flex justify-content-between align-items-center">
                            <div class="price text-success"><h5 class="mt-4">$125</h5></div>
                            <a href="#" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
@endsection
