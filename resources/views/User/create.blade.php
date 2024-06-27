@extends('layouts.Master-Layout')

@section('title')Create User @endsection

@section('body')
<main class="main-content">

<div class="container-fluid topbarCustomPadding">
    <!-- <nav class="theme-breadcrumbs d-inline-block rounded mt-4 mb-3 bg-transparent p-0" aria-label="breadcrumb">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="#"><i class="icon-bold-shopping-cart me-1"></i>Product</a></li>
            <li class="breadcrumb-item"><a href="#">SKU Assortment</a></li>
            <li class="breadcrumb-item active" aria-current="page">Master SKU</li>
        </ol>
    </nav> -->
    <div class="page-title d-flex mb-3 justify-content-bentween">
        <h3 class="title fw-bold m-0">Add New User</h3>
        <button type="button" class="btn btn-sm btn-link text-decoration-none text-black p-0 ms-auto" id="showhidebtn">Show All <i class="icon-outline-arrow-down-1" id="showhidebtn2"></i></button>
    </div>
    <!-- <nav class="submenu-icon-navs d-flex flex-wrap mb-3 showonClick">
        <a href="#" class="link media media-vertical fix-width m-1 ">
            <img class="media-icon" src="assets/images/nav-modules/products/manufacturers.svg" alt="Manufacturers" />
            <div class="media-title d-block">Manufacturers</div>
        </a>
        <a href="#" class="link media media-vertical fix-width m-1 active">
            <img class="media-icon" src="assets/images/nav-modules/products/business_unit_management.svg" alt="Business Unit Management" />
            <div class="media-title d-block">Business Unit Management</div>
        </a>
        <a href="#" class="link media media-vertical fix-width m-1">
            <img class="media-icon" src="assets/images/nav-modules/products/sku_categories.svg" alt="SKU Categories" />
            <div class="media-title d-block">SKU Categories</div>
        </a>
        <a href="#" class="link media media-vertical fix-width m-1">
            <img class="media-icon" src="assets/images/nav-modules/products/sku_brands.svg" alt="SKU Brands" />
            <div class="media-title d-block">SKU Brands</div>
        </a>
        <a href="#" class="link media media-vertical fix-width m-1">
            <img class="media-icon" src="assets/images/nav-modules/products/master_skus.svg" alt="Master SKUs" />
            <div class="media-title d-block">Master SKUs</div>
        </a>
        <a href="#" class="link media media-vertical fix-width m-1 ">
            <img class="media-icon" src="assets/images/nav-modules/products/skus.svg" alt="SKUs" />
            <div class="media-title d-block">SKUs</div>
        </a>
        <a href="#" class="link media media-vertical fix-width m-1">
            <img class="media-icon" src="assets/images/nav-modules/products/skus_assortment.svg" alt="SKUs Assortment" />
            <div class="media-title d-block">SKUs Assortment</div>
        </a>
    </nav> -->
    <div class="inner-page-content mb-4 ">
        <div class="main-grid-container ">					
                        <div class="returnback-heading px-3 py-2 d-flex align-items-center mb-3 mt-2">
                            <a href="{{route('users')}}" class="btn btn-outline-link p-0 icon-outline-arrow-left-2 text-primary fs-5 me-1" id="bu-backto-icon"></a>
                            <span class="fs-6 text-black fw-normal ">Add New User</span>
                        </div>
                        <div class="main-form-container px-md-5 px-3">
                            <h6 class="title small fw-bold mb-4 text-uppercase">User Information:</h6>
                            <form class="main-form" action="{{route('users.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-7 col-12">
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="addManufacturer" class="form-label small">Select User Type :</label>
                                            </div>
                                            <div class="col-md-7">
                                            <select class="form-select form-select-sm form-single-select defaultselect @error('user_type') is-invalid @enderror" id="user_type" name="user_type" size="5" data-initialized="false" >
                                                    <option value="1">Admin</option>
                                                    <option value="2">Manufacturer</option>
                                                    <option value="3">Distributor</option>
                                                    <option value="4">Retailer</option>
                                                    <option value="5">User</option>
                                                </select>
                                                @error('user_type')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="" class="form-label small">User Name:</label>
                                            </div>
                                            <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm @error('username') is-invalid @enderror" id="username" name="username" placeholder="Enter User Name" />
                                            @error('username')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="" class="form-label small">First Name:</label>
                                            </div>
                                            <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm @error('first_name') is-invalid @enderror" id="first_name" name="first_name" placeholder="Enter First Name" />
                                            @error('first_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="" class="form-label small">Last Name:</label>
                                            </div>
                                            <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm @error('last_name') is-invalid @enderror" id="last_name" name="last_name" placeholder="Enter Last Name" />
                                            @error('last_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="" class="form-label small">Phone Number:</label>
                                            </div>
                                            <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter Phone Number" />
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="" class="form-label small">Email:</label>
                                            </div>
                                            <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter Email" />
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="" class="form-label small">Password:</label>
                                            </div>
                                            <div class="col-md-7">
                                            <input type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter Password" />
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="row align-items-center mb-3 mt-4 ">
                                            <h6 class="mb-3 text-capitalize fw-medium">Addtional Information:</h6>
                                            <div class="col-md-12">
                                                <div class="addtional-info pt-3 px-3 rounded bg-white custom-primary-border">
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-md-5">
                                                            <label for="BussinessUnitAddedBy" class="form-label small text-capitalize">Bussiness unit added by:</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control form-control-sm default-state custominput-padding" value="salesfloadmin" placeholder="" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-md-5">
                                                            <label for="BussinessUnitAddedOn" class="form-label small text-capitalize">bussiness unit added on:</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control form-control-sm default-state custominput-padding" value="August 7, 2023 at 3:39 pm" placeholder="" disabled />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <button type="submit" class="btn btn-primary btn-primary-gradient text-capitalize px-md-5 px-4" onclick="defaultAlert()">Add User </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>	
                        </div>
                    </div>
            </div>

        </div>
    </div>
</div>

</main>
@endsection
