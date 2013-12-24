<div class="content-section">

	<h1><span>NARASUMBER</span></h1>

	{notif}

	<p>
		<a href="<?php echo base_url('index.php/narasumber/add') ?>" class="btn btn-primary">TAMBAH</a>
	</p>	

	<table class="table table-bordered">
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
			
			<?php $i = 1; ?>

			{narasumber}
			
			<tr>
				<td><?php echo $i++; ?></td>
				<td>{nama}</td>
				<td>{instansi}</td>
				<td>{lokasi}</td>
				<td>{telp}</td>
				<td>{email}</td>
				<td>
					<a href="<?php echo site_url('narasumber/edit'); ?>/{idnarasumber_biodata}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
					<a href="<?php echo site_url('narasumber/delete'); ?>/{idnarasumber_biodata}" onClick="return confirm('Anda Yakin Akan Dihapus?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Hapus</a>
					<!-- <a href="<?php echo site_url('narasumber/detail'); ?>/{idnarasumber_biodata}">detail</a> -->
				</td>
			</tr>
			{/narasumber}
		</tbody>
	</table>

</div>