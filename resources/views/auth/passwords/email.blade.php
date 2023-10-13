@extends('layouts.auth')

@section('content')
    <div class="content" style="margin: auto">

        <div class="header-content">
            <h3 style="margin: auto">Reset Password</h3>
        </div>

        @if (count($errors) > 0 && $errors->has('error'))
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        {{$error}}
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif -->

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="body-content"> 

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">

                    <div class="col-md-12" style="margin-bottom: 10px;">
                        <label style="color: #4F2A49">Email Address</label>
                        <input id="email" name="email" class="form-control" type="email" required>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div style="text-align: center; margin-bottom: -15px; margin-top: 10px">
                        <button class="button button-form col-md-8 col-sm-10" type="submit">Send Password Reset Link</button>
                    </div>

                </div>

            </form>

        </div>

    </div>

<!-- <div class="container" style="margin: auto">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
