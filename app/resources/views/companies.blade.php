@extends('layout')
@section('title', 'Bedrijven')
@include('partials.navbar')
@section('content')
    <!-- page container area start -->
    <!-- main content area start -->
        <div class="horizontal-main-wrapper">
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Overzicht bedrijven</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="/">Home</a></li>
                                <li><span>Bedrijven</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix pull-right">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Gebruikersnaam <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/settings">Settings</a>
                                <a class="dropdown-item" href="/logout">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @yield('sidebar')
            <!-- Progress Table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Bedrijven overzicht</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-hover progress-table text-center">
                                    <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Bedrijfsnaam</th>
                                        <th scope="col">e-mail adres</th>
                                        <th scope="col">KBO nummer</th>
                                        <th scope="col">Aantal voorstellen</th>
                                        <th scope="col">Actie</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($companies as $company)
                                        <tr>
                                            <td>{{ $company->name }}</td>
                                            <td>{{ $company->email }}</td>
                                            <td>{{ $company->KBO_number }}</td>
                                            <td>{{ $company->amount_proposals }}</td>
                                            <td>
                                                <ul class="d-flex justify-content-center">
                                                    <li class="mr-3"><a href="#" class="">info</a></li>
                                                    <li><a href="#" class="text-danger"><i class="ti-trash"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Progress Table end -->
        </div>
        <!-- page title area end -->
        <div class="main-content-inner">
            <!-- sales report area start -->
            <div class="sales-report-area mt-5 mb-5">
                <!-- table here -->
            </div>
            <!-- sales report area end -->
            <!-- overview area start -->
            <div class="row">
                <div class="col-xl-9 col-lg-8">

                </div>
                <div class="col-xl-3 col-lg-4 coin-distribution">

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
    <!-- page container area end -->
@endsection
