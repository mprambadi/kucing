<header style="text-align:center; margin-top:50px">

	<div class="container">
		<div class="row">
			<div class="col-md-12">
        <h1 style="margin-bottom:50px">Pilih Gejala Penyakit Kucing Anda </h1>
				<form action="<?php echo site_url('kucing_controller/proses_simpan_perhitungan_sementara');?>" method="POST" class="form-horizontal">
					<input type="hidden" name="id_kucing" value="<?=$id_kucing?>" />
					<?php
						 $i=1;
							foreach($daftar_gejala as $gejala){
						 ?>
						<div class="form-group">
							<label class="control-label col-md-8">
								<?=$i.'.'.$gejala->daftar_pertanyaan?>
							</label>
							<div class="col-md-12">
								<label class="radio-inline">
									<input type="radio" name="optradio<?=$gejala->id_gejala?>" value="1" id="Ya<?=$gejala->id_gejala?>" <?php if($gejala->nilai_sementara==1){ echo 'checked="checked"';} ?>>Ya
								</label>
								<label class="radio-inline">
									<input type="radio" name="optradio<?=$gejala->id_gejala?>" value="0" id="Tidak<?=$gejala->id_gejala?>" <?php if($gejala->nilai_sementara==NULL || $gejala->nilai_sementara == 0){ echo 'checked="checked"';} ?>>Tidak
								</label>
							</div>
						</div>
						<?php
						  $i++;
							}
						 ?>
			</div>
			<div class="col-md-12" style="margin-bottom:50px">
				<button class="btn btn-primary btn-block" type="submit">
						Simpan
				</button>
			</div>
			</form>
		</div>
  </div>
</header>