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
                    <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Gebruikersnaam<i class="fa fa-angle-down"></i></h4>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/settings">Account instellingen</a>
                        <a class="dropdown-item" href="/logout">Log Out</a>
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
                                <li @if($menuItem == 'overzicht') class="active"@endif><a href="{{ url('/overview') }}"><i class="ti-layout-list-thumb-alt"></i> <span>Overzicht stages</span></a></li>
                                <li @if($menuItem == 'students') class="active"@endif><a href="{{ url('/students') }}"><i class="fa fa-male"></i> <span>Studenten</span></a></li>
                                <li @if($menuItem == 'companies') class="active"@endif><a href="{{ url('/companies') }}"><i class="fa fa-building-o"></i> <span>Bedrijven</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header area end -->
@endsection
