<div class="content-section">

	<table>
		<thead>
			<tr>
				<td>No</td>
				<td>Nama</td>
				<td>Instansi</td>
				<td>Lokasi</td>
				<td>No Telp</td>
				<td>Email</td>
				<td>Aksi</td>
			</tr>
		</thead>

		<tbody>
			{narasumber}
			<?php $i = 1; ?>
			<tr>
				<td><?php echo $i++; ?></td>
				<td>{nama}</td>
				<td>{instansi}</td>
				<td>{lokasi}</td>
				<td>{telp}</td>
				<td>{email}</td>
				<td>
					<a href="<?php echo site_url('narasumber/edit'); ?>/{idnarasumber_biodata}">edit</a>| 
					<a href="<?php echo site_url('narasumber/delete'); ?>/{idnarasumber_biodata}" onClick="return confirm('Anda Yakin Akan Dihapus?');">delete</a>| 
					<!-- <a href="<?php echo site_url('narasumber/detail'); ?>/{idnarasumber_biodata}">detail</a> -->
				</td>
			</tr>
			{/narasumber}
		</tbody>
	</table>

</div>