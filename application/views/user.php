<?php //var_dump($daftar_pasien); ?>
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
                    <td width="15px"><?=$i?></td>
        		</tr>
        	<?php
        		$i++;
        	}
        	?>
        </tbody>
</table>