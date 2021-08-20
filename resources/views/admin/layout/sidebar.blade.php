<a href="#" class="brand-link text-center">
    <span class="brand-text font-weight-light">{{ config('app.name')}}</span>
</a>

<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->fullname()}}</a>
        </div>
    </div>

    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Arama..." aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{route('admin.partner')}}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Partnerler
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.zone')}}" class="nav-link">
                    <i class="nav-icon fas fa-map-marked-alt"></i>
                    <p>
                        Bölgeler ve Lokasyonlar
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.hotel')}}" class="nav-link">
                    <i class="nav-icon fas fa-hotel"></i>
                    <p>
                        Oteller
                    </p>
                </a>
            </li>
        </ul>
    </nav>
</div>
