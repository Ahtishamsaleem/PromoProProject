@extends('layouts.Master-Layout')

@section('title')Edit User @endsection

@section('styles')
<style>
        input.is-invalid + .invalid-feedback { display: block; }
</style>
@endsection

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
        <h3 class="title fw-bold m-0">Edit New User</h3>
        <button type="button" class="btn btn-sm btn-link text-decoration-none text-black p-0 ms-auto" id="showhidebtn">Show All <i class="icon-outline-arrow-down-1" id="showhidebtn2"></i></button>
    </div>
  
    <div class="inner-page-content mb-4 ">
        <div class="main-grid-container ">					
                        <div class="returnback-heading px-3 py-2 d-flex align-items-center mb-3 mt-2">
                            <a href="{{route('users.index')}}" class="btn btn-outline-link p-0 icon-outline-arrow-left-2 text-primary fs-5 me-1" id="bu-backto-icon"></a>
                            <span class="fs-6 text-black fw-normal ">Edit New User</span>
                        </div>
                        <div class="main-form-container px-md-5 px-3">
                            <h6 class="title small fw-bold mb-4 text-uppercase">User Information:</h6>
                            <form class="main-form" action="{{route('users.update',$User->id)}}" method="POST" id="userForm" >
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-7 col-12">
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="addManufacturer" class="form-label small">Select User Type :</label>
                                            </div>
                                            <div class="col-md-7">
                                            <select class="form-select form-select-sm form-single-select defaultselect @error('user_type') is-invalid @enderror" id="user_type" name="user_type" size="5" data-initialized="false" >
                                                    <option value="1" {{ ( $User->user_designation_id == '1' ) ? 'Selected' : ''}}>Admin</option>
                                                    <option value="2" {{ ( $User->user_designation_id == '2' ) ? 'Selected' : ''}}>Manufacturer</option>
                                                    <option value="3" {{ ( $User->user_designation_id == '3' ) ? 'Selected' : ''}}>Distributor</option>
                                                    <option value="4" {{ ( $User->user_designation_id == '4' ) ? 'Selected' : ''}}>Retailer</option>
                                                    <option value="5" {{ ( $User->user_designation_id == '5' ) ? 'Selected' : ''}}>User</option>
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
                                            <input type="text" class="form-control form-control-sm @error('username') is-invalid @enderror" id="username" name="username" placeholder="Enter User Name" value="{{$User->user_name }}" />
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
                                            <input type="text" class="form-control form-control-sm @error('first_name') is-invalid @enderror" id="first_name" name="first_name" placeholder="Enter First Name" value="{{ $User->first_name}}" />
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
                                            <input type="text" class="form-control form-control-sm @error('last_name') is-invalid @enderror" id="last_name" name="last_name" placeholder="Enter Last Name" value="{{ $User->last_name}}"/>
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
                                            <input type="text" class="form-control form-control-sm @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter Phone Number" value="{{ $User->phone}}"/>
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
                                            <input type="text" class="form-control form-control-sm @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter Email" value="{{ $User->email}}" />
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
                                            <input type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter Password" value="{{ $User->password}}"/>
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
                                                            <label for="BussinessUnitAddedBy" class="form-label small text-capitalize">User  added by:</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control form-control-sm default-state custominput-padding" value="salesfloadmin" placeholder="" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-md-5">
                                                            <label for="UserAddedOn" class="form-label small text-capitalize">bussiness unit added on:</label>
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
                                                <button type="submit" class="btn btn-primary btn-primary-gradient text-capitalize px-md-5 px-4" onclick="defaultAlert()">Update User </button>
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

@section('scripts')
<!-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script> -->

<script>
        $(document).ready(function(){
            const UserTypePattern = /^[1-5]{1}$/;
            const namePattern = /^[A-Za-z\s]{5,25}$/;
            const emailPattern = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,25}$/;
            const phonePattern = /^[0-9+\- ]{10,15}$/;
            const passwordPattern = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.* ).{8,16}$/;

            $("#userForm").on("submit", function(event){
                let isValid = true;

                isValid = validateField("#user_type", UserTypePattern, 'Select at least one user type') && isValid;
                isValid = validateField("#username", namePattern, 'Username is not in a valid format') && isValid;
                isValid = validateField("#first_name", namePattern, 'First name is not in a valid format') && isValid;
                isValid = validateField("#last_name", namePattern, 'Last name is not in a valid format') && isValid;
                isValid = validateField("#phone", phonePattern, 'Phone pattern is not valid') && isValid;
                isValid = validateField("#email", emailPattern, 'Email address pattern is not valid') && isValid;
                isValid = validateField("#password", passwordPattern, 'Password is not in a valid format') && isValid;

                if (!isValid) {
                    event.preventDefault();
                }
            });

            function validateField(selector, pattern, errorMessage) {
                const field = $(selector);
                const value = field.val();
                const feedbackElement = field.next(".invalid-feedback");

                if (!pattern.test(value)) {
                    field.addClass("is-invalid");
                    if (feedbackElement.length === 0) {
                        field.after('<div class="invalid-feedback">' + errorMessage + '</div>');
                    } else {
                        feedbackElement.text(errorMessage);
                    }
                    return false;
                } else {
                    field.removeClass("is-invalid");
                    field.next(".invalid-feedback").text('');
                    return true;
                }
            }
        });
</script>
@endsection