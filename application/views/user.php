<?php //var_dump($daftar_pasien); ?>
<div class="pull-right">
    <a class="btn bg-maroon btn-flat margin" role="button" data-toggle="modal" data-target="#modal-default"></i>Tambah</a>
</div>
<table id="data_table" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        	<?php
        		$i=1;
        		foreach ($daftar_user as $key) {
        	?>
        		<tr>
                    <td width="15px"><?=$i?></td>
                    <td><?=$key->username?></td>
                    <td><?=$key->password?></td>
                    <?php if($key->role!=1): ?>
                    <td>
                        <button class="btn btn-primary" role="button" data-id="<?=$key->id_user?>" data-nama="<?=$key->username?>" data-password="<?=$key->password?>" data-target="#modal-default" data-toggle="modal" ><i class="fa fa-edit"></i></button>
                        <button class="btn btn-danger" role="button" data-id="<?=$key->id_user?>" data-nama="<?=$key->username?>" data-target="#modal-danger" data-toggle="modal" ><i class="fa fa-trash-o"></i></button>
                    </td>
                    <?php endif;?>
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
                <h4 class="modal-title">Form User</h4>
            </div>
            <form action="<?=base_url()?>index.php/Master/saveUser" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="id_user" name="id_user" value="" />
                    <div class=".col-xs-12">
                        <div class="form-group">
                            <input class="form-control" type="text" id="username" name="username" placeholder="Masukan Username" />    
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" id="password" name="password" placeholder="Masukan Password" />    
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
            <form action="<?=base_url()?>index.php/Master/deleteUser" method="POST">
                <input type="hidden" id="id_user_del" name="id_user_del" value="" />
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