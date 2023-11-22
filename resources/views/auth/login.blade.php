@extends('layouts.auth')

@section('content')

   
    <div class="container mt-9 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary border border-soft">
                    <div class="card-header px-lg-5 bg-transparent" style="display: flex;justify-content: center;">
                       <img alt="BZ" width="200" src="https://www.bazhouse.com/portal/public/assets/images/logo.png">
                        @include('flash::message')
                    </div>
                    
                    <div class="card-body px-lg-5 py-lg-5 pt-2">
                        
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label class="form-label fw600 dark-color"style="color: #181a20;font-weight: 600;">Email</label>
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input id="email" type="email" value="admin@email.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label fw600 dark-color"style="color: #181a20;font-weight: 600;">Password</label>
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input id="password" type="password" value="secret" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror                                </div>
                            </div>
                            <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input" id=" customCheckLogin"  name="remember" {{ old('remember') ? 'checked' : '' }} type="checkbox">
                                <label class="custom-control-label" for=" customCheckLogin">
                                    <span style="font-weight: 500;color: #181a20 !important;">Remember me</span>
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4" style="background: #113b2e;border-color: #113b2e;    font-size: 18px;border-radius: 10px;width: 95%;">Login<i class="fal fa-arrow-right-long"></i></button>
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
                            <!--<div class="form-group mt-4 mb-0">-->
                                
                            <!--</div>-->
                            
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        @if (Route::has('password.request'))
                            <a class="text-gray" href="{{ route('password.request') }}" style="font-weight: 500;color: #181a20 !important;">
                                Forgot Your Password?
                            </a>
                        @endif
                    </div>
                    <div class="col-6 text-right">
                        @if (Route::has('register'))
                            <a class="text-gray" href="{{ route('register') }}" style="font-weight: 500;color: #181a20 !important;">
                                Create new account
                            </a>
                        @endif
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection
