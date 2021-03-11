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
                            <h4 class="header-title">Voeg een voorstel toe</h4>
                            <form action="{{ url('/dashboard/proposal/add') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="description">* Voorstel beschrijving</label>
                                    <textarea id="description" name="description" class="form-control" rows="4" cols="50">{{ old('description', '') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="start_period">* Start periode</label>
                                    <input type="date" id="start_period" class="form-control"  name="start_period" value="@if(old('start_period', '')) {{old('start_period', '')}} @else {{ date('Y-m-d') }} @endif">
                                </div>
                                <div class="form-group">
                                    <label for="end_period">* Eind periode</label>
                                    <input type="date" id="end_period" class="form-control"  name="end_period" value="@if(old('end_period', '')) {{old('end_period', '')}} @else {{ date('Y-m-d') }} @endif">
                                </div>
                                <div class="form-group">
                                    <label for="company_id" class="control-label">* Bedrijf</label>
                                    <div class="col-sm-3">
                                        <select name="company_id" id="company_id" class="form-control">
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}" @if (old('company_id', '') == $company->id) selected="selected" @endif>{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mentor_id" class="control-label">* Mentor</label>
                                    <div class="col-sm-3">
                                        <select name="mentor_id" id="mentor_id" class="form-control">
                                            @foreach ($mentors as $mentor)
                                                <option value="{{ $mentor->id }}" @if (old('mentor_id', '') == $mentor->id) selected="selected" @endif>{{ $mentor->firstname . ' ' . $mentor->lastname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Voeg voorstel toe</button>
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
