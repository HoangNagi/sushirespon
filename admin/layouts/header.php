<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo duongdan() ?>public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<?php echo duongdan() ?>public/admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo duongdan() ?>public/admin/css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="<?php echo duongdan()?>index.php">NAGIKI SUSHI Admin</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <!-- <li class="nav-item active">
        <a class="nav-link" href="<?php echo duongdan()?>admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Trang quản trị</span>
        </a>
      </li> -->

      <li class="nav-item <?php echo isset($open) && $open == 'danhmucsanpham' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo modules("danhmucsanpham") ?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Danh mục sản phẩm</span>
        </a>
      </li>

      <li class="nav-item <?php echo isset($open) && $open == 'sanpham' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo modules("sanpham") ?>">
          <i class="fas fa-store"></i>
          <span>Sản phẩm</span>
        </a>
      </li>
    </ul>