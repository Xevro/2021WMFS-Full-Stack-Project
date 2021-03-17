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
            @if($students->count() > 0 and $proposals->count() > 0)
                <!-- basic form start -->
                <div class="col-md-6 offset-md-3 pt-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Koppel een student aan een stagevoorstel</h4>
                            <form method="POST" action="{{ url('/dashboard/proposal/assign') }}">
                                <div class="form-group">
                                    <label for="student_id" class="control-label">* Student</label>
                                    <div class="col-sm-3">
                                        <select name="student_id" id="student_id" class="form-control">
                                            @foreach ($students as $student)
                                                <option value="{{ $student->id }}" @if (old('student_id', '') == $student->id) selected="selected" @endif>{{ $student->firstname . ' ' . $student->lastname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="proposal_id" class="control-label">* Bedrijfsvoorstel</label>
                                    <div class="col-sm-3">
                                        <select name="proposal_id" id="proposal_id" class="form-control">
                                            @foreach ($proposals as $proposal)
                                                <option value="{{ $proposal->id }}" @if (old('proposal_id', '') == $proposal->id) selected="selected" @endif>Voorstel #{{ $proposal->id . ' ' . $proposal->company->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Koppel stage</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- basic form end -->
                @else
                    <p>Kan geen voorstel aan een student koppelen aangezien er geen studenten of voorstellen beschikbaar zijn.</p>
                @endif

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
