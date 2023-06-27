@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container p-3 rounded" style="width:500px; background-color: rgb(229 231 235);">

        <div class="h4 text-primary text-center mb-5">{{ __('Reset Password') }}</div>


        @if(session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-3">
                <!-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> -->

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="d-grid d-block mb-2">

                    <button type="submit" class="btn btn-primary">
                        {{ __('Reset') }}
                    </button>

            </div>
        </form>
    </div>
</div>
@endsection
