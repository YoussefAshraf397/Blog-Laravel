<div class="min-height-300 bg-primary position-absolute w-100" style="background-color: #5ebee4 !important"></div>

<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{route('admin.dashboard')}}">
            <img  src="{{ asset('assets/backend/img/logo-update-3-17.png') }}"  class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Sky Dance Hosting</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
{{--            users--}}
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#users" class="nav-link {{request()->is('*/admin-user', '*/admin-user/*') ? 'active' : ''}}" aria-controls="users" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-shop text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Users</span>
                </a>
                <div class="collapse " id="users">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link {{request()->is('*/admin-user', '*/admin-user/*') ? 'active' : ''}}" href="{{route('admin.admin-user.index')}}">
                                <span class="sidenav-mini-icon"> DU </span>
                                <span class="sidenav-normal"> Dashboard Users </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#locations" class="nav-link {{request()->is('*/country', '*/country/*', '*/governorate', '*/governorate/*','*/city', '*/city/*') ? 'active' : ''}}" aria-controls="locations" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-shop text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Location</span>
                </a>
                <div class="collapse " id="locations">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link {{request()->is('*/country', '*/country/*') ? 'active' : ''}}" href="{{route('admin.country.index')}}">
                                <span class="sidenav-mini-icon"> C </span>
                                <span class="sidenav-normal"> Countries </span>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link {{request()->is('*/governorate', '*/governorate/*') ? 'active' : ''}}" href="{{route('admin.governorate.index')}}">
                                <span class="sidenav-mini-icon"> G </span>
                                <span class="sidenav-normal"> Governorates </span>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link  {{request()->is('*/city', '*/city/*') ? 'active' : ''}}" href="{{route('admin.city.index')}}">
                                <span class="sidenav-mini-icon"> C </span>
                                <span class="sidenav-normal"> Cities </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

{{--            Place--}}

            @if(Auth::user()->hasAnyPermission(['view Place']))
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#places" class="nav-link {{request()->is('*/place-type', '*/place-type/*','*/property-type', '*/property-type/*','*/place', '*/place/*','*/package', '*/package/*','*/category', '*/category/*','*/attribute', '*/attribute/*','*/additional-service', '*/additional-service/*') ? 'active' : ''}}" aria-controls="places" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-shop text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Places</span>
                </a>
                <div class="collapse " id="places">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link {{request()->is('*/place-type', '*/place-type/*') ? 'active' : ''}}" href="{{route('admin.place-type.index')}}">
                                <span class="sidenav-mini-icon"> PT </span>
                                <span class="sidenav-normal"> Place Types </span>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link {{request()->is('*/property-type', '*/property-type/*') ? 'active' : ''}}" href="{{route('admin.property-type.index')}}">
                                <span class="sidenav-mini-icon"> PT </span>
                                <span class="sidenav-normal"> Property Types </span>
                            </a>
                        </li>
                    </ul>
                    @if(Auth::user()->can('view Place'))
                        <ul class="nav ms-4">
                            <li class="nav-item ">
                                <a class="nav-link {{request()->is('*/place', '*/place/*') ? 'active' : ''}}" href="{{route('admin.place.index')}}">
                                    <span class="sidenav-mini-icon"> P </span>
                                    <span class="sidenav-normal"> Places </span>
                                </a>
                            </li>
                        </ul>
                    @endif
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link {{request()->is('*/package', '*/package/*') ? 'active' : ''}}" href="{{route('admin.package.index')}}">
                                <span class="sidenav-mini-icon"> P </span>
                                <span class="sidenav-normal"> Packages </span>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link {{request()->is('*/category', '*/category/*') ? 'active' : ''}}" href="{{route('admin.category.index')}}">
                                <span class="sidenav-mini-icon"> C </span>
                                <span class="sidenav-normal"> Categories </span>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link {{request()->is('*/additional-service', '*/additional-service/*') ? 'active' : ''}}" href="{{route('admin.additional-service.index')}}">
                                <span class="sidenav-mini-icon"> A </span>
                                <span class="sidenav-normal"> Additional Services </span>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link {{request()->is('*/attribute', '*/attribute/*') ? 'active' : ''}}" href="{{route('admin.attribute.index')}}">
                                <span class="sidenav-mini-icon"> A </span>
                                <span class="sidenav-normal"> Attributes </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif

{{--            privillage--}}
            @if(Auth::user()->hasAnyPermission(['view Role', 'view permissions']))
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#privileges" class="nav-link {{request()->is('*/role', '*/role/*','*/permission', '*/permission/*') ? 'active' : ''}}" aria-controls="users" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-shop text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Privilege</span>
                </a>
                <div class="collapse " id="privileges">
                    @if(Auth::user()->can('view Role'))
                        <ul class="nav ms-4">
                            <li class="nav-item ">
                                <a class="nav-link {{request()->is('*/role', '*/role/*') ? 'active' : ''}}" href="{{route('admin.role.index')}}">
                                    <span class="sidenav-mini-icon"> R </span>
                                    <span class="sidenav-normal"> Roles </span>
                                </a>
                            </li>
                        </ul>
                    @endif
                    @if(Auth::user()->can('view permissions'))
                        <ul class="nav ms-4">
                            <li class="nav-item ">
                                <a class="nav-link {{request()->is('*/permission', '*/permission/*') ? 'active' : ''}}" href="{{route('admin.permission.index')}}">
                                    <span class="sidenav-mini-icon"> P </span>
                                    <span class="sidenav-normal"> Permissions </span>
                                </a>
                            </li>
                        </ul>
                    @endif
                </div>
            </li>
            @endif
        </ul>
    </div>
</aside>

