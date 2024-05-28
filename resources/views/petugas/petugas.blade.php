<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Petugas Dashboard | AIS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon-icon.ico">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- third party css -->
    <link href="../assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/vendor/select.bootstrap5.css" rel="stylesheet" type="text/css">
    <!-- third party css end -->

    <!-- App css -->
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="../assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">

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
                                <img src="../assets/images/logo-light.png" alt="" width="90" height="59">
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
                                        <img src="../assets/images/users/<?= session('data')->image ?>" alt="user-image"
                                            class="rounded-circle">
                                    </span>
                                    <span>
                                        <span class="account-user-name"><?= session('data')->name ?></span>
                                        <span class="account-position"><?= session('data')->role ?></span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
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
                                        <li class="breadcrumb-item active" aria-current="page">Master</li>
                                        <li class="breadcrumb-item active" aria-current="page">Petugas</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->



                    @if (session('success'))
                        <div class="alert alert-success">
                            <b></b> {{ session('success') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-12">

                            <div class="card-body">

                                <div class="row mb-2">
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="text-sm-end">
                                            <?php
                                                        if (session('data')->role == 'Corporation') {

                                                        }else {
                                                            ?>
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#addpetugas" class="btn btn-success mb-2 me-1"><i
                                                    class="mdi mdi-plus-circle me-2"></i>Tambah</button>
                                            <?php
                                                        }
                                                        ?>

                                        </div>
                                    </div><!-- end col-->
                                    <div class="tab-content">

                                        <div class="tab-pane show active" id="buttons-table-preview">

                                            <table id="datatable-buttons"
                                                class="table table-striped dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>No Urut</th>
                                                        <th>Nama</th>
                                                        <th>Unit Kerja</th>
                                                        <th>Ruangan</th>
                                                        <th>Unit Usaha</th>
                                                        <th>Action</th>


                                                    </tr>
                                                </thead>


                                                <tbody>
                                                    <?php
                                                        $no = 0;
                                                        foreach($petugas as $user) {
                                                            $no++;
                                                            ?>
                                                    <tr>
                                                        <td><?= $no ?></td>
                                                        <td><?= $user->petugasnama ?></td>
                                                        <td><?= $user->namakerja ?></td>
                                                        <td><?= $user->ruangannama ?></td>
                                                        <td><?= $user->usernamanya ?></td>
                                                        <td class="table-action">
                                                            <a data-bs-toggle="modal" data-bs-target="#editpetugas"
                                                                class="action-icon" id="editbutton"
                                                                data-id='<?= $user->petugasid ?>'
                                                                data-nama='<?= $user->petugasnama ?>'
                                                                data-user='<?= $user->usernamanya ?>'
                                                                data-usaha='<?= $user->idusaha ?>'
                                                                data-unit='<?= $user->id_ruangan ?>'
                                                                data-idunitkerja='<?= $user->idkerja ?>'
                                                                data-namaunitkerja='<?= $user->namakerja ?>'
                                                                data-namaruangan='<?= $user->ruangannama ?>'
                                                                data-idnyaruangan='<?= $user->idruangan ?>'> <i
                                                                    class="mdi mdi-square-edit-outline"></i></a>
                                                            <a onclick="return swallnya(<?= $user->petugasid ?>)"
                                                                href="#" class="action-icon"> <i
                                                                    class="mdi mdi-delete"></i></a>
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
    <div id="addpetugas" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="text-center mt-2 mb-4">
                        <span>
                            <h3 alt="" height="18"> Tambah Petugas </h3>
                        </span>
                    </div>

                    <form class="ps-3 pe-3" action="/addpetugas" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="text" class="form-label">Nama</label>
                            <input class="form-control" name="name" type="text" id="name" required=""
                                placeholder="">
                            <br>
                            <label for="text" class="form-label">Unit Kerja</label>
                            <select id="kon" name="id_unit_kerja" class="form-select"
                                aria-label="Default select example" onchange="updateruanganOptions()" required="">
                                <option value="">-- Pilih --</option>
                                <?php foreach($unit_kerja as $unit_kerjas) { ?>
                                <option value="<?= $unit_kerjas->id ?>"><?= $unit_kerjas->name ?></option>
                                <?php } ?>
                            </select>
                            <br>
                            <!-- Your existing HTML code for the ruangan dropdown -->
                            <label for="text" class="form-label">Ruangan</label>
                            <select name="id_ruangan" id="tel" class="form-select"
                                aria-label="Default select example" required>
                                <option value="">-- Pilih --</option>
                                <?php foreach($ruangan as $ruangans) { ?>
                                <option data-unit="<?= $ruangans->id_unit_kerja ?>" value="<?= $ruangans->id ?>">
                                    <?= $ruangans->name ?></option>
                                <?php } ?>
                            </select>
                            <br>
                            <label for="text" class="form-label">Unit Usaha</label>
                            <input type="hidden" value="<?= session('data')->id ?>" name="id_unit_usaha">
                            <select name="" class="form-select" aria-label="Default select example" disabled>
                                <option value="<?= session('data')->id ?>"><?= session('data')->name ?></option>

                            </select>
                        </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-flat btn-primary" id="saveBtn"><i
                            class="fa fa-save"></i> Save</button>
                    <button type="button" class="btn btn-sm btn-flat btn-warning"
                        data-bs-dismiss="modal">Cancel</button>
                </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div id="editpetugas" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="text-center mt-2 mb-4">
                        <span>
                            <h3 alt="" height="18"> Edit Data </h3>
                        </span>
                    </div>

                    <form class="ps-3 pe-3" action="/editpetugas" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="text" class="form-label">Nama</label>
                            <input class="form-control" name="name" type="text" id="nameedit" required=""
                                placeholder="">
                            <input class="form-control" name="id" type="hidden" id="idedit" required=""
                                placeholder="">
                            <br>
                            <label for="text" class="form-label">Unit Kerja</label>
                            <select name="id_unit_kerja" id="tol" onchange="updateruanganeditOptions()"
                                class="form-select" aria-label="Default select example">
                                <option id="kerja" value="">-- Pilih --</option>
                                <?php
                                                        foreach($unit_kerja as $unit_kerjas) {                                        
                                                            ?>
                                <option dataunit="<?= $unit_kerjas->id_unit_usaha ?>" value="<?= $unit_kerjas->id ?>">
                                    <?= $unit_kerjas->name ?></option>

                                <?php
                                                        }
                                                        ?>
                            </select>
                            <br>
                            <label for="text" class="form-label">Ruangan</label>
                            <select name="id_ruangan" id="lol" onchange="updateIdRuangan()" class="form-select"
                                aria-label="Default select example" required>
                                <option id="ruangan" value="">-- Pilih --</option>
                                <?php
                                                        foreach($ruangan as $ruangans) {                                              
                                                            ?>
                                <option data-unit="<?= $ruangans->id_unit_kerja ?>"
                                    dataruangan="<?= $ruangans->id_unit_usaha ?>" value="<?= $ruangans->id ?>">
                                    <?= $ruangans->name ?></option>

                                <?php
                                                        }
                                                        ?>
                            </select>
                            <br>
                            <label for="text" class="form-label">Unit Usaha</label>
                            <input type="hidden" value="" id='hidid' name="id_unit_usaha">
                            <select name="" class="form-select" aria-label="Default select example" disabled>
                                <option id="id_unit_usahaedit" value=""></option>

                            </select>
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-flat btn-primary" id="saveBtn"><i
                            class="fa fa-save"></i> Save</button>
                    <button type="button" class="btn-sm btn-flat btn btn-warning "
                        data-bs-dismiss="modal">Cancel</button>
                </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->





    <!-- bundle -->
    <script src="../assets/js/vendor.min.js"></script>
    <script src="../assets/js/app.min.js"></script>

    <!-- third party js -->
    <script src="../assets/js/vendor/jquery.dataTables.min.js"></script>
    <script src="../assets/js/vendor/dataTables.bootstrap5.js"></script>
    <script src="../assets/js/vendor/dataTables.responsive.min.js"></script>
    <script src="../assets/js/vendor/responsive.bootstrap5.min.js"></script>
    <script src="../assets/js/vendor/dataTables.buttons.min.js"></script>
    <script src="../assets/js/vendor/buttons.bootstrap5.min.js"></script>
    <script src="../assets/js/vendor/buttons.html5.min.js"></script>
    <script src="../assets/js/vendor/buttons.flash.min.js"></script>
    <script src="../assets/js/vendor/buttons.print.min.js"></script>
    <script src="../assets/js/vendor/dataTables.keyTable.min.js"></script>
    <script src="../assets/js/vendor/dataTables.select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

    <!-- third party js ends -->

    <!-- demo app -->
    <script src="../assets/js/pages/demo.datatable-init.js"></script>
    <!-- end demo js-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        // JavaScript function to update ruangan options based on selected Unit Kerja
        function updateruanganOptions() {
            var unitKerjaDropdown = document.getElementById("kon");
            var ruanganDropdown = document.getElementById("tel");

            // Get the selected unit value
            var selectedUnitValue = unitKerjaDropdown.value;

            // Clear the ruangan dropdown value when "-- Pilih --" is selected in Unit Kerja
            if (selectedUnitValue === "") {
                ruanganDropdown.innerHTML = '<option value="">-- Pilih --</option>';
                return; // Exit the function early
            }

            // Reset ruangan dropdown options
            ruanganDropdown.innerHTML = '';


            // Loop through ruangan options and add options based on the selected unit
            <?php foreach($ruangan as $ruangans) { ?>
            var dataUnit = <?= json_encode($ruangans->id_unit_kerja) ?>;
            if (selectedUnitValue === "" || selectedUnitValue == dataUnit) {
                var option = document.createElement('option');
                option.value = <?= json_encode($ruangans->id) ?>;
                option.text = <?= json_encode($ruangans->name) ?>;
                ruanganDropdown.add(option);
            }
            <?php } ?>
        }

        // Add an event listener to call the function when the page loads
        window.addEventListener('load', updateruanganOptions);

        // Additional event listener for Unit Kerja dropdown change
        document.getElementById("kon").addEventListener('change', updateruanganOptions);

        function updateruanganeditOptions() {
            var unitKerjaDropdown = document.getElementById("tol");
            var ruanganDropdown = document.getElementById("lol");

            // Get the selected unit value
            var selectedUnitValue = unitKerjaDropdown.value;

            // Clear the ruangan dropdown value when "-- Pilih --" is selected in Unit Kerja
            if (selectedUnitValue === "") {
                ruanganDropdown.innerHTML = '<option value="">-- Pilih --</option>';
                return; // Exit the function early
            }

            // Reset ruangan dropdown options
            ruanganDropdown.innerHTML = '';


            // Loop through ruangan options and add options based on the selected unit
            <?php foreach($ruangan as $ruangans) { ?>
            var dataUnit = <?= json_encode($ruangans->id_unit_kerja) ?>;
            if (selectedUnitValue === "" || selectedUnitValue == dataUnit) {
                var option = document.createElement('option');
                option.value = <?= json_encode($ruangans->id) ?>;
                option.text = <?= json_encode($ruangans->name) ?>;
                ruanganDropdown.add(option);

            }
            <?php } ?>

        }

        // Add an event listener to call the function when the page loads
        window.addEventListener('load', updateruanganOptions);

        // Additional event listener for Unit Kerja dropdown change
        document.getElementById("tol").addEventListener('change', updateruanganOptions);
        document.getElementById("editbutton").addEventListener('click', function() {
            // Set the selected value if the condition is met
            if (selectedUnitValue == dataUnit) {
                option.selected = true;
            }
            updateruanganeditOptions();
        });

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
                    window.location.href = '/deletepetugas/' + id;
                } else {}
            })
        }
        $('[id="editbutton"]').each(function() {
            $(this).on("click", function() {
                $('#nameedit').val($(this).data('nama'));
                $('#hidid').val($(this).data('usaha'));
                document.getElementById('id_unit_usahaedit').value = $(this).data('user');
                document.getElementById('id_unit_usahaedit').innerHTML = $(this).data('user');
                document.getElementById('kerja').value = $(this).data('idunitkerja');
                document.getElementById('kerja').innerHTML = $(this).data('namaunitkerja');
                document.getElementById('ruangan').value = $(this).data('idnyaruangan');
                document.getElementById('ruangan').innerHTML = $(this).data('namaruangan');
                $('#idedit').val($(this).data('id'));
                console.log($(this).data('nama'));
                var select = document.getElementById("tol");
                var select2 = document.getElementById("lol");
                for (var i = 1; i < select.length; i++) {
                    var txt = select.options[i].getAttribute('dataunit');
                    if (txt != $(this).data('usaha')) {
                        $(select.options[i]).attr('disabled', 'disabled').hide();
                    } else {
                        $(select.options[i]).removeAttr('disabled').show();
                    }

                }
                for (var i = 1; i < select2.length; i++) {
                    var txt = select2.options[i].getAttribute('dataruangan');
                    if (txt != $(this).data('usaha')) {
                        $(select2.options[i]).attr('disabled', 'disabled').hide();
                    } else {
                        $(select2.options[i]).removeAttr('disabled').show();
                    }

                }
            });
        });
    </script>
</body>

</html>
