<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Pakar Penyakit Kucing</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/datatables.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/datatables/print/buttons.dataTables.min.css
">
  <style type="text/css">
  </style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script type="text/javascript">

  </script>
  <!-- Google Font -->
</head>

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b>AT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Penyakit</b>Kucing</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- User Account: style can be found in dropdown.less -->
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="<?=base_url()?>index.php/master/logout" title="Log Out"><i class="glyphicon glyphicon-off"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <!-- <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div> -->
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->

      
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <?php if($this->session->role == 1):  ?>
        <li <?php if($page=='pasien'){ echo "class='active'";} ?> >
          <a href="<?=base_url()?>index.php/master/pasien">
            <i class="fa fa-check-square-o"></i> <span>Data Pasien</span>
          </a>
        </li>
        <li <?php if($page=='ras'){ echo "class='active'";} ?> >
          <a href="<?=base_url()?>index.php/master/ras">
            <i class="fa fa-eye"></i> <span>Ras Kucing</span>
          </a>
        </li>
        <li <?php if($page=='gejala'){ echo "class='active'";} ?> >
          <a href="<?=base_url()?>index.php/master/gejala">
            <i class="fa fa-stethoscope"></i> <span>Gejala</span>
          </a>
        </li>
        <li <?php if($page=='penyakit'){ echo "class='active'";} ?> >
          <a href="<?=base_url()?>index.php/master/penyakit">
            <i class="fa fa-medkit"></i> <span>Penyakit</span>
          </a>
        </li>
        <li <?php if($page=='user'){ echo "class='active'";} ?> >
            <a href="<?=base_url()?>index.php/master/user">
                <i class="fa fa-user-plus"></i> <span>User</span>
              </a>
            </li>
        <?php else: ?>
        <li <?php if($page=='ras'){ echo "class='active'";} ?> >
          <a href="<?=base_url()?>index.php/master/ras">
            <i class="fa fa-eye"></i> <span>Ras Kucing</span>
          </a>
        </li>
        <li <?php if($page=='gejala'){ echo "class='active'";} ?> >
          <a href="<?=base_url()?>index.php/master/gejala">
            <i class="fa fa-stethoscope"></i> <span>Gejala</span>
          </a>
        </li>
        <li <?php if($page=='penyakit'){ echo "class='active'";} ?> >
          <a href="<?=base_url()?>index.php/master/penyakit">
            <i class="fa fa-medkit"></i> <span>Penyakit</span>
          </a>
        </li>
        <?php endif; ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$judul?>
        <small><?=$deskripsi?></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?=$title?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
        