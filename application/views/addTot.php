<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>
		<link rel="stylesheet" href="">
	</head>
	<body>
		<form action="<?php echo current_url() ?>" method="post" accept-charset="utf-8">
			nama : <input type="text" name="nama" value="<?php if(isset($data)){echo $data->nama;} ?>">
			<input type="submit" name="submit" value="submit">
		</form>
	</body>
</html>