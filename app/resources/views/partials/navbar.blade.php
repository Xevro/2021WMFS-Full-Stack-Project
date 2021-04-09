@section('navbar')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">{{ $pageTitle }}</h4>
                   <!-- <ul class="breadcrumbs pull-left">
                        <li><a href="/">Home</a></li>
                        <li><span>Overzicht</span></li>
                    </ul>-->
                </div>
            </div>
            <div class="col-sm-6 clearfix pull-right">
                <div class="user-profile pull-right">
                    <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ auth()->user()->mentor->firstname . ' ' .auth()->user()->mentor->lastname }}<i class="fa fa-angle-down"></i></h4>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/settings">Account instellingen</a>
                        <form method="post" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item" type="submit">Log out</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header area start -->
    <div class="header-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9 d-lg-block">
                    <div class="horizontal-menu">
                        <nav>
                            <ul>
                                <li @if($menuItem == 'overzicht') class="active"@endif><a href="{{ url('/dashboard') }}"><i class="ti-layout-list-thumb-alt"></i> <span>Overzicht stages</span></a></li>
                                <li @if($menuItem == 'students' || $menuItem == 'addStudent') class="active"@endif>
                                    <a href="javascript:void(0)"><i class="fa fa-male"></i><span>Studenten</span></a>
                                    <ul class="submenu">
                                        <li @if($menuItem == 'students') class="active"@endif><a href="{{ url('/dashboard/students') }}">Studenten</a></li>
                                        @can('add-student')
                                        <li @if($menuItem == 'AssignMentor') class="active"@endif><a href="{{ url('/dashboard/student/assign') }}">Koppel mentor aan een student</a></li>
                                        <li @if($menuItem == 'AssignProposal') class="active"@endif><a href="{{ url('/dashboard/proposal/assign') }}">Koppel student aan voorstel</a></li>
                                        <li @if($menuItem == 'addStudent') class="active"@endif><a href="{{ url('/dashboard/student/add') }}">Voeg student toe</a></li>
                                        @endcan
                                    </ul>
                                </li>
                                <li @if($menuItem == 'companies' || $menuItem == 'addCompany' || $menuItem == 'addProposal') class="active"@endif>
                                    <a href="javascript:void(0)"><i class="fa fa-building-o"></i><span>Bedrijven</span></a>
                                    <ul class="submenu">
                                        <li @if($menuItem == 'companies') class="active"@endif><a href="{{ url('/dashboard/companies') }}">Bedrijven</a></li>
                                        @can('add-company')
                                        <li @if($menuItem == 'addProposal') class="active"@endif><a href="{{ url('/dashboard/proposal/add') }}">Voeg voorstel toe</a></li>
                                        <li @if($menuItem == 'addCompany') class="active"@endif><a href="{{ url('/dashboard/company/add') }}">Voeg bedrijf toe</a></li>
                                        @endcan
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header area end -->
@endsection
