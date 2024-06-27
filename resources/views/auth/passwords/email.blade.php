@extends('layouts.login-layout')

@section('title') Forget Password @endsection

@section('body')
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-12 background-image customRoundedBorder">
                <div
                    class="d-flex flex-column justify-content-end justify-content-sm-end justify-content-md-center justify-content-lg-center align-items-start align-items-lg-center align-items-md-center align-items-sm-start p-lg-0 p-sm-4 p-md-0 px-2 py-4 h-100 customHeightBackground-responsive">
                    <img class="img-fluid mb-3 px-lg-5 px-md-0 px-0 Salesflo-Logo-custom-Width"
                        src="../assets/images/Salesflo_logo.svg" alt="">
                    <h3 class="text-white my-1 d-lg-block d-md-block d-sm-none d-none">Tagline will be written here</h3>
                    <h3 class="text-white my-1 d-lg-none d-md-none d-sm-block d-block">Forgot Password?</h3>
                    <p class="text-white d-lg-block d-md-block d-sm-none d-none m-0 customFontSize-18px">Sub text will
                        be written here</p>
                    <p
                        class="text-white d-lg-none d-md-none d-sm-block d-block m-0 customFontSize-14px customHeightSubHeading">
                        Lost access to your account? No worries! Let us help you regain access.
                        Please enter your credentials.</p>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="d-flex flex-column justify-content-center align-items-center h-100">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <h2 class="align-self-start fw-bold fs-3 mb-1 d-lg-block d-md-block d-sm-none d-none">Forgot
                            Password?</h2>
                        <p class="align-self-start text-secondary small m-0 d-lg-block d-md-block d-sm-none d-none">
                            Lost access to your account? No worries! Let us help you regain access. </p>
                        <p class="align-self-start text-secondary small mb-3 d-lg-block d-md-block d-sm-none d-none">
                            Please enter your credentials.</p>
                            <div class="customMinHeight">
                                <!-- this div is for alerts -->
                            </div>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        
                        <label class="form-label small fw-bold mb-1" for="" id="forgot-password-email-label">Email
                            <span class="validation-color-red">*</span></label>
                            <!-- new work -->
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <!-- new work -->
                        
                        <label for="" class="customFontSize-12px validation-color-red mb-4 invisible"
                            id="incorrect-credentials-forgot-password-page2">This email doesn't exist.</label>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{route('login')}}"
                                class="text-decoration-none customFontSize-12px customColorBlue fw-bold"><i
                                    class="bi bi-arrow-left"></i> Go Back To Login</a>

                            <button
                                class="btn btn-primary btn-primary-gradient border-0 customWidthButton d-flex align-items-center justify-content-center"
                                id="forgot-password-submit-button" type="submit" onclick="handleForgotPassword()">
                                <span class="spinner-border spinner-border-sm text-white me-2 d-none"
                                    id="loader-forgot-page" role="status" aria-hidden="true"></span>
                                <span class="text-white" id="btn-text-forgot-button">Submit</span>
                            </button>
                        </div>
                    </form>
                    <div class="mt-3 mb-2 text-center positionResponsive">
                        <p class="customFontSize-12px customFontSize-10px text-secondary mb-1"><a
                                class="text-secondary text-decoration-none customFontSize-12px" customFontSize-10px
                                href="">Terms
                                & Conditions</a> | <a
                                class="text-secondary text-decoration-none customFontSize-12px customFontSize-10px "
                                href="">Privacy
                                Policy</a> | <a
                                class="text-secondary text-decoration-none customFontSize-12px customFontSize-10px "
                                href="">Contact Us</a>
                        </p>
                        <p class="customFontSize-12px customFontSize-10px mb-2 text-secondary">&copy - <a
                                class="text-secondary text-decoration-none customFontSize-12px customFontSize-10px "
                                href="">salesflo.com</a>
                            - Developed by Retailistan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection