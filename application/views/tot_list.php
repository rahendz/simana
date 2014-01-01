<div class="content-section">

	<h1><span>TOT</span>
		<a href="<?php echo site_url('tot/add') ?>" class="btn btn-primary pull-right tmargin5 rmargin15">+ TAMBAH</a>
		<a href="<?php echo site_url('tot/sertifikat') ?>" class="btn btn-default pull-right tmargin5 rmargin15">SERTIFIKAT</a>
	</h1>

	{notif}

	<table class="table table-striped table-bordered" id="datatable">
		<thead>
			<tr>
				<th>Nomor</th>
				<th>Jenis TOT</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>

		{tot}
			
		<tr>
			<td>&nbsp;</td>
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