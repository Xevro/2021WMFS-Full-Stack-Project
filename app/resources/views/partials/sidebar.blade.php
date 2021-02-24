@section('sidebar')
<!-- sidebar menu area start -->
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="/"><img src="{{ url('/assets/images/icon/logo.png')}}" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="active"><a href="/"><i class="ti-map-alt"></i> <span>Overzicht</span></a></li>
                    <li><a href="/"><i class="ti-map-alt"></i> <span>Studenten</span></a></li>
                    <li><a href="/"><i class="ti-receipt"></i> <span>Bedrijven</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->
@endsection
