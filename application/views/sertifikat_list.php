<div class="content-section">
	
	<h1><span>SERTIFIKAT TOT</span></h1>

		<table class="table table-striped table-bordered" id="datatable">
		<thead>
			<tr>
				<td>No</td>
				<td>Nama</td>
				<td>Nomor</td>
				<td>Nilai</td>
				<td>Jenis TOT</td>
				<td>Aksi</td>
			</tr>
		</thead>

		<tbody>
			{serts}
			<tr>
				<td></td>
				<td>{nama}</td>
				<td>{nomor}</td>
				<td>{nilai}</td>
				<td>{tot}</td>
				<td>
					<a href="<?php echo site_url('tot/sertifikat/edit'); ?>/{idsertifikat_tot}">edit</a>| 
					<a href="<?php echo site_url('tot/sertifikat/delete'); ?>/{idsertifikat_tot}" onClick="return confirm('Anda Yakin Akan Dihapus?');">delete</a>| 
					<!-- <a href="<?php echo site_url('tot/sertifikat/detail'); ?>/{idsertikat_tot}">detail</a> -->
				</td>
			</tr>
			{/serts}
		</tbody>
	</table>

</div>