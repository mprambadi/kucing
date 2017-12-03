<!DOCTYPE html>
<html>
	<head>
		<title> Sistem Diagnosa Penyakit Kucing </title>
			
			<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
			<link href = "<?php echo base_url();?>assets/css/bootstrap.min.css" rel = "stylesheet" type = "text/css">
			<link href = "<?php echo base_url();?>assets/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
			<link href = "<?php echo base_url();?>assets/css/styles.css" rel = "stylesheet" type = "text/css">
			<link href = "<?php echo base_url();?>assets/various/css/font-awesome.min.css" rel="stylesheet"  type = "text/css">
			
			
			<script src = "<?php echo base_url();?>assets/js/bootstrap.js" type = "text/javascript"> </script>
			<script src = "<?php echo base_url();?>assets/js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
			<script src = "<?php echo base_url();?>assets/js/fileinput.min.js"></script>
			<script src = "<?php echo base_url();?>assets/js/fileinput.js" type="text/javascript"></script>
			<script src = "<?php echo base_url();?>assets/js/jquery.js"> </script>
			<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"> </script>
			
		
	</head>
	
	<body>
		<nav class="navbar navbar-default navbar-static-top" style = "background-color : white">
			<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				<!-- <a class="navbar-brand" href="#">Brand</a> -->
				</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav">
			<!-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li> -->
			<!-- <li class = "active"><a href="<//?php echo site_url('welcome/index'); ?>"> <strong> Home </strong> </a></li> -->
			<li class = "active"><a href="<?//php echo site_url('admin/data_pribadi'); ?>"> <strong> Form Cek Kesehatan </strong></a></li>
			<li><a href="<?//php echo site_url('welcome/custom'); ?>"> <strong> Daftar Penyakit Pada Kucing </strong></a></li>
			<li><a href="<?php echo site_url('Kucing_controller/data_pasien_sebelumnya'); ?>"> <strong> Data Pasien Sebelumnya </strong></a></li>
			
		  </ul>
		  
		  <ul class="nav navbar-nav navbar-right">
			<form class="navbar-form navbar-left" role="search">
			<div class="form-group">
			  <input type="text" class="form-control" placeholder="Search">
			<button type="submit" class="btn btn-default">
			  <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
			</button>
			
			<a href="<?php echo site_url('admin/logout'); ?>" class="btn btn-default" role="button">
				<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
			</a>
		
			</div>
		  </form>
		  </ul>
		</div><!-- /.navbar-collapse -->
		</div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>

	<h2 align = "center"> Periksakan Kucing Anda! </h2>
		<br/>
		<div class = "container">
				<div class = "row">
					<div class = "col-md-3">
					</div>
					<div class = "col-md-4">
						<form action = "<?php echo site_url('kucing_controller/proses_tambah_data_kucing');?>" method = "POST" class="form-horizontal">
						<div class = "form-body">
							<div class="form-group">
							  <label class="control-label col-md-3">Nama Kucing</label>
							  <div class="col-md-9">
								<input name="namaKucing" placeholder="Nama Kucing" class="form-control" type="text" >
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3">Umur</label>
							  <div class="col-md-9">
								<input name="umur" placeholder="Umur" class="form-control" type="number">
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3">Ras</label>
							  <div class="col-md-9">
								<select name = "ras" placeholder = "Ras" class="form-control" id="sel1">
									<option value = "" disabled selected> Pilih Ras Kucing </option>
									<?php foreach($ras as $r){?>
									<option>
										 <?php echo $r->ras;?> 
									</option>
									<?php }?>
								</select>
								<!--<input name="ras" placeholder="Ras" class="form-control" type="text">-->
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3">Warna Bulu</label>
							  <div class="col-md-9">
								<input name="warna_bulu" placeholder="Warna Bulu" class="form-control" type="text">
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3">Jenis Kelamin</label>
							  <div class="col-md-9">
								<label class="radio-inline">
								  <input type="radio" name="optradio1" value = "Jantan" id = "Jantan">Jantan
								</label>
								<label class="radio-inline">
								  <input type="radio" name="optradio1" value = "Betina" id = "Betina">Betina
								</label>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3">Id Pasien</label>
							  <div class="col-md-9">
								<input name="id_kucing" placeholder="Id Pasien" class="form-control" type="number">
							  </div>
							</div>
						</div>
						
							<br/>
							<div class="col-xs-4 col-centered">
							<button class = "list-group-item active" type = "submit">
								<center>
									<span class = "glyphicon glyphicon-search"> </span>
									 Periksa
								 </center>
							</button>
							</div>
						</form>
					</div>
					
					<div class = "col-md-4">
						<img src = "<?php echo base_url(); ?>assets/foto/CAt_No-Background1.png" width = "75%">
					</div>
				</div>
		</div>
	
	<script src = "<?php echo base_url();?>assets/js/bootstrap.js"> </script>
	<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"> </script>
	</body>
</html>	