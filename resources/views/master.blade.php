<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Dashboard Unit Usaha | AIS</title>
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


                            <ul class="list-unstyled topbar-menu float-end mb-0" style="background: rgb(25, 55, 109); padding: 12px; display: block;">



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
        <li class="breadcrumb-item"><a href="welcome"><i class="uil-home-alt"></i> Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Master</li>
        <li class="breadcrumb-item active" aria-current="page">Unit Usaha</li>
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
                                <div class="card">
                                    <div class="card-body">

                                        <div class="row mb-2">
                                            <div class="col-sm-4">

                                            </div>
                                            
                                        <div class="tab-content">

                                            <div class="tab-pane show active" id="buttons-table-preview">

                                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>No Urut</th>
                                                            <th>Kode</th>
                                                            <th>Nama</th>
                                                            <th>Status</th>


                                                        </tr>
                                                    </thead>


                                                    <tbody>
                                                        <?php
                                                        $no = 0;
                                                        foreach($users as $user) {
                                                            $no++;
                                                            ?>
                                                            <tr>
                                                            <td><?= $no ?></td>
                                                            <td><?= $user->kode ?></td>
                                                            <td><?= $user->name ?></td>
                                                            <td>
            <?php
                $allowedEntities = ['Head Office', 'RSU Kaliwates', 'RSU Bhakti Husada', 'Grup Klinik'];
                $allowedRoles = ['Corporation'];

                if (in_array($user->role, $allowedRoles) && in_array($user->entity, $allowedEntities)) :
            ?>
                <span class="badge bg-success">Online</span>
            <?php else : ?>
                <span class="badge bg-secondary">Offline</span>
            <?php endif; ?>
        </td>


                                                        <?php
                                                        }
                                                        ?>



                                                    </tbody>
                                                </table>

                                            </div> <!-- end preview-->


                                        </div> <!-- end tab-content-->

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                            
                        <!-- end row-->

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
        <div id="addunitusaha" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                        <span><h3 alt="" height="18"> Tambah Unit Usaha </h3></span>
                </div>

                <form class="ps-3 pe-3" action="#">

                    <div class="mb-3">
                        <label for="text" class="form-label">Nama Kelompok</label>
                        <input class="form-control" name="name" type="text" id="name" required="" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="text" class="form-label">Kode</label>
                        <input class="form-control" name="kode" type="text" id="kode" required="" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Choose Image</label>
                        <input class="form-control" name="image" type="file" id="image" required="" >
                    </div>
                    <div class="mb-3">
                        <label for="text" class="form-label">Username</label>
                        <input class="form-control" name="username" type="text" id="username" required="" placeholder="Enter your Username" >
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input class="form-control" name="password" type="password" required="" id="password" placeholder="Enter your password">
                    </div>
                    </div>

                    <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-flat btn-primary" id="saveBtn"><i
                            class="fa fa-save"></i> Save</button>
                    <button type="button" class="btn btn-sm btn-flat btn-warning" data-bs-dismiss="modal">Cancel</button>
                </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="editunitusaha" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                        <span><h3 alt="" height="18"> Edit Data </h3></span>
                </div>

                <form class="ps-3 pe-3" action="#">

                    <div class="mb-3">
                        <label for="text" class="form-label">Kode</label>
                        <input class="form-control" name="kode" type="text" id="kode" required="" placeholder="">
                        <input class="form-control" name="id" type="hidden" id="idedit" required="" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="text" class="form-label">Nama Kelompok</label>
                        <input class="form-control" name="name" type="text" id="name" required="" placeholder="">
                        <input class="form-control" name="id" type="hidden" id="idedit" required="" placeholder="">
                    </div>

                    <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-flat btn-primary" id="saveBtn"><i
                            class="fa fa-save"></i> Save</button>
                    <button type="button" class="btn-sm btn-flat btn btn-warning " data-bs-dismiss="modal">Cancel</button>
                </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->





        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>

        <script>
            $("#edituniusaha").load(url, data, function() {
     $(this).modal('show');
     $(this).find(".close_btn").click(modal_closing);
});
        </script>

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
            
            function swallnya(id) {
    swal({
      title: "Apakah kamu yakin?",
      text: "Data yang dihapus tidak bisa dikembalikan",
      icon: "warning",
      buttons: [
        'Tidak',
        'Ya, saya yakin!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
        window.location.href = '/deletebidang/'+id;
      } else {
      }
    })
            }
            $('[id="editbutton"]').each(function () {
    $(this).on("click", function () {
        $('#nameedit').val($(this).data('nama'));
        $('#hidid').val($(this).data('usaha'));
        document.getElementById('id_unit_usahaedit').value = $(this).data('user');
        document.getElementById('id_unit_usahaedit').innerHTML = $(this).data('user');
        document.getElementById('kerja').value = $(this).data('namaunitkerja');
        document.getElementById('kerja').innerHTML = $(this).data('namaunitkerja');
        $('#idedit').val($(this).data('id'));
        console.log($(this).data('nama'));
        var select = document.getElementById("tol");
        for (var i = 0; i < select.length; i++) {
            var txt = select.options[i].getAttribute('dataunit');   
            if (txt != $(this).data('usaha')) {
                $(select.options[i]).attr('disabled', 'disabled').hide();
            } else {
                $(select.options[i]).removeAttr('disabled').show();
            }

        }
    });
});
        </script>
    </body>
</html>
