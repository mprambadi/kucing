<header style="margin-top:50px">

  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <h1 style="margin-bottom:50px;  " class="text-center">Hasil Pemeriksaan </h1>

        <form action="<?php echo site_url('kucing_controller/');?>" method="POST" class="form-horizontal">


          <div class="form-control">
            <div class="form-group row">
              <label class="control-label col-md-5">Id Pasien</label>
              <div class="col-md-4">
                <?=$data_kucing->id_kucing;?>
              </div>
            </div>

            <div class="form-group row">
              <label class="control-label col-md-5">Nama Kucing</label>
              <div class="col-md-4">
                <?=$data_kucing->nama_kucing;?>
              </div>
            </div>

            <div class="form-group row">
              <label class="control-label col-md-5">Umur</label>
              <div class="col-md-4">
                <?=$data_kucing->umur;?>
              </div>
            </div>

            <div class="form-group row">
              <label class="control-label col-md-5">Ras</label>
              <div class="col-md-4">
                <?=$data_kucing->ras;?>
              </div>
            </div>

            <div class="form-group row">
              <label class="control-label col-md-5">Warna Bulu</label>
              <div class="col-md-4">
                <?=$data_kucing->warna_bulu;?>
              </div>
            </div>

            <div class="form-group row">
              <label class="control-label col-md-5">Jenis Kelamin</label>
              <div class="col-md-4">
                <?=$data_kucing->jenis_kelamin;?>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-12 text-center"><h1>Hasil Diagnosa Naive Bayes</h1></label>
              <div class="col-md-12 text-center
              
              ">

                <?php 
									//var_dump($array); 
									$temp_cf_tertinggi = 0;
									$temp_cf_tertinggi_nama_penyakit = 0;
									
									foreach($array as $d){
										
										//echo $d[1]." ". $d[2];
										
										if($temp_cf_tertinggi<=$d[2]){
											$temp_cf_tertinggi = $d[2];
											$temp_cf_tertinggi_nama_penyakit = $d[1];	
											
										}
										//var_dump($d[2]); die;
										//echo $d->temp_nama_pernyakit;
										
									}
									
									// echo "<h1 class='text-center'>".$temp_cf_tertinggi."</h1>";
									echo '<br/>';
									echo "<h1 class='text-center'>".$temp_cf_tertinggi_nama_penyakit."</h1>";
									echo '<br/>';
									foreach($array as $d){
										
										//echo $d[1]." ". $d[2];
										
										if($temp_cf_tertinggi<$d[2]){
											echo $d[2];
											echo '<br/>';
											echo $d[1];
											echo '<br/>';
										}
										//var_dump($d[2]); die;
										//echo $d->temp_nama_pernyakit;
										
									}
									
									 ?>

              </div>
            </div>
            <div class="col-md-12">
              <div class="pull-left">
                <button class="btn btn-primary btn-block d-print-none" type="submit">
                  Kembali ke Menu Utama...
                </button>
              </div>
              
              <div class="pull-right">
                <button class="btn btn-primary d-print-none" onclick="window.print()">
                  <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print
                </button>
              </div>
            </div>
          </div>

        </form>
        <?php //echo $id_kucing;?>
        <?php $a = json_encode($array_hasil);?>
        <?php //echo $a;?>
        <form action="<?php echo site_url('kucing_controller/metode_nb');?>" method="POST" class="form-horizontal">

          <input type="hidden" name="hasil_cf" value='<?php echo $a;?>'>
          <input type="hidden" name="id_kucing" value="<?php echo $id_kucing;?>">

        </form>

      </div>
    </div>
  </div>
</header>