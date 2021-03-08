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
                            <h4 class="header-title">Verwijder voorstel # {{ $proposal->id }}</h4>
                            <form action="{{ url('/dashboard/company/proposal/' . $proposal->id . '/delete') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger mt-4 pr-4 pl-4">Verwijder voorstel</button>
                                <a href="/dashboard" class="btn btn-primary mt-4 pr-4 pl-4 ml-2">Annuleer</a>
                            </form>
                                    <div class="invoice-area">
                                        <div class="invoice-head">
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <div class="invoice-address">
                                                    <h5>{{ $proposal->company->name }}</h5>
                                                    <p>KBO nummer: {{ $proposal->company->kbo_number }}</p>
                                                    <p>Website: <a href="{{ url('http://' . $proposal->company->website) }}">{{ $proposal->company->website }}</a></p>
                                                    <p>E-mail adres: {{ $proposal->company->email }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <ul class="invoice-date">
                                                    <div class="stage-termijn">
                                                        <p>Stage termijn</p>
                                                    </div>
                                                    <li>Start datum: {{ $proposal->start_period }}</li>
                                                    <li>Due Date : {{ $proposal->end_period }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="accordion1" class="according">
                                            <div class="card">
                                                <div class="card-header"><a class="card-link" data-toggle="collapse" href="#accordion11">Voorstel beschrijving</a></div>
                                                <div id="accordion11" class="collapse show" data-parent="#accordion1">
                                                    <div class="card-body">
                                                        {{ $proposal->description }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
