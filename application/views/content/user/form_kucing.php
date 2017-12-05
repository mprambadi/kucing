<header class="form-kucing">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center" style="margin-top:50px; margin-bottom:50px">
        <h2 class="section-heading text-uppercase">Periksakan Kucing Anda</h2>
      </div>
    </div>
    <div class="row" >
      <div class="col-lg-12" style="margin-top:50px">
        <form action="<?php echo site_url('kucing_controller/proses_tambah_data_kucing');?>" method="POST">
          <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <input class="form-control" id="name" name="namaKucing" type="text" placeholder="Nama Kucing" required data-validation-required-message="Masukan nama kucing anda.">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <input class="form-control" id="umur" name="umur" type="number" placeholder="Umur" required data-validation-required-message="Masukan umur kucing anda.">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <select name="ras" placeholder="Ras" class="form-control" id="sel1">
                  <option value="" disabled selected> Pilih Ras Kucing </option>
                  <?php foreach($ras as $r){?>
                  <option>
                    <?php echo $r->ras;?>
                  </option>
                  <?php }?>
                </select>
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <input class="form-control" id="warna_bulu" name="warna_bulu" type="text" placeholder="Warna Bulu" required data-validation-required-message="Masukan warna bulu kucing anda.">
                <p class="help-block text-danger"></p>
              </div>

              <div class="form-group">
                <select name="optradio1" placeholder="Jenis Kelamin" class="form-control" id="sel1">
                  <option value="" disabled selected> Jenis Kelamin </option>

                  <option value="jantan">Jantan</option>
                  <option value="betina">Betina</option>
                </select>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-lg-12 text-center" style="margin-bottom:50px; margin-top:50px">
              <div id="success"></div>
              <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Periksa</button>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</header>