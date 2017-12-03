<!DOCTYPE html>
<html>
	<head>
		<title> Data Pasien </title>
			
			<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
			<link href = "<?php echo base_url();?>assets/css/bootstrap.min.css" rel = "stylesheet" type = "text/css">
			<link href = "<?php echo base_url();?>assets/css/styles.css" rel = "stylesheet" type = "text/css">
			<link href = "<?php echo base_url();?>assets/various/css/font-awesome.min.css" rel="stylesheet"  type = "text/css">
			
			<script type = "text/javascript" src = "<?php echo base_url('assets/js/bootstrap.js');?>"> </script>
			<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
			<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"> </script>
		
	</head>
	
	<body>
		<nav class="navbar navbar-default navbar-fixed-top" style = "background-color : white">
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
			<li class = "active"><a href="<?php echo site_url('Kucing_controller/index'); ?>"> <strong> Form Cek Kesehatan </strong></a></li>
			<li><a href="<?//php echo site_url('welcome/custom'); ?>"> <strong> Daftar Penyakit pada Kucing </strong></a></li>
			<li><a href="<?php echo site_url('Kucing_controller/data_pasien_sebelumnya'); ?>"> <strong> Data Pasien Sebelumnya </strong></a></li>
			
		  </ul>
		  
		  <ul class="nav navbar-nav navbar-right">
			<form class="navbar-form navbar-left" role="search">
			<div class="form-group">
			  <input type="text" class="form-control" placeholder="Search">
			<button type="submit" class="btn btn-default">
			  <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
			</button>
			</div>
		  </form>
		  </ul>
		</div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class = "container">
	<div class = "row">
		<center> <h1> Data Pasien </h1> </center>
	</div>
</div>

<div class = "container">
	<div class = "row">
	<div class = "col-lg-12 col-centered">
	<div class = "paddingTop2">
	<table class = "table table-bordered table-hover table-condensed">
		<thead>
			<tr>
				<th> <center> Nama Kucing </center> </th>
				<th> <center> Umur </center> </th>
				<th> <center> Ras </center></th>
				<th> <center> Warna Bulu </center></th>
				<th> <center> Jenis Kelamin </center></th>
				<th> <center> Action </center></th>
			</tr>
		</thead>
		
		<?php foreach($daftar_pasien as $daftar){?>
							
			<tbody>
				<tr>
					<td class = "satu"> <center> <?php echo $daftar->nama_kucing;?> </center> </td>
					<td> <center> <?php echo $daftar->umur;?> </center> </td>
					<td class = "satu"> <?php echo $daftar->ras;?> </td>
					<td class = "satu"> <?php echo $daftar->warna_bulu;?> </td>
					<td class = "satu"> <?php echo $daftar->jenis_kelamin;?> </td>
					
					<td class = "satu"> 
						<center> <a class = "btn btn-primary" href = "<?//php echo site_url('daftaragenda/edit_agenda/'.$daftar->id_agenda);?>"> 
					
						<span class="glyphicon glyphicon-search" aria-hidden="true"> Periksa </span> 
						</a> </center>
					</td>
				</tr>
			</tbody>	
		<?php }?>     
				</table>
			</div>
		</div>
	</div>
</div>
	
	</body>
</html>	