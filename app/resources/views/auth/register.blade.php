@extends('layout')

@section('title', 'Webshop administration')

@section('content')
    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="POST" action="{{ route('register') }}" class="form-horizontal">
                    @csrf
                    <div class="form-group col-sm-9">
                        @include('errors')
                        <p class="">Maak een mentors account aan</p>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-sm-6 control-label">Voornaam</label>
                        <div class="col-sm-10">
                            <input type="text" name="firstname" id="firstname" class="form-control" value="{{ old('firstname') }}" required="required" autofocus="autofocus">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-6 control-label">Achternaam</label>
                        <div class="col-sm-10">
                            <input type="text" name="lastname" id="lastname" class="form-control" value="{{ old('lastname') }}" required="required" autofocus="autofocus">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-6 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}" required="required" autofocus="autofocus">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-6 control-label">Wachtwoord</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" id="password" class="form-control" value="" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="col-sm-6 control-label">Wachtwoord controle</label>
                        <div class="col-sm-10">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="" autocomplete="off">
                        </div>
                    </div>
                    <div class="mt-4 form-group col-sm-9">
                        <a href="{{ route('login') }}">{{ __('Al een account gemaakt?') }}</a>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-dark">{{ __('Registeer') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
