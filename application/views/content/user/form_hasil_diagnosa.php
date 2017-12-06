<header style="margin-top:50px">

  <div class="container">
    <div class="row">

      <div class="col-md-12">
          <h1 style="margin-bottom:50px;  " class="text-center">Data Kucing </h1>
        <form action="<?php echo site_url('kucing_controller/penghitungan_cf');?>" method="POST" class="form-horizontal">
          <input type="hidden" name="id_kucing" value="<?php echo $id_kucing;?>">
          <div class="form-control">

            <h3> Data Kucing </h3>


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

            <h3> Gejala yang Timbul </h3>
            <table>
              <?php foreach($penyakit_kucing as $pk){?>
              <tr>
                <td>
                  <?=$pk->nama_gejala;?>
                </td>
                <td>

                  <?php
								
									if($pk->nilai_sementara==1){
										echo '<font color = "Green">Ya </font>';
									}else if($pk->nilai_sementara==null){
										echo '<font color = "Purple"> Tidak </font>';
									}else{
										echo '<font color = "Blue"> Tidak </font>';
									}
									
								?>
                    <?php } ?>
                </td>
              </tr>
            </table>

            <div class="col-md-12">
              <button class="btn btn-primary btn-block" type="submit">

                  Periksa Sekarang!
              </button>
            </div>
        </form>
      </div>
    </div>
  </div>
</header>