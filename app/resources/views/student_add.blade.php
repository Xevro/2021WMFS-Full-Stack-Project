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
                            <h4 class="header-title">Voeg een student toe</h4>
                            <form action="{{ url('/dashboard/student/add') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="email">Email adres</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email', '') }}"  aria-describedby="email" placeholder="Email adres">
                                </div>
                                <div class="form-group">
                                    <label for="firstname">Voornaam</label>
                                    <input type="text" class="form-control" name="firstname" id="firstname" value="{{ old('firstname', '') }}" aria-describedby="firstname" placeholder="Voornaam">
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Achternaam</label>
                                    <input type="text" class="form-control" name="lastname" id="lastname" value="{{ old('lastname', '') }}" aria-describedby="lastname" placeholder="Achternaam">
                                </div>
                                <div class="form-group">
                                    <label for="mentor_id" class="control-label">Mentor</label>
                                    <div class="col-sm-3">
                                        <select name="mentor_id" id="mentor_id" class="form-control">
                                            @foreach ($mentors as $mentor)
                                                <option value="{{ $mentor->id }}" @if (old('mentor_id', '') == $mentor->id) selected="selected" @endif>{{ $mentor->firstname . ' ' . $mentor->lastname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Voeg student toe</button>
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
