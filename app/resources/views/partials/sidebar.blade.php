@section('sidebar')
<!-- sidebar menu area start -->
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="/"><h2>Odisee</h2></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li @if($menuItem == 'dashboard') class="active"@endif><a href="/"><i class="ti-map-alt"></i> <span>Overzicht stages</span></a></li>
                    <li @if($menuItem == 'students') class="active"@endif><a href="{{ url('/students') }}"><i class="ti-map-alt"></i> <span>Studenten</span></a></li>
                    <li @if($menuItem == 'companies') class="active"@endif><a href="{{ url('/companies') }}"><i class="ti-receipt"></i> <span>Bedrijven</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->
@endsection
