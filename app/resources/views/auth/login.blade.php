@extends('layout')

@section('title', 'Webshop administration')

@section('content')
    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--100">
                <form action="{{ route('login')}}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="form-group col-sm-9">
                        @include('errors')
                        <p class="">Login als een mentor of coordinator</p>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}" required="required" autofocus="autofocus">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">Password</label>

                        <div class="col-sm-9">
                            <input type="password" name="password" id="password" class="form-control" value="" autocomplete="off">
                        </div>
                    </div>
                    <div class="mt-4 form-group col-sm-9">
                        <a href="{{ route('register') }}">{{ __('Nog geen mentors account?') }}</a>
                    </div>
                    <div class="form-group col-sm-9">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-dark">{{ __('Login') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
