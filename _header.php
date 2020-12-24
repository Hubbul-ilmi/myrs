<?php
require_once '_config/config.php';
require "_assets/libs/vendor/autoload.php";
if(!isset($_SESSION['user'])){
    ?>
    <script type="text/javascript">window.location='<?=base_url("auth")?>'</script>
    <?php
} ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi Rumah Sakit</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>/_assets/src/sweetalert.css" rel="stylesheet">
    <link href="<?=base_url()?>/_assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?=base_url()?>/_assets/css/simple-sidebar.css" rel="stylesheet">
    <link href="<?=base_url()?>/_assets/libs/DataTables/datatables.min.css" rel="stylesheet">
    <script src="<?=base_url('_assets/src/sweetalert.js')?>"></script>

</head>
<body>
    <script src="<?=base_url('_assets/js/jquery.js')?>"></script>
    <script src="<?=base_url('_assets/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('_assets/libs/DataTables/datatables.min.js')?>"></script>
    <script src="<?=base_url('_assets/libs/vendor/ckeditor/ckeditor/ckeditor.js')?>"></script>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="<?=base_url('dashboard')?>"><span class="text-primary"><b>Rumah Sakit</b></span></a>
                </li>
                <li>
                    <a href="<?=base_url('dashboard')?>">Dashboard</a>
                </li>
                <li>
                    <a href="<?=base_url('pasien/data.php')?>">Data Pasien</a>
                </li>
                <li>
                    <a href="<?=base_url('dokter/data.php')?>">Data Dokter</a>
                </li>
                <li>
                    <a href="<?=base_url('poliklinik/data.php')?>">Poliklinik</a>
                </li>
                <li>
                    <a href="<?=base_url('obat/data.php')?>">Obat</a>
                </li>
                <li>
                    <a href="<?=base_url('rekam_medis/data.php')?>">Rekam Medis</a>
                </li>
                <li>
                    <a href="<?=base_url('auth/logout.php')?>"> <span class="text-danger">Logout</span></a>
                </li>
            </ul>
        </div>
        <div id="page-content-wrapper">
            <div class="container-fluid">
