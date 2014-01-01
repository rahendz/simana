<div class="content-section">

	<h1><span>TOT</span></h1>

	{notif}

	<p>
		<a href="<?php echo base_url('index.php/tot/add') ?>" class="btn btn-primary">TAMBAH</a>
	</p>	

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nomor</th>
					<th>Jenis TOT</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php $i = 1; ?>
			{tot}
				
			<tr>
				<td><?php echo $i++; ?></td>
				<td>{nama}</td>
				<td>
					<a href="<?php echo site_url('tot/edit'); ?>/{idtot}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
					<a href="<?php echo site_url('tot/delete'); ?>/{idtot}" onClick="return confirm('Anda Yakin Akan Dihapus?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Hapus</a>
					<!-- <a href="<?php echo site_url('tot/detailTot/'.$row->idtot); ?>">detail</a> -->
				</td>
			</tr>
			{/tot}
			</tbody>
		</table>

</div>