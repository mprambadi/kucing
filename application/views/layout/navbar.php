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
			<li class = "active"><a href="<?php echo site_url('Kucing_controller/'); ?>"> <strong> Form Cek Kesehatan </strong></a></li>
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