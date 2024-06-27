@extends('layouts.login-layout')

@section('title') Login @endsection

@section('styles')
    <style>

    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="/css/bootstrap.theme.min.css">
    <link rel="stylesheet" href="/css/buttons.css">
    <link rel="stylesheet" href="/css/style.css">
@endsection

@section('body')
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-12 background-image customRoundedBorder">
                <div
                    class="d-flex flex-column justify-content-end justify-content-sm-end justify-content-md-center justify-content-lg-center align-items-start align-items-lg-center align-items-md-center align-items-sm-start p-lg-0 p-sm-4 p-md-0 px-2 py-4 h-100 customHeightBackground-responsive">
                    <img class="img-fluid mb-3 px-lg-5 px-md-0 px-0 Salesflo-Logo-custom-Width"
                        src="/images/Salesflo_logo.svg" alt="">
                    <h3 class="text-white my-1 d-lg-block d-md-block d-sm-none d-none">Tagline will be written here</h3>
                    <h3 class="text-white my-1 d-lg-none d-md-none d-sm-block d-block">Welcome to Salesflo!</h3>
                    <p class="text-white d-lg-block d-md-block d-sm-none d-none m-0 customFontSize-18px">Sub text will
                        be written here</p>
                    <p
                        class="text-white d-lg-none d-md-none d-sm-block d-block m-0 customFontSize-14px customHeightSubHeading">
                        Log in to fire up the system 🚀</p>
                </div>
                <div class="alert border-0 alert-dismissible fade show align-items-center justify-content-between px-2 py-1 w-100 mb-2 d-lg-none d-md-none d-sm-none d-none customBackgroundColorAlertGreen customMarginAlert"
                    id="suceesful-message-mobile" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-check-circle-fill customColorAlertGreen fs-5 me-2 customFontIconAlert"></i>
                        <strong class="customFontSize-12px customFontSizeMobile-10px customColorAlertGreen m-0">Password
                            successfully changed!</strong>
                    </div>
                    <button type="button" class="customTransparentBackground p-0 border-0" data-bs-dismiss="alert"
                        aria-label="Close"><i class="bi bi-x fs-5 customColorAlertGreen"></i></button>
                </div>
                <div class="alert border-0 alert-dismissible fade show align-items-center justify-content-between px-2 py-1 w-100 mb-2 d-lg-none d-md-none d-sm-none d-none customBackgroundColorAlertBrown customMarginAlert"
                    id="warning-message-mobile" role="alert">
                    <div class="d-flex align-items-center">
                        <i
                            class="bi bi-exclamation-circle-fill customColorAlertBrown fs-5 me-2 customFontIconAlert"></i>
                        <strong class="customFontSize-12px customFontSizeMobile-10px customColorAlertBrown m-0">Sorry,
                            your account has been locked for 30 mins</strong>
                    </div>
                    <button type="button" class="customTransparentBackground p-0 border-0" aria-label="Close"><i
                            class="bi bi-x fs-5 customColorAlertBrown"></i></button>
                </div>
                <div class="alert border-0 alert-dismissible fade show align-items-center justify-content-between px-2 py-1 w-100 mb-2 d-lg-none d-md-none d-sm-none d-none customBackgroundColorAlertBrown customMarginAlert"
                    id="warning-message2-mobile" role="alert">
                    <div class="d-flex align-items-center">
                        <i
                            class="bi bi-exclamation-circle-fill customColorAlertBrown fs-5 me-2 customFontIconAlert"></i>
                        <strong class="customFontSize-12px customFontSizeMobile-10px customColorAlertBrown m-0">Session
                            expired, please login back.</strong>
                    </div>
                    <button type="button" class="customTransparentBackground p-0 border-0" data-bs-dismiss="alert"
                        aria-label="Close"><i class="bi bi-x fs-5 customColorAlertBrown"></i></button>
                </div>
                <div class="alert border-0 alert-dismissible fade show align-items-center justify-content-between px-2 py-1 w-100 mb-2 d-lg-none d-md-none d-sm-none d-none customBackgroundColorAlertRed customMarginAlert"
                    id="warning-message3-mobile" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-exclamation-circle-fill customColorAlertRed fs-5 me-2 customFontIconAlert"></i>
                        <strong class="customFontSize-12px customFontSizeMobile-10px customColorAlertRed m-0">Incorrect
                            login credentials.</strong>
                    </div>
                    <button type="button" class="customTransparentBackground p-0 border-0" data-bs-dismiss="alert"
                        aria-label="Close"><i class="bi bi-x fs-5 customColorAlertRed"></i></button>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="d-flex flex-column justify-content-center align-items-center h-100">


                    <!-- <form action="" class="customFormWidth my-auto" id="loginForm"> -->
                    <form method="POST" action="{{ route('login') }}" class="customFormWidth my-auto" id="loginForm">
                        @csrf
                        <h2 class="align-self-start fw-bold fs-3 mb-1 d-lg-block d-md-block d-sm-none d-none">Welcome to
                            Salesflo!</h2>
                        <p class="align-self-start text-secondary small mb-3 d-lg-block d-md-block d-sm-none d-none">
                            Log in to fire up the system 🚀</p>

                        <div class="customMinHeight">
                            <div class="alert border-0 alert-dismissible fade show align-items-center justify-content-between px-2 py-1 mb-2 d-none customBackgroundColorAlertGreen"
                                id="suceesful-message" role="alert">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-exclamation-circle-fill customColorAlertGreen fs-5"></i>
                                    <strong class="customFontSize-12px customColorAlertGreen mx-2">Password successfully
                                        changed!</strong>
                                </div>
                                <button type="button" class="customTransparentBackground border-0"
                                    data-bs-dismiss="alert" aria-label="Close"><i
                                        class="bi bi-x fs-5 customColorAlertGreen"></i></button>
                            </div>
                            <div class="alert border-0 alert-dismissible fade show align-items-center justify-content-between px-2 py-1 mb-2 d-none customBackgroundColorAlertBrown"
                                id="warning-message" role="alert">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-exclamation-circle-fill customColorAlertBrown fs-5"></i>
                                    <strong class="customFontSize-12px customColorAlertBrown mx-2">Sorry, your account
                                        has
                                        been locked for 30 mins.</strong>
                                </div>
                                <button type="button" class="customTransparentBackground border-0" aria-label="Close"><i
                                        class="bi bi-x fs-5 customColorAlertBrown"></i></button>
                            </div>
                            <div class="alert border-0 alert-dismissible fade show align-items-center justify-content-between px-2 py-1 mb-2 d-none customBackgroundColorAlertBrown"
                                id="warning-message2" role="alert">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-exclamation-circle-fill customColorAlertBrown fs-5"></i>
                                    <strong class="customFontSize-12px customColorAlertBrown mx-2">Session expired,
                                        please
                                        login back.</strong>
                                </div>
                                <button type="button" class="customTransparentBackground border-0"
                                    data-bs-dismiss="alert" aria-label="Close"><i
                                        class="bi bi-x fs-5 customColorAlertBrown"></i></button>
                            </div>
                            <div class="alert border-0 alert-dismissible fade show align-items-center justify-content-between px-2 py-1 mb-2 d-none customBackgroundColorAlertRed"
                                id="warning-message3" role="alert">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-exclamation-circle-fill customColorAlertRed fs-5"></i>
                                    <strong class="customFontSize-12px customColorAlertRed mx-2">Incorrect login
                                        credentials.</strong>
                                </div>
                                <button type="button" class="customTransparentBackground border-0"
                                    onclick="closeAlert()"><i class="bi bi-x fs-5 customColorAlertRed"></i></button>
                            </div>
                        </div>
                        <label class="form-label small fw-bold mb-1" for="" id="email-label">Email <span class="validation-color-red">*</span></label>
                        <input id="email" type="email" class="form-control mb-4 @error('email') is-invalid @enderror"  name="email" placeholder="example@mail.com" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <!-- <input title="" class="form-control mb-4" type="text" id="username" name="username" placeholder="example@mail.com" required /> -->
                        <label class="form-label small fw-bold mb-1" id="password-label" for="">Password <span class="validation-color-red">*</span></label>
                        <div class="d-flex align-items-center">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <!-- <input title="" class="form-control" type="password" id="password" name="password" placeholder="Enter password" required> -->
                            <i class="icon-outline-eye-slash password-show-class" id="togglePassword"></i>
                        </div>
                        <label for="" class="customFontSize-12px validation-color-red mb-4 invisible"
                            id="incorrect-credentials-login-page">Incorrect login credentials.</label>
                        <div class="d-flex justify-content-between align-items-center">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-decoration-none customFontSize-12px fw-bold customColorBlue">Forgot Password?</a>
                        @endif
                           
                            <button id="login-button"
                                class="btn btn-primary btn-primary-gradient border-0 customWidthButton d-flex align-items-center justify-content-center"
                                type="submit" onclick="handleLogin()">
                                <span class="spinner-border spinner-border-sm text-white me-2 d-none" id="loader"
                                    role="status" aria-hidden="true"></span>
                                <span class="text-white" id="btn-text">Login</span>
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

@section('scripts')
    <script src="/js/jquery-3.7.0.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <SCRipt src="/js/login-screens.js"></SCRipt>
    
    <script>

    </script>
@endsection