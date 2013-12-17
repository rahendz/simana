<!doctype>
<html>
<head>
	<title></title>
</head>
<body>
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
			<?php $i = 1; foreach ($narasumber->result() as $row) { ?>
			<tr>
				<td><?php echo $i++; ?></td>
				<td><?php echo $row->nama; ?></td>
				<td><?php echo $row->instansi; ?></td>
				<td><?php echo $row->lokasi; ?></td>
				<td><?php echo $row->telp; ?></td>
				<td><?php echo $row->email; ?></td>
				<td>
					<a href="<?php echo site_url('narasumber/addNarasumber/'.$row->idnarasumber_biodata); ?>">edit</a>| 
					<a href="<?php echo site_url('narasumber/deleteNarasumber/'.$row->idnarasumber_biodata); ?>" onClick="return confirm('Anda Yakin Akan Dihapus?');">delete</a>| 
					<a href="<?php echo site_url('narasumber/detailNarasumber/'.$row->idnarasumber_biodata); ?>">detail</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>