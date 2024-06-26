<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan | AIS</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">
    <style>
        .btn.btn-outline-secondary:hover i {
            color: red;
        }
    </style>

</head>


<body class="loading" data-layout="topnav"
    data-layout-config='{"layoutBoxed":false,"darkMode":false,"showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->

        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <div class="navbar-custom topnav-navbar" style="background: rgb(25, 55, 109) ">
                    <div class="container-fluid">

                        <!-- LOGO -->
                        <a href="" class="topnav-logo">
                            <span class="topnav-logo-lg">
                                <img src="assets/images/logo-light.png" alt="" width="90" height="59">
                            </span>
                        </a>
                        <form class="topnav-logo" style="margin-top: 20px; ">
                            <h4>ASSETS AND INVENTORY SYSTEM</h4>
                        </form>


                        <ul class="list-unstyled topbar-menu float-end mb-0"
                            style="background: rgb(25, 55, 109); padding: 12px; display: block;">
                            <li class="dropdown ">
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown"
                                    id="dropdownMenuLink" href="#" role="button" aria-haspopup="true"
                                    aria-expanded="false">
                                    <span class="account-user-avatar">
                                        <img src="assets/images/users/<?= session('data')->image ?>" alt="user-image"
                                            class="rounded-circle">
                                    </span>
                                    <span>
                                        <span class="account-user-name"><?= session('data')->name ?></span>
                                        <span class="account-position"><?= session('data')->role ?></span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu File-dropdown"
                                    aria-labelledby="topbar-userdrop">
                                    <a href="editprofil" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle me-1"></i>
                                        <span>Profil</span>
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
                                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages"
                                            role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class=" uil-users-alt me-1"></i>Master <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-pages">

                                            <a href="/unitkerja" class="dropdown-item">Unit Kerja</a>
                                            <a href="/ruangan" class="dropdown-item">Ruangan</a>
                                            <a href="/petugas" class="dropdown-item">Petugas</a>

                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="#"
                                            id="topnav-pages" role="button" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="uil-package me-1"></i>Aset <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                            <a href="/aset/tanah" class="dropdown-item">Tanah</a>
                                            <a href="/aset/gedungdanbangunan" class="dropdown-item">Gedung Dan
                                                Bangunan</a>
                                            <a href="/aset/kendaraandanambulance" class="dropdown-item">Kendaraan dan
                                                Ambulance</a>
                                            <a href="/aset/alattelekomunikasi" class="dropdown-item">Alat
                                                Telekomunikasi</a>
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
                                        <a class="nav-link dropdown-toggle arrow-none" href="#"
                                            id="topnav-pages" role="button" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="uil-server me-1"></i>Inventaris <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                            <a href="/inventaris/kendaraan" class="dropdown-item">Kendaraan</a>
                                            <a href="/inventaris/peralatantelekomunikasi"
                                                class="dropdown-item">Peralatan Telekomunikasi</a>
                                            <a href="/inventaris/peralatankantor" class="dropdown-item">Peralatan
                                                Kantor</a>
                                            <a href="/inventaris/peralatanteknikinformatika"
                                                class="dropdown-item">Peralatan Teknik Informatika</a>
                                            <a href="/inventaris/peralatantekniklistrikdanmekanik"
                                                class="dropdown-item">Peralatan Teknik Listrik dan Mekanik</a>
                                            <a href="/inventaris/peralatanac" class="dropdown-item">Peralatan AC</a>
                                            <a href="/inventaris/peralatanlift" class="dropdown-item">Peralatan
                                                Lift</a>
                                            <a href="/inventaris/peralatanmedis" class="dropdown-item">Peralatan
                                                Medis</a>
                                        </div>
                                    </li>
                                    <?php
                                        if (session('data')->role == 'Corporation') {

                                                        }else {
                                                            ?>
                                    <a class="nav-link dropdown-toggle arrow-none" href="/laporan">
                                        <i class="mdi mdi-download-box-outline me-1"></i>Laporan
                                    </a>
                                    <?php
                                                        }
                                                        ?>
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
                                        <li class="breadcrumb-item"><a href="welcome"><i class="uil-home-alt"></i>
                                                Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Laporan</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->






                    <div class="row">
                        <div class="col-12">
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="chart-content-bg">
                                        <div class="row text-center">
                                            <div class="col-md-6">
                                                <p class="text-muted mb-0 mt-3">Jumlah Data Aset Perusahaan</p>
                                                <h2 class="fw-normal mb-3">
                                                    <small class="mdi mdi-checkbox-blank-circle text-primary align-middle me-1"></small>
                                                    <?php
                                                    // Count the total number of assets by summing up the counts of various asset types
                                                    $count = DB::table('aset_alatmedis')->count() + 
                                                             DB::table('aset_komputer')->count() + 
                                                             DB::table('aset_tanah')->count() + 
                                                             DB::table('aset_kendaraandanambulance')->count() + 
                                                             DB::table('aset_gedungdanbangunan')->count() + 
                                                             DB::table('aset_alattelekomunikasi')->count() + 
                                                             DB::table('aset_alatmekanik')->count() + 
                                                             DB::table('aset_alatlistrik')->count() + 
                                                             DB::table('aset_alatlift')->count() + 
                                                             DB::table('aset_alatkantor')->count() + 
                                                             DB::table('aset_alatac')->count();
                                                    ?>
                                                    <span>{{ $count }}</span>
                                                </h2>
                                                <h2 class="fw-normal mt-3">
                                                    <!-- Button to download asset data -->
                                                    <a href="../exportasettanah" class="btn btn-outline-secondary">
                                                        Unduh <i class="mdi mdi-arrow-down ms-2"></i>
                                                    </a>
                                                </h2>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <p class="text-muted mb-0 mt-3">Jumlah Data Inventaris Perusahaan</p>
                                                <h2 class="fw-normal mb-3">
                                                    <small
                                                        class="mdi mdi-checkbox-blank-circle text-success align-middle me-1"></small>
                                                    <?php
                                                    $count = DB::table('aset_alatmedis')->count() + DB::table('aset_komputer')->count() + DB::table('aset_tanah')->count() + DB::table('aset_kendaraandanambulance')->count() + DB::table('aset_gedungdanbangunan')->count() + DB::table('aset_alattelekomunikasi')->count() + DB::table('aset_alatmekanik')->count() + DB::table('aset_alatlistrik')->count() + DB::table('aset_alatlift')->count() + DB::table('aset_alatkantor')->count() + DB::table('aset_alatac')->count();
                                                    ?>
                                                    <span>{{ $count }}</span>
                                                </h2>
                                                <h2 class="fw-normalmt-3">
                                                    <a href="../exportinventariskendaraan"
                                                        class="btn btn-outline-secondary">Unduh
                                                        <i class="mdi mdi-arrow-down ms-2"></i>
                                                    </a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                </div> <!-- end row-->



                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

            </div> <!-- container -->

        </div> <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        © 2022 -
                        <script>
                            document.write(new Date().getFullYear())
                        </script> PT. Rolas Nusantara Medika
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-md-block">
                            <a target="_blank" href="https://rolasmedika.co.id/"><i
                                    class=" uil-globe me-1"></i>rolasmedika.co.id</a>
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



    @if (Session::has('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- third party js ends -->

    <!-- demo app -->
    <script src="assets/js/pages/demo.datatable-init.js"></script>
    <!-- end demo js-->

</body>

</html>
