<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Dashboard Profil | AIS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
        <meta content="Coderthemes" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon-icon.ico">

        <!-- third party css -->
        <link href="assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css">
        <link href="assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css">
        <link href="assets/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css">
        <link href="assets/css/vendor/select.bootstrap5.css" rel="stylesheet" type="text/css">
        <!-- third party css end -->

        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">

    </head>


    <body class="loading" data-layout="topnav" data-layout-config='{"layoutBoxed":false,"darkMode":false,"showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->

            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page" >
                <div class="content" >
                    <!-- Topbar Start -->
                    <div class="navbar-custom topnav-navbar" style="background: rgb(25, 55, 109) ">
                        <div class="container-fluid">

                            <!-- LOGO -->
                            <a href="" class="topnav-logo">
                                <span class="topnav-logo-lg">
                                    <img src="assets/images/logo-light.png" alt="" width="90"  height="59" >
                                </span>
                            </a>
                            <form class="topnav-logo" style="margin-top: 20px; ">
                                            <h4>ASSETS AND INVENTORY SYSTEM</h4>
                                        </form>


                            <ul class="list-unstyled topbar-menu float-end mb-0" style="background: rgb(25, 55, 109); padding: 12px; display: block; ">



                                <li class="dropdown ">
                                    <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" id="dropdownMenuLink" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                        <span class="account-user-avatar">
                                            <img src="assets/images/users/<?= session('data')->image ?>" alt="user-image" class="rounded-circle">
                                        </span>
                                        <span>
                                            <span class="account-user-name"><?= session('data')->name ?></span>
                                            <span class="account-position"><?= session('data')->role ?></span>
                                        </span>
                                    </a>
                                    
                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
                                        <a href="#editprofil" class="dropdown-item notify-item" data-id="{{ session('data')->id }}" data-name="{{ session('data')->name }}" data-password="{{ session('data')->password }}">
    <i class="mdi mdi-account-circle me-1"></i>
    <span>Edit Profil</span>
</a>


                                        <!-- item-->
                                        <a href="actionlogout" class="dropdown-item notify-item">
                                            <i class="mdi mdi-logout me-1"></i>
                                            <span>Logout</span>
                                        </a>

                                    </div>
                                </li>

                            </ul>
                            <a class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>

                        </div>
                    </div>
                    <!-- end Topbar -->


                    <div class="topnav">
                        <div class="container-fluid">
                            <nav class="navbar navbar-dark navbar-expand-lg topnav-menu">

                                <div class="collapse navbar-collapse" id="topnav-menu-content">
                                    <ul class="navbar-nav">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="uil-server me-1"></i>Inventaris <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                                <a href="/inventaris/kendaraan" class="dropdown-item">Kendaraan</a>
                                                <a href="/inventaris/peralatantelekomunikasi" class="dropdown-item">Peralatan Telekomunikasi</a>
                                                <a href="/inventaris/peralatankantor" class="dropdown-item">Peralatan Kantor</a>
                                                <a href="/inventaris/peralatanteknikinformatika" class="dropdown-item">Peralatan Teknik Informatika</a>
                                                <a href="/inventaris/peralatantekniklistrikdanmekanik" class="dropdown-item">Peralatan Teknik Listrik dan Mekanik</a>
                                                <a href="/inventaris/peralatanac" class="dropdown-item">Peralatan AC</a>
                                                <a href="/inventaris/peralatanlift" class="dropdown-item">Peralatan Lift</a>
                                                <a href="/inventaris/peralatanmedis" class="dropdown-item">Peralatan Medis</a>
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="uil-package me-1"></i>Aset <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                                <a href="/aset/tanah" class="dropdown-item">Tanah</a>
                                                <a href="/aset/gedungdanbangunan" class="dropdown-item">Gedung Dan Bangunan</a>
                                                <a href="/aset/kendaraandanambulance" class="dropdown-item">Kendaraan dan Ambulance</a>
                                                <a href="/aset/alattelekomunikasi" class="dropdown-item">Alat Telekomunikasi</a>
                                                <a href="/aset/alatkantor" class="dropdown-item">Alat Kantor</a>
                                                <a href="/aset/komputer" class="dropdown-item">Komputer</a>
                                                <a href="/aset/alatlistrik" class="dropdown-item">Alat Listrik</a>
                                                <a href="/aset/alatmekanik" class="dropdown-item">Alat Mekanik</a>
                                                <a href="/aset/alatac" class="dropdown-item">Alat AC</a>
                                                <a href="/aset/alatlift" class="dropdown-item">Alat Lift</a>
                                                <a href="/aset/alatmedis" class="dropdown-item">Alat Medis</a>
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class=" uil-users-alt me-1"></i>Master <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                                <?php
                                                        if (session('data')->role != 'Corporation') {

                                                        }else {
                                                            ?>
                                                            <a href="master" class="dropdown-item">Unit Usaha</a>
                                                            <?php
                                                        }
                                                        ?>
                                                <a href="/unitkerja" class="dropdown-item">Unit Kerja</a>
                                                <a href="/bidang" class="dropdown-item">Bidang</a>
                                                <a href="/petugas" class="dropdown-item">Petugas</a>

                                        </li>
                                        
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>


                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        

                                    </div>
                                    <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light-lighten p-2">
        <li class="breadcrumb-item"><a href="/welcome"><i class="uil-home-alt"></i> Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Profil</li>
    </ol>
</nav>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->



@if(session('success'))
            <div class="alert alert-success">
                <b></b> {{session('success')}}
            </div>
            @endif
                          <div class="row">
                            <div class="col-12">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <img src="assets/images/users/<?= session('data')->image ?>" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                                        <h4 class="mb-0 mt-2"><?= session('data')->name ?></h4>
                                        <p class="text-muted font-14"><?= session('data')->role ?></p>
                                        <br>

                                        <br>

                                        <button data-bs-toggle="modal" data-bs-target="#editprofil" type="button" class="btn btn-warning btn-sm mb-2">Edit</button>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                              © 2022 - <script>document.write(new Date().getFullYear())</script> PT. Rolas Nusantara Medika
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-md-block">
                                    <a target="_blank" href="https://rolasmedika.co.id/"><i class=" uil-globe me-1"></i>rolasmedika.co.id</a>
                                    <a><i class=" uil-envelope me-1"></i>corsec@rolasmedika.co.id</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


<!-- Profile Modal -->
                <div id="editprofil" class="modal fade"  tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog " >
                        <div class="modal-content">
                            <div class="modal-header ">
                                <h5 class="modal-title" height="18">Edit Profil</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/updateprofil" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="card text-center">
            <br>
            <div class="profile-img-wrap edit-img">
    <img id="profile-image" class="text-center rounded-circle avatar-lg img-thumbnail" src="assets/images/users/{{ session('data')->image }}" alt="profile-image">
    <br>
    <br>
    <div class="fileupload btn">
        <input class="form-control" accept="image/jpeg, image/jpg, image/gif, image/png" name="image" id="image" class="upload" type="file" onchange="validateImage(event)">
        <span id="image-error" style="color: red" class="error"></span>
    </div>
</div>
            <br>
            <div class="col-md-12">
        <div class="row">
            <div class="mb-3 form-group">
                    <input type="checkbox" id="showPassword" onchange="togglePasswordVisibility()">
                    <label class="form-label" for="showPassword"> Ubah Password</label>
                <input class="form-control" name="password" type="password" id="password" style="display: none;" placeholder="Enter your new password">
                <br>
                <span id="passwordError" style="color: red; display: none;">Password must be made up of 4 or 5 different characters</span>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-sm btn-flat btn-primary" id="saveBtn">
                    <i class="fa fa-save"></i> Save
                </button>
            </div>
        </div>
    </div>
        </div>
    </div>
</form>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Profile Modal -->




        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>

        <!-- third party js -->
        <script src="assets/js/vendor/jquery.dataTables.min.js"></script>
        <script src="assets/js/vendor/dataTables.bootstrap5.js"></script>
        <script src="assets/js/vendor/dataTables.responsive.min.js"></script>
        <script src="assets/js/vendor/responsive.bootstrap5.min.js"></script>
        <script src="assets/js/vendor/dataTables.buttons.min.js"></script>
        <script src="assets/js/vendor/buttons.bootstrap5.min.js"></script>
        <script src="assets/js/vendor/buttons.html5.min.js"></script>
        <script src="assets/js/vendor/buttons.flash.min.js"></script>
        <script src="assets/js/vendor/buttons.print.min.js"></script>
        <script src="assets/js/vendor/dataTables.keyTable.min.js"></script>
        <script src="assets/js/vendor/dataTables.select.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

        <!-- third party js ends -->

        <!-- demo app -->
        <script src="assets/js/pages/demo.datatable-init.js"></script>
        <!-- end demo js-->
        <script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('profile-image');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
        var showPasswordCheckbox = document.getElementById("showPassword");
        var passwordError = document.getElementById("passwordError");

        if (showPasswordCheckbox.checked) {
            passwordInput.style.display = "block";
            // Check password uniqueness when checkbox is checked
            validatePasswordUniqueness();
        } else {
            passwordInput.style.display = "none";
            passwordError.style.display = "none";
        }
    }

    function validatePasswordUniqueness() {
        var passwordInput = document.getElementById("password");
        var passwordError = document.getElementById("passwordError");
        var password = passwordInput.value.trim();

        // Check if password has unique characters
        var uniqueChars = new Set(password);
        if (password.length !== uniqueChars.size) {
            passwordError.style.display = "block";
        } else {
            passwordError.style.display = "none";
        }
    }

    // Additional validation to show the error message when password uniqueness is incorrect
    document.getElementById("password").addEventListener("keyup", function () {
        validatePasswordUniqueness();
    });

    // Call togglePasswordVisibility() on page load to set initial display correctly
    togglePasswordVisibility();
     function validateImage(event) {
        var input = event.target;
        var ext = input.files[0].name.split('.').pop().toLowerCase();

        if (ext !== "jpeg" && ext !== "jpg" && ext !== "png") {
            var errorSpan = document.getElementById("image-error");
            errorSpan.innerText = "Mohon unggah file dengan format JPEG, JPG, atau PNG.";
            // Menghapus file yang telah diunggah
            input.value = '';
        } else {
            // Hapus pesan error jika valid
            var errorSpan = document.getElementById("image-error");
            errorSpan.innerText = "";
            // Tampilkan gambar pratinjau jika diperlukan
            previewImage(event);
        }
    }

    
</script>

    </body>
</html>
