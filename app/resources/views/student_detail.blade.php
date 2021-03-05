@extends('layout')
@section('title', 'Student ' . $student->firstname . ' ' . $student->lastname)
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
                                            <span>Student </span>
                                            <span>{{ $student->firstname . ' ' . $student->lastname }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <div class="invoice-address">
                                            <p>E-mail adres: {{ $student->email }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Progress Table start -->
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Stage van {{ $student->firstname . ' ' . $student->lastname }}</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover progress-table text-center">
                                        <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">Bedrijf</th>
                                            <th scope="col">Toegevoegd op</th>
                                            <th scope="col">Start datum</th>
                                            <th scope="col">End datum</th>
                                            <th scope="col">Mentor</th>
                                            <th scope="col">status</th>
                                            <th scope="col">Actie</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if ($student->approved == 'Goedgekeurd')
                                        @foreach($proposals as $proposal)
                                            <tr>
                                                <td>{{ $proposal->company->name }}</td>
                                                <td>{{ $proposal->created_at }}</td>
                                                <td>{{ $proposal->start_period }}</td>
                                                <td>{{ $proposal->end_period }}</td>
                                                <td>{{ $student->mentor->firstname . ' ' . $student->mentor->lastname }}</td>
                                                <td><span class="status-p bg-success">{{ $student->approved }}</span></td>
                                                <td>
                                                    <ul class="d-flex justify-content-center">
                                                        <li class="mr-3"><a href="{{ url('/dashboard/company/proposal/' . $proposal->id) }}">info</a></li>
                                                        <li><a href="#" class="text-danger"><i class="ti-trash"></i></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Progress Table end -->

                <!-- Progress Table start -->
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Stage voorkeuren van {{ $student->firstname . ' ' . $student->lastname }}</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover progress-table text-center">
                                        <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">Bedrijf</th>
                                            <th scope="col">Toegevoegd op</th>
                                            <th scope="col">Start datum</th>
                                            <th scope="col">End datum</th>
                                            <th scope="col">Actie</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($proposalsLiked as $proposal)
                                            <tr>
                                                <td>{{ $proposal->company->name }}</td>
                                                <td>{{ $proposal->created_at }}</td>
                                                <td>{{ $proposal->start_period }}</td>
                                                <td>{{ $proposal->end_period }}</td>
                                                <td>
                                                    <ul class="d-flex justify-content-center">
                                                        <li class="mr-3"><a href="{{ url('/dashboard/company/proposal/' . $proposal->id) }}">info</a></li>
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
