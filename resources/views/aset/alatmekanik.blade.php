<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Aset Alat Mekanik | AIS</title>
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
                                    <a href="/editprofil" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle me-1"></i>
                                        <span>Profil</span>
                                    </a>

                                    <!-- item-->
                                    <a href="/actionlogout" class="dropdown-item notify-item">
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
                                        <li class="breadcrumb-item"><a href="/welcome"><i class="uil-home-alt"></i>
                                                Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Aset</li>
                                        <li class="breadcrumb-item active" aria-current="page">Alat Mekanik</li>
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
                    @if (session('erorr'))
                        <div class="alert alert-error">
                            <b></b> {{ session('error') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="row mb-2">
                                        <div class="row mb-2">
                                            <div class="col-sm-4">
                                                @if (count($aset_alatmekanik) > 1)
                                                    <a target="_blank" href="../qrallalatmekanik/">
                                                        <button type="button"
                                                            class="btn btn-light btn-rounded mb-2 me-1">
                                                            <i class="mdi mdi-crop-free me-2"></i>Print Barcode All
                                                        </button>
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="col-sm-8">

                                                <div class="text-sm-end">
                                                    <a href="../exportasetalatmekanik"> <button type="button"
                                                            class="btn btn-danger mb-2 me-1"><i
                                                                class="mdi mdi-file-excel me-2"></i>Excel</button></a>
                                                    <?php
                                                        if (session('data')->role == 'Corporation') {

                                                        }else {
                                                            ?>
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#addalatmekanik"
                                                        class="btn btn-success mb-2 me-1"><i
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
                                                                <th>No Aset</th>
                                                                <th>Nama Aset</th>
                                                                <th>Jenis Aset</th>
                                                                <th>Merek</th>
                                                                <th>Kode Aset</th>
                                                                <th>Tahun</th>
                                                                <th>Bulan</th>
                                                                <th>Kondisi</th>
                                                                <th>Pengguna Barang</th>
                                                                <th>Unit Kerja</th>
                                                                <th>Ruangan</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>


                                                        <tbody>
                                                            <?php
                                                        $nourut = 0;
                                                        foreach($aset_alatmekanik as $user) {
                                                            $nourut++;
                                                            $no = $user->no_aset;
                                                            $kosong = '00000000000000000000000';
                                                            $no = $kosong.$no;
                                                            $no = substr($no, strlen($no)-6,strlen($no));
                                                            $ket = $user->keterangan;
                                                            $petugas2 = explode(',',$user->id_petugas2);
                                                            if ($ket == null || $ket == '' ) {
                                                               $ket = '-';
                                                            }
                                                            
                                                          
                                                             $date = DateTime::createFromFormat("Y-m-d h:i:s", $user->date_created);
                                                             $tanggalbarang = Date::createFromFormat("Y-m-d", $user->tanggal_aset);
                                                             $merek = $user->merek_alatmekanik;
                                                             $jenis = $user->jenis_alatmekanik;
                                                             $tipe = $user->tipe_alatmekanik;
                                                                
                                                         
                                                            ?>
                                                            <tr>
                                                                <td><?= $nourut ?></td>
                                                                <td><?= $no ?></td>
                                                                <td><?= $user->nama_alatmekanik ?></td>
                                                                <td><?= $jenis ?></td>
                                                                <td><?= $user->merek_alatmekanik ?></td>
                                                                <td><?= $user->kode_alatmekanik ?></td>
                                                                <td><?= $tanggalbarang->format('Y') ?></td>
                                                                <td><?= $tanggalbarang->format('m') ?></td>
                                                                <td><?= $user->kondisi ?></td>
                                                                <td><?= $user->usernamanya ?></td>
                                                                <td><?= $user->namakerja ?></td>
                                                                <td><?= $user->ruangannama ?></td>
                                                                <td class="table-action">
                                                                    <a data-bs-toggle="modal"
                                                                        data-bs-target="#previewalatmekanik-<?= $user->id_alatmekanik ?>"
                                                                        data-id='<?= $user->id_alatmekanik ?>'
                                                                        class="action-icon"> <i
                                                                            class="mdi mdi-eye"></i></a>
                                                                    <?php
                                                        if (session('data')->role == 'Corporation') {

                                                        }else {
                                                            ?>

                                                                    <a onclick="loaddata(<?= $nourut ?>);"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#editalatmekanik"
                                                                        class="action-icon"
                                                                        id="editbutton-<?= $nourut ?>"
                                                                        data-petugasdua='<?= $user->id_petugas2 ?>'
                                                                        data-id='<?= $user->id_alatmekanik ?>'
                                                                        data-nama='<?= $user->nama_alatmekanik ?>'
                                                                        data-jenis='<?= $jenis ?>'
                                                                        data-merek='<?= $user->merek_alatmekanik ?>'
                                                                        data-tipe='<?= $user->tipe_alatmekanik ?>'
                                                                        data-spesifikasi='<?= $user->spesifikasi_alatmekanik ?>'
                                                                        data-kondisi='<?= $user->kondisi ?>'
                                                                        data-jumlah='<?= $user->jumlah ?>'
                                                                        data-satuan='<?= $user->satuan ?>'
                                                                        data-nilaiperolehan='<?= $user->nilaiperolehan ?>'
                                                                        data-nilairesidu='<?= $user->nilai_residu ?>'
                                                                        data-image='../assets/images/aset/<?= $user->image ?> '
                                                                        data-tanggal='<?= $tanggalbarang->format('d-m-Y')
                                                                        ?>'
                                                                        data-masamanfaat='<?= $user->masa_manfaat ?>'
                                                                        data-penyusutan='<?= $user->penyusutan ?>'
                                                                        data-alamat='<?= $user->alamat ?>'
                                                                        data-keterangan='<?= isset($user->keterangan) ? $user->keterangan : '-'
                                                                        ?>'
                                                                        data-user='<?= $user->usernamanya ?>'
                                                                        data-usaha='<?= $user->pengguna_barang ?>'
                                                                        data-idunitkerja='<?= $user->idkerja ?>'
                                                                        data-namaunitkerja='<?= $user->namakerja ?>'
                                                                        data-namaruangan='<?= $user->ruangannama ?>'
                                                                        data-idnyaruangan='<?= $user->ruanganid ?>'data-namapetugas='<?= $user->petugasnama ?>'
                                                                        data-idnyapetugas='<?= $user->idpetugas ?>'><i
                                                                            class="mdi mdi-square-edit-outline"></i></a>
                                                                    <a onclick="return swallnya(<?= $user->id_alatmekanik ?>)"
                                                                        href="#" class="action-icon"> <i
                                                                            class="mdi mdi-delete"></i></a>
                                                                    <?php
                                                        }
                                                        ?>


                                                                    <a target="_blank"
                                                                        href="../qr22/<?= $tanggalbarang->format('Y') ?>/<?= $tanggalbarang->format('m') ?>/<?= $user->kode_alatmekanik ?>/<?= $user->id_user ?>/<?= $user->usernamanya ?>/<?= $no ?>/<?= str_replace('/', ' atau ', $user->nama_alatmekanik) ?>/<?= str_replace('/', ' atau ', $jenis) ?>/<?= str_replace('/', ' atau ', $merek) ?>/<?= str_replace('/', ' atau ', $tipe) ?>/<?= str_replace('/', ' atau ', $ket) ?>"
                                                                        class="action-icon"> <i
                                                                            class="mdi mdi-qrcode"></i></a>
                                                                </td>
                                                                <!-- Preview Modal -->
                                                                <div id="previewalatmekanik-<?= $user->id_alatmekanik ?>"
                                                                    class="modal fade" tabindex="-1" role="dialog"
                                                                    aria-labelledby="fullWidthModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog modal-full-width">
                                                                        <div class="modal-content">
                                                                            <div
                                                                                class="modal-header modal-filled bg-info ">
                                                                                <h5 class="modal-title" height="18"
                                                                                    style="text-shadow: 2px 2px #19376d">
                                                                                    Preview</h5>
                                                                                <button type="button"
                                                                                    class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body p-4">
                                                                                <!-- end row -->

                                                                                <div class="row mt-4">
                                                                                    <div class="col-sm-4">
                                                                                        <p class="text"><strong>Nama
                                                                                                Aset :</strong> <span
                                                                                                class="ms-1"><?= $user->nama_alatmekanik ?></span>
                                                                                        </p>
                                                                                        <p class="text"><strong>Jenis
                                                                                                Aset :</strong> <span
                                                                                                class="ms-1"><?= $jenis ?></span>
                                                                                        </p>

                                                                                        <p class="text"><strong>Merek
                                                                                                :</strong><span
                                                                                                class="ms-1"><?= $user->merek_alatmekanik ?></span>
                                                                                        </p>
                                                                                        <p class="text"><strong>Tipe
                                                                                                :</strong><span
                                                                                                class="ms-1"><?= $user->tipe_alatmekanik ?></span>
                                                                                        </p>
                                                                                        <p class="text">
                                                                                            <strong>Spesifikasi
                                                                                                :</strong><span
                                                                                                class="ms-1"><?= $user->spesifikasi_alatmekanik ?></span>
                                                                                        </p>

                                                                                        <p class="text"><strong>Kode
                                                                                                Aset :</strong> <span
                                                                                                class="ms-1"><?= $user->kode_alatmekanik ?></span>
                                                                                        </p>
                                                                                        <p class="text">
                                                                                            <strong>Kondisi :</strong>
                                                                                            <span
                                                                                                class="ms-1"><?= $user->kondisi ?></span>
                                                                                        </p>

                                                                                        <p class="text">
                                                                                            <strong>Jumlah
                                                                                                :</strong><span
                                                                                                class="ms-1">
                                                                                                <?= $user->jumlah ?></span>
                                                                                        </p>
                                                                                        <p class="text">
                                                                                            <strong>Satuan :</strong>
                                                                                            <span
                                                                                                class="ms-1"><?= $user->satuan ?></span>
                                                                                        </p>
                                                                                    </div> <!-- end col-->

                                                                                    <div class="col-sm-4">
                                                                                        <p class="text"><strong>Nilai
                                                                                                Perolehan
                                                                                                :</strong><span
                                                                                                class="ms-1"> Rp.
                                                                                                <?= number_format($user->nilaiperolehan, 2, ',', '.') ?>
                                                                                            </span></p>
                                                                                        <p class="text"><strong>Nilai
                                                                                                Residu :</strong><span
                                                                                                class="ms-1"> Rp.
                                                                                                <?= number_format($user->nilai_residu, 2, ',', '.') ?>
                                                                                            </span></p>
                                                                                        <p class="text">
                                                                                            <strong>Tanggal Aset
                                                                                                :</strong><span
                                                                                                class="ms-1">
                                                                                                <?= $tanggalbarang->format('d-m-Y') ?>
                                                                                            </span>
                                                                                        </p>
                                                                                        <p class="text"><strong>Masa
                                                                                                Manfaat :</strong>
                                                                                            <?php if (!empty($user->masa_manfaat)): ?>
                                                                                            <span
                                                                                                class="ms-1"><?= $user->masa_manfaat ?>
                                                                                                Tahun</span>
                                                                                            <?php endif; ?>
                                                                                        </p>
                                                                                        <p class="text">
                                                                                            <strong>Penyusutan
                                                                                                :</strong>
                                                                                            <?php if (!empty($user->penyusutan)): ?>
                                                                                            <span class="ms-1">Rp.
                                                                                                <?= number_format($user->penyusutan, 2, ',', '.') ?>
                                                                                                /Tahun</span>
                                                                                            <?php endif; ?>
                                                                                        </p>
                                                                                        <p class="text"><strong>Foto
                                                                                                Aset :</strong><span
                                                                                                class="ms-1"><a
                                                                                                    target="_blank"
                                                                                                    href="../assets/images/aset/<?= $user->image ?> "><img
                                                                                                        src="../assets/images/aset/<?= $user->image ?> "
                                                                                                        alt="aset-image"
                                                                                                        title="aset-img"
                                                                                                        class="rounded me-2"
                                                                                                        height="48"></a></span>
                                                                                        </p>
                                                                                        <p class="text">
                                                                                            <strong>Alamat
                                                                                                :</strong><span
                                                                                                class="ms-1">
                                                                                                <?= $user->alamat ?>
                                                                                            </span>
                                                                                        </p>
                                                                                        <p class="text">
                                                                                            <strong>Pengelola Barang
                                                                                                :</strong><span
                                                                                                class="ms-1">
                                                                                                <?= $user->pengelola_barang ?>
                                                                                            </span>
                                                                                        </p>

                                                                                    </div> <!-- end col-->
                                                                                    <div class="col-sm-4">
                                                                                        <p class="text">
                                                                                            <strong>Pengguna Barang
                                                                                                :</strong><span
                                                                                                class="ms-1">
                                                                                                <?= $user->usernamanya ?>
                                                                                            </span>
                                                                                        </p>
                                                                                        <p class="text"><strong>Kuasa
                                                                                                Pengguna Barang
                                                                                                :</strong><span
                                                                                                class="ms-1">
                                                                                                <?= $user->usernamanya ?>
                                                                                            </span></p>
                                                                                        <p class="text"><strong>Unit
                                                                                                Kerja :</strong><span
                                                                                                class="ms-1">
                                                                                                <?= $user->namakerja ?>
                                                                                            </span></p>
                                                                                        <p class="text">
                                                                                            <strong>Ruangan
                                                                                                :</strong><span
                                                                                                class="ms-1">
                                                                                                <?= $user->ruangannama ?>
                                                                                            </span>
                                                                                        </p>
                                                                                        <p class="text"><strong>P.
                                                                                                Pencatat :</strong><span
                                                                                                class="ms-1">
                                                                                                <?= $user->petugasnama ?>
                                                                                            </span></p>
                                                                                        <p class="text">
                                                                                            <strong>Penanggung Jawab
                                                                                                :</strong><span
                                                                                                class="ms-1">
                                                                                                <?= isset($petugas2[1]) ? $petugas2[1] : '-' ?>
                                                                                            </span>
                                                                                        </p>
                                                                                        <p class="text2">
                                                                                            <strong>Keterangan
                                                                                                :</strong><span
                                                                                                class="ms-1">
                                                                                                <?= isset($user->keterangan) ? $user->keterangan : '-' ?>
                                                                                            </span>
                                                                                        </p>
                                                                                    </div> <!-- end col-->
                                                                                </div>
                                                                                <!-- end row -->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /Preview Modal -->
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

            <!-- Scrollable modal -->
            <div class="modal fade" id="addalatmekanik" tabindex="-1" role="dialog"
                aria-labelledby="scrollableModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" height="18">Tambah Alat Mekanik</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="ps-3 pe-3" action="/addalatmekanik" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="text" class="form-label">Nama Aset</label>
                                    <input class="form-control" name="nama_alatmekanik" type="text"
                                        id="nama_alatmekanik" required="" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Jenis Aset</label>
                                    <input class="form-control" name="jenis_alatmekanik" type="text"
                                        id="jenis_alatmekanik" required="" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Merek</label>
                                    <input class="form-control" name="merek_alatmekanik" type="text"
                                        id="merek_alatmekanik" required="" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Tipe</label>
                                    <input class="form-control" name="tipe_alatmekanik" type="text"
                                        id="tipe_alatmekanik" required="" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Spesifikasi</label>
                                    <textarea class="form-control" name="spesifikasi_alatmekanik" id="spesifikasi_alatmekanik" required=""
                                        rows="5" placeholder="Masukkan beberapa ringkasan tentang Spesifikasi aset.."></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Kode Aset</label>
                                    <select name="" class="form-select" aria-label="Default select example"
                                        disabled>
                                        <option value="">08</option>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Kondisi</label>
                                    <textarea class="form-control" name="kondisi" id="kondisi" required="" rows="5"
                                        placeholder="Masukkan beberapa ringkasan tentang kondisi aset.."></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Jumlah</label>
                                    <input class="form-control" name="jumlah" type="number" id="jumlah"
                                        required="" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Satuan</label>
                                    <input class="form-control" name="satuan" type="text" id="satuan"
                                        required="" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Nilai Perolehan Aset</label>
                                    <input class="form-control" name="nilaiperolehan" type="number"
                                        id="nilaiperolehan" required="" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Tanggal Aset</label>
                                    <input class="form-control" name="tanggal_aset" type="date" id="tanggal_aset"
                                        required="" placeholder="">
                                </div>
                                <div class="fallback">
                                    <label for="image" class="form-label">Foto Aset</label>
                                    <input type='file' class='form-control'
                                        accept = 'image/jpeg , image/jpg, image/gif, image/png' name="image"
                                        id="image"required="">
                                </div>
                                <p href="#" style="color: crimson"> please do not upload images larger than 2 mb
                                </p>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat" rows="5" required=""
                                        placeholder="Masukkan alamat aset.."></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Pengelola Barang</label>
                                    <select name="" class="form-select" aria-label="Default select example"
                                        disabled>
                                        <option value="">PT. Rolas Nusantara Medika</option>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Pengguna Barang</label>
                                    <input type="hidden" value="<?= session('data')->id ?>" name="pengguna_barang">
                                    <select name="" class="form-select" aria-label="Default select example"
                                        disabled>
                                        <option value="<?= session('data')->id ?>"><?= session('data')->name ?>
                                        </option>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Kuasa Pengguna Barang</label>
                                    <input type="hidden" value="<?= session('data')->id ?>"
                                        name="kuasa_pengguna_barang">
                                    <select name="" class="form-select" aria-label="Default select example"
                                        disabled>
                                        <option value="<?= session('data')->id ?>"><?= session('data')->name ?>
                                        </option>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Unit Kerja</label>
                                    <select id="kon" name="id_unit_kerja" class="form-select"
                                        aria-label="Default select example" onchange="updateruanganOptions()"
                                        required="">
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
                                        <option data-unit="<?= $ruangans->id_unit_kerja ?>"
                                            value="<?= $ruangans->id ?>"><?= $ruangans->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">P. Pencatat</label>
                                    <select name="id_petugas1" class="form-select"
                                        aria-label="Default select example" required="">
                                        <option value="">-- Pilih --</option>
                                        <?php
                                                        foreach($petugas as $petugasd) {                                              
                                                            ?>
                                        <option value="<?= $petugasd->id ?>"><?= $petugasd->name ?></option>

                                        <?php
                                                        }
                                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Penanggung Jawab</label>
                                    <select name="id_petugas2" class="form-select"
                                        aria-label="Default select example" required="">
                                        <option value="">-- Pilih --</option>
                                        <?php
                                                        foreach($petugas as $petugasd) {                                              
                                                            ?>
                                        <option value="<?= $petugasd->id ?>,<?= $petugasd->name ?>">
                                            <?= $petugasd->name ?></option>

                                        <?php
                                                        }
                                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Keterangan</label>
                                    <textarea class="form-control" name="keterangan" id="keterangan" rows="5"
                                        placeholder="Masukkan keterangan aset.."></textarea>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                        </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <!-- Scrollable modal -->
            <div class="modal fade" id="editalatmekanik" tabindex="-1" role="dialog"
                aria-labelledby="scrollableModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" height="18">Edit Alat Mekanik</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="ps-3 pe-3" action="/editalatmekanik" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="text" class="form-label">Nama Aset</label>
                                    <input class="form-control" name="nama_alatmekanik" type="text"
                                        id="nameedit" required="" placeholder="">
                                    <input class="form-control" name="id" type="hidden" id="idedit"
                                        required="" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Jenis Aset</label>
                                    <input class="form-control" name="jenis_alatmekanik" type="text"
                                        id="nameedit2" required="" placeholder="">
                                    <input class="form-control" name="id" type="hidden" id="idedit2"
                                        required="" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Merek</label>
                                    <input class="form-control" name="merek_alatmekanik" type="text"
                                        id="nameedit3" required="" placeholder="">
                                    <input class="form-control" name="id" type="hidden" id="idedit3"
                                        required="" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Tipe</label>
                                    <input class="form-control" name="tipe_alatmekanik" type="text"
                                        id="nameedit4" required="" placeholder="">
                                    <input class="form-control" name="id" type="hidden" id="idedit4"
                                        required="" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Spesifikasi</label>
                                    <textarea class="form-control" name="spesifikasi_alatmekanik" id="nameedit5" required="" rows="5"
                                        placeholder="Masukkan beberapa ringkasan tentang Spesifikasi aset.."></textarea>
                                    <input class="form-control" name="id" type="hidden" id="idedit5"
                                        required="" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Kode Aset</label>
                                    <select name="" class="form-select" aria-label="Default select example"
                                        disabled>
                                        <option value="">08</option>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Kondisi</label>
                                    <textarea class="form-control" name="kondisi" id="nameedit6" required="" rows="5"
                                        placeholder="Masukkan beberapa ringkasan tentang kondisi aset.."></textarea>
                                    <input class="form-control" name="id" type="hidden" id="idedit6"
                                        required="" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Jumlah</label>
                                    <input class="form-control" name="jumlah" type="number" id="nameedit7"
                                        required="" placeholder="">
                                    <input class="form-control" name="id" type="hidden" id="idedit7"
                                        required="" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Satuan</label>
                                    <input class="form-control" name="satuan" type="text" id="nameedit8"
                                        required="" placeholder="">
                                    <input class="form-control" name="id" type="hidden" id="idedit8"
                                        required="" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Nilai Perolehan Aset</label>
                                    <input class="form-control" name="nilaiperolehan" type="number" id="nameedit9"
                                        required="" placeholder="">
                                    <input class="form-control" name="id" type="hidden" id="idedit9"
                                        required="" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Nilai Residu</label>
                                    <input class="form-control" name="nilai_residu" type="number" id="nameedit18"
                                        required="" placeholder="">
                                    <input class="form-control" name="id" type="hidden" id="idedit18"
                                        required="" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Tanggal Aset</label>
                                    <input class="form-control" name="tanggal_aset" type="date" id="nameedit10"
                                        required="" placeholder="">
                                    <input class="form-control" name="id" type="hidden" id="idedit10"
                                        required="" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Masa Manfaat</label>
                                    <div class="input-group">
                                        <input class="form-control" name="masa_manfaat" type="number"
                                            id="nameedit14" required="" placeholder="">
                                        <span class="input-group-text">Tahun</span>
                                        <input class="form-control" name="id" type="hidden" id="idedit17"
                                            required="" placeholder="">
                                    </div>
                                </div>
                                <div class="fallback">
                                    <label for="image" class="form-label">Foto Aset</label>
                                    <input type='file' class='form-control'
                                        accept = 'image/jpeg , image/jpg, image/gif, image/png' name="image"
                                        id="image">
                                </div>
                                <p href="#" style="color: crimson">
                                    please do not upload images larger than 2 mb</p>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="nameedit11" rows="5" required=""
                                        placeholder="Masukkan alamat aset.."></textarea>
                                    <input class="form-control" name="id" type="hidden" id="idedit11"
                                        required="" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Pengelola Barang</label>
                                    <select name="" class="form-select" aria-label="Default select example"
                                        disabled>
                                        <option value="">PT. Rolas Nusantara Medika</option>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Pengguna Barang</label>
                                    <input type="hidden" id='hidid' name="pengguna_barang">
                                    <select name="" class="form-select" id="pengguna_barang"
                                        aria-label="Default select example" disabled>
                                        <option id="id_unit_usahaedit" value=""></option>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Kuasa Pengguna Barang</label>
                                    <input type="hidden" value="" id='hidid2'
                                        name="kuasa_pengguna_barang">
                                    <select name="" class="form-select" aria-label="Default select example"
                                        disabled>
                                        <option id="id_unit_usahaedit2" value=""></option>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Unit Kerja</label>
                                    <select name="id_unit_kerja" id="tol" class="form-select"
                                        aria-label="Default select example">
                                        <option id="kerja" value="">-- Pilih --</option>
                                        <?php
                                                        foreach($unit_kerja as $unit_kerjas) {                                        
                                                            ?>
                                        <option dataunit="<?= $unit_kerjas->id_unit_usaha ?>"
                                            value="<?= $unit_kerjas->id ?>"><?= $unit_kerjas->name ?></option>

                                        <?php
                                                        }
                                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Ruangan</label>
                                    <select name="id_ruangan" id="lol" class="form-select"
                                        aria-label="Default select example" required>
                                        <option id="ruangan" value="">-- Pilih --</option>
                                        <?php
                                                        foreach($ruangan as $ruangans) {                                              
                                                            ?>
                                        <option dataruangan="<?= $ruangans->id_unit_usaha ?>"
                                            value="<?= $ruangans->id ?>"><?= $ruangans->name ?></option>

                                        <?php
                                                        }
                                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">P. Pencatat</label>
                                    <select name="id_petugas1" id="hey" class="form-select"
                                        aria-label="Default select example" required="">
                                        <option id="petugas">-- Pilih --</option>
                                        <?php
                                                        foreach($petugas as $petugasd) {                                              
                                                            ?>
                                        <option datapetugas="<?= $petugasd->id_unit_usaha ?>"
                                            value="<?= $petugasd->id ?>"><?= $petugasd->name ?></option>

                                        <?php
                                                        }
                                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Penanggung Jawab</label>
                                    <select name="id_petugas2" id="hoy" class="form-select"
                                        aria-label="Default select example" required="">
                                        <option id="petugas2">-- Pilih --</option>
                                        <?php
                                                        foreach($petugas as $petugasd) {                                              
                                                            ?>
                                        <option datapetugas2="<?= $petugasd->id_unit_usaha ?>"
                                            value="<?= $petugasd->id ?>,<?= $petugasd->name ?>"><?= $petugasd->name ?>
                                        </option>

                                        <?php
                                                        }
                                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Keterangan</label>
                                    <textarea class="form-control" name="keterangan" id="nameedit12" rows="5"
                                        placeholder="Masukkan keterangan aset.."></textarea>
                                    <input class="form-control" name="id" type="hidden" id="idedit12"
                                        required="" placeholder="">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                        </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->






            <!-- bundle -->
            <script src="../assets/js/vendor.min.js"></script>
            <script src="../assets/js/app.min.js"></script>

            <script>
                $("#edituniusaha").load(url, data, function() {
                    $(this).modal('show');
                    $(this).find(".close_btn").click(modal_closing);
                });
            </script>

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
            <!-- plugin js -->
            <script src="assets/js/vendor/dropzone.min.js"></script>
            <!-- init js -->
            <script src="assets/js/ui/component.fileupload.js"></script>

            <script>
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

                function updatePetugasOptions() {
                    var ruanganDropdown = document.getElementById("tel");
                    var petugasDropdown = document.getElementById("ahai");
                    var petugas2Dropdown = document.getElementById("ahai2");

                    // Get the selected unit value
                    var selectedUnitValue = ruanganDropdown.value;

                    // Clear the ruangan dropdown value when "-- Pilih --" is selected in Unit Kerja
                    if (selectedUnitValue === "") {
                        petugasDropdown.innerHTML = '<option value="">-- Pilih --</option>';
                        petugas2Dropdown.innerHTML = '<option value="">-- Pilih --</option>';
                        return; // Exit the function early
                    }

                    // Reset ruangan dropdown options
                    petugasDropdown.innerHTML = '';
                    petugas2Dropdown.innerHTML = '';


                    // Loop through ruangan options and add options based on the selected unit
                    <?php foreach($petugas as $petugasd) { ?>
                    var dataruangan = <?= json_encode($petugasd->id_ruangan) ?>;
                    if (selectedUnitValue === "" || selectedUnitValue == dataruangan) {
                        var option = document.createElement('option');
                        option.value = <?= json_encode($petugasd->id) ?>;
                        option.text = <?= json_encode($petugasd->name) ?>;
                        petugasDropdown.add(option);
                    }
                    if (selectedUnitValue === "" || selectedUnitValue == dataruangan) {
                        var option = document.createElement('option');

                        // Concatenate id and name with a separator (e.g., comma)
                        var optionValue = <?= json_encode($petugasd->id . ',' . $petugasd->name) ?>;

                        // Split the concatenated value into an array using the separator (',')
                        var valuesArray = optionValue.split(',');

                        // Set the value and text of the option to the second part (index 1, which is the name)
                        option.value = valuesArray;
                        option.text = valuesArray[1];

                        petugas2Dropdown.add(option);
                    }

                    <?php } ?>
                }

                // Add an event listener to call the function when the page loads
                window.addEventListener('load', updatePetugasOptions);

                // Additional event listener for Unit Kerja dropdown change
                document.getElementById("kon").addEventListener('change', updatePetugasOptions);

                function updateRuanganeditOptions() {
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
                    updateRuanganeditOptions();
                });

                function updatePetugaseditOptions() {
                    var ruanganDropdown = document.getElementById("lol");
                    var petugasDropdown = document.getElementById("hey");
                    var petugas2Dropdown = document.getElementById("hoy");

                    // Get the selected unit value
                    var selectedUnitValue = ruanganDropdown.value;

                    // Clear the ruangan dropdown value when "-- Pilih --" is selected in Unit Kerja
                    if (selectedUnitValue === "") {
                        petugasDropdown.innerHTML = '<option value="">-- Pilih --</option>';
                        petugas2Dropdown.innerHTML = '<option value="">-- Pilih --</option>';
                        return; // Exit the function early
                    }

                    // Reset ruangan dropdown options
                    petugasDropdown.innerHTML = '';
                    petugas2Dropdown.innerHTML = '';


                    // Loop through ruangan options and add options based on the selected unit
                    <?php foreach($petugas as $petugasd) { ?>
                    var dataruangan = <?= json_encode($petugasd->id_ruangan) ?>;
                    if (selectedUnitValue === "" || selectedUnitValue == dataruangan) {
                        var option = document.createElement('option');
                        option.value = <?= json_encode($petugasd->id) ?>;
                        option.text = <?= json_encode($petugasd->name) ?>;
                        petugasDropdown.add(option);
                    }
                    if (selectedUnitValue === "" || selectedUnitValue == dataruangan) {
                        var option = document.createElement('option');

                        // Concatenate id and name with a separator (e.g., comma)
                        var optionValue = <?= json_encode($petugasd->id . ',' . $petugasd->name) ?>;

                        // Set the value to the concatenated id and name
                        option.value = optionValue;

                        // Split the concatenated value into an array using the separator (',')
                        var valuesArray = optionValue.split(',');

                        // Set the text of the option to the second part (index 1, which is the name)
                        option.text = valuesArray[1];

                        petugas2Dropdown.add(option);
                    }

                    <?php } ?>
                }

                // Add an event listener to call the function when the page loads
                window.addEventListener('load', updatePetugasOptions);

                // Additional event listener for Unit Kerja dropdown change
                document.getElementById("tol").addEventListener('change', updatePetugasOptions);
                document.getElementById("editbutton").addEventListener('click', function() {
                    // Set the selected value if the condition is met
                    updateRuanganeditOptions();
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
                            window.location.href = '/deletealatmekanik/' + id;
                        } else {}
                    })
                }

                function convertDate(inputDate) {
                    const dateParts = inputDate.split('-');
                    if (dateParts.length === 3) {
                        const day = dateParts[0];
                        const month = dateParts[1];
                        const year = dateParts[2];
                        return `${year}-${month}-${day}`;
                    }
                    return null;
                }

                function loaddata(urut) {

                    $('#nameedit').val($('#editbutton-' + urut).data('nama'));
                    $('#nameedit2').val($('#editbutton-' + urut).data('jenis'));
                    $('#nameedit3').val($('#editbutton-' + urut).data('merek'));
                    $('#nameedit4').val($('#editbutton-' + urut).data('tipe'));
                    $('#nameedit5').val($('#editbutton-' + urut).data('spesifikasi'));
                    $('#nameedit6').val($('#editbutton-' + urut).data('kondisi'));
                    $('#nameedit7').val($('#editbutton-' + urut).data('jumlah'));
                    $('#nameedit8').val($('#editbutton-' + urut).data('satuan'));
                    $('#nameedit9').val($('#editbutton-' + urut).data('nilaiperolehan'));
                    $('#nameedit18').val($('#editbutton-' + urut).data('nilairesidu'));
                    $('#nameedit14').val($('#editbutton-' + urut).data('masamanfaat'));
                    $('#nameedit15').val($('#editbutton-' + urut).data('penyusutan'));
                    const formattedDate = convertDate($('#editbutton-' + urut).data('tanggal'));
                    if (formattedDate) {
                        $('#nameedit10').val(formattedDate);
                    }


                    $('#nameedit11').val($('#editbutton-' + urut).data('alamat'));
                    $('#nameedit12').val($('#editbutton-' + urut).data('keterangan'));
                    document.getElementById('hidid').value = $('#editbutton-' + urut).data('usaha');
                    document.getElementById('hidid2').value = $('#editbutton-' + urut).data('usaha');
                    document.getElementById('id_unit_usahaedit').value = $('#editbutton-' + urut).data('user');
                    document.getElementById('id_unit_usahaedit').innerHTML = $('#editbutton-' + urut).data('user');
                    document.getElementById('id_unit_usahaedit2').value = $('#editbutton-' + urut).data('user');
                    document.getElementById('id_unit_usahaedit2').innerHTML = $('#editbutton-' + urut).data('user');
                    document.getElementById('kerja').value = $('#editbutton-' + urut).data('idunitkerja');
                    document.getElementById('kerja').innerHTML = $('#editbutton-' + urut).data('namaunitkerja');
                    document.getElementById('ruangan').value = $('#editbutton-' + urut).data('idnyaruangan');
                    document.getElementById('ruangan').innerHTML = $('#editbutton-' + urut).data('namaruangan');
                    document.getElementById('petugas').value = $('#editbutton-' + urut).data('idnyapetugas');
                    document.getElementById('petugas').innerHTML = $('#editbutton-' + urut).data('namapetugas');
                    var datadua = $('#editbutton-' + urut).data('petugasdua').split(",");
                    document.getElementById('petugas2').value = datadua[0] + ',' + datadua[1];
                    document.getElementById('petugas2').innerHTML = datadua[1];
                    $('#idedit').val($('#editbutton-' + urut).data('id'));
                    $('#idedit2').val($('#editbutton-' + urut).data('id'));
                    $('#idedit3').val($('#editbutton-' + urut).data('id'));
                    $('#idedit4').val($('#editbutton-' + urut).data('id'));
                    $('#idedit5').val($('#editbutton-' + urut).data('id'));
                    $('#idedit6').val($('#editbutton-' + urut).data('id'));
                    $('#idedit7').val($('#editbutton-' + urut).data('id'));
                    $('#idedit8').val($('#editbutton-' + urut).data('id'));
                    $('#idedit9').val($('#editbutton-' + urut).data('id'));
                    $('#idedit10').val($('#editbutton-' + urut).data('id'));
                    $('#idedit11').val($('#editbutton-' + urut).data('id'));
                    $('#idedit12').val($('#editbutton-' + urut).data('id'));
                    $('#idedit17').val($('#editbutton-' + urut).data('id'));
                    $('#idedit18').val($('#editbutton-' + urut).data('id'));
                    console.log($('#editbutton-' + urut).data('nama'));
                    console.log($('#editbutton-' + urut).data('jenis'));
                    console.log($('#editbutton-' + urut).data('merek'));
                    console.log($('#editbutton-' + urut).data('tipe'));
                    console.log($('#editbutton-' + urut).data('spesifikasi'));
                    console.log($('#editbutton-' + urut).data('kondisi'));
                    console.log($('#editbutton-' + urut).data('satuan'));
                    console.log($('#editbutton-' + urut).data('nilaiperolehan'));
                    console.log($('#editbutton-' + urut).data('tanggal'));
                    console.log($('#editbutton-' + urut).data('alamat'));
                    console.log($('#editbutton-' + urut).data('keterangan'));
                    console.log($('#editbutton-' + urut).data('nilairesidu'));
                    console.log($('#editbutton-' + urut).data('masamanfaat'));
                    console.log($('#editbutton-' + urut).data('penyusutan'));

                    // Data lainnya untuk mengatur seleksi opsi dalam elemen select
                    var select = document.getElementById("tol");
                    var select2 = document.getElementById("lol");
                    var select3 = document.getElementById("hey");
                    var select4 = document.getElementById("hoy");

                    for (var i = 1; i < select.length; i++) {
                        var txt = select.options[i].getAttribute('dataunit');
                        if (txt != $('#editbutton-' + urut).data('usaha')) {
                            $(select.options[i]).attr('disabled', 'disabled').hide();
                        } else {
                            $(select.options[i]).removeAttr('disabled').show();
                        }
                    }

                    for (var i = 1; i < select2.length; i++) {
                        var txt = select2.options[i].getAttribute('dataruangan');
                        if (txt != $('#editbutton-' + urut).data('usaha')) {
                            $(select2.options[i]).attr('disabled', 'disabled').hide();
                        } else {
                            $(select2.options[i]).removeAttr('disabled').show();
                        }
                    }

                    for (var i = 1; i < select3.length; i++) {
                        var txt = select3.options[i].getAttribute('datapetugas');
                        if (txt != $('#editbutton-' + urut).data('usaha')) {
                            $(select3.options[i]).attr('disabled', 'disabled').hide();
                        } else {
                            $(select3.options[i]).removeAttr('disabled').show();
                        }
                    }
                    for (var i = 1; i < select4.length; i++) {
                        var txt = select4.options[i].getAttribute('datapetugas2');
                        if (txt != $('#editbutton-' + urut).data('usaha')) {
                            $(select4.options[i]).attr('disabled', 'disabled').hide();
                        } else {
                            $(select4.options[i]).removeAttr('disabled').show();
                        }
                    }
                }
            </script>
</body>

</html>
