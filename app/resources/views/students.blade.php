@extends('layout')
@section('title', 'Studenten')
@include('partials.navbar')

@section('content')
    <!-- page container area start -->
    <div class="horizontal-main-wrapper">
            @yield('navbar')
            <!-- Progress Table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="search-box pull-right pb-3">
                        <form method="get" action="{{ url('/dashboard/students') }}">
                            <div class="row">
                                <div class="pr-4">
                                    <input type="text" class="form-control" name="search" id="search" value="{{ $term ?? '' }}" placeholder="Zoekterm"/>
                                </div>
                                <div class="pr-3">
                                    <button type="submit" class="btn btn-primary">Zoek</button>
                                </div>
                            </div>
                        </form>
                        </div>
                        <h4 class="header-title">Studenten overzicht</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                @if($students->count() > 0)
                                <table class="table table-hover progress-table text-center">
                                    <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Naam</th>
                                        <th scope="col">e-mail adres</th>
                                        <th scope="col">R-nummer</th>
                                        <th scope="col">Mentor</th>
                                        <th scope="col">Aantal dagen gelopen stage</th>
                                        <th scope="col">Stage status</th>
                                        <th scope="col">Actie</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($students as $student)
                                        <tr>
                                            <td>{{ $student->firstname . ' ' . $student->lastname }}</td>
                                            <td>{{ $student->user->email }}</td>
                                            <td>{{ $student->r_number }}</td>
                                            @if ($student->mentor)
                                                <td>{{ $student->mentor->firstname . ' ' . $student->mentor->lastname }}</td>
                                            @else
                                                <td>Nog niet toegewezen</td>
                                            @endif
                                            <td>{{ $student->completed_days }}</td>
                                            @if ($student->approved == 'Goedgekeurd')
                                                <td><span class="status-p bg-success">{{ $student->approved }}</span></td>
                                            @else
                                                <td><span class="status-p bg-primary">{{ $student->approved }}</span></td>
                                            @endif
                                            <td>
                                                <ul class="d-flex justify-content-center">
                                                    <li class="mr-3"><a href="{{ url('/dashboard/student/' . $student->id) }}" class="">info</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="p-3 pull-right">
                                    {{ $students->links() }}
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
