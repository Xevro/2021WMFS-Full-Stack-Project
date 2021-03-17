@extends('layout')
@section('title', 'Overzicht')
@include('partials.navbar')
@section('content')
    <!-- page container area start -->
    <div class="horizontal-main-wrapper">
        <!-- main content area start -->
    @yield('navbar')
    @can('view-dashboard')
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
                                            <th scope="col">Beschrijving</th>
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
                                                <td>{{ \Illuminate\Support\Str::words($proposal->description, 10) }}</td>
                                                @if ($proposal->visibility)
                                                    <td><span class="status-p bg-success">{{ $proposal->status }}</span></td>
                                                @else
                                                    <td><span class="status-p bg-primary">{{ $proposal->status }}</span></td>
                                                @endif
                                                <td>
                                                    <ul class="d-flex justify-content-center">
                                                        <li class="mr-3"><a href="{{ url('/dashboard/company/proposal/' . $proposal->id) }}">info</a></li>
                                                        <li><a href="{{ url('/dashboard/company/proposal/' . $proposal->id . '/delete') }}" class="text-danger"><i class="ti-trash"></i></a></li>
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
                <!-- Progress Table end -->
            </div>
            <!-- page title area end -->
            <!-- Progress Table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Goedgekeurde stage voorstellen overzicht</h4>
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
                                            <th scope="col">Beschrijving</th>
                                            <th scope="col">status</th>
                                            <th scope="col">Actie</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($proposalsApproved as $proposal)
                                            <tr>
                                                <td><a href="{{ url('/dashboard/company/' . $proposal->company->id) }}">{{ $proposal->company->name }}</a></td>
                                                <td>{{ $proposal->created_at }}</td>
                                                <td>{{ $proposal->start_period }}</td>
                                                <td>{{ $proposal->end_period }}</td>
                                                <td>{{ \Illuminate\Support\Str::words($proposal->description, 10) }}</td>
                                                @if ($proposal->visibility)
                                                    <td><span class="status-p bg-success">{{ $proposal->status }}</span></td>
                                                @else
                                                    <td><span class="status-p bg-primary">{{ $proposal->status }}</span></td>
                                                @endif
                                                <td>
                                                    <ul class="d-flex justify-content-center">
                                                        <li class="mr-3"><a href="{{ url('/dashboard/company/proposal/' . $proposal->id) }}">info</a></li>
                                                        <li><a href="{{ url('/dashboard/company/proposal/' . $proposal->id . '/delete') }}" class="text-danger"><i class="ti-trash"></i></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="p-3 pull-right">
                                        {{ $proposalsApproved->links() }}
                                    </div>
                                @else
                                    <p>Geen resultaten gevonden die {{ $term }} bevatte.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
            @can('view-student-tasks')
                <!-- view all students that belong to the mentor
                     Also show button to view tasks of that student -->
                    <!-- Progress Table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="search-box pull-right pb-3">
                                    <form method="get" action="{{ url('/dashboard') }}">
                                        <div class="row">
                                            <div class="pr-3 pt-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" @if ($statusStudent == 'on') checked @endif class="custom-control-input" name="status_student" id="status_student">
                                                    <label class="custom-control-label" for="status_student">Status Goedgekeurd?</label>
                                                </div>
                                            </div>
                                            <div class="pr-4">
                                                <input type="text" class="form-control" name="search_student" id="search_student" value="{{ $termStudent ?? '' }}" placeholder="Zoekterm"/>
                                            </div>
                                            <div class="pr-3">
                                                <button type="submit" class="btn btn-primary">Zoek</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <h4 class="header-title">Mijn studenten</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        @if($students->count() > 0)
                                            <table class="table table-hover progress-table text-center">
                                                <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Naam</th>
                                                    <th scope="col">email</th>
                                                    <th scope="col">R-nummer</th>
                                                    <th scope="col">Aantal dagen gelopen stage</th>
                                                    <th scope="col">status stage</th>
                                                    <th scope="col">Actie</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($students as $student)
                                                    <tr>
                                                        <td>{{ $student->firstname . ' ' . $student->lastname }}</td>
                                                        <td>{{ $student->email }}</td>
                                                        <td>{{ $student->r_number }}</td>
                                                        <td>{{ $student->completed_days }}</td>
                                                        @if ($student->approved == 'Goedgekeurd')
                                                            <td><span class="status-p bg-success">{{ $student->approved }}</span></td>
                                                        @else
                                                            <td><span class="status-p bg-primary">{{ $student->approved }}</span></td>
                                                        @endif
                                                        <td>
                                                            <ul class="d-flex justify-content-center">
                                                                <li class="mr-3"><a href="{{ url('/dashboard/student/' . $student->id) }}">info</a></li>
                                                                <li class="mr-3"><a href="{{ url('/dashboard/' . $student->id . '/tasks') }}">Taken</a></li>
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
                        <!-- Progress Table end -->
            @endcan
            <!-- Progress Table end -->
                <!-- footer area start-->
                <footer>
                    <div class="footer-area">
                        <p>© Copyright 2021. All right reserved. <a href="https://odisee.be/">Odisee</a>
                            Technologiecampus.</p>
                    </div>
                </footer>
                <!-- footer area end-->
                <!-- page container area end -->
@endsection
