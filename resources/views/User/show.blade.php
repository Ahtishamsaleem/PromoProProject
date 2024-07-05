@extends('layouts.Master-Layout')

@section('title')Show User @endsection

@section('styles')
<style>
        input.is-invalid + .invalid-feedback { display: block; }
</style>
@endsection

@section('body')
<main class="main-content">

<div class="container-fluid topbarCustomPadding">

    <div class="page-title d-flex mb-3 justify-content-bentween">
        <h3 class="title fw-bold m-0">Show User</h3>
        <button type="button" class="btn btn-sm btn-link text-decoration-none text-black p-0 ms-auto" id="showhidebtn">Show All <i class="icon-outline-arrow-down-1" id="showhidebtn2"></i></button>
    </div>

    <div class="inner-page-content mb-4 ">
        <div class="main-grid-container ">					
                        <div class="returnback-heading px-3 py-2 d-flex align-items-center mb-3 mt-2">
                            <a href="{{route('users.index')}}" class="btn btn-outline-link p-0 icon-outline-arrow-left-2 text-primary fs-5 me-1" id="bu-backto-icon"></a>
                            <span class="fs-6 text-black fw-normal ">Show User</span>
                        </div>
                        <div class="main-form-container px-md-5 px-3">
                            <h6 class="title small fw-bold mb-4 text-uppercase">User Information:</h6>
                                <div class="row">
                                    <div class="col-md-7 col-12">
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="addManufacturer" class="form-label small">Select User Type :</label>
                                            </div>
                                            <div class="col-md-7">
                                            <select class="form-select form-select-sm form-single-select defaultselect @error('user_type') is-invalid @enderror" id="user_type" value="{{$User->user_designation_id}}" name="user_type" size="5" data-initialized="false" >
                                                    <option value="1" {{($User->user_designation_id == 1) ? 'Selected': ''}}>Admin</option>
                                                    <option value="2" {{($User->user_designation_id == 2) ? 'Selected': ''}}>Manufacturer</option>
                                                    <option value="3" {{($User->user_designation_id == 3) ? 'Selected': ''}}>Distributor</option>
                                                    <option value="4" {{($User->user_designation_id == 4) ? 'Selected': ''}}>Retailer</option>
                                                    <option value="5" {{($User->user_designation_id == 5) ? 'Selected': ''}}>User</option>
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
                                            <input type="text" class="form-control form-control-sm @error('username') is-invalid @enderror" id="username" value="{{ $User->user_name }}" name="username" placeholder="Enter User Name" />
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
                                            <input type="text" class="form-control form-control-sm @error('first_name') is-invalid @enderror" id="first_name" value="{{$User->first_name}}" name="first_name" placeholder="Enter First Name" />
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
                                            <input type="text" class="form-control form-control-sm @error('last_name') is-invalid @enderror" id="last_name" value="{{$User->last_name}}" name="last_name" placeholder="Enter Last Name" />
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
                                            <input type="text" class="form-control form-control-sm @error('phone') is-invalid @enderror" id="phone" value="{{$User->phone}}" name="phone" placeholder="Enter Phone Number" />
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
                                            <input type="text" class="form-control form-control-sm @error('email') is-invalid @enderror" id="email" value="{{$User->email}}" name="email" placeholder="Enter Email" />
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
                                            <input type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" id="password" value="{{$User->password}}" name="password" placeholder="Enter Password" />
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
                                                            <label for="BussinessUnitAddedBy" class="form-label small text-capitalize">User added by:</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control form-control-sm default-state custominput-padding" value="salesfloadmin" placeholder="" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-md-5">
                                                            <label for="BussinessUnitAddedOn" class="form-label small text-capitalize">User added on:</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control form-control-sm default-state custominput-padding" value="{{now()}}" placeholder="" disabled />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                   
                                    </div>
                                </div>
                        </div>
                    </div>
            </div>

        </div>
    </div>
</div>

</main>
@endsection

@section('scripts')

@endsection