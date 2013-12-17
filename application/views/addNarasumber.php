<!doctype>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="<?php echo current_url(); ?>" method="post" accept-charset="utf-8">
		Nama <input type="text" name="nama" value="<?php if(isset($data)){echo $data->nama;} ?>">
		instansi <input type="text" name="instansi" value="<?php if(isset($data)){echo $data->instansi;} ?>" >
		lokasi <input type="text" name="lokasi" value="<?php if(isset($data)){echo $data->lokasi;} ?>" >
		telp <input type="text" name="telp" value="<?php if(isset($data)){echo $data->telp;} ?>">
		email <input type="text" name="email" value="<?php if(isset($data)){echo $data->email;} ?>" >
		<input type="submit" name="submit" value="submit">
	</form>				
</body>
</html>