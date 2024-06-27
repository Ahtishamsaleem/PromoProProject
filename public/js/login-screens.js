// ---LOGIN PAGE---
const username = document.getElementById("email");
const my_username = username.innerText = "email";
const password = document.getElementById("password");
const my_password = password.innerText = "123";

// CODE FOR TOGGLING PASSWORD
const togglePassword = document.querySelector("#togglePassword");
$("#togglePassword").click(function () {
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
    this.classList.toggle("icon-outline-eye");
    if ($('#togglePassword').hasClass('icon-outline-eye-slash')) {
        $('#togglePassword').removeClass('icon-outline-eye-slash')
        $('#togglePassword').addClass('icon-outline-eye');
    }
    else {
        $('#togglePassword').addClass('icon-outline-eye-slash')
        $('#togglePassword').removeClass('icon-outline-eye');
    }
});

// CODE FOR CLOSING ALERT BOX
function closeAlert() {
    $('#warning-message3').removeClass('validation-display-flex')
    $('#warning-message3-mobile').removeClass('validation-display-flex-mobile')
}

// CODE FOR LOGIN BUTTON
var attempts = 1;
var now = new Date().getTime();
function handleLogin() {
    // LOADER CODE
    $('#loader').addClass('loader-d-inline');
    $('#btn-text').text('Loading')

    // USERNAME AND PASSWORD FEILD EMPTY
    if (!$('#username').val() && !$('#password').val()) {
        $('#username-label').addClass('validation-color-red')
        $('#username').addClass('validation-background-color-red')
        $('#username').addClass('validation-border-color-red')
        $('#password-label').addClass('validation-color-red')
        $('#password').addClass('validation-background-color-red')
        $('#password').addClass('validation-border-color-red')
        $('#loader').removeClass('loader-d-inline');
        $('#btn-text').text('Login')
        return
    }
    // USERNAME EMPTY
    if (!$('#username').val()) {
        $('#username-label').addClass('validation-color-red')
        $('#username').addClass('validation-background-color-red')
        $('#username').addClass('validation-border-color-red')
        $('#loader').removeClass('loader-d-inline');
        $('#btn-text').text('Login')
        return
    }
    // PASSWORD EMPTY
    if (!$('#password').val()) {
        $('#password-label').addClass('validation-color-red')
        $('#password').addClass('validation-background-color-red')
        $('#password').addClass('validation-border-color-red')
        $('#loader').removeClass('loader-d-inline');
        $('#btn-text').text('Login')
        return
    }
    // USERNAME OR PASSWORD NOT MATCHING FROM DATABASE
    if ($('#username').val() !== my_username || $('#password').val() !== my_password) {
        $('#username-label').addClass('validation-color-red')
        $('#username').addClass('validation-background-color-red')
        $('#username').addClass('validation-border-color-red')
        $('#password-label').addClass('validation-color-red')
        $('#password').addClass('validation-background-color-red')
        $('#password').addClass('validation-border-color-red')
        $('#togglePassword').addClass('validation-color-red')
        $('#incorrect-credentials-login-page').addClass('visible-incorrect-credentials')
        $('#warning-message3').addClass('validation-display-flex')
        $('#warning-message3-mobile').addClass('validation-display-flex-mobile')
        $('#username').removeClass('validation-background-color-green')
        $('#username').removeClass('validation-border-color-green')
        $('#password').removeClass('validation-background-color-green')
        $('#password').removeClass('validation-border-color-green')
        $('#loader').removeClass('loader-d-inline');
        $('#btn-text').text('Login')

        // ERROR OCCURED IF MORE THAN 3 ATTEMPTS TAKEN
        attempts += 1;
        if (attempts > 3) {
            $('#warning-message').addClass('validation-display-flex')
            $('#warning-message-mobile').addClass('validation-display-flex-mobile')
            $('#warning-message3').removeClass('validation-display-flex')
            $('#warning-message3-mobile').removeClass('validation-display-flex-mobile')
            $("#username").prop("disabled", true);
            $("#password").prop("disabled", true);
            $("#username").addClass('opacity-9');
            $("#password").addClass('opacity-9');
            setInterval(function () {
                $("#username").prop("disabled", false);
                $("#password").prop("disabled", false);
                $("#username").addClass('opacity');
                $("#password").addClass('opacity');
                $('#username-label').removeClass('validation-color-red')
                $('#username').removeClass('validation-background-color-red')
                $('#username').removeClass('validation-border-color-red')
                $('#password-label').removeClass('validation-color-red')
                $('#password').removeClass('validation-background-color-red')
                $('#password').removeClass('validation-border-color-red')
                $('#togglePassword').removeClass('validation-color-red')
                $('#incorrect-credentials-login-page').removeClass('visible-incorrect-credentials')
                $('#warning-message').removeClass('validation-display-flex')
                $('#warning-message-mobile').removeClass('validation-display-flex-mobile')
            }, 5000);
            attempts = 1
        }
        // 30 min = 1800000
        return
    }
    else {
        $('#username-label').removeClass('validation-color-red')
        $('#username').removeClass('validation-background-color-red')
        $('#username').removeClass('validation-border-color-red')
        $('#password-label').removeClass('validation-color-red')
        $('#password').removeClass('validation-background-color-red')
        $('#password').removeClass('validation-border-color-red')
        $('#togglePassword').removeClass('validation-color-red')
        $('#incorrect-credentials-login-page').removeClass('visible-incorrect-credentials')
        $('#warning-message3').removeClass('validation-display-flex')
        $('#warning-message3-mobile').removeClass('validation-display-flex-mobile')
        $("#username").prop("disabled", true);
        $("#password").prop("disabled", true);
        setInterval(function () {
            $('#loader').removeClass('loader-d-inline');
            $('#btn-text').text('Login')
            $("#username").prop("disabled", false);
            $("#password").prop("disabled", false);
            window.location.href = '../dashboard.php';
        }, 5000);
    }
}

// ---FORGOT PASSWORD---
const forgotPasswordUsername = document.getElementById("forgot-password-username")
const forgotPasswordEmail = document.getElementById("forgot-password-email")

// CODE FOR FORGOT PASSWORD BUTTON
function handleForgotPassword() {
    $('#loader-forgot-page').addClass('loader-d-inline');
    $('#btn-text-forgot-button').text('Loading')

    // USERNAME AND EMAIL FIELD EMPTY
    if (!$('#forgot-password-username').val() && !$('#forgot-password-email').val()) {
        $('#forgot-password-username-label').addClass('validation-color-red')
        $('#forgot-password-username').addClass('validation-background-color-red')
        $('#forgot-password-username').addClass('validation-border-color-red')
        $('#forgot-password-email-label').addClass('validation-color-red')
        $('#forgot-password-email').addClass('validation-background-color-red')
        $('#forgot-password-email').addClass('validation-border-color-red')
        $('#loader-forgot-page').removeClass('loader-d-inline');
        $('#btn-text-forgot-button').text('Submit')
        return
    }

    // USERNAME FIELD EMPTY
    if (!$('#forgot-password-username').val()) {
        $('#forgot-password-username-label').addClass('validation-color-red')
        $('#forgot-password-username').addClass('validation-background-color-red')
        $('#forgot-password-username').addClass('validation-border-color-red')
        $('#loader-forgot-page').removeClass('loader-d-inline');
        $('#btn-text-forgot-button').text('Submit')
        return
    }

    // EMAIL FIELD EMPTY
    if (!$('#forgot-password-email').val()) {
        $('#forgot-password-email-label').addClass('validation-color-red')
        $('#forgot-password-email').addClass('validation-background-color-red')
        $('#forgot-password-email').addClass('validation-border-color-red')
        $('#loader-forgot-page').removeClass('loader-d-inline');
        $('#btn-text-forgot-button').text('Submit')
        return
    }

    // USERNAME NOT MATCHING FROM DATABASE
    if ($('#forgot-password-username').val() !== "admin") {
        $('#forgot-password-username-label').addClass('validation-color-red')
        $('#forgot-password-username').addClass('validation-background-color-red')
        $('#forgot-password-username').addClass('validation-border-color-red')
        $('#incorrect-credentials-forgot-password-page').addClass('visible-incorrect-credentials')
        $('#loader-forgot-page').removeClass('loader-d-inline');
        $('#btn-text-forgot-button').text('Submit')
        return
    }
    else {
        $('#forgot-password-username-label').removeClass('validation-color-red')
        $('#forgot-password-username').removeClass('validation-background-color-red')
        $('#forgot-password-username').removeClass('validation-border-color-red')
        $('#incorrect-credentials-forgot-password-page').removeClass('visible-incorrect-credentials')
        $('#loader-forgot-page').addClass('loader-d-inline');
        $('#btn-text-forgot-button').text('Loading')
    }

    // EMAIL NOT MATCHING FROM DATABASE
    if ($('#forgot-password-email').val() !== "hamzabintariq@salesflo.com") {
        $('#forgot-password-email-label').addClass('validation-color-red')
        $('#forgot-password-email').addClass('validation-background-color-red')
        $('#forgot-password-email').addClass('validation-border-color-red')
        $('#incorrect-credentials-forgot-password-page2').addClass('visible-incorrect-credentials')
        $('#loader-forgot-page').removeClass('loader-d-inline');
        $('#btn-text-forgot-button').text('Submit')
        return
    }
    else {
        $('#forgot-password-email-label').removeClass('validation-color-red')
        $('#forgot-password-email').removeClass('validation-background-color-red')
        $('#forgot-password-email').removeClass('validation-border-color-red')
        $('#incorrect-credentials-forgot-password-page2').removeClass('visible-incorrect-credentials')
        $("#forgot-password-username").prop("disabled", true);
        $("#forgot-password-email").prop("disabled", true);
        setInterval(function () {
            $('#loader-forgot-page').removeClass('loader-d-inline');
            $('#btn-text-forgot-button').text('Submit')
            $("#forgot-password-username").prop("disabled", false);
            $("#forgot-password-email").prop("disabled", false);
            window.location.href = 'email-confirmation.php';
        }, 5000);

    }
}

// ---RESET PASSWORD---
 // CODE FOR TOGGLING PASSWORD
 const resetPassword = document.getElementById('reset-password')
 $("#togglePasswordReset").click(function () {
     const type = resetPassword.getAttribute("type") === "password" ? "text" : "password";
     resetPassword.setAttribute("type", type);
     this.classList.toggle("icon-outline-eye");
     if ($('#togglePasswordReset').hasClass('icon-outline-eye-slash')) {
         $('#togglePasswordReset').removeClass('icon-outline-eye-slash')
         $('#togglePasswordReset').addClass('icon-outline-eye');
     }
     else {
         $('#togglePasswordReset').addClass('icon-outline-eye-slash')
         $('#togglePasswordReset').removeClass('icon-outline-eye');
     }
 });

 // CODE FOR TOGGLING RESET PASSWORD
 const confirmresetPassword = document.getElementById('confirm-reset-password')
 $("#togglePasswordConfirmReset").click(function () {
     const type = confirmresetPassword.getAttribute("type") === "password" ? "text" : "password";
     confirmresetPassword.setAttribute("type", type);
     this.classList.toggle("icon-outline-eye");
     if ($('#togglePasswordConfirmReset').hasClass('icon-outline-eye-slash')) {
         $('#togglePasswordConfirmReset').removeClass('icon-outline-eye-slash')
         $('#togglePasswordConfirmReset').addClass('icon-outline-eye');
     }
     else {
         $('#togglePasswordConfirmReset').addClass('icon-outline-eye-slash')
         $('#togglePasswordConfirmReset').removeClass('icon-outline-eye');
     }
 });
 var numbers = /[0-9]/g;
 var lowerCaseLetters = /[a-z]/g;
 var upperCaseLetters = /[A-Z]/g;
 var specialCharacters = /^(?=.*[~`!@#$%^&;*()_=+\[\]{};:'";.,<>;\\|\/?;;-])/g;

 var input = document.getElementById('reset-password');
 var inputReset = document.getElementById('confirm-reset-password');
 const resetPasswordButton = document.querySelector('#reset-password-button')

 // RESET PASSWORD FIELD VALIDATION
 input.onkeyup = function () {
     $("#passwords-didnt-matched").removeClass('visible-incorrect-credentials');
     if ($('#reset-password').val().match(upperCaseLetters) && $('#reset-password').val().match(lowerCaseLetters)) {
         $("#passwordResetLimits-1").removeClass("icon-bold-close-circle");
         $("#passwordResetLimits-1").removeClass("customColorRed");
         $("#passwordResetLimits-1").addClass("icon-bold-tick-circle");
         $("#passwordResetLimits-1").addClass("customColorGreen");
     }
     else {
         $("#passwordResetLimits-1").addClass("icon-bold-close-circle");
         $("#passwordResetLimits-1").addClass("customColorRed");
         $("#passwordResetLimits-1").removeClass("icon-bold-tick-circle");
         $("#passwordResetLimits-1").removeClass("customColorGreen");
     }
     if ($('#reset-password').val().match(numbers)) {
         $("#passwordResetLimits-2").removeClass("icon-bold-close-circle");
         $("#passwordResetLimits-2").removeClass("customColorRed");
         $("#passwordResetLimits-2").addClass("icon-bold-tick-circle");
         $("#passwordResetLimits-2").addClass("customColorGreen");

     }
     else {
         $("#passwordResetLimits-2").addClass("icon-bold-close-circle");
         $("#passwordResetLimits-2").addClass("customColorRed");
         $("#passwordResetLimits-2").removeClass("icon-bold-tick-circle");
         $("#passwordResetLimits-2").removeClass("customColorGreen");
     }
     if ($('#reset-password').val().match(specialCharacters)) {
         $("#passwordResetLimits-3").removeClass("icon-bold-close-circle");
         $("#passwordResetLimits-3").removeClass("customColorRed");
         $("#passwordResetLimits-3").addClass("icon-bold-tick-circle");
         $("#passwordResetLimits-3").addClass("customColorGreen");
     }
     else {
         $("#passwordResetLimits-3").addClass("icon-bold-close-circle");
         $("#passwordResetLimits-3").addClass("customColorRed");
         $("#passwordResetLimits-3").removeClass("icon-bold-tick-circle");
         $("#passwordResetLimits-3").removeClass("customColorGreen");
     }
     if ($('#reset-password').val().length >= 8) {
         $("#passwordResetLimits-4").removeClass("icon-bold-close-circle");
         $("#passwordResetLimits-4").removeClass("customColorRed");
         $("#passwordResetLimits-4").addClass("icon-bold-tick-circle");
         $("#passwordResetLimits-4").addClass("customColorGreen");
     }
     else {
         $("#passwordResetLimits-4").addClass("icon-bold-close-circle");
         $("#passwordResetLimits-4").addClass("customColorRed");
         $("#passwordResetLimits-4").removeClass("icon-bold-tick-circle");
         $("#passwordResetLimits-4").removeClass("customColorGreen");
     }
     if ($('#passwordResetLimits-1').hasClass("customColorGreen") && $('#passwordResetLimits-2').hasClass("customColorGreen") && $('#passwordResetLimits-3').hasClass("customColorGreen") && $('#passwordResetLimits-4').hasClass("customColorGreen")) {
         $("#confirm-reset-password").prop("disabled", false);
         $('#reset-password').removeClass('validation-border-color-red')
         $('#reset-password').removeClass('validation-background-color-red')
         $('#reset-password').addClass('validation-border-color-green')
         $('#reset-password').addClass('validation-background-color-green')
     }
     else {
         $("#confirm-reset-password").prop("disabled", true);
         $('#reset-password').addClass('validation-border-color-red')
         $('#reset-password').addClass('validation-background-color-red')
         $('#reset-password').removeClass('validation-border-color-green')
         $('#reset-password').removeClass('validation-background-color-green')
         $('#confirm-reset-password').removeClass('validation-border-color-red')
         $('#confirm-reset-password').removeClass('validation-background-color-red')
         $('#confirm-reset-password').removeClass('validation-border-color-green')
         $('#confirm-reset-password').removeClass('validation-background-color-green')
     }
     if ($('#reset-password').val() !== $('#confirm-reset-password').val() && $('#confirm-reset-password').val()) {
         $('#confirm-reset-password').addClass('validation-border-color-red')
         $('#confirm-reset-password').removeClass('validation-border-color-green')
         $('#confirm-reset-password').addClass('validation-background-color-red')
         $('#confirm-reset-password').removeClass('validation-background-color-green')
         $("#reset-password-button").removeClass('customOpacityForgotpassBtn')
         $("#reset-password-button").prop("disabled", true);
         $('#confirm-reset-password-label').addClass('validation-color-red');
     }
     if ($('#reset-password').val() === $('#confirm-reset-password').val() && $('#confirm-reset-password').val()) {
         $('#confirm-reset-password').removeClass('validation-border-color-red')
         $('#confirm-reset-password').addClass('validation-border-color-green')
         $('#confirm-reset-password').removeClass('validation-background-color-red')
         $('#confirm-reset-password').addClass('validation-background-color-green')
         $("#reset-password-button").addClass('customOpacityForgotpassBtn')
         $("#reset-password-button").prop("disabled", false);
     }
     if ($('#reset-password').val() === "123") {
         $('#reset-password-label').addClass('validation-color-red')
         $('#reset-password').addClass('validation-background-color-red')
         $('#reset-password').removeClass('validation-background-color-green')
         $('#reset-password').addClass('validation-border-color-red')
         $('#reset-password').removeClass('validation-border-color-green')
         $('#incorrect-credentials-password-reset-page').addClass('visible-incorrect-credentials')
         $("#confirm-reset-password").prop("disabled", true);
     }
     else {
         $('#incorrect-credentials-password-reset-page').removeClass('visible-incorrect-credentials')
         $('#confirm-reset-password-label').removeClass('validation-color-red');
     }
 };

 // RE-ENTER PASSWORD FIELD VALIDATION
 inputReset.onkeyup = function () {
     if ($('#reset-password').val() !== $('#confirm-reset-password').val()) {
         $('#confirm-reset-password-label').addClass('validation-color-red');
         $('#confirm-reset-password').addClass('validation-border-color-red');
         $('#confirm-reset-password').removeClass('validation-border-color-green');
         $('#confirm-reset-password').addClass('validation-background-color-red');
         $('#confirm-reset-password').removeClass('validation-background-color-green');
         $("#reset-password-button").removeClass('customOpacityForgotpassBtn');
         $("#passwords-didnt-matched").addClass('visible-incorrect-credentials');
         $("#reset-password-button").prop("disabled", true);
     }
     else {
         $('#confirm-reset-password-label').removeClass('validation-color-red');
         $('#confirm-reset-password').removeClass('validation-border-color-red');
         $('#confirm-reset-password').addClass('validation-border-color-green');
         $('#confirm-reset-password').removeClass('validation-background-color-red');
         $('#confirm-reset-password').addClass('validation-background-color-green');
         $("#reset-password-button").addClass('customOpacityForgotpassBtn');
         $("#passwords-didnt-matched").removeClass('visible-incorrect-credentials');
         $("#reset-password-button").prop("disabled", false);
     }
 }

 // RESET BUTTON
 function handleResetPassword() {
     $('#loader-reset').addClass('loader-d-inline');
     $('#btn-text-reset').text('Submitting')
     setInterval(function () {
         $('#loader-reset').removeClass('loader-d-inline');
         $('#btn-text-reset').text('Reset Password')
         window.location.href = 'index.php';
     }, 5000);
 }

 // CODE TO PREVENT COPY PASTE FUNCTIONALITY
 $(document).keydown(function (event) {
     if (event.ctrlKey == true && (event.which == '86'
         || event.which == '67' || event.which == '88')) {
         event.preventDefault();
     }
 });