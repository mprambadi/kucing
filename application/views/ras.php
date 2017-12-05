<?php //var_dump($daftar_pasien); ?>
<div class="pull-right">
    <a class="btn bg-maroon btn-flat margin" role="button" data-toggle="modal" data-target="#modal-default"></i>Tambah</a>
</div>
<table id="data_table" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Ras Kucing</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        	<?php
        		$i=1;
        		foreach ($daftar_ras as $key) {
        	?>
        		<tr>
                    <td width="15px"><?=$i?></td>
                    <td><?=$key->ras?></td>
                    <td>
                        <button class="btn btn-primary" role="button" data-id="<?=$key->id_ras?>" data-nama="<?=$key->ras?>" data-target="#modal-default" data-toggle="modal" ><i class="fa fa-edit"></i></button>
                        <button class="btn btn-danger" role="button" data-id="<?=$key->id_ras?>" data-nama="<?=$key->ras?>" data-target="#modal-danger" data-toggle="modal" ><i class="fa fa-trash-o"></i></button>
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
                <h4 class="modal-title">Form Ras</h4>
            </div>
            <form action="<?=base_url()?>index.php/Master/saveRas" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="id_ras" name="id_ras" value="" />
                    <div class=".col-xs-12">
                        <input class="form-control" type="text" id="nama_ras" name="nama_ras" placeholder="Masukan Nama Ras Kucing" />    
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
            <form action="<?=base_url()?>index.php/Master/deleteRas" method="POST">
                <input type="hidden" id="id_ras_del" name="id_ras_del" value="" />
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