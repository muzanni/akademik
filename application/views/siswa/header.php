<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Siswa - SISTEM PEMBAYARAN SPP SMK DARUSSALAM SYAFA’AT</title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">  
</head>
<body class="hold-transition skin-red sidebar-mini">

  <style>
    #table-datatable {
      width: 100% !important;
    }
    #table-datatable .sorting_disabled{
      border: 1px solid #f4f4f4;
    }
  </style>

  <div class="wrapper">

    <header class="main-header">

      <a href="<?php echo base_url('index') ?>" class="logo">
        <span class="logo-mini"><b><i class="fa fa-money"></i></b> </span>
        <span class="logo-lg"><b>SPP</b>APP</span>
      </a>

      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php 
                $id_siswa = $this->session->userdata('id');                
                $profil = $this->db->query("select * from siswa where siswa_id='$id_siswa'");
                $profil = $profil->row();
                ?>
                <img src="<?php echo base_url()?>gambar/sistem/user.png" class="user-image">
                <span class="hidden-xs"><?php echo $profil->siswa_nama; ?> - siswa</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('siswa/keluar') ?>"><i class="fa fa-sign-out"></i> LOGOUT</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <?php 
            $id_siswa = $this->session->userdata('id');            
            $profil = $this->db->query("select * from siswa where siswa_id='$id_siswa'");
            $profil = $profil->row();           
            ?>
            <img src="<?php echo base_url()?>gambar/sistem/user.png" class="img-circle">
          </div>
          <div class="pull-left info">
            <p><?php echo $profil->siswa_nama; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>

          <li>
            <a href="<?php echo base_url('siswa/index') ?>">
              <i class="fa fa-dashboard"></i> <span>DASHBOARD</span>
            </a>
          </li>
<!-- 
          <li>
            <a href="<?php echo base_url('siswa/kelas') ?>">
              <i class="fa fa-folder"></i> <span>DATA KELAS</span>
            </a>
          </li>
 -->
          <!-- <li>
            <a href="<?php echo base_url('siswa/jurusan') ?>">
              <i class="fa fa-folder"></i> <span>DATA JURUSAN</span>
            </a>
          </li>

          <li>
            <a href="<?php echo base_url('siswa/angkatan') ?>">
              <i class="fa fa-folder"></i> <span>DATA ANGKATAN & BIAYA SPP</span>
            </a>
          </li>

          <li>
            <a href="<?php echo base_url('siswa/siswa') ?>">
              <i class="fa fa-users"></i> <span>DATA SISWA</span>
            </a>
          </li> -->
          
          <li>
            <a href="<?php echo base_url('siswa/angkatan') ?>">
              <i class="fa fa-folder"></i> <span>DATA ANGKATAN & BIAYA SPP</span>
            </a>
          </li>

          <li>
            <a href="<?php echo base_url('siswa/spp') ?>">
              <i class="fa fa-money"></i> <span>PEMBAYARAN SPP</span>
            </a>
          </li>         

          <li>
            <a href="<?php echo base_url('siswa/ganti_password') ?>">
              <i class="fa fa-lock"></i> <span>GANTI PASSWORD</span>
            </a>
          </li>

          <li>
            <a href="<?php echo base_url('siswa/keluar') ?>">
              <i class="fa fa-sign-out"></i> <span>LOGOUT</span>
            </a>
          </li>
          
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
