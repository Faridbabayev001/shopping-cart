@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-body">
                    <form action="{{route('register')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input type="text" id="name" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{old('name')}}"  autofocus>
                                @error('name')
                                    <small  class="form-text text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                            <div class="col-md-6">
                                <input type="text" id="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{old('address')}}"  autofocus>
                                @error('address')
                                    <small  class="form-text text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">Phone Number</label>
                            <div class="col-md-6">
                                <input type="text" id="phone_number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}"  autofocus>
                                @error('phone')
                                    <small  class="form-text text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div class="col-md-6">
                                <input type="text" id="email_address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}"  autofocus>
                                @error('email')
                                    <small  class="form-text text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" >
                                @error('password')
                                    <small  class="form-text text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
