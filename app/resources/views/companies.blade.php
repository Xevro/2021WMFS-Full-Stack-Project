@extends('layout')
@section('title', 'Bedrijven')
@include('partials.navbar')
@section('content')
    <!-- page container area start -->
    <!-- main content area start -->
        <div class="horizontal-main-wrapper">
        @yield('navbar')
            <!-- Progress Table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="search-box pull-right pb-3">
                            <form method="get" action="/dashboard/companies">
                                <div class="row">
                                    <div class="pr-4">
                                        <input type="text" class="form-control" name="search" id="search" value="{{ $term ?? '' }}" placeholder="Zoekterm"/>
                                    </div>
                                    <div class="pr-3">
                                        <button type="submit" class="btn btn-primary">Zoek</button>
                                    </div>
                                </div>
                                {{ csrf_field() }}
                            </form>
                        </div>
                        <h4 class="header-title">Bedrijven overzicht</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                @if($companies->count() > 0)
                                <table class="table table-hover progress-table text-center">
                                    <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Bedrijfsnaam</th>
                                        <th scope="col">e-mail adres</th>
                                        <th scope="col">KBO nummer</th>
                                        <th scope="col">Website</th>
                                        <th scope="col">Aantal voorstellen</th>
                                        <th scope="col">Actie</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($companies as $company)
                                        <tr>
                                            <td><a href="{{ url('/dashboard/company/' . $company->id) }}">{{ $company->name }}</a></td>
                                            <td>{{ $company->email }}</td>
                                            <td>{{ $company->KBO_number }}</td>
                                            <td>{{ $company->website }}</td>
                                            <td>{{ $company->amount_proposals }}</td>
                                            <td>
                                                <ul class="d-flex justify-content-center">
                                                    <li><a href="{{ url('/dashboard/company/' . $company->id) }}">info</a></li>
                                                   <!-- class="mr-3"<li><a href="#" class="text-danger"><i class="ti-trash"></i></a></li>-->
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="p-3 pull-right">
                                    {{ $companies->links() }}
                                </div>
                                @else
                                    <p>Geen resultaten gevonden die {{ $term }} bevatte.</p>
                                @endif
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
