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
		</div>
		  </div><!-- /.container-fluid -->
		</nav>

	<h2 align = "center"> Periksakan Kucing Anda! </h2>
		<br/>
		<br/>
		<div class = "container">
			<div class = "row">
				<div class = "row">
					<div class = "col-lg-5 col-centered">
						<form action = "<?php echo site_url('kucing_controller/metode_nb');?>" method = "POST" class="form-horizontal">
						<div class = "form-body">
							<div class="form-group">
								<label class="control-label col-md-3">Pertanyaan</label>
								  <div class="col-md-9">
									
									<?=$pertanyaan->daftar_pertanyaan;?>
									<?php var_dump($hasil_cf);?>
									<br/>
									
									<input type="hidden" name="id_kucing" value = "<?php echo $id_kucing;?>">
									<input type="hidden" name="id_gejala_umum" value = "<?php echo $pertanyaan->id_gejala_umum;?>">
									<input type="hidden" name="id_gejala" value = "<?php echo $pertanyaan->id_gejala;?>">
									<input type="hidden" name="hasil_cf" value = '<?php echo $hasil_cf;?>'>
									
									<label class="radio-inline">
									  <input type="radio" name="optradio2" value = "1" id = "Ya" required>Ya
									</label>
									<label class="radio-inline">
									  <input type="radio" name="optradio2" value = "0" id = "Tidak">Tidak
									</label>
								  </div>
							</div>
						</div>
						
							<br/>
							<div class="col-xs-4 col-centered">
							<button class = "list-group-item active" type = "submit">
								<center>
									<span class = "glyphicon glyphicon-search"> </span>
									 Lanjut
								 </center>
							</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	
	<script src = "<?php echo base_url();?>assets/js/bootstrap.js"> </script>
	<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"> </script>
	</body>
</html>	