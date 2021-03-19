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
                <!-- Progress Table start -->
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Stage activiteiten van {{ $student->firstname . ' ' . $student->lastname }}</h4>
                            <div class="single-table">
                                @if($tasks->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-hover progress-table text-center">
                                        <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">Datum</th>
                                            <th scope="col">Activiteit</th>
                                            <!--<th scope="col">Actie</th>-->
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tasks as $task)
                                                <tr>
                                                    <td>{{ $task->date }}</td>
                                                    <td>{{ $task->task }}</td>
                                                <!--<td>
                                                        <ul class="d-flex justify-content-center">
                                                           <li><a href="{{ url('/dashboard/company/proposal/' . $task->id) }}">info</a></li>
                                                        </ul>
                                                    </td>-->
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @else
                                    <p>Geen activiteiten gevonden.</p>
                                @endif
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
