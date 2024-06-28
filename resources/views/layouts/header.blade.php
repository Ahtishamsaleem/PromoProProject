<nav class="position-sticky start-0 top-0 z-3">
        <div class="w-100 d-flex align-items-center justify-content-between bg-primary topbarCustomPadding z-2">
            <button
                class="vertical-menu-mobile-btn btn btn-outline-link d-lg-none p-0 me-2 icon-outline-menu-1 text-white enable-vertical-menu"></button>
            <img class="img-fluid Salesflo-Logo-custom-Width-Dashboard me-lg-0 me-auto"
                src="/images/Salesflo_logo.svg" alt="Salesflo Core" />
            <div class="form-check form-switch d-none d-lg-block ms-3 me-auto mb-0">
                <label class="d-block">
                    <input class="form-check-input bg-warning" type="checkbox" role="switch" name="enable-vertical-menu"
                        id="enable-vertical-menu" />
                    <span class="small text-white">Vertical Menu</span>
                </label>
            </div>
            <div class="d-flex align-items-center navbarCustomPadding">
                <div class="dropdown user-profile-dropdown me-sm-3 me-2">
                    <button type="button"
                        class="btn d-flex align-items-center dropdown-toggle custom-down-arrow text-white px-0 py-1 no-hf-effect"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="icon-outline-avatar-user text-white me-2"></i>
                        <span class="text-white small d-lg-block d-xl-block d-sm-block d-none" for="">{{auth()->user()->name}}</span>
                    </button>
                    <ul
                        class="custom-dropdown-menu dropdown-menu dropdown-menu-end  p-0 overflow-hidden">
                        <li>
                            <a class="dropdown-item" href="#"><i class="icon-bold-lock-1 me-2"></i>Change
                                Password</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> <i class="icon-bold-logout me-2"></i>
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="dropdown company-product-dropdown me-sm-3 me-2">
                    <button type="button"
                        class="btn d-flex align-items-center dropdown-toggle custom-down-arrow text-white p-0 no-dropdown-arrow no-hf-effect"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="icon-bold-app text-white fs-5"></i>
                    </button>
                    <ul
                        class="custom-dropdown-menu dropdown-menu dropdown-menu-end  p-0 overflow-hidden">
                        <li>
                            <a href="#" class="dropdown-item salesflo-sight-item">
                                <img class="me-2 brand-image" src="/images/salesflo-sight-logo.svg"
                                    alt="Salesflo Sight" />Salesflo Sight
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item salesflo-pulse-item disabled" disabled="disabled">
                                <img class="me-2 brand-image" src="/images/pulse-logo.svg"
                                    alt="Salesflo Pulse" />Pulse (coming soon)
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item salesflo-engage-item disabled" disabled="disabled">
                                <img class="me-2 brand-image" src="/images/engage-logo.svg" alt="Engage" />Engage
                                (coming soon)
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="dropdown user-setting-dropdown me-sm-3 me-2">
                    <button type="button"
                        class="btn d-flex align-items-center dropdown-toggle custom-down-arrow text-white p-0 no-dropdown-arrow no-hf-effect"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="icon-bold-setting-2 text-white fs-5"></i>
                    </button>
                    <ul
                        class="custom-dropdown-menu dropdown-menu dropdown-menu-end  p-0 overflow-hidden">
                        <li>
                            <a class="dropdown-item" href="#">Dropdown Item 1</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Dropdown Item 2</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Dropdown Item 3</a>
                        </li>
                    </ul>
                </div>
                <div class="client-logo ps-3 border-start border-1 border-white">
                    <img class="img-fluid" src="/images/meezan-icon.svg" alt="Company Client Logo" width="30" />
                </div>
            </div>
        </div>
        <div class="collapse main-menu show z-1" id="navbarSupportedContent">
            <ul id="primary-menu" class="nav primary-navbar list-unstyled d-flex cs-scrollbar-style">
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link">
                        <i class="icon-bold-dashboard me-2"></i>Dashboard
                    </a>
                </li>
<!-- 2 -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="icon-bold-location me-2"></i>Customer
                    </a>
                    <div
                        class="dropdown-menu  border-0 rounded-4 shadow-sm p-0 mt-2 overflow-hidden customHeightDropDown">
                        <div class="row m-0">
                            <div
                                class="col-lg-5 d-none d-lg-flex flex-column align-items-start justify-content-end bg-primary text-white p-3">
                                <i class="icon-bold-location me-2 mb-2 fs-1"></i>
                                <h3 class="fs-4 mb-2 fw-bold" for="">Customer</h3>
                                <p class="customFontSize-12px m-0">
                                    "The geography module provides a comprehensive database for storing and
                                    accessing store locations and channel information, facilitating seamless
                                    integration and analysis of spatial data."
                                </p>
                            </div>
                            <div class="col col-lg-7 py-2 px-0">
                                <ul class="p-0 list-unstyled overflow-y-scroll customHeightDropDownLi cs-scrollbar-style">
                                    <li class="nav-item py-1">
                                        <a href=""
                                            class="w-100 nav-link py-1 border-0 bg-transparent d-flex justify-content-start small align-items-center text-black customFontSize-11px">
                                            <img class="dropDownImage me-1" src="/images/9-store-edit-request-level-1.svg" alt="" />Customer
                                        </a>
                                    </li>
                                    <!-- add More Sub-Menu items -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
<!-- 3 -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="icon-bold-location me-2"></i>Product
                    </a>
                    <div
                        class="dropdown-menu  border-0 rounded-4 shadow-sm p-0 mt-2 overflow-hidden customHeightDropDown">
                        <div class="row m-0">
                            <div
                                class="col-lg-5 d-none d-lg-flex flex-column align-items-start justify-content-end bg-primary text-white p-3">
                                <i class="icon-bold-location me-2 mb-2 fs-1"></i>
                                <h3 class="fs-4 mb-2 fw-bold" for="">Product</h3>
                                <p class="customFontSize-12px m-0">
                                    "The geography module provides a comprehensive database for storing and
                                    accessing store locations and channel information, facilitating seamless
                                    integration and analysis of spatial data."
                                </p>
                            </div>
                            <div class="col col-lg-7 py-2 px-0">
                                <ul class="p-0 list-unstyled overflow-y-scroll customHeightDropDownLi cs-scrollbar-style">
                                    <li class="nav-item py-1">
                                        <a href=""
                                            class="w-100 nav-link py-1 border-0 bg-transparent d-flex justify-content-start small align-items-center text-black customFontSize-11px">
                                            <img class="dropDownImage me-1" src="/images/9-store-edit-request-level-1.svg" alt="" />Master SKU
                                        </a>
                                    </li>
                                    <li class="nav-item py-1">
                                        <a href=""
                                            class="w-100 nav-link py-1 border-0 bg-transparent d-flex justify-content-start small align-items-center text-black customFontSize-11px">
                                            <img class="dropDownImage me-1" src="/images/9-store-edit-request-level-1.svg" alt="" />SKU
                                        </a>
                                    </li>
                                    <li class="nav-item py-1">
                                        <a href=""
                                            class="w-100 nav-link py-1 border-0 bg-transparent d-flex justify-content-start small align-items-center text-black customFontSize-11px">
                                            <img class="dropDownImage me-1" src="/images/9-store-edit-request-level-1.svg" alt="" />Channel
                                        </a>
                                    </li>
                                    <li class="nav-item py-1">
                                        <a href=""
                                            class="w-100 nav-link py-1 border-0 bg-transparent d-flex justify-content-start small align-items-center text-black customFontSize-11px">
                                            <img class="dropDownImage me-1" src="/images/9-store-edit-request-level-1.svg" alt="" />Customer
                                        </a>
                                    </li>
                                    <li class="nav-item py-1">
                                        <a href=""
                                            class="w-100 nav-link py-1 border-0 bg-transparent d-flex justify-content-start small align-items-center text-black customFontSize-11px">
                                            <img class="dropDownImage me-1" src="/images/9-store-edit-request-level-1.svg" alt="" />Manufecturer
                                        </a>
                                    </li>
                                    <li class="nav-item py-1">
                                        <a href=""
                                            class="w-100 nav-link py-1 border-0 bg-transparent d-flex justify-content-start small align-items-center text-black customFontSize-11px">
                                            <img class="dropDownImage me-1" src="/images/9-store-edit-request-level-1.svg" alt="" />Virtual Hierarchy
                                        </a>
                                    </li>
                                    <!-- add More Sub-Menu items -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
<!-- 4 -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="icon-bold-location me-2"></i>Budget
                    </a>
                    <div
                        class="dropdown-menu  border-0 rounded-4 shadow-sm p-0 mt-2 overflow-hidden customHeightDropDown">
                        <div class="row m-0">
                            <div
                                class="col-lg-5 d-none d-lg-flex flex-column align-items-start justify-content-end bg-primary text-white p-3">
                                <i class="icon-bold-location me-2 mb-2 fs-1"></i>
                                <h3 class="fs-4 mb-2 fw-bold" for="">Budget</h3>
                                <p class="customFontSize-12px m-0">
                                    "The geography module provides a comprehensive database for storing and
                                    accessing store locations and channel information, facilitating seamless
                                    integration and analysis of spatial data."
                                </p>
                            </div>
                            <div class="col col-lg-7 py-2 px-0">
                                <ul class="p-0 list-unstyled overflow-y-scroll customHeightDropDownLi cs-scrollbar-style">
                                    <li class="nav-item py-1">
                                        <a href=""
                                            class="w-100 nav-link py-1 border-0 bg-transparent d-flex justify-content-start small align-items-center text-black customFontSize-11px">
                                            <img class="dropDownImage me-1" src="/images/9-store-edit-request-level-1.svg" alt="" />Customer
                                        </a>
                                    </li>
                                    <!-- add More Sub-Menu items -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
<!-- 5 -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="icon-bold-location me-2"></i>Activity
                    </a>
                    <div
                        class="dropdown-menu  border-0 rounded-4 shadow-sm p-0 mt-2 overflow-hidden customHeightDropDown">
                        <div class="row m-0">
                            <div
                                class="col-lg-5 d-none d-lg-flex flex-column align-items-start justify-content-end bg-primary text-white p-3">
                                <i class="icon-bold-location me-2 mb-2 fs-1"></i>
                                <h3 class="fs-4 mb-2 fw-bold" for="">Activity</h3>
                                <p class="customFontSize-12px m-0">
                                    "The geography module provides a comprehensive database for storing and
                                    accessing store locations and channel information, facilitating seamless
                                    integration and analysis of spatial data."
                                </p>
                            </div>
                            <div class="col col-lg-7 py-2 px-0">
                                <ul class="p-0 list-unstyled overflow-y-scroll customHeightDropDownLi cs-scrollbar-style">
                                    <li class="nav-item py-1">
                                        <a href=""
                                            class="w-100 nav-link py-1 border-0 bg-transparent d-flex justify-content-start small align-items-center text-black customFontSize-11px">
                                            <img class="dropDownImage me-1" src="/images/9-store-edit-request-level-1.svg" alt="" />Customer
                                        </a>
                                    </li>
                                    <!-- add More Sub-Menu items -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
<!-- 6 -->      
<li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="icon-bold-location me-2"></i>Claims
                    </a>
                    <div
                        class="dropdown-menu  border-0 rounded-4 shadow-sm p-0 mt-2 overflow-hidden customHeightDropDown">
                        <div class="row m-0">
                            <div
                                class="col-lg-5 d-none d-lg-flex flex-column align-items-start justify-content-end bg-primary text-white p-3">
                                <i class="icon-bold-location me-2 mb-2 fs-1"></i>
                                <h3 class="fs-4 mb-2 fw-bold" for="">Claims</h3>
                                <p class="customFontSize-12px m-0">
                                    "The geography module provides a comprehensive database for storing and
                                    accessing store locations and channel information, facilitating seamless
                                    integration and analysis of spatial data."
                                </p>
                            </div>
                            <div class="col col-lg-7 py-2 px-0">
                                <ul class="p-0 list-unstyled overflow-y-scroll customHeightDropDownLi cs-scrollbar-style">
                                    <li class="nav-item py-1">
                                        <a href=""
                                            class="w-100 nav-link py-1 border-0 bg-transparent d-flex justify-content-start small align-items-center text-black customFontSize-11px">
                                            <img class="dropDownImage me-1" src="/images/9-store-edit-request-level-1.svg" alt="" />Customer
                                        </a>
                                    </li>
                                    <!-- add More Sub-Menu items -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
<!-- 7 -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="icon-bold-location me-2"></i>User Management
                    </a>
                    <div
                        class="dropdown-menu  border-0 rounded-4 shadow-sm p-0 mt-2 overflow-hidden customHeightDropDown">
                        <div class="row m-0">
                            <div
                                class="col-lg-5 d-none d-lg-flex flex-column align-items-start justify-content-end bg-primary text-white p-3">
                                <i class="icon-bold-location me-2 mb-2 fs-1"></i>
                                <h3 class="fs-4 mb-2 fw-bold" for="">User Management</h3>
                                <p class="customFontSize-12px m-0">
                                    "The geography module provides a comprehensive database for storing and
                                    accessing store locations and channel information, facilitating seamless
                                    integration and analysis of spatial data."
                                </p>
                            </div>
                            <div class="col col-lg-7 py-2 px-0">
                                <ul
                                    class="p-0 list-unstyled overflow-y-scroll customHeightDropDownLi cs-scrollbar-style">
                                    <li class="nav-item py-1">
                                        <a href="{{route('users')}}"
                                            class="w-100 nav-link py-1 border-0 bg-transparent d-flex justify-content-start small align-items-center text-black customFontSize-11px">
                                            <img class="dropDownImage me-1" src="/images/9-store-edit-request-level-1.svg" alt="" />Users
                                        </a>
                                    </li>
                                    <li class="nav-item py-1">
                                        <a href="{{ route('roles.index') }}"
                                            class="w-100 nav-link py-1 border-0 bg-transparent d-flex justify-content-start small align-items-center text-black customFontSize-11px">
                                            <img class="dropDownImage me-1" src="/images/1-store-edit-request-level-1.svg" alt="" />Assign User Role
                                        </a>
                                    </li>
                                    <li class="nav-item py-1">
                                        <a href="{{ route('permissions.index') }}"
                                            class="w-100 nav-link py-1 border-0 bg-transparent d-flex justify-content-start small align-items-center text-black customFontSize-11px">
                                            <img class="dropDownImage me-1" src="/images/1-store-edit-request-level-1.svg" alt="" />Add Permission
                                        </a>
                                    </li>
                                    <!-- add More Sub-Menu items -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            <!-- Add More Main_menu Items -->

            </ul>
        </div>
        <i class="icon-outline-arrow-left-2  text-white z-2 align-items-center justify-content-center menu-toggle-btn 
        vertical-menu-toggle-btn sidebar-toggle" id="showhidebtnToggler"
            role="button">
        </i>
        <i class="icon-outline-arrow-up-2 menu-toggle-btn navbar-toggle" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent">
        </i>
    </nav>