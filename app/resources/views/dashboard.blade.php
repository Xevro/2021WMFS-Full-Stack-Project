@extends('layout')
@section('title', 'Overzicht')
@include('partials.navbar')
@section('content')
    <!-- page container area start -->
    <div class="horizontal-main-wrapper">
        <!-- main content area start -->
    @yield('navbar')
            <!--  Begin amounts -->
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-6 mt-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg2">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-thumb-up"></i>Goedgekeurde voorstellen</div>
                                    <h2>{{ $amountApproved }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-md-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg1">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-filter"></i> Aantal goed te keuren voorstellen</div>
                                    <h2>{{ $amountToCheck }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End amount -->
            <!-- Progress Table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="search-box pull-right pb-3">
                            <form method="get" action="{{ url('/dashboard') }}">
                                    <div class="row">
                                        <div class="pr-3 pt-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" @if ($status == 'on') checked @endif class="custom-control-input" name="status" id="status">
                                                <label class="custom-control-label" for="status">Status Goedgekeurd?</label>
                                            </div>
                                        </div>
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
                        <h4 class="header-title">Stage voorstellen overzicht</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                @if($proposals->count() > 0)
                                <table class="table table-hover progress-table text-center">
                                    <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Bedrijf</th>
                                        <th scope="col">Toegevoegd op</th>
                                        <th scope="col">Start datum</th>
                                        <th scope="col">End datum</th>
                                        <th scope="col">status</th>
                                        <th scope="col">Actie</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($proposals as $proposal)
                                        <tr>
                                            <td><a href="{{ url('/dashboard/company/' . $proposal->company->id) }}">{{ $proposal->company->name }}</a></td>
                                            <td>{{ $proposal->created_at }}</td>
                                            <td>{{ $proposal->start_period }}</td>
                                            <td>{{ $proposal->end_period }}</td>
                                            @if ($proposal->visibility)
                                                <td><span class="status-p bg-success">{{ $proposal->status }}</span></td>
                                            @else
                                                <td><span class="status-p bg-primary">{{ $proposal->status }}</span></td>
                                            @endif
                                            <td>
                                                <ul class="d-flex justify-content-center">
                                                    <li><a href="{{ url('/dashboard/company/proposal/' . $proposal->id) }}">info</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="p-3 pull-right">
                                    {{ $proposals->links() }}
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
