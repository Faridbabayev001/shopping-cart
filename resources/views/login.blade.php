@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form action="{{route('login')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div class="col-md-6">
                                <input type="text" id="email_address" class="form-control @error('email') is-invalid @enderror" name="email" autofocus>
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
                                <input type="password" id="password" class="form-control  @error('password') is-invalid @enderror" name="password">
                                @error('password')
                                    <small  class="form-text text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        @error('errorMessage')
                            <small  class="form-text text-danger text-center">
                                {{$message}}
                            </small>
                        @enderror
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
