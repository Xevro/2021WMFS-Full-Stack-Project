@section('sidebar')
    <!-- header area start -->
    <div class="header-area header-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9  d-none d-lg-block">
                    <div class="horizontal-menu">
                        <nav>
                            <ul>
                                <li @if($menuItem == 'dashboard') class="active"@endif><a href="/"><i class="ti-map-alt"></i> <span>Overzicht stages</span></a></li>
                                <li @if($menuItem == 'students') class="active"@endif><a href="{{ url('/students') }}"><i class="ti-map-alt"></i> <span>Studenten</span></a></li>
                                <li @if($menuItem == 'companies') class="active"@endif><a href="{{ url('/companies') }}"><i class="ti-receipt"></i> <span>Bedrijven</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header area end -->
@endsection
