<?php //var_dump($daftar_pasien); ?>
<table id="data_table" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Gejala Penyakit</th>
                <th>Pertanyaan</th>
                <!-- <th>Aksi</th> -->
            </tr>
        </thead>
        <tbody>
        	<?php
        		$i=1;
        		foreach ($daftar_gejala as $key) {
        	?>
        		<tr>
                    <td width="15px"><?=$i?></td>
                    <td><?=$key->nama_gejala?></td>
        			<td><?=$key->daftar_pertanyaan?></td>
                    <!-- <td width="15px"><?=$i?></td> -->
        		</tr>
        	<?php
        		$i++;
        	}
        	?>
        </tbody>
</table>