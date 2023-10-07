@extends('layouts.auth')

@section('content')

    <div class="content" style="margin: auto">
        <div class="header-content">
            <h3 style="margin: auto">Login</h3>
        </div>

        <div class="body-content">
            <form method="POST" action="{{ route('login') }}">

                @csrf

                <div class="form-group">

                    <div class="col-md-12" style="margin-bottom: 10px;">
                        <label style="color: #4F2A49">Email</label>
                        <input id="email" name="email" class="form-control" type="email" required>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-12" style="margin-bottom: 10px;">
                        <label style="color: #4F2A49">Password</label>
                        <input id="password" name="password" class="form-control" type="password" required>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-12" style="text-align: center;">
                        @if (Route::has('password.request'))
                            <a style="color: #4F2A49" href="{{ route('password.request') }}" >
                                Forgot your password?
                            </a>
                        @endif
                    </div>

                    <!-- <div class="col-md-12" style="align-items: center">
                        <button type="submit" class="button">
                            {{ __('Login') }}
                        </button>
                    </div> -->

                    <div style="text-align: center; margin-bottom: -15px; margin-top: 10px">
                        <button class="button button-form col-md-3 col-sm-12" type="submit">Login</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
@endsection
