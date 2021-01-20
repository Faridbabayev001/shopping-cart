@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">{{\App\Http\Helpers\Basket::getCartCount()}}</span>
            </h4>
            <ul class="list-group mb-3">
                @foreach(\App\Http\Helpers\Basket::get() as $productId => $product)
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{$product['name']}}</h6>
                            <small class="text-muted">Count: {{$product['count']}}  |  Price: {{$product['price']}} AZN</small>
                        </div>
                        <span class="text-muted">{{$product['count'] * $product['price']}} AZN</span>
                    </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (AZN)</span>
                    <strong>{{\App\Http\Helpers\Basket::sumProductPrice()}} AZN</strong>
                </li>
            </ul>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Checkout</h4>
            <form action="{{route('sendOrder')}}" method="post" class="needs-validation" >
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Name</label>
                        <input type="text" class="form-control" id="firstName" name="name" value="{{auth()->user()->name ?? old('name')}}" required="">
                        @error('name')
                            <small  class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="{{auth()->user()->email ?? old('email')}}">
                        @error('email')
                            <small  class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{auth()->user()->address ?? old('address')}}" placeholder="1234 Main St" required="">
                        @error('address')
                            <small  class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="address2">Phone </label>
                        <input type="text" class="form-control" name="phone" id="address2"  value="{{auth()->user()->phone ?? old('phone')}}" >
                        @error('phone')
                            <small  class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="address">Note</label>
                        <textarea name="note" id="" cols="30" class="form-control"  rows="10">{{ old('address')}}</textarea>
                        @error('note')
                            <small  class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>


                <hr class="mb-4">

                <h4 class="mb-3">Payment</h4>

                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="payment_type" type="radio" class="custom-control-input" value="1"  required="">
                        <label class="custom-control-label" for="credit">Online</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debit" name="payment_type" type="radio" class="custom-control-input" value="0" checked required="">
                        <label class="custom-control-label" for="debit">Cash</label>
                    </div>
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
            </form>
        </div>
    </div>
@endsection
