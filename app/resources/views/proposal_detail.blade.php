@extends('layout')
@section('title', 'Detail Voorstel')
@include('partials.navbar')
@section('content')
    <!-- page container area start -->
    <div class="horizontal-main-wrapper">
        <!-- main content area start -->
    @yield('navbar')
        <div class="main-content-inner">
            <div class="row">
                <div class="col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="invoice-area">
                                <div class="invoice-head">
                                    <div class="row">
                                        <div class="iv-left col-6">
                                            <span>Stagevoorstel </span>
                                            <span>#{{ $proposal->id }}</span>
                                        </div>
                                    </div>
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
                            <div class="text-left">
                                <form action="/" method="post">
                                <a href="#" class="btn btn-success">Keur voorstel goed</a>
                                <a href="#" class="btn btn-primary">Geef feedback</a>
                                <a href="#" class="btn btn-danger">Weiger voorstel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
