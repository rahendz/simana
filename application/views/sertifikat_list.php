<div class="content-section">
	
	<h1><span>SERTIFIKAT TOT</span><a href="" class="btn btn-primary pull-right tmargin5 rmargin15">+ TAMBAH</a></h1>

		<table>
		<thead>
			<tr>
				<td>No</td>
				<td>Nomor</td>
				<td>Nilai</td>
				<td>ID</td>
				<td>Aksi</td>
			</tr>
		</thead>

		<tbody>
			<?php $i = 1; ?>
			{serts}
			<tr>
				<td><?php echo $i++; ?></td>
				<td>{nomor}</td>
				<td>{nilai}</td>
				<td>{tot_idtot}</td>
				<td>
					<a href="<?php echo site_url('tot/sertifikat/edit'); ?>/{idsertifikat_tot}">edit</a>| 
					<a href="<?php echo site_url('tot/sertifikat/delete'); ?>/{idsertikat_tot}" onClick="return confirm('Anda Yakin Akan Dihapus?');">delete</a>| 
					<!-- <a href="<?php echo site_url('tot/sertifikat/detail'); ?>/{idsertikat_tot}">detail</a> -->
				</td>
			</tr>
			{/serts}
		</tbody>
	</table>

</div>