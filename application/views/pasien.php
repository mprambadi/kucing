<?php //var_dump($daftar_pasien); ?>
<table id="data_table" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemilik</th>
                <th>Nama Kucing</th>
                <th>Umur (Tahun)</th>
                <th>Ras</th>
                <th>Warna Bulu</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
        	<?php
        		$i=1;
        		foreach ($daftar_pasien as $key) {
        	?>
        		<tr>
        			<td width="15px"><?=$i?></td>
        			<td><?=$key->nama_user?></td>
        			<td><?=$key->nama_kucing?></td>
        			<td><?php
        				if($key->umur<1){
        					echo " < 1";
        				}else{
        					echo $key->umur;
        				}
        			?></td>
        			<td><?=$key->ras?></td>
        			<td><?=$key->warna_bulu?></td>
        			<td><?=$key->jenis_kelamin?></td>
        			<td><?=$key->tanggal_daftar?></td>
        		</tr>
        	<?php
        		$i++;
        	}
        	?>
        </tbody>
</table>