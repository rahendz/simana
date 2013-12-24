<div class="content-section row">

	<h1><span>TOT</span></h1>

		<table>
			<caption></caption>
			<thead>
				<tr>
					<th>Nomor</th>
					<th>Jenis TOT</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			{tot}
				<?php $i = 1; ?>
			<tr>
				<td><?php echo $i++; ?></td>
				<td>{nama}</td>
				<td>
					<a href="<?php echo site_url('tot/edit'); ?>/{idtot}">edit</a>| 
					<a href="<?php echo site_url('tot/delete'); ?>/{idtot}" onClick="return confirm('Anda Yakin Akan Dihapus?');">delete</a>| 
					<!-- <a href="<?php echo site_url('tot/detailTot/'.$row->idtot); ?>">detail</a> -->
				</td>
			</tr>
			{/tot}
			</tbody>
		</table>

</div>