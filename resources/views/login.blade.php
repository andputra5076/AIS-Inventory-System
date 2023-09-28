<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login | AIS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon-icon.ico" >

        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

    </head>
    <body class="">
        <div  class="page-header align-items-start min-vh-100" style="background-image: url('assets/images/Desain tanpa judul.png'); background-size: cover; ">
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">

                            <!-- Logo -->
                            <div class="card-header ">

                                    <span>
                                        <h3 class="card-header pt-2 pb-2 text-center bg-primary"><p style="color: white;">ASSETS AND INVENTORY SYSTEM (AIS)</p></h3>
                                    </span>

                            </div>

                            <div class="card-body p-3">

                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign-in</h4>
                                    <p class="text-muted mb-4">Enter your username and password to access panel.</p>
                                </div>
                                @if(session('error'))

                                @endif
                                <form id="loginForm" action="{{ route('actionlogin') }}" method="post">
    @csrf
    <div class="mb-2">
        <label for="emailaddress" class="form-label">Username</label>
        <input id="username" class="form-control" type="text" name="username" required="" placeholder="Enter your username">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <div class="input-group input-group-merge">
            <input id="password" type="password" required="" name="password" class="form-control" placeholder="Enter your password">
            <div class="input-group-text" data-password="false">
                <span class="password-eye"></span>
            </div>
        </div>
    </div>

    <div class="mb-0 mb-0 text-center">
        <button id="loginButton" class="btn btn-success" type="submit"> LOGIN </button>
    </div>
</form>

                            </div> <!-- end card-body -->
                        </div>

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt" style="color:black">
            ©<script>document.write(new Date().getFullYear())</script> PT. Rolas Nusantara Medika, All rights reserved
        </footer>

        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
<script>
    let failedAttempts = 0;
    let blocked = false;

    function blockLoginFields() {
        const usernameField = document.getElementById('username');
        const passwordField = document.getElementById('password');
        const loginButton = document.getElementById('loginButton');

        usernameField.disabled = true;
        passwordField.disabled = true;
        loginButton.disabled = true;

        blocked = true;
        setTimeout(unblockLoginFields, 60000); // Unblock after 60 seconds
    }

    function unblockLoginFields() {
        const usernameField = document.getElementById('username');
        const passwordField = document.getElementById('password');
        const loginButton = document.getElementById('loginButton');

        usernameField.disabled = false;
        passwordField.disabled = false;
        loginButton.disabled = false;

        failedAttempts = 0;
        blocked = false;
    }

    document.getElementById('loginForm').addEventListener('submit', function (event) {
        if (blocked) {
            event.preventDefault();
            return;
        }

        // Replace this with your actual login validation logic
        const isValid = validateLogin(); // Add your logic to validate the login

        if (!isValid) {
            failedAttempts++;

            if (failedAttempts >= 5) {
                blockLoginFields();
            }
        }
    });
</script>


    </body>
</html>
