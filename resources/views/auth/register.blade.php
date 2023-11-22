@extends('layouts.auth')

@section('content')

   
    <div class="container mt-9 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary border border-soft">
                    <div class="card-header px-lg-5 bg-transparent" style="display: flex;justify-content: center;">
                         <img alt="BZ" width="200" src="https://www.bazhouse.com/portal/public/assets/images/logo.png">
                    </div>
                    <div class="card-body px-lg-5 py-lg-5 pt-2">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left"style="color: #181a20;font-weight: 600;">{{ __('Name') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus style="border-radius: 10px;border-color: white;">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-12 col-form-label text-md-left"style="color: #181a20;font-weight: 600;">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"style="border-radius: 10px;border-color: white;">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-12 col-form-label text-md-left"style="color: #181a20;font-weight: 600;">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"style="border-radius: 10px;border-color: white;">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-12 col-form-label text-md-left"style="color: #181a20;font-weight: 600;">{{ __('Confirm Password') }}</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" style="border-radius: 10px;border-color: white;">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-12">
                                <button type="submit" class="btn btn-primary" style="background: #113b2e;border-color: #113b2e;    font-size: 18px;border-radius: 10px;width: 100%;">
                                    {{ __('Register') }}
                                </button>
                                <a class="text-gray ml-3 mt-2" href="{{ route('login') }}" style="justify-content: space-around;display: flex;">
                                    Login
                                </a>
                            </div>
                        </div>
                        <div class="text-center">
                                
                                <div class="hr_content mb20"><hr><span class="hr_top_text"></span></div>
                            <div class="d-grid mb10">
                        <button class="ud-btn btn-white" type="button" style="width: 95%;text-align: left;"><i class="fab fa-google"style="padding-right: 90px;"></i> Continue Google</button>
                      </div>
                      <div class="d-grid mb10 mt-2">
                        <button class="ud-btn btn-fb" type="button" style="width: 95%;text-align: left;"><i class="fab fa-facebook-f" style="padding-right: 90px;"></i> Continue Facebook</button>
                      </div>
                      <div class="d-grid mb20 mt-2">
                        <button class="ud-btn btn-apple" type="button" style="width: 95%;text-align: left;"><i class="fab fa-apple"style="padding-right: 90px;"></i> Continue Apple</button>
                      </div>
                            </div>
                    </form>
                    </div>
                </div>
                <div class="row mt-3">

                    <div class="col-6">

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
