@extends('layout')
@section('title', $pageTitle)
@include('partials.navbar')
@section('content')
    <!-- page container area start -->
    <div class="horizontal-main-wrapper">
        <!-- main content area start -->
        @yield('navbar')
        <div class="main-content-inner">
            <div class="row">
                <!-- basic form start -->
                <div class="col-md-6 offset-md-3 pt-4">
                    <div class="card">
                        <div class="card-body">
                            @include('errors')
                            <h4 class="header-title">Voeg een bedrijf toe</h4>
                            <form action="{{ url('/dashboard/company/add') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="email">Email adres</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', '') }}" placeholder="Email adres">
                                </div>
                                <div class="form-group">
                                    <label for="kbo_number">KBO nummer</label>
                                    <input type="text" class="form-control" id="kbo_number" name="kbo_number" value="{{ old('kbo_number', '') }}" aria-describedby="kbo_number" placeholder="KBO nummer">
                                </div>
                                <div class="form-group">
                                    <label for="name">Naam bedrijf</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', '') }}" aria-describedby="name" placeholder="Bedrijfsnaam">
                                </div>
                                <!--<div class="form-group">
                                    <label for="website">Website bedrijf</label>
                                    <input type="text" class="form-control" id="website" name="website" value="{{ old('website', '') }}" aria-describedby="website" placeholder="Website url">
                                </div>-->
                                <div class="form-group">
                                    <label for="password">Wachtwoord</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Wachtwoord bedrijf">
                                </div>
                               <div class="form-group">
                                    <label for="password_confirmation">Wachtwoord control</label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Wachtwoord bedrijf controle">
                                </div>
                                <div class="form-group">
                                    <label for="profile_image">Profielfoto</label>
                                    <input type="file" name="profile_image"/>
                                </div>

                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Voeg bedrijf toe</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- basic form end -->
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2021. All right reserved. <a href="https://odisee.be/">Odisee</a> Technologiecampus.</p>
            </div>
        </footer>
        <!-- footer area end-->
@endsection
