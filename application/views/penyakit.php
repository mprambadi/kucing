<?php //var_dump($daftar_pasien); ?>
<div class="pull-right">
    <a class="btn bg-maroon btn-flat margin" role="button" data-toggle="modal" data-target="#modal-default"></i>Tambah</a>
</div>
<table id="data_table" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Penyakit Kucing</th>
                <th>Penjelasan Penyakit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        	<?php
        		$i=1;
        		foreach ($daftar_penyakit as $key) {
        	?>
        		<tr>
                    <td width="15px"><?=$i?></td>
        			<td><?=$key->nama_penyakit?></td>
        			<td><?=$key->penjelasan_penyakit?></td>
                    <td width="100px">
                        <button class="btn btn-primary" role="button" data-id="<?=$key->id_pernyakit?>" data-nama="<?=$key->nama_penyakit?>" data-penjelasan="<?=$key->penjelasan_penyakit?>" data-target="#modal-default" data-toggle="modal" ><i class="fa fa-edit"></i></button>
                         <button class="btn btn-danger" role="button" data-id="<?=$key->id_pernyakit?>" data-nama="<?=$key->nama_penyakit?>" data-penjelasan="<?=$key->penjelasan_penyakit?>" data-target="#modal-danger" data-toggle="modal" ><i class="fa fa-trash-o"></i></button>
                    </td>
        		</tr>
        	<?php
        		$i++;
        	}
        	?>
        </tbody>
</table>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Form Penyakit</h4>
            </div>
            <form action="<?=base_url()?>index.php/Master/savePenyakit" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="id_pernyakit" name="id_pernyakit" value="" />
                    <div class="form-group">
                        <div class=".col-xs-12">
                            <input class="form-control" type="text" id="nama_penyakit" name="nama_penyakit" placeholder="Masukan Nama Penyakit" />    
                        </div>
                    </div>
                    <div class="form-group">
                        <div class=".col-xs-12">
                        <textarea class="form-control" rows="" cols="" id="penjelasan_penyakit" name="penjelasan_penyakit" placeholder="Masukan Penjelasan Penyakit">
                        
                        </textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    <!-- /.modal-content -->
    </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal modal-danger fade" id="modal-danger">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?=base_url()?>index.php/Master/deletePenyakit" method="POST">
                <input type="hidden" id="id_pernyakit_del" name="id_pernyakit_del" value="" />
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete Data</h4>
                </div>
                <div class="modal-body">
                    <p id="kata"></p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline">Save changes</button>
                </div>
            </form>
        </div>
    <!-- /.modal-content -->
    </div>
  <!-- /.modal-dialog -->
</div>