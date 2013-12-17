<!DOCTYPE html>
<html>
	<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title></title>
			<link rel="stylesheet" href="">
	</head>
	<body>
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
				<?php $i = 1; foreach ($tot->result() as $row) { ?>
			<tr>
				<td><?php echo $i++; ?></td>
				<td><?php echo $row->nama; ?></td>
				<td>
					<a href="<?php echo site_url('tot/addTot/'.$row->idtot); ?>">edit</a>| 
					<a href="<?php echo site_url('tot/deleteTot/'.$row->idtot); ?>" onClick="return confirm('Anda Yakin Akan Dihapus?');">delete</a>| 
					<a href="<?php echo site_url('tot/detailTot/'.$row->idtot); ?>">detail</a>
				</td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
	</body>
</html>